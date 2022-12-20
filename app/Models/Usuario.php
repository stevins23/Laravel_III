<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded = [];

    public $timestamps = false;

    public function edad()
    {
        return \Carbon\Carbon::parse($this->f_nacimiento)->age;
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }


}
