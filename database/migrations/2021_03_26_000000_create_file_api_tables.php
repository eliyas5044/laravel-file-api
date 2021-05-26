<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileApiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up()
    {
        $tableNames = config('laravel-file-api.tables');

        if (empty($tableNames)) {
            throw new Exception('Error: config/laravel-file-api.php not loaded. Run [php artisan config:clear] and try again.');
        }

        $folders = config('laravel-file-api.tablePrefix') . config('laravel-file-api.tables.folders', 'folders');
        $files = config('laravel-file-api.tablePrefix') . config('laravel-file-api.tables.files', 'files');

        Schema::create($folders, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->string('parent_folder')->nullable();
            $table->timestamps();
        });

        Schema::create($files, function (Blueprint $table) use ($folders) {
            $table->id();
            $table->foreignId('folder_id')->nullable()->constrained($folders)->cascadeOnDelete();
            $table->string('url')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('path')->nullable();
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->default(0);
            $table->unsignedInteger('order_column')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function down()
    {
        $tableNames = config('laravel-file-api.tables');

        if (empty($tableNames)) {
            throw new Exception('Error: config/laravel-file-api.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        $folders = config('laravel-file-api.tablePrefix') . config('laravel-file-api.tables.folders', 'folders');
        $files = config('laravel-file-api.tablePrefix') . config('laravel-file-api.tables.files', 'files');

        Schema::dropIfExists($files);
        Schema::dropIfExists($folders);
    }
}
