<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vino extends Model
{
    use HasFactory;

    protected $fillable = ['naziv', 'ambalaza', 'vrstaId', 'vinarijaId'];

    protected $table = 'vina';
}
