<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectStatistic extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'total_time',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

}
