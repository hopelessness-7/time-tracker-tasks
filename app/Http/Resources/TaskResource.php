<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'entries' => [
                'start_time' => $this->timeEntries->start_time,
                'end_time' => $this->timeEntries->end_time,
                'duration' => $this->timeEntries->duration
            ]
        ];
    }
}
