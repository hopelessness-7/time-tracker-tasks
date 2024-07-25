<?php

namespace App\Models;

use App\Models\Relations\BelongsTo\UserRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory, UserRelation;

    protected $fillable = [
        'title',
        'description',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function statistics(): HasOne
    {
        return $this->hasOne(ProjectStatistic::class);
    }

}
