<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    protected $table = 'victims';

    protected $fillable = [
        'id',
        'email',
        'password_submitted',
        'password_length',
    ];
}