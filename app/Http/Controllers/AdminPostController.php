<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::query()->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($this->preparePost($request));

        return redirect("/posts/$post->slug")->with(['success' => 'Post Created']);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($this->preparePost($request, $post));

        return redirect("/posts/$post->slug")->with(['success' => 'Post Updated']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin/posts')->with(['success' => 'Post Deleted']);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return array
     */
    protected function preparePost(Request $request, ?Post $post = null): array
    {
        $post ??= new Post();

        $attributes = $request->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = Auth::id();
        $attributes['slug'] = Str::slug($attributes['title']);
        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        return $attributes;
    }
}
