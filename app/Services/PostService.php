<?php

namespace App\Services;

use App\Interfaces\ServiceInterface;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
class PostService implements ServiceInterface
{

    /**
     * @param $data
     * @return void
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tagIds = isset($data['tag_ids']) ?? null;
            unset($data['tag_ids']);
            if (isset($data['preview_image']) && isset($data['main_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images/previews', $data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images/main', $data['main_image']);
            }
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(405);
        }
    }

    /**
     * @param $data
     * @param $post
     * @return void
     */
    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            if (isset($data['preview_image']) && isset($data['main_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images/previews', $data['preview_image']);
                $data['main_image'] = Storage::disk('public')->put('/images/main', $data['main_image']);
            }
            $post->update($data);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            } else {
                $post->tags()->detach($tagIds);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(405);
        }
    }

    /**
     * @param $data
     * @return void
     */
    public function delete($data)
    {
        $data->delete();

    }
}