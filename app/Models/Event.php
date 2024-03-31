<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "address",
        "start_date",
        "end_date",
        "description",
        "logo",
        "banner"
    ];

    protected $dates = ['start_date', 'end_date'];

    /**
     * Get all of the sponsors for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sponsors(): HasMany
    {
        return $this->hasMany(EventSponsor::class);
    }
}
