<x-app-layout>
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
    
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-md px-4 md:px-8 mx-auto">
    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 xl:mb-12">掲示板</h2>
    @foreach($comments as $comment)
    <div class="divide-y">
      <!-- review - start -->
      <div class="flex flex-col gap-3 py-4 md:py-8">
        <div>
          <span class="block text-sm font-bold">{{$comment->user->name}} コメントID:{{$comment->id}}</span>
          <span class="block text-gray-500 text-sm">{{$comment->created_at}}</span>
        </div>

        <p class="text-gray-600">{{$comment->comment}}</p>
      </div>
      <!-- review - end -->
      @endforeach

     
    </div>
  </div>
</div>
</x-app-layout>