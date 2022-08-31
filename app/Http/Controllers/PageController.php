<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
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
    public function page($slug){
        $post = Post::where('slug',$slug)->with('user','category','photos')->first();
        return view('page',compact('post'));
    }
    public function catpage(Category $category){
        $posts = Post::where(function ($q){
            $q->when(request('keyword'),function($q){
                $keyword = request('keyword');
                $q->orWhere("title","like","%$keyword%")->orWhere("description","like","%$keyword%");
            });
        })
            ->where("category_id",$category->id)
            ->latest("id")
            ->with(['user','category'])
            ->paginate(10)
            ->withQueryString();
        return view('index',compact('posts','category'));
    }
}
