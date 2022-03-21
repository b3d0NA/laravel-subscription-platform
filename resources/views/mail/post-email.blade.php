@component('mail::message')
# {{$post->website->name}} recently published a post

Title: {{$post->title}}
Description: {{$post->description}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent