<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));

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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
  
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>auth()->user()->id,
        ]);
     
        return redirect()->route('post.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        

        if(!$post){
            return redirect()->route('post.index')->with('error','Invalid post record supplied');
        }
       
       
        if(Gate::allows('update',$post)){
            return view('posts.edit',compact('post'));
        }
        return redirect()->route('post.show', $id)
                    ->with('error','You are not authorized to edit this post');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate([

            'title' => 'required',        
            'body' => 'required',
        
                ]);
        $post = Post::where('id',$id)->first();

        if(!$post){
            return redirect()->route('post.show', $id)->with('error','Invalid post record supplied');
        }
        if(Gate::allows('update',$post)){
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            return redirect()->route('post.index')
                    ->with('success','Post updated successfully'); 
        }
        
        return redirect()->route('post.show', $id)
                    ->with('error','You are not authorized to update this post'); 
        
               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {
           $post = Post::where('id',$id)->first();

           if(!$post){
                return redirect()->route('post.show', $id)->with('error','Invalid post record supplied');
           }

           if(Gate::allows('delete',$post)){
                Post::find($id)->delete();

                return redirect()->route('post.index')->with('success','Post deleted successfully');
           }
           return redirect()->route('post.show', $id)->with('error','You are not authorized to delete this post');

    }

    public function postPost(Request $request)
    {
        request()->validate(['rate' => 'required']);
        $post = Post::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);
        return redirect()->route("post");
  }
}
