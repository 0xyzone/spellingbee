<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $appends = ['sponsor_logo_url'];
    protected $fillable = [
        "name",
        "url",
        "description",
        "sponsor_logo_path",
    ] ;

    /**
     * Create the sponsor_logo_url attribute
     */
    public function getSponsorLogoUrlAttribute() 
    {
        // Use the actual column name from your database
        return $this->sponsor_logo_path 
            ? asset('storage/' . $this->sponsor_logo_path) 
            : null;
    }
}
