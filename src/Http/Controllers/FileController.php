<?php

namespace Eliyas5044\LaravelFileApi\Http\Controllers;

use Eliyas5044\LaravelFileApi\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class FileController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|file',
            'folder' => 'required',
            'folder_id' => 'filled'
        ]);

        DB::beginTransaction();
        try {
            $requested_file = $request->file('file');

            $name = $requested_file->getClientOriginalName();
            $extension = $requested_file->extension();
            $mime_type = $requested_file->getMimeType();
            $size = $requested_file->getSize();

            // create slug
            $only_name = Str::of($name)->basename($extension);
            $slug = $this->checkFileSlug($only_name);

            $folder_name = $request->get('folder', 'new-folder');
            $folder_id = $request->get('folder_id');

            // store file into folder
            $path = $requested_file->storeAs($folder_name, $slug . '.' . $extension);

            $url = Storage::url($path);

            $file = File::query()->create([
                'folder_id' => $folder_id,
                'name' => $name,
                'url' => $url,
                'path' => $path,
                'slug' => $slug,
                'mime_type' => $mime_type,
                'size' => $size,
            ]);

            DB::commit();

            return response()->json([
                'data' => $file,
                'message' => 'Successfully Created.'
            ]);
        } catch (Throwable $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Something went wrong, please try again later.',
                'error' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * @param $file
     * @return JsonResponse
     */
    public function destroy($file): JsonResponse
    {
        DB::beginTransaction();
        try {
            $file = File::query()->findOrFail($file);

            Storage::delete($file->path);

            $file->delete();

            DB::commit();
            return response()->json([
                'message' => 'Successfully Deleted'
            ]);
        } catch (Throwable $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Something went wrong, please try again later.',
                'error' => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * @param $name
     * @return string
     */
    public function checkFileSlug($name): string
    {
        $slug = Str::slug($name, '-', app()->getLocale());

        # slug repeat check
        $latest = File::query()
            ->where('slug', '=', $slug)
            ->latest('id')
            ->value('slug');

        if ($latest) {
            $pieces = explode('-', $latest);
            $number = intval(end($pieces));
            $slug .= '-' . ($number + 1);
        }

        return $slug;
    }

    /**
     * @param Request $request
     */
    protected function download(Request $request)
    {
        $path = $request->get('path');
        return Storage::download($path);
    }
}
