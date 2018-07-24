<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    
    public function home()
    {
    	$posts = Post::published()->simplePaginate(4);
    	return view('blog.home', [
            'title'     => config('blog.name'),
            'subtitle'  => config('blog.subheading'),
            'posts'     => $posts
        ]);
    }

    public function show(Post $post)
    {
    	return view('blog.post', compact('post'));
    }

    public function category(Category $category)
    {
        return view('blog.home', [
            'title'     => $category->name,
            'subtitle'  => "Publicaciones de la etiqueta $category->name",
            'posts'     => $category->posts()->simplePaginate(4)
        ]);
    }

    public function tag(Tag $tag)
    {
        return view('blog.home', [
            'title'     => $tag->name,
            'subtitle'  => "Publicaciones de la etiqueta $tag->name",
            'posts'     => $tag->posts()->simplePaginate(4)
        ]);
    }

    public function about()
    {
    	return view('blog.about', [
            'title'     =>  config('blog.about'),
            'subtitle'  =>  'Esto es lo que hacemos'
        ]);
    }

    public function contact()
    {
    	return view('blog.contact', [
            'title'     =>  config('blog.contact'),
            'subtitle'  =>  '¿Tienes preguntas? Tenemos respuestas'
        ]);
    }

    public function sendContactForm(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|email',
            'subject'   =>  'required',
            'body'      =>  'required'
        ]);

        $contact = new \stdClass();

        $contact->name    = $request->get('name');
        $contact->email   = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->body    = $request->get('body');

        Mail::to(config('mail.from.address'))->send(new ContactForm($contact));

        return redirect()->back()->with('message', 'Enhorabuena, tu mensaje ha sido enviado');
    }
    
}
