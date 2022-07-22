<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                     ->orWhere('username', 'like', '%' . $search . '%')
                     ->orWhere('no_ktp', 'like', '%' . $search . '%')
                     ->orWhere('email', 'like', '%' . $search . '%');
        });

    }

    public function peminjamanA(){
        return $this->hasMany(Peminjaman::class);
    }

    public function peminjamanP(){
        return $this->hasMany(Peminjaman::class);
    }

    public function perpanjangan(){
        return $this->hasMany(Perpanjangan::class);
    }

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
    ];

    public function routeNotificationForVonage($notification)

    {
        return $this->phone_number;
    }

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }
}
