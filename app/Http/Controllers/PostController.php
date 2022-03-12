<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;

class PostController extends Controller
{
    public function index()
    {
        // $posts =Post::all();
        $posts =Post::latest()->paginate(3);
        // dd($posts);
        return view('post.index', compact('posts'));
    }

    //
    public function create()
    {
        $categories = Category::all();
        return view('cate.create', compact('categories'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'content' => 'required|min:10',
        ]);
        Post::create([
            'title' =>  request('title'),
            'content' => request('content'),
            'category_id'=>request('category_id'),
            'slug'=>request('title')

            
        ]);
        return redirect()->route('post.index')->with('success', 'Post ditambahkan');
    }

    public function edit(Post $post)
    {
        // $post = Post::find($id);
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        // $post = Post::find($id);
        
        $post->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'content' => request('content')
        ]);
        return redirect()->route('post.index')->withInfo('Post berhasil di rubah');     
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->withDanger('Post berhasil di hapus');         
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
}
