<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','chinese','english','math','create_at','update_at'];

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }
}
