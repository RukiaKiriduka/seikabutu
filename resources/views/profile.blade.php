<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name="header">
            <meta charset="utf-8">
            <title>Blog</title>
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
                <h2 style="margin:50px 0 10px;font-size:40px;font-weight: bold;color:white;font-family: "M PLUS Rounded 1c";">プロフィール</h2>
                <h2 style="margin:30px 0 10px;font-size:30px;font-weight: bold;color:white;font-family: "M PLUS Rounded 1c";">ユーザーネーム：{{ $user->name }}</h2>
            <form action="/myPosts" method="POST" enctype="multipart/form-data">
            <div class="image">
                <input type="file" name="image">
            </div>
            <input class="button1" type="submit" value="保存" >
            </form>
            <div>
                <img src="{{ $user->image_url }}" alt="画像が読み込めません。"/>
            </div>
                <form action="/myPosts" method="POST" style="margin:30px 0 10px">
                    @csrf
                    @method('PUT')
                    <h2 style="font-size:20px;font-weight: bold;font-family: "M PLUS Rounded 1c";">自己紹介</h2>
                    <textarea name="user_introduction" rows="4" cols="50" style="color:black;border-radius: 5px;padding: 10px;border: 1px solid #ccc;">{{ old('user_introduction', $user->content) }}</textarea>
                    <input  class="button1" type="submit" value="保存" >
                </form>
            </div>
            </div>
            <div id='calendar'style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;height:200%;"><br></div>
        </div>
        <div style="margin-top:300px;">
            <br>
        </div>
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