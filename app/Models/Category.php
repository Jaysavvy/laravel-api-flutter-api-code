<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'name',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('by_user', function (Builder $builder) {
            $user = auth('sanctum')->user();
            if ($user) {
                $builder->where('user_id', $user->id);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
