@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a class="text-decoration-none text-black-50 text-uppercase" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-uppercase" aria-current="page">User</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Manage Category</h4>
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    @if(request('keyword'))
                        <span class="">Search By : ' {{request('keyword')}} '</span>
                        <a href="{{route('users.index')}}"><i class="bi bi-x-circle-fill"></i></a>
                    @endif
                </div>
                <form method="get" action="{{route('users.index')}}">
                    <div class="input-group">
                        <input class="form-control" placeholder="search anything" type="text" name="keyword">
                        <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Search</button>
                    </div>
                </form>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <span class="badge bg-secondary">
                            {{strtoupper($user->role)}}
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{route('users.show',$user->id)}}">
                                <i class="bi bi-info-circle"></i>
                            </a>
                            @can('update',$user)
                                <a class="btn btn-outline-warning" href="{{route('users.edit',$user->id)}}">
                                    <i class="bi bi-pen-fill"></i>
                                </a>
                            @endcan
                            <form method="post" class="d-inline-block" action="{{route('users.destroy',$user->id)}}">
                                @csrf
                                @method('delete')
                                @can('delete',$user)
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                @endcan
                            </form>
                        </td>
                        <td>
                            <p class="small ">
                                <i class="bi bi-calendar"></i>
                                {{$user->created_at->format('d M Y')}}
                            </p>
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-clock"></i>
                                {{ $user->created_at->format("h : m A") }}
                            </p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">There is no user</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
            <div class="">
                {{$users->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
@endsection