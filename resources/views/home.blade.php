@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3">
            <img src="/svg/atom.svg" class="rounded-circle ml-5"; style="height:150px"> 
        </div>


        <div class="col-9">
            <!--mustache syntax for echoing out-->
            <div class="                    @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>d-flex justify-content-between align-items-baseline">
            <h1>{{ $user->username }}</h1>
            <a href="#">Add New Post</a>
            </div>

            <div class="d-flex">
                <div class="pr-3"><strong>123</strong> posts</div>
                <div class="pr-3"><strong>23k</strong> followers</div>
                <div class="pr-3"><strong>231</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user-> profile->title}}</div>
            <div>{{$user->profile->description ?? 'arrr'}}</div>
            <div><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>    
        </div>

    </div>

    <div class="row pt-5">
        <div class="col-4"><img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="w-100"></div>
        <div class="col-4"><img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="w-100"></div>
        <div class="col-4"><img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" class="w-100"></div>
         </div>
</div>
@endsection 
