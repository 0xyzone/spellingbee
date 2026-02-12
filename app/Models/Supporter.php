<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supporter extends Model
{
    use HasFactory;
    protected $appends = ['supporter_logo_url'];


    /**
     * Create the supporter_logo_url attribute
     */
    public function getSupporterLogoUrlAttribute() 
    {
        // Use the actual column name from your database
        return $this->supporter_logo_path 
            ? asset('storage/' . $this->supporter_logo_path) 
            : null;
    }
}
