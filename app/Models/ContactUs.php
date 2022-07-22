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

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                     ->orWhere('email', 'like', '%' . $search . '%')
                     ->orWhere('phone', 'like', '%' . $search . '%')
                     ->orWhere('subject', 'like', '%' . $search . '%')
                     ->orWhere('pesan', 'like', '%' . $search . '%'); 
        });

    }
}
