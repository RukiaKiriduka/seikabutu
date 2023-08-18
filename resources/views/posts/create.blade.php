<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <x-slot name="header">
        <meta charset="utf-8">
        <title>Blog</title>
         <link href="/css/layout.css" rel="stylesheet">
    </x-slot>
    <div class="background_img">
        <h1></h1>
        <h2 class="title_font" style="margin:0px 150px 10px;font-size:40px;font-weight: bold;color:white;"></h2>
        <form action="/posts" method="POST" style="display: inline-block;background-color: #fdfbf8;padding: 20px 40px;border-radius: 10px;box-sizing: border-box;margin:30px 30px 30px 100px;">
            @csrf
            <div>
            <div>
                <label for="post_date" style="font-weight: bold;">日付</label>
            </div>
            <div>
                <input type="date" id="post_date" name="post[date]" required  style="margin-top:10px;Sborder-radius: 5px;padding: 10px;border: 1px solid #ccc;">
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
                <select name="post[title]"  style=" margin-top:10px;border-radius: 5px;padding: 10px;border: 1px solid #ccc; width:29%;">
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
            <div style="font-size:15px;font-weight: bold;margin-top:10px;">
              トレーニング内容
            </div>
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
              <td class="item1"  id="A1" ><input type="textarea" name="post[A1]"></td>
              <td class="value1" id="B1" ><input type="textarea" name="post[A2]"></td>
              <td class="value1" id="B2" ><input type="textarea" name="post[A3]"></td>
              <td class="value1" id="B3" ><input type="textarea" name="post[A4]"></td>
              <td class="value1" id="B4" ><input type="textarea" name="post[A5]"></td>
              <td class="value1" id="B5" ><input type="textarea" name="post[A6]"></td>
            </tr>
            <tr>
              <td class="item1"  id="B1" ><input type="textarea" name="post[B1]"></td>
              <td class="value1" id="C1" ><input type="textarea" name="post[B2]"></td>
              <td class="value1" id="C2" ><input type="textarea" name="post[B3]"></td>
              <td class="value1" id="C3" ><input type="textarea" name="post[B4]"></td>
              <td class="value1" id="C4" ><input type="textarea" name="post[B5]"></td>
              <td class="value1" id="C5" ><input type="textarea" name="post[B6]"></td>
            </tr>
            <tr>
              <td class="item1"  id="C1" ><input type="textarea" name="post[C1]"></td>
              <td class="value1" id="D1" ><input type="textarea" name="post[C2]"></td>
              <td class="value1" id="D2" ><input type="textarea" name="post[C3]"></td>
              <td class="value1" id="D3" ><input type="textarea" name="post[C4]"></td>
              <td class="value1" id="D4" ><input type="textarea" name="post[C5]"></td>
              <td class="value1" id="D5" ><input type="textarea" name="post[C6]"></td>
            </tr>
            <tr>
              <td class="item1"  id="D1" ><input type="textarea" name="post[D1]"></td>
              <td class="value1" id="E1" ><input type="textarea" name="post[D2]"></td>
              <td class="value1" id="E2" ><input type="textarea" name="post[D3]"></td>
              <td class="value1" id="E3" ><input type="textarea" name="post[D4]"></td>
              <td class="value1" id="E4" ><input type="textarea" name="post[D5]"></td>
              <td class="value1" id="E5" ><input type="textarea" name="post[D6]"></td>
            </tr>
            <tr>
              <td class="item1"  id="E1" ><input type="textarea" name="post[E1]"></td>
              <td class="value1" id="F1" ><input type="textarea" name="post[E2]"></td>
              <td class="value1" id="F2" ><input type="textarea" name="post[E3]"></td>
              <td class="value1" id="F3" ><input type="textarea" name="post[E4]"></td>
              <td class="value1" id="F4" ><input type="textarea" name="post[E5]"></td>
              <td class="value1" id="F5" ><input type="textarea" name="post[E6]"></td>
            </tr>
            </table>
            </div>
            <input type="submit" value="保存" class="button1" />
        </form>
        <div style="margin-top:100px;">
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
  width: 160px;
}
.item2 {
  border: 1px solid grey;
  padding: 3px 10px;
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
