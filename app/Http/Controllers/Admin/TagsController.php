<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tags.index')->with([
            'tagList' => Tag::query()->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tag::create($this->prepateTag($request));

        return redirect('admin/tags')->with(['success' => 'Tag Created']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($this->prepateTag($request, $tag));

        return redirect('admin/tags')->with(['success' => 'Tag Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if ($tag->posts()->count() > 0) {
            return redirect('admin/tags')->with(['error' => 'Tag has posts associated with it']);
        }

        $tag->delete();

        return redirect('admin/tags')->with(['success' => 'Tag Deleted']);
    }

    protected function prepateTag(Request $request, ?Tag $tag = null): array
    {
        $tag ??= new Tag();

        $attributes = $request->validate([
            'name' => 'required'
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        return $attributes;
    }
}
