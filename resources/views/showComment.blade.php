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
  
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
          <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">掲示板へ投稿しよう</h2>
    
          <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">聞きたいことや知っている情報など、自由に投稿しよう</p>
        </div>
        <!-- text - end -->
    
        <!-- form - start -->
        <form method = "POST" action="/bbs/{{$place_id}}" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
          @csrf
          <div class="sm:col-span-2">
            <label for="message" class="inline-block text-gray-800 text-sm sm:text-base mb-2">コメント</label>
            <textarea name="message" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea>
          </div>
          <div class="sm:col-span-2 flex justify-end items-center">
            <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">投稿する</button>
          </div>
        </form>
        </form>
        <!-- form - end -->
      </div>
    </div>
  </div>
  </x-app-layout>
<x-app-layout>
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
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

      <!-- product - start -->
      <a href="#" class="group h-80 flex items-end bg-gray-100 rounded-lg overflow-hidden shadow-lg relative p-4">
        <img src="https://images.unsplash.com/photo-1620241608701-94ef138c7ec9?auto=format&q=75&fit=crop&w=750" loading="lazy" alt="Photo by Fakurian Design" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

        <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

        <div class="flex flex-col relative">
          <span class="text-gray-300">Modern</span>
          <span class="text-white text-lg lg:text-xl font-semibold">Furniture</span>
        </div>
      </a>
      <!-- product - end -->
    </div>
  </div>
</div>
</x-app-layout>