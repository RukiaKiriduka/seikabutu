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
    
    <h2></h2>
    <form action="/todos" method="POST" style="width:500px;display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
        @csrf
        <div>
            <div style="font-weight:bold;">期限</div>
            <input type="date" id="todo_date" name="todo[deadline]" required>
        </div>
        <div>
            <div style="font-weight:bold;margin-top:5px;">タスク</div>
            <textarea name="todo[todo]"  style="height:60%;width:100%;"></textarea>
        </div>
        <input type="submit" value="保存" class="button1" />
    </form>
    <div  style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
<table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 60%">タスク</th>
                    <th scope="col">期限</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($todos as $todo)
                @if( ( $todo->user_id ) === ( Auth::user()->id ) )
                    <tr>
                        <th scope="row" class="todo">{{ $todo->todo }}</th>
                        <td>{{ $todo->deadline }}</td>
                        {!! Form::open(['route' => ['todos.delete', $todo->id], 'method' => 'POST']) !!}
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                            <td>{{ Form::submit('達成', ['class' => 'btn btn-outline-success']) }}</td>
                            <td>{{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}</td>
                        {!! Form::close() !!}
                    </tr>
                @endif
                @endforeach
               
            </tbody>
        </table>
        </div>
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