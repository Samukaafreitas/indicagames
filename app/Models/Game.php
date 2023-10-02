<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $casts = [
        'platform' => 'array'
    ];

    protected $dates = ['data_lancamento'];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
