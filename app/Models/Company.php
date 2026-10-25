<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website_url',
        'industry',
        'location',
        'is_active',
        'last_modified',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'last_modified' => 'datetime',
        ];
    }
}
