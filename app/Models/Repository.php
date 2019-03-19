<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class Repository extends Model
{
    protected $fillable = [
        'user_id', 'github_id', 'name', 'full_name', 'private', 'fork', 'webhook_id', 'webhook_secret'
    ];

    protected $casts = [
        'private' => 'bool',
        'fork' => 'bool',
        'active' => 'bool',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublic(Builder $builder)
    {
        $builder->where('private', false);
    }

    public function scopePrivate(Builder $builder)
    {
        $builder->where('private', true);
    }

    public function scopeFork(Builder $builder, bool $fork = true)
    {
        $builder->where('fork', $fork);
    }

    public function scopeActive(Builder $builder, bool $active = true)
    {
        $builder->where('active', $active);
    }
}
