<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/layout.css" rel="stylesheet">
    </x-slot>
    <div class="background_img">
        <h1 class="title_font" style="margin:0px 150px 10px;font-size:30px;font-weight: bold;color:white;"></h1>
        <div class="postcontent" style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
                <div class="postimg">
                </div>
                <h2 class="date" style="margin-top:10px;font-weight: bold;">【日付】{{$post->date}}</h2>
                <p class="time" style="margin-top:10px;font-weight: bold;">【トレーニング時間】{{$post->time->time}}分</p>
                <p class="title" style="margin-top:10px;font-weight: bold;"><a href="/posts/{{ $post->id }}">【鍛えた場所】{{$post->title}}</a></p>
                <p style="margin-top:10px;font-weight: bold;">【コメント】{{$post->body}}</p><br>
            <table>
            <tr class="header">
              <th class="item1">種目 </th>
              <th class="item2">1セット目</th>
              <th class="item2">2セット目</th>
              <th class="item2">3セット目</th>
              <th class="item2">4セット目</th>
              <th class="item2">5セット目</th>
            </tr>
            <tr>
              <td class="item1"  id="A1" contenteditable=true >{{$post->A1}}</td>
              <td class="value1" id="B1" contenteditable=true >{{$post->A2}}</td>
              <td class="value1" id="B2" contenteditable=true >{{$post->A3}}</td>
              <td class="value1" id="B3" contenteditable=true >{{$post->A4}}</td>
              <td class="value1" id="B4" contenteditable=true >{{$post->A5}}</td>
              <td class="value1" id="B5" contenteditable=true >{{$post->A6}}</td>
            </tr>
            <tr>
              <td class="item1"  id="B1" contenteditable=true >{{$post->B1}}</td>
              <td class="value1" id="C1" contenteditable=true >{{$post->B2}}</td>
              <td class="value1" id="C2" contenteditable=true >{{$post->B3}}</td>
              <td class="value1" id="C3" contenteditable=true >{{$post->B4}}</td>
              <td class="value1" id="C4" contenteditable=true >{{$post->B5}}</td>
              <td class="value1" id="C5" contenteditable=true >{{$post->B6}}</td>
            </tr>
            <tr>
              <td class="item1"  id="C1" contenteditable=true >{{$post->C1}}</td>
              <td class="value1" id="D1" contenteditable=true >{{$post->C2}}</td>
              <td class="value1" id="D2" contenteditable=true >{{$post->C3}}</td>
              <td class="value1" id="D3" contenteditable=true >{{$post->C4}}</td>
              <td class="value1" id="D4" contenteditable=true >{{$post->C5}}</td>
              <td class="value1" id="D5" contenteditable=true >{{$post->C6}}</td>
            </tr>
            <tr>
              <td class="item1"  id="D1" contenteditable=true >{{$post->D1}}</td>
              <td class="value1" id="E1" contenteditable=true >{{$post->D2}}</td>
              <td class="value1" id="E2" contenteditable=true >{{$post->D3}}</td>
              <td class="value1" id="E3" contenteditable=true >{{$post->D4}}</td>
              <td class="value1" id="E4" contenteditable=true >{{$post->D5}}</td>
              <td class="value1" id="E5" contenteditable=true >{{$post->D6}}</td>
            </tr>
            <tr>
              <td class="item1"  id="E1" contenteditable=true >{{$post->E1}}</td>
              <td class="value1" id="F1" contenteditable=true >{{$post->E2}}</td>
              <td class="value1" id="F2" contenteditable=true >{{$post->E3}}</td>
              <td class="value1" id="F3" contenteditable=true >{{$post->E4}}</td>
              <td class="value1" id="F4" contenteditable=true >{{$post->E5}}</td>
              <td class="value1" id="F5" contenteditable=true >{{$post->E6}}</td>
            </tr>
            </table>
                
                <div class="user">
                <a href="/myPosts" >投稿者：{{ $post->user->name }}</a>
                </div>
                @if(Auth::check() && $post->user_id == Auth::user()->id)
                    <div class="delete">
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="button2" type="button" onclick="deletePost({{ $post->id }})" >削除</button> 
                    </form>
                    </div>
                @endif
            <a class="button1" style="text-decoration:none;" href="/">戻る</a>
            </div> 
            <div style="margin-top:200px;">
              <br>
            </div>
            </div>
            
            <style>
            table {
  border-collapse: collapse;
  margin-top:10px;
}
.item1 {
  border: 1px solid grey;
  padding: 3px 10px;
  text-align: center;
  background: #ddd;
  width: 160px;
}
.item2 {
  border: 1px solid grey;
  padding: 3px 10px;
  background: #ddd;
  width: 100px;
}
.value1 {
  border: 1px solid grey;
  padding: 3px 10px;
  cursor: pointer;
}
        </style>
    </x-app-layout>
</html>
