<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        	'id' => $this->id,
			'name' => $this->name,
			'number' => $this->number,
			'comment' => $this->comment,
			'created_at' => $this->created_at,
		];
    }
}
