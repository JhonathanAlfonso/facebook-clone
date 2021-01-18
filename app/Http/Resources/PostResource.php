<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => [
                'type' => 'posts',
                'post_id' => $this->id,
                'attributes' => [
                    'body' => $this->body,
                    'posted_by' => new UserResource($this->user)
                ]
            ],
            'links' => [
                'self' => url('/posts/' . $this->id),
            ]
        ];
    }
}
