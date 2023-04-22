<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Lesson as LessonResource;

class User extends JsonResource
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
            'Full Name' => $this->name,
            'E-Mail' => $this->email,
            'Role' => $this->role
            // 'Pass' => $this->password
            // 'Lessons' => LessonResource::collection($this->lessons),
        ];
    }
}
