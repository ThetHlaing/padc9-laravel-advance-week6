<?php
namespace App\Services;

use App\Mail\PostCreate;
use App\Mail\PostUpdate;
use App\Post;
use \Cache;
use \Mail;

class PostService
{

    public function make($data)
    {

        $data['author_id'] = \Auth::user()->id;
        $post = Post::create($data);

        if(!$post->is_published){
            $post->unsearchable();
        }

        Cache::forever('post.' . $post->id, $post);

        Mail::to('th.ucsy@gmail.com')->send(
            new PostCreate($post)
        );

        return $post;
    }

    public function update($data, $post)
    {
        $post->update($data);

        if(!$post->is_published){
            $post->unsearchable();
        }

        Cache::forever('post.' . $post->id, $post);

        \Mail::to('th.ucsy@gmail.com')->send(
            new PostUpdate($post)
        );

        return $post;
    }

}
