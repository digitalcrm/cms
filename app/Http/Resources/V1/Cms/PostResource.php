<?php

namespace App\Http\Resources\V1\Cms;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\Cms\CategoryCollection;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'author_id' => $this->user_id,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'body' => $this->body,
            'post_views' => $this->postcount,
            'commentActive' => $this->commentActive,
            'featured_image' => $this->featured_image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
