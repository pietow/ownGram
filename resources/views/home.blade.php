@extends('layouts.app')

@section('content')
<div class="container" style="border:solid black">
    <div class="row">
        <div class="col-3" style="border:solid red">

            <img src="/svg/atom.svg" class="rounded-circle ml-5"; style="height:150px; border:solid red"> 

        </div>
        <div class="col-9">
            <div><h1>myInstaGram</h1></div>

            <div class="d-flex">
                <div class="pr-3"><strong>123</strong> posts</div>
                <div class="pr-3"><strong>23k</strong> followers</div>
                <div class="pr-3"><strong>231</strong> following</div>
            </div>

        </div>
    </div>
</div>
@endsection
