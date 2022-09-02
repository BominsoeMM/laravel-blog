@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-uppercase text-center">Blog Post</h1>
                <div class="card mb-3">
                    <div class="p-3">
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
                            <span class="badge bg-secondary">
                                <i class="bi bi-tag"></i>
                                {{ $post->category->title }}
                            </span>
                        </div>
                        <div class="">
                            <p style="white-space: pre-wrap" class="text-black-50">
                                {{$post->description}}
                            </p>
                        </div>
                        <div class="mb-3  d-flex justify-content-between">
                                <div class="">
                                    {{$post->created_at->diffforHumans()}}
                                </div>
                                <div class="">
                                    @can('update',$post)
                                        <a class="btn btn-sm btn-info" href="{{route('post.edit',$post->id)}}">
                                            <i class="bi bi-pen-fill"></i>
                                        </a>
                                    @endcan
                                    <a class="btn btn-sm btn-info" href="{{route('page.index')}}">Back</a>

                                </div>
                        </div>
{{--                        @isset($post->featured_image)--}}
{{--                            <img src="{{asset('storage/'.$post->featured_image)}}" class="w-50 mt-3 rounded" alt="">--}}
{{--                        @endisset--}}
                    </div>
                    <div class="text-center my-3">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner ">
                                @foreach($post->photos as $key=>$photo)
                                    <div class="me-3">
                                        <div class="text-center carousel-item  {{$key===0 ? 'active' : ''}}">
                                            <a class="venobox " data-gall="myGallery" href="{{asset('storage/'.$photo->name)}}">
                                                <img src="{{asset('storage/'.$photo->name)}}" class="d-block post-detail-img w-100">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn text-info carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <i class="text-secondary bi bi-caret-left-fill"></i>
                            </button>
                            <button class="btn text-info carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <i class="text-secondary bi bi-caret-right-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop