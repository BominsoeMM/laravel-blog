@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-uppercase text-center">Blog Post</h1>
                <div class="d-flex justify-content-between mb-3">
                    <div class="">
                        @isset($category)
                            <div class="">
                                <span class="">Filter By : ' {{ $category->title }} '</span>
                                <a href="{{route('page.index')}}"><i class="bi bi-x-circle-fill"></i></a>
                            </div>
                        @endisset
                        @if(request('keyword'))
                            <span class="">Search By : ' {{request('keyword')}} '</span>
                            <a href="{{route('page.index')}}"><i class="bi bi-x-circle-fill"></i></a>
                        @endif
                    </div>
                    <form method="get" action="{{route('page.index')}}">
                        <div class="input-group">
                            <input class="form-control" placeholder="search anything" type="text" name="keyword">
                            <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Search</button>
                        </div>
                    </form>

                </div>
                <div class="">

                </div>
                @forelse($posts as $post )
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <div class="">
                            <h3 class="text-decoration-none card-title text-primary">
                                {{$post->title}}
                            </h3>
                        </div>
                        <div class="pb-2">
                            <span class="badge bg-secondary">
                                <i class="bi bi-person-circle"></i>
                                {{ $post->user->name }}
                            </span>
                            <a href="{{route('page.cat',$post->category->slug)}}">
                            <span class="badge bg-secondary">
                                <i class="bi bi-tag"></i>
                                {{ $post->category->title }}
                            </span>
                            </a>
                        </div>
                        <div class="">
                            <p class="text-black-50">
                                {{$post->excerpt}}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="">
                                {{$post->created_at->diffforHumans()}}
                            </div>
                            <div class="">
                                <a class="btn btn-sm btn-outline-primary" href="{{route('page',$post->slug)}}">Seemore</a>
                            </div>
                        </div>
                     
                    </div>
                </div>
                @empty
                @endforelse
                {{$posts->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
@stop