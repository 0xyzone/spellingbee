<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "address",
        "contact_person_name",
        "contact_number",
        "email",
        "school_type"
    ] ;
}
