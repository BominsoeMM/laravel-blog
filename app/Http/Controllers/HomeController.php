<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(!Auth::user()->role === 'author') {
            return view('home');
        }
        $posts = Post::when(request('keyword'), function ($q) {
            $keyword = request('keyword');
            $q->orWhere("title", "like", "%$keyword%")->orWhere("description", "like", "%$keyword%");
        })
            ->latest('id')
            ->with(['category','user'])
            ->paginate(10)
            ->withQueryString();
        return view('index',compact('posts'));
    }

    public function test(){
        return view('test');
    }
}
