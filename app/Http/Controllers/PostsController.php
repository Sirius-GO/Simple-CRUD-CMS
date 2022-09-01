<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Services\PayUService\Exception;

class PostsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Posts::all();
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

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'fileUpload' => 'required'
        ]);

        $title = $request->input('title');
        $body = $request->input('content');

        $file = $request->file('fileUpload');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move('images', $name);

        $id = auth()->user()->id ?? 1;
        try{
            $post = new Posts;
            $post->user_id = $id;
            $post->title = $title;
            $post->content = $body;
            $post->path = '/images/'.$name;
            $post->save();
        } catch (\Exception $e){
            return $e->getMessage();
        }
        return redirect('/posts')->with('success', 'Your post has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $title = $request->input('title');
        $body = $request->input('content');

        $file = $request->file('fileUpload');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move('images', $name);

        $user_id = auth()->user()->id ?? 1;
        try{
            $post = Posts::find($id);
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content = $body;
            if($file){
                $post->path = '/images/' . $name;
            }
            $post->save();
        } catch (\Exception $e){
            return $e->getMessage();
        }
        return redirect('/posts')->with('success', 'Your post has been successfully updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$post = Posts::find($id);
        //post->delete();
        $post = Posts::findOrFail($id)->delete();
      

        return redirect('/posts')->with('error', 'Your post has been deleted');
    }
}
