<?php

namespace Eliyas5044\LaravelFileApi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    /**
     * The table associated with the model.
     *
     * @return string
     * @var string
     */
    public function getTable(): string
    {
        return config('laravel-file-api.tablePrefix') . config('laravel-file-api.tables.files', parent::getTable());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'folder_id', 'url', 'name', 'slug',
        'path', 'mime_type', 'size', 'order_column'
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
}
