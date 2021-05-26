<?php

namespace Eliyas5044\LaravelFileApi\Http\Resources\File;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'url' => $this->url,
            'path' => $this->path,
            'folder_id' => $this->folder_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type' => 'file',
            'mime_type' => $this->mime_type,
            'size' => $this->size,
        ];
    }
}
