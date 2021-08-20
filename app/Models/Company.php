<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function employees(){
        $this->hasMany(Empolyee::class);
    }

    protected $fillable = ['name', 'email', 'image', 'websiteAddress' ];
}
