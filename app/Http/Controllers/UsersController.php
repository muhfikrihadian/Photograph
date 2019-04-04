<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
use Auth;
use DB;
use App\Post;
use App\Comment;
use App\User;

class UsersController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [];
        $data['photos'] = Post::orderBy('_id', 'desc')->get();
        $data['listUsers'] = User::all();

        return view('Users.beranda', $data);
    }
    public function upload()
    {
        return view('Users.upload');
    }
    public function post($id)
    {
        $data['post'] = Post::where('_id', $id)->get();
        $data['user'] = User::all();
        $data['comment'] = Comment::where('idpost', $id)->orderBy('id', 'desc')->get();
      
        return view('Users.item', $data);

    }
    public function commentAction(Request $r){

           $comment = new Comment;
           $comment->idpost = $r->idPost;
           $comment->comment = $r->commentPost;
           $comment->iduser = Auth::user()->id;
           $comment->save();

           return redirect()->route('post', [$r->idPost]);

   }
    public function mygallery()
    {
        $galeri['posts'] = Post::where('by', '=', Auth::user()->email)->get();
        return view('Users.gallery', $galeri);
    }
    public function userGallery($by)
    {
        $post['photo'] = Post::where('by', '=', $by)->get();
        // dd($post['photo']);
        return view('Users.usergallery', $post);
    }
    public function uploadAction(Request $r){
        $file = $r->file('picturePost');

           $gambar = $file->getClientOriginalName();
           $r->file('picturePost')->move(public_path('upload'), $gambar);        

           $post = new Post;
           $post->caption = $r->captionPost;
           $post->description = $r->descriptionPost;
           $post->file = $gambar;
           $post->by = Auth::user()->email;
           $post->save();

           return redirect()->route('mygallery');

   }
   
}
