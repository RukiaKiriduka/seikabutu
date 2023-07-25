<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </x-slot>
        <h1 style="margin:50px 150px 10px;font-size:30px;font-weight: bold;">詳細画面</h1>
        <div class="postcontent" style="display: inline-block;border: 5px double #aaa;padding: 2em;margin-left:100px">
                <div class="postimg">
                </div>
                <h2 class="date" style="margin-top:10px;font-weight: bold;">【日付】{{$post->date}}</h2>
                <p class="time" style="margin-top:10px;font-weight: bold;">【トレーニング時間】{{$post->time->time}}分</p>
                <p class="title" style="margin-top:10px;font-weight: bold;"><a href="/posts/{{ $post->id }}">【鍛えた場所】{{$post->title}}</a></p>
                <p style="margin-top:10px;font-weight: bold;">【コメント】{{$post->body}}</p><br>
                
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
                            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">戻る</a>
            </div> 
    </x-app-layout>
</html>
