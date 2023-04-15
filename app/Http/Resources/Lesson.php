<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResource;

class Lesson extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Author' => $this->user->name,
            'Title' => $this->title,
            'Content' => $this->body,
            'Tags' => TagResource::collection($this->tags)
        ];
    }
}
