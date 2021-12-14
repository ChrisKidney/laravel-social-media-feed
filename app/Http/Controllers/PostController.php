<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index() {
        return redirect('/home');
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|active_url',
        ]);

        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image_url' => $data['image_url'],
            'created_by' => Auth::id()
        ]);

        return redirect('/home')->with('status', 'Post Created')->with('status_type', 'success');
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|active_url',
        ]);

        $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'image_url' => $data['image_url'],
        ]);

        return redirect('/home')->with('status', 'Post Updated')->with('status_type', 'success');
    }


    public function destroy(Post $post) {
        $post->update(['deleted_by' => Auth::id()]);
        $post->delete();

        return redirect('/home')->with('status', 'Post Deleted')->with('status_type', 'danger');
    }
}
