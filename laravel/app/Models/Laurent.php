<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laurent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'host',
        'description',
        'on'
    ];

    public function out()
    {
        return $this->hasMany(Out::class);
    }
}