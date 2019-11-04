<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if ($categories->count()== 0){
            Session::flash('info', 'You must have some categories before attempting to create a post');
            return  redirect()->back();
        }
            return  view('admin.posts.create')->with('categories', Category::all())
                                                     ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           'title' => 'required',
            'featured' => 'required|image',
            'body' => 'required',
            'category_id'=>'required',
            'tags' =>'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
//        dd($featured);


        $post = Post::create([
            'title' => $request->title,
            'body'=>$request->body,
            'featured'=>'uploads/posts/'. $featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=> Str::slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

//        $post = new Post;
//        $post->title = $request->title;
//        $post->featured = 'uploads/posts/'.$featured_new_name;
//        $post->body = $request->body;
//        $post->category_id = $request->category_id;
//        $post->slug = Str::slug($request->title);
//        dd($post);
//        $post->save();

        Session::flash('success', 'You successfully create a Post');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return  view('admin.posts.edit')->with('post', $post)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id'=>'required'
        ]);


        if ($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'. $featured_new_name;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'You successfully updated the Post');

        return redirect()->route('post.index');
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

        Session::flash('success', 'You successfully Trashed the Post.');
        return redirect()->route('post.index');
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently.');
        return redirect()->back();
    }


    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post Restore Successfull');
        return redirect()->route('post.index');
    }
}
