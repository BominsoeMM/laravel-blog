@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-uppercase text-center">Blog Post</h1>
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
                                <span class="badge bg-secondary">
                                <i class="bi bi-tag"></i>
                                {{ $post->category->title }}
                            </span>
                            </div>
                            <div class="">
                                @isset($post->featured_image)
                                    <img src="{{asset('storage/'.$post->featured_image)}}" class="w-50 mt-3 rounded" alt="">
                                @endisset
                            </div>
                            <div class="">
                                <p class="text-black-50">
                                    {{$post->description}}
                                </p>
                            </div>
                            <div class="mb-3  d-flex">
                                @foreach($post->photos as $photo)
                                    <div class="me-3">
                                        <img src="{{asset('storage/'.$photo->name)}}" height="200" class="rounded text-center" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    {{$post->created_at->diffforHumans()}}
                                </div>
                                <div class="">
                                    <a class="btn btn-sm btn-outline-primary" href="{{route('page.index')}}">Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop