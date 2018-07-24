<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $post = new Post();
        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->published_at = $request->get('published_at');
        $post->category_id = $request->get('category');
        $post->user_id = Auth::id();
        $post->save();

        if ($request->hasFile('header_image')) {
            $image = $request->file('header_image');
            $dt = now();
            $extension = $image->extension();
            $filename = implode('.', [
                $dt->format('YmdHis'),
                $extension
            ]);
            Image::make($image)->resize(1900, 1260);
            $imagePath = $image->storeAs('public/headers', $filename);
            $post->fill(['header_image' => Storage::url($imagePath)])->save();
        }

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('message', 'La publicación ha sido creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->title = $request->get('title');
        $post->subtitle = $request->get('subtitle');
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->published_at = $request->get('published_at');
        $post->category_id = $request->get('category');
        $post->user_id = Auth::id();
        $post->save();

        if ($request->hasFile('header_image')) {
            $image = $request->file('header_image');
            $dt = now();
            $extension = $image->extension();
            $filename = implode('.', [
                $dt->format('YmdHis'),
                $extension
            ]);
            $oldFilePath = str_replace('storage', 'public', $post->header_image);
            Storage::delete($oldFilePath);
            Image::make($image)->resize(1900, 1260);
            $imagePath = $image->storeAs('public/headers', $filename);
            $post->fill(['header_image' => Storage::url($imagePath)])->save();
        }

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('message', 'La publicación ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'La publicación ha sido eliminada');
    }
}
