<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('order','ASC')->get();

        return view('backend.posts.post',compact('posts'));
    }

    public function update(Request $request)
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
