<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'out',
        'type',
        'stat',
        'mode',
        'revers',
        'laurent_id'
    ];

    public function laurent()
    {
        return $this->belongsTo(Laurent::class);
    }
}
