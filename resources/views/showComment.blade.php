<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<x-app-layout>
    <header class = "flex justify-between items-center py-4 md:py-8 mb-4 border-b-2 border-black">
      <a href="/" class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5" aria-label="logo">
        <svg width="95" height="94" viewBox="0 0 95 94" class="w-6 h-auto text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              
        </svg>
    
            アプリ名
      </a>
      <nav class="hidden lg:flex gap-12">
            <a href="/search" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">検索画面へ</a>
      </nav>
      @if( auth() -> user() )
        <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{auth()->user()->name}}<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
              <li>
                <a href="{{route('shopCreate')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">お店を登録する</a>
              </li>
              <li>
                <a href="{{route('favorites')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">お気に入り一覧</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    @csrf
                    <input type="submit" value="ログアウト"/>
                </form>
              </li>
            </ul>
        </div>
      @else
        <a href="/login" class="hidden lg:inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
          ログイン
        </a>
      @endif
    </header>
    <div class = "flex">
        <div class="bg-white py-6 sm:py-8 lg:py-12 w-1/2">
          <div class="max-w-screen-md px-4 md:px-8 mx-auto p-3">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 xl:mb-12 rounded border-2 border-black"><p>{{$place->name}}</p><p>の掲示板</p></h2>
            <div class="divide-y">
                @if(!$comments->isEmpty())
                 @foreach($comments as $comment)
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
                @else
                <h2>まだコメントはありません</h2>
                @endif
            </div>
          </div>
        </div>
        
       <div class="fixed right-0 bg-white py-6 sm:py-8 lg:py-12 w-1/2 h-full border-l-2 border-black">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
              <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6 rounded border-2 border-black">掲示板へ投稿しよう</h2>
        
              <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">聞きたいことや知っている情報など、自由に投稿しよう</p>
            </div>
            <!-- text - end -->
        
            <!-- form - start -->
            <form method = "POST" action="/bbs/{{$place->id}}" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
              @csrf
              <div class="sm:col-span-2">
                <label for="boardComment" class="inline-block text-gray-800 text-sm sm:text-base mb-2">コメント</label>
                <textarea name="boardComment" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea>
              </div>
              <div class="sm:col-span-2 flex justify-end items-center">
                <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">投稿する</button>
              </div>
            </form>
            <!-- form - end -->
            <a href = "/places/{{$place->id}}" class="lg:inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">お店詳細ページに戻る</a>
          </div>
       </div>
       
    </div> 
  </x-app-layout>