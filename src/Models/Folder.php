<?php

namespace Eliyas5044\LaravelFileApi\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    /**
     * The table associated with the model.
     *
     * @return string
     * @var string
     */
    public function getTable(): string
    {
        return config('laravel-file-api.tablePrefix') . config('laravel-file-api.tables.folders', parent::getTable());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'parent_id', 'parent_folder'
    ];

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'folder_id');
    }
}
