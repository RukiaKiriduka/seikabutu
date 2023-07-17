<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Blog</title>
    </x-slot>
        <h1></h1>
        <h2 style="margin:50px 150px 10px;font-size:30px;font-weight: bold;">投稿作成</h2>
        <form action="/posts" method="POST" style="display: inline-block;border: 5px double #aaa;padding: 2em;margin-left:100px">
            @csrf
            <div>
            <div>
                <label for="post_date" style="font-weight: bold;">日付</label>
            </div>
            <div>
                <input type="date" id="post_date" name="post[date]" required  style="border-radius: 5px;padding: 10px;border: 1px solid #ccc;">
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
                <h2 style="font-size:15px;font-weight: bold;margin-top:10px;">鍛えた部位</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"  style="border-radius: 5px;padding: 10px;border: 1px solid #ccc;width"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight: bold;margin-top:10px;">コメント</h2>
                <textarea name="post[body]" placeholder="トレーニング内容について教えてください" style="border-radius: 5px;padding: 10px;border: 1px solid #ccc;min-width: 500px;min-height: 100px;">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存" style="margin-top:10px;display: inline-block;color: #fff;font-weight: bold;background-color: #333;text-align: center;padding: 8px 15px;text-decoration: none;border-radius: 5px;cursor: pointer;box-shadow: 0 0 0 #bbb;background-color: 333;transition: .3s;"/>
        </form>
        <div><a href="/">戻る</a></div>
    </x-app-layout>
</html>
