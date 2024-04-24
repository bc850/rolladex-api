<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "business_name",
        "contact_first_name",
        "contact_middle_name",
        "contact_last_name",
        "address_1",
        "address_2",
        "city",
        "state",
        "zip",
        "phone_1",
        "phone_2",
        "fax",
        "email",
        "email_2",
        "website",
        "picture_url",
        "industry",
        "sub_industry",
        "notes"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
