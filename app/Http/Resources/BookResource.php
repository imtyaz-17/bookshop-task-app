<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class BookResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'cover'=>url($this->cover_url),
            'price'=>$this->price,
            'authors' => $this->authors,
            'genres' => $this->genres,
            $this->mergeWhen($request->routeIs('books.show'), [
                'description' => $this->description,
            ]),
        ];
    }
}
