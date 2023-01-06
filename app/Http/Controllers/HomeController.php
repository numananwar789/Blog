<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        $posts = Post::all();
        return view('home',compact('posts'));
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        // $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        // dd($newImageName);

        if ( $request -> hasFile('image'))
        {
            $image = $request -> file('image')->getClientOriginalName();
            $request -> file('image')->storeAs('public/', $image);
            // $products -> image = $image;
        }

        // $request->image->move(public_path('images', $newImageName));

        // $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        // dd($slug);

        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
            'image'=>$image,
            'user_id'=>auth()->user()->id,
        ]);

        return redirect('/home')->with('message','Your post has been added!');
    }

    public function showPost($slug)
    {
        return view('show')->with('post', Post::where('slug', $slug)->first());
    }

    public function edit($slug)
    {
        return view('edit')->with('post', Post::where('slug', $slug)->first());
    }

    public function editPost(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        if ( $request -> hasFile('image'))
        {
            $image = $request -> file('image')->getClientOriginalName();
            $request -> file('image')->storeAs('public/', $image);
        }

        Post::where('slug', $slug)
        ->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
            'image'=>$image,
            'user_id'=>auth()->user()->id,
        ]);

        return redirect('/home')
        ->with('message','Your post has been updated!');
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug);
        $post -> delete($slug);

        return redirect('/home')
        ->with('message','Your post has been deleted!');
    }

}