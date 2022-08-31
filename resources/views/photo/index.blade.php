@extends('layouts.app')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            Photo Page
            <div class="gallary me-3 ">
            @forelse(\Illuminate\Support\Facades\Auth::user()->photos as $photo)
                    <img src="{{asset('storage/'.$photo->name)}}" height="200" class="w-100 mb-3 rounded text-center" alt="">
            @empty
                <p>There is no data</p>
            @endforelse
            </div>
        </div>
    </div>
@endsection
