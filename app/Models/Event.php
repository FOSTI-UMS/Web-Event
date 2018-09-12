<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nama_event',
        'max_partic',
        'waktu',
        'pamflet',
        'deskripsi',
        'slug'
    ];
}
