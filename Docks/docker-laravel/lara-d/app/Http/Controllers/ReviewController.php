<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Models\UploadImage;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Contracts\Auth\Authenticatable;

class ReviewController extends Controller
{
    public function index()
    {
        $posts = Review::orderBy('created_at', 'desc')->paginate(6);
        $image = Review::orderBy("id", "desc")->get();
        $user = Auth::user();
        $user_id = Auth::id();

        return view('posts.index',['posts' => $posts]);
    }

    public function show($post_id)
    {
        $posts = Review::findOrFail($post_id);
        $user = Auth::user();
        $user_id = Auth::id();
        dd($user_id);
        return view('posts.show', ['posts' => $posts]);
        //return view('posts.show', compact('post','user_id'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function edit($post_id)
    {
        $user = Auth::user();
        $this->authorize('update', $user);
        $post = Review::findOrFail($post_id);
        return view('posts.edit',['post'=>$post]);
    }

    public function store(Request $request)
    {
        
        $params = $request->validate([
            'title'=>'required|max:20',
            'body'=>'required|max:140',
            'image'=>'required',
            'commic_title'=>'required',
        ]);

        $image = $request->file('image');

        if($image){
            $path = $image->store('uploads',"public");
             
            if($path){
                UploadImage::create([
                    "file_name" => $upload_image->getClientOriginalName(),
					"file_path" => $path
                ]);
            }
        }
        
        Review::create($params);

        return redirect()->route('top');
    }

    public function update($post_id, Request $request)
    {
        $user = Auth::user();
        $this->authorize('update', $user);
        $params = $request->validate([
            'title'=>'required|max:20',
            'body'=>'required|max:140',
            'image'=>'required',
            'commic_title'=>'required',
        ]);
        
        $post = Review::findOrFail($post_id);
        $post->fill($params)->save();

        $image = $request->file('image');

        if($image){
            $path = $image->store('uploads',"public");
             
            if($path){
                UploadImage::create([
                    "file_name" => $upload_image->getClientOriginalName(),
					"file_path" => $path
                ]);
            }
        }

        Review::create($params);

        return redirect()->route('posts.show',['post'=>$post]);
    }

    public function destroy($post_id)
    {
        $user = Auth::user();
        $this->authorize('update', $user);
        $post = Review::findOrFail($post_id);

        \DB::transaction(function() use ($post){
            $post->delete();
        });

        return redirect()->route('top');
    }
}


