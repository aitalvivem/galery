<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Gallerie extends Model
{
    use HasFactory;

    protected $fillable = ['nom_gallerie'];

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
