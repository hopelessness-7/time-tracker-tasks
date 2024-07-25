<?php

namespace App\Models;

use App\Models\Relations\BelongsTo\UserRelation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeEntry extends Model
{
    use HasFactory, UserRelation;

    public $timestamps = false;

    protected $fillable = [
        'start_time',
        'end_time',
        'duration'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    // Мутатор для установки start_time и end_time
    public function setStartTimeAndEndTime($start_time, $end_time): void
    {
        $this->attributes['start_time'] = Carbon::parse($start_time)->format('Y-m-d H:i');
        $this->attributes['end_time'] = Carbon::parse($end_time)->format('Y-m-d H:i');
        $this->calculateDuration();
    }

    // Метод для вычисления продолжительности
    protected function calculateDuration(): void
    {
        if ($this->start_time && $this->end_time) {
            $start = Carbon::parse($this->start_time);
            $end = Carbon::parse($this->end_time);
            $this->attributes['duration'] = $end->diffInMinutes($start);
        }
    }
}
