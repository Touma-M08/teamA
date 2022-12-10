<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Top Menu</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
    </head>
    <body>
        <div class= "font-30 font-normal">
            <div> 
                <h2 class="mt-5 ">絞り込み</h2>
                <form method="GET" action ="{{ url('/') }}" >
                    @csrf
                    <input type = "search" placeholder="店名" name="shopName">
                    <input type = "search" placeholder="住所" name="adress">
                    <select name = "categories">
                        <option value = "カフェ">カフェ</option>
                        <option value = "和食屋">和食屋</option>
                    </select>
                    <button type = "submit">検索</button>
                </from>
            </div>
            @foreach ($places as $place)
            <div>
                <h2>{{$place->name}}</h2>
                <p>{{$place->address}}</p>
                <a href="/places/{{$place->id}}" 
                class = "ml-5">お店詳細</a>
            </div>
            @endforeach
        </div>
        
    </body>
</html>
</x-app-layout>
