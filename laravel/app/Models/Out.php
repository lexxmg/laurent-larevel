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
        'type_id',
        'stat',
        'mode_id',
        'revers',
        'laurent_id'
    ];

    public function laurent()
    {
        return $this->belongsTo(Laurent::class);
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
