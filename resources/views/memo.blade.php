              @foreach ($posts as $post)
                    <a href="/posts/{{ $post->id }}" class="post-link">
                        <div class="post" style="border: 5px double #aaa;padding: 2em;margin-top:20px">
                            <h2 style="font-size:15px;font-weight: bold;">[トレーニング時間]：<span class="post-detail">{{ $post->time->time }}</span></h2>
                            <h2 style="font-size:15px;font-weight: bold;">[鍛えた部位]：<span class="post-detail">{{ $post->title }}</span></h2>
                            <h2 style="font-size:15px;font-weight: bold;">[コメント]</h2>
                            <p class="post-detail" style="font-size:15px;">{{ $post->body }}</p>
                            
                            <form action="/posts/{{ $post->id }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="削除" style="margin-top:10px;display: inline-block;color: #fff;font-weight: bold;background-color: #333;text-align: center;padding: 8px 15px;text-decoration: none;border-radius: 5px;">
                            </form>
                        </div>
                    </a>
                @endforeach
                
                
                 <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
        
        
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
<table name="post[body]">
<tr class="header">
  <th class="item1"> </th>
  <th class="item2">A</th>
  <th class="item2">B</th>
  <th class="item2">C</th>
  <th class="item2">D</th>
  <th class="item2">E</th>
</tr>
<tr>
  <td class="item1">1</td>
  <td class="value1" id="A1" contenteditable=true></td>
  <td class="value1" id="A2" contenteditable=true></td>
  <td class="value1" id="A3" contenteditable=true></td>
  <td class="value1" id="A4" contenteditable=true></td>
  <td class="value1" id="A5" contenteditable=true></td>
</tr>
<tr>
  <td class="item1">2</td>
  <td class="value1" id="B1" contenteditable=true></td>
  <td class="value1" id="B2" contenteditable=true></td>
  <td class="value1" id="B3" contenteditable=true></td>
  <td class="value1" id="B4" contenteditable=true></td>
  <td class="value1" id="B5" contenteditable=true></td>
</tr>
</table>


 <textarea name="post[body]" placeholder="トレーニング内容について教えてください" style="border-radius: 5px;padding: 10px;border: 1px solid #ccc;min-width: 500px;min-height: 100px;">{{ old('post.body') }}</textarea>
 
 
 'A1','A2','A3','A4','A5','A6','B1','B2','B3','B4','B5','B6',
        'C1','C2','C3','C4','C5','C6','D1','D2','D3','D4','D5','D6',
        'E1','E2','E3','E4','E5','E6',
        
        
        
        
        
        
        <!DOCTYPE html>
<html lang="ja">
<x-app-layout>
    <x-slot name="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoリスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="/css/layout.css" rel="stylesheet">
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
     <div class="container mt-3">
        <h1 style="margin-top:0;color:white;"></h1>
    </div>
    <div class="container mt-3" style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
        <div class="container mb-4" >
            {!! Form::open(['route' => 'todos.store', 'method' => 'POST']) !!}
            {{ csrf_field() }}
                <div class="row">
                    {{ Form::text('newTodo', null, ['class' => 'form-control col-8 mr-5']) }}
                    {{ Form::date('newDeadline', null, ['class' => 'mr-5']) }}
                    {{ Form::submit('新規追加', ['class' => 'btn btn-outline-primary']) }}
                </div>
            {!! Form::close() !!}
        </div>
        @if ($errors->has('newTodo'))
            <p class="alert alert-danger">{{ $errors->first('newTodo') }}</p>
        @endif
        @if ($errors->has('newDeadline'))
            <p class="alert alert-danger">{{ $errors->first('newDeadline') }}</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 60%">Todo</th>
                    <th scope="col">期限</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <th scope="row" class="todo">{{ $todo->todo }}</th>
                        <td>{{ $todo->deadline }}</td>
                        {!! Form::open(['route' => ['todos.destroy', $todo->id], 'method' => 'POST']) !!}
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <td>{{ Form::submit('達成', ['class' => 'btn btn-outline-success']) }}</td>
                            <td>{{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}</td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top:300px;">
            <br>
        </div>
    </div>
    <div id='calendar'></div>
        </div>
        
    </div>
        
        <script>
            $(document).ready(function() {
                var events = {!! json_encode($todos->map(function ($todo) {
                    return [
                        'title' => $todo->text,
                        'start' => $todo->date,
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

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    </x-app-layout>
</html>



 public function index()
    {
         $todos = Todo::orderByRaw('`deadline` IS NULL ASC')->orderBy('deadline')->get();

        return view('todos.index', [
            'todos' => $todos,
        ]);
        
    }
    
    $input = $request['todo'];
        $user = $request->user();
        $input += ['user_id' => $user->id]; 
        $todo = new Todo();
        $todo->fill($input)->save();
        return redirect('/' . $todo->id);
        
        
        
        @if(Auth::check() && $post->user_id == Auth::user()->id)
                    <div class="delete">
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="button2" type="button" onclick="deletePost({{ $post->id }})" >削除</button> 
                    </form>
                    </div>
                @endif
                
                
                
                    
     <div>
            @foreach ($todos as $todo)
            <div style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
            <div class='todo'>
                <h2 class='deadline' style="font-size:20px;">期限：{{ $todo->deadline }}</h2>
                <p class='todoo' style="font-size:20px;">タスク：{{ $todo->todo }}</p>
                <div style="display:flex;">
                <form action="/todos/{{ $todo->id }}" id="form_{{ $todo->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $todo->id }})" class="button4">達成</button> 
                </form>
                
                <form action="/todos/{{ $todo->id }}" id="form_{{ $todo->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $todo->id }})" class="button5" style="margin-left:100px;">削除</button> 
                </form>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        
        
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                 @csrf
                 @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})" class="button1">削除</button> 
                </form>