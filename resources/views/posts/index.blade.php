<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </x-slot>
        <h1></h1>
        <h2 style="margin:50px 150px 10px;font-size:30px;font-weight: bold;">投稿一覧画面</h2>
       <div class="container">
        @foreach($posts as $post)
            <div class="postcontent" style="display: inline-block;border: 5px double #aaa;padding: 2em;margin-left:100px">
                <div class="postimg">
                </div>
                <h2 class="date">【日付】{{$post->date}}</h2>
                <p class="time">【トレーニング時間】{{$post->time->time}}分</p>
                <p class="title" ><a href="/posts/{{ $post->id }}">【鍛えた場所】{{$post->title}}</a></p>
                <p>【コメント】{{$post->body}}</p><br>
                
                <div class="user">
                <a href="/myPosts" >投稿者：{{ $post->user->name }}</a>
                </div>
                 @if(Auth::check() && $post->user_id == Auth::user()->id)
                    <div class="delete">
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})" >削除</button> 
                    </form>
                    </div>
                @endif
            </div> 
        @endforeach
        </div>
    </x-app-layout>
</html>
