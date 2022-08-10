<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Digitalfavorit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'digitalfavorits'; 

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function koleksidigitals(){
        return $this->belongsTo(Koleksidigital::class);
    }

   

}
