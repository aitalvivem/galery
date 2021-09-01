<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gage;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'photo'];

    public function gages(){
        return $this->hasMany(Gage::class);
    }
}
