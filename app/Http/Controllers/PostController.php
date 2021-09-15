<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.allposts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validates user input
         $this->validate($request,[
            'title'     => 'required|min:3|max:191',
            'body'      => 'required|min:3|max:191',
            'rate'      =>  'required'
         ]);

         // create an new post
         $post = new Post;
         $post->title = $request->input('title');
         $post->body = $request->input('body');
         $post->rate = $request->input('rate');
         $post->user_id = Auth::user()->id;
         $post->save();
 
        return redirect('/')->with('success_message','post successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('pages.editpost')->with('post',$post);
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
        
        $this->validate($request,[
            'title'     => 'required|min:3|max:191',
            'body'      => 'required|min:3|max:191',
            'rate'      => 'required'
         ]);
         

         //find a post
         $post  =   Post::find($id);
         //check that if user is allowed to perfom this operation
         if($post->user_id !== Auth::user()->id){
             return redirect('/')->with('error_message','you are not authorized to peform this operation');
         }

         $post->title = $request->input('title');
         $post->body = $request->input('body');
         $post->rate = $request->input('rate');
         $post->save();
 
        return redirect('/')->with('success_message','post successfully added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->user_id !== Auth::user()->id){
            return redirect('/')->with('error_message','you are not authorized to peform this operation');
        }
        $post->delete();
        return redirect('/')->with('success_message','post successfully deleted');
    }
}
