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
            <div class="time">
            <h2 style="font-size:15px;font-weight: bold;margin-top:10px;">トレーニング時間(分)</h2>
                <select name="post[time_id]" style=" margin-top:10px;border-radius: 5px;padding: 10px;border: 1px solid #ccc; width:29%;">
                @foreach($times as $time)
                <option value="{{ $time->id }}">{{ $time->time }}</option>
                @endforeach
                </select>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight: bold;margin-top:10px;">鍛えた部位</h2>
                <select name="post[title]"  style=" margin-top:10px;border-radius: 5px;padding: 10px;border: 1px solid #ccc; width:45%;">
                <option value="">鍛えた部位を教えてください</option>
                <option>胸</option>
                <option>腕</option>
                <option>足</option>
                <option>背中</option>
                <option>肩</option>
                </select>
            </div>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2 style="font-size:15px;font-weight: bold;margin-top:10px;">コメント</h2>
            <div name="post[body]">
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
              <td class="item1"  id="A1" contenteditable=true></td>
              <td class="value1" id="B1" contenteditable=true></td>
              <td class="value1" id="B2" contenteditable=true></td>
              <td class="value1" id="B3" contenteditable=true></td>
              <td class="value1" id="B4" contenteditable=true></td>
              <td class="value1" id="B5" contenteditable=true></td>
            </tr>
            <tr>
              <td class="item1"  id="B1" contenteditable=true></td>
              <td class="value1" id="C1" contenteditable=true></td>
              <td class="value1" id="C2" contenteditable=true></td>
              <td class="value1" id="C3" contenteditable=true></td>
              <td class="value1" id="C4" contenteditable=true></td>
              <td class="value1" id="C5" contenteditable=true></td>
            </tr>
            <tr>
              <td class="item1"  id="C1" contenteditable=true></td>
              <td class="value1" id="D1" contenteditable=true></td>
              <td class="value1" id="D2" contenteditable=true></td>
              <td class="value1" id="D3" contenteditable=true></td>
              <td class="value1" id="D4" contenteditable=true></td>
              <td class="value1" id="D5" contenteditable=true></td>
            </tr>
            <tr>
              <td class="item1"  id="D1" contenteditable=true></td>
              <td class="value1" id="E1" contenteditable=true></td>
              <td class="value1" id="E2" contenteditable=true></td>
              <td class="value1" id="E3" contenteditable=true></td>
              <td class="value1" id="E4" contenteditable=true></td>
              <td class="value1" id="E5" contenteditable=true></td>
            </tr>
            <tr>
              <td class="item1"  id="E1" contenteditable=true></td>
              <td class="value1" id="F1" contenteditable=true></td>
              <td class="value1" id="F2" contenteditable=true></td>
              <td class="value1" id="F3" contenteditable=true></td>
              <td class="value1" id="F4" contenteditable=true></td>
              <td class="value1" id="F5" contenteditable=true></td>
            </tr>
            </table>
            </div>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存" style="margin-top:10px;display: inline-block;color: #fff;font-weight: bold;background-color: #333;text-align: center;padding: 8px 15px;text-decoration: none;border-radius: 5px;cursor: pointer;box-shadow: 0 0 0 #bbb;background-color: 333;transition: .3s;"/>
        </form>
        
        
        
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
    </x-app-layout>
</html>
