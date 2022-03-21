@extends("layouts.app")

@section("content")

<div>
    <div>
        <h2>{{$post->title}}</h2>
        <p>{{\Str::limit($post->description, 30, " ...")}}</p>
        <h5>Website: {{$post->website->name}}</h5>
    </div>
</div>


<form action="{{route('subs.store', $post->website)}}" method="post">
    @csrf
    @if (session('success'))
    {{session('success')}}
    @endif

    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
    <label for="subscribe">Subscribe to this website: </label>
    <input type="email" placeholder="Your email address" name="email">
    <input type="submit" value="Submit">
</form>
@endsection