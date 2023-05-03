<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // get posts
        $posts = Post::latest()->paginate(5);

        // render view with posts
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $validatedData['image'] = $request->file('image')->store('posts');

        Post::create($validatedData);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        // get post by id
        $post = Post::find($id);

        // return view
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,gif,svg,webp|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // jika user kirim image
        if ($request->hasFile('image')) {
            // save new image
            $validatedData['image'] = $request->file('image')->store('posts');

            // delete image old
            Storage::delete($post->image);

            // update post with new image
            $post->update($validatedData);
        } else {
            // image tidak perlu di update
            unset($validatedData['image']);

            // update post without image
            $post->update($validatedData);
        }

        // redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Post $post)
    {
        // hapus image di storage
        Storage::delete($post->image);

        // hapus post di database
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
