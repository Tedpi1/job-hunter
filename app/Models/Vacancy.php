<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'description',
        'location',
        'employment_type',
        'experience_level',
        'application_url',
        'deadline',
        'published_at',
        'source',
        'external_id',
        'is_active',
        'last_seen_at',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
            'published_at' => 'datetime',
            'last_seen_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function vacancies(): HasMany
{
    return $this->hasMany(Vacancy::class);
}
}
