<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        @foreach($comments as $comment)
            {{$comment->comment}}
        @endforeach
    </body>
    
    <form method = "POST" action="/bbs/{{$place_id}}">
        @csrf
        <input type = "text" name = "boardComment" placeholder = "コメントを入力"/>
        <input type = "submit" value = "投稿"/>
    </form>
    
</html>
</x-app-layout>