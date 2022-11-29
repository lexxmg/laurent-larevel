<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon_id',
        'gpio_id',
        'mode_id',
        'virt_on',
        'virt_off',
        'virt_type',
        'revers',
        'laurent_id',
        'confirm'
    ];

    public function laurent()
    {
        return $this->belongsTo(Laurent::class);
    }

    public function gpio()
    {
        return $this->belongsTo(Gpio::class);
    }

    public function mode()
    {
        return $this->belongsTo(Mode::class);
    }

    public function icon()
    {
        return $this->belongsTo(Icon::class);
    }
}
