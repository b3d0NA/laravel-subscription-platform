@extends("layouts.app")

@section("content")
<form action="{{route('website.store')}}" method="post">
    @csrf
    @if (session('success'))
    {{session('success')}}
    @endif

    @foreach ($errors->all() as $error)
    {{$error}}
    @endforeach
    <input type="text" placeholder="Your website name" name="name">
    <input type="submit" value="Create">
</form>
@endsection