<?php

namespace App\Models;

use Carbon\Carbon;
use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasSuperAdmin;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'date_of_birth',
        'contact_number',
        'address',
        'school',
        'gender',
        'grade',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getPercentageCompleteAttribute(): float
    {
        $attributes = [
            'date_of_birth',
            'contact_number',
            'address',
            'school',
            'gender',
            'grade',
        ];

        $complete = collect($attributes)
            ->map(fn($attribute) => $this->getAttribute($attribute))
            ->filter()
            ->count();

        return ($complete / count($attributes)) * 100;
    }
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return Auth()->user()->isSuperAdmin() || Auth()->user()->hasRole('Admin');
        } elseif ($panel->getId() === 'participant') {
            return Auth()->user()->hasRole('Participant');
        }

        return true;
    }

    public function isComplete(): bool
    {
        // Get all fillable attributes
        $fillableAttributes = $this->fillable;

        // Check if any fillable attribute is null or empty
        foreach ($fillableAttributes as $attribute) {
            if (empty($this->{$attribute})) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the registrations associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function registrationStatus(int $eventId): string
    {
        $statusMapping = [
            'pending' => 'Pending',
            'approved' => 'Approved',
            'declined' => 'Declined',
        ];

        $registration = $this->registrations()->where('event_id', $eventId)->latest()->first();

        if ($registration) {
            $status = $registration->status;
            return $statusMapping[$status] ?? $status; // Use mapped value if available, otherwise return the original status
        } else {
            return 'Not registered'; // Or any default value you prefer
        }
    }

    /**
     * Get the avatar associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function avatar(): HasOne
    {
        return $this->hasOne(UserAvatar::class);
    }

    public function age(): ?int
    {
        if ($this->date_of_birth) {
            return Carbon::parse($this->date_of_birth)->age;
        }

        return null;
    }
}
