@extends("layouts.app")

@section("content")
<form action="{{route('posts.store')}}" method="post">
    @csrf
    @if (session('success'))
    {{session('success')}}
    @endif

    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
    <select name="website">
        @foreach ($websites as $website)
        <option value="{{$website->id}}">{{$website->name}}</option>
        @endforeach
    </select>

    <input type="text" name="title" value="{{old('text')}}">
    <textarea name="description">{{old('description')}}</textarea>
    <input type="submit" value="Submit">
</form>

<div>
    @foreach ($posts as $post)
    <div>
        <h2>{{$post->title}}</h2>
        <p>{{\Str::limit($post->description, 30, " ...")}}</p>
        <h5>Website: {{$post->website->name}}</h5>
        <a href="{{route('posts.view', $post)}}">View</a>
    </div>
    @endforeach
    {{$posts->links()}}
</div>
@endsection