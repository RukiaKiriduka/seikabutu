<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name="header">
            <meta charset="utf-8">
            <title>プロフィール</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <link href="/css/layout.css" rel="stylesheet">
            <!-- Scripts -->
            <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
            <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/jquery.min.js'></script>
            <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js'></script>
            <!-- Styles -->　
            <link href='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.css' rel='stylesheet' />
            <style>
                .flex-container {
                    display: flex;
                    justify-content: space-between;
                    padding: 0 5%;
                }
                .content-box {
                    width: 60%;
                    word-wrap: break-word;
                }
                #calendar {
                    width: 30%; 
                    height: 150px;
                    margin-left: 5%;
                }
                .post-image {
                    width: 100%; 
                    max-width: 300px; 
                    height: auto;
                }
            </style>
        </x-slot>
        <div class="background_img">
        <div class="flex-container">
            <div style="color:#fdfbf8;">
            <div class="content-box">
                
                <div>
                <img src="{{ $user->image_url }}" alt="画像が読み込めません。" style=" border-radius: 50%;width: 150px;height: 150px; object-fit: cover; border: 3px solid #716040;margin-top:30px;"/>
             
                </div>
                 <form action="/myPosts/images" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <label class="image">
                <input type="file" name="image" style="margin-top:10px;">
            </label>
            <input type="submit" value="保存" class="hozon">
            </form>
            
               <h2 style="margin:30px 0 10px;font-size:30px;font-weight: bold; color:#8c7851;font-family: "M PLUS Rounded 1c";">name：{{ $user->name }}</h2>
            <div>
                
          
          
            </div>
                <form action="/myPosts" method="POST" style="margin:30px 0 10px">
                    @csrf
                    @method('PUT')
                    <h2 style=" bold; color:#8c7851; font-size:20px;font-weight: bold;font-family: "M PLUS Rounded 1c";">自己紹介(好きな筋肉)</h2>
                    <textarea name="user_introduction" rows="4" cols="50" style="color:black;border-radius: 5px;padding: 10px;border: 2px solid #716040;">{{ old('user_introduction', $user->content) }}</textarea>
                    <input type="submit" value="保存" class="hozon">
                </form>
            <a href="/myPosts/profile">プロフィール編集</a>
            </div>
            </div>
        
            
            <div id='calendar'style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px; box-shadow: 0px 0px 5px #716040; border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;height:200%;width:40%;" class="container"><br></div>
        </div>
        <div style="margin-top:50px;">
            <br>
        </div>
        </div>
        
        
        
        
        
       <div class="container">
        <h2 style="font-weight:bold;font-size:30px;bold; color:#8c7851;margin-left:100px;">自分の投稿</h2>
        @foreach($posts as $post)
            <div class="index_box" >
                <div class="postimg">
                </div>
                <a href="/posts/{{ $post->id }}"><h2 class="date" style="font-size:20px;font-weight:bold;margin-top:5px;font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">【日付】   {{$post->date}}</h2>
                <p class="time" style="font-size:20px;font-weight:bold;margin-top:5px;font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">【トレーニング時間】   {{$post->time->time}}分</p>
                <p class="title" style="font-size:20px;font-weight:bold;margin-top:5px;font-family: "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;" >【鍛えた場所】   {{$post->title}}</p>
                </a>
                <div class="user" style="font-size:15pxfont-weight:bold;margin-top:5px;">
                <a href="/myPosts" >投稿者：{{ $post->user->name}}</a>
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
        
        <script>
            $(document).ready(function() {
                var events = {!! json_encode($posts->map(function ($post) {
                    return [
                        'title' => $post->title,
                        'start' => $post->date,
                    ];
                })) !!};

                $('#calendar').fullCalendar({
                    events: events,
                    eventClick: function(event) {
                        if (event.url) {
                            window.location.href = event.url;
                            return false;
                        }
                    }
                });
            });
        </script>
    </x-app-layout>
</html>