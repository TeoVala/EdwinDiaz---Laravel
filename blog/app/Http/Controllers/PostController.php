<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::latest()->get();
        return view("posts.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); // set it to create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        // $file = $request->file('file');

        // echo $file->getClientOriginalName();
        

        $input = $request->all();

        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['path'] = $name; // input is column name inside the database
        }

        Post::create($input);

        // $this->validate($request, [
        //     'title' => 'required|max:40',
        // ]);

        // return $request->all();
        // return $request->get('title');
        // return $request->title;

        // Post::create($request->all());

        // $input = $request->all();
        // $input['title'] = $request->title;

        // In order for  this to work you should do the following
        // $table->integer('user_id')->default(0);
        // $table->text('content')->nullable();

        // Post::create($request->all());  

        // $post = new Post;

        // The right way is this set each value properly
        // $post->title = $request->title;

        // $post->save();

        // return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

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
        $post = Post::findOrFail($id);

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
        // return $request->all();

        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('/posts');
    }

    public function contact(){

        $people = ['Edwin', 'Jose', 'James'];

        return view("contact", compact('people'));
    }

    public function show_post($id, $name) {
        // return view('post')->with('id', $id);

        return view('post', compact('id', 'name'));
    }
}
