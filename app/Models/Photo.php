<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallerie;
use App\Models\Tag;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['titre_photo', 'description', 'nom_file'];

    public function gallerie(){
        return $this->belongsTo(Gallerie::class); 
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
