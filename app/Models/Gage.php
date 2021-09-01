<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profil;

class Gage extends Model
{
    use HasFactory;

    protected $fillable = ['lib', 'rang', 'profil_id'];

    public function profil(){
        return $this->belongsTo(Profil::class); 
    }
}
