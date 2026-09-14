<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    protected $fillable = [
        'email',
        'password',
        'password_submitted',
        'password_length',
    ];

    protected function casts(): array
    {
        return [
            'password_submitted' => 'boolean',
        ];
    }
}