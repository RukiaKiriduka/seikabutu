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