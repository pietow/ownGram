@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3">
            <img src="/svg/atom.svg" class="rounded-circle ml-5" ; style="height:150px">
        </div>


        <div class="col-9">
            <!--mustache syntax for echoing out-->
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="/p/create">Add New Post</a>
            </div>

            <div class="d-flex">
                <div class="pr-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-3"><strong>23k</strong> followers</div>
                <div class="pr-3"><strong>231</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user-> profile->title}}</div>
            <div>{{$user->profile->description ?? 'arrr'}}</div>
            <div><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>

    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
        <div class="col-4 pb-4"><img
                src="http://127.0.0.1:8000/storage/{{$post->image}}";
                class="w-100">
            </div>
    @endforeach
    </div>
</div>
@endsection
