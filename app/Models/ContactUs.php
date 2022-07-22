<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory, Notifiable;
    public $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'pesan'
    ];
}
