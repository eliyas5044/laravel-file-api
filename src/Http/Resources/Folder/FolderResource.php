<?php

namespace Eliyas5044\LaravelFileApi\Http\Resources\Folder;

use Eliyas5044\LaravelFileApi\Http\Resources\File\FileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'parent_folder' => $this->parent_folder,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type' => 'folder',
            'children' => self::collection($this->children),
        ];
    }
}
