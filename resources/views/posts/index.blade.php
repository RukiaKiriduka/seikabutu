<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/layout.css" rel="stylesheet">
    </x-slot>
    <div class="background_img">
  
      
        <h2 class="title_font" style="margin:0px 150px 10px;font-size:40px;font-weight: bold;color:white;font-family: "M PLUS Rounded 1c";"></h2>
       <div class="container">
        @foreach($posts as $post)
            <div  style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px; box-shadow: 0px 0px 5px #716040; border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
                <div class="postimg">
                </div>
                <a href="/posts/{{ $post->id }}">
                <h2 class="date" style="font-size:20px;font-weight:bold;margin-top:5px;font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">【日付】   {{$post->date}}</h2>
                <p class="time" style="font-size:20px;font-weight:bold;margin-top:5px;font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">【トレーニング時間】   {{$post->time->time}}分</p>
                <p class="title" style="font-size:20px;font-weight:bold;margin-top:5px;font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;" >【鍛えた場所】   {{$post->title}}</p>
                </a>
                <p style="font-size:20px;font-weight:bold;margin-top:5px;">【コメント】   {{$post->body}}</p><br>
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
              
                <div class="user" style="font-size:15pxfont-weight:bold;margin-top:5px;">
                <a href="/myPosts/{{$post->user->id}}" >投稿者：{{ $post->user->name}}</a>
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
            </div> 
        @endforeach
        </div>
      </div>
        
        <style>
            table {
  border-collapse: collapse;
}
.item1 {
  border: 1px solid grey;
  padding: 3px 10px;
  background: #ddd;
  text-align: center;
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
    
    
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </x-app-layout>
</html>
