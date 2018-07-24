<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ImagesController extends Controller
{
    public function store(Post $post) {

    	$this->validate(request(), [
    		'image' => 'image|max:2048'
    	]);

    	//$image = request()->file('image')->store('public');
    	//$imageUrl = Storage::url($image);

    	Image::create([
    		'url'		=>	request()->file('image')->store('posts', 'public'),
    		'post_id'	=>	$post->id
    	]);
    }

    public function destroy(Image $image) {

    	$image->delete();

    	//$imagePath = str_replace('storage', 'public', $image->url);
    	
    	return back()->with('message', 'La imagen ha sido eliminada');	
    }
}
