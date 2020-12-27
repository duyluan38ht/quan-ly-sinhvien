<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=['id','name','class','email','phone','address'];
    public function group(){
        return $this->belongsTo('App\Model\Group', 'id', 'id');
    }
}
