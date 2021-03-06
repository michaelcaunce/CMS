<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\Posts\CreatePostsRequest;
// use App\Http\Requests\Posts\UpdateCategoriesRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {

      // Upload the image to store
      $image = $request->image->store('posts');

      // Create the post
      Post::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
        'image' => $image
      ]);

      // Flash success message
      session()->flash('success', 'Post created successfully');
      // Return the user to posts index
      return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $post = Post::withTrashed()->where('id', $id)->firstOrFail();

      if ($post->trashed()) {
        $post->forceDelete();
      } else {
          $post->delete();
      }

      session()->flash('success', 'Post deleted successfully');
      return redirect(route('posts.index'));
    }

    /**
     * Display a list of all trashed posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trashed(){
      $trashed = Post::onlyTrashed()->get();
      return view('posts.index')->withPosts($trashed);
  }
}
