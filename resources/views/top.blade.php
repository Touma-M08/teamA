  <script src="../path/to/flowbite/dist/flowbite.js"></script>
  <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<x-app-layout>
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
      <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
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
    
        <section class="h-fit flex justify-center items-center flex-1 shrink-0 bg-gray-100 overflow-hidden shadow-lg rounded-lg relative py-16 md:py-20 xl:py-48">
          <!-- image - start -->

          <!-- image - end -->
    
          <!-- overlay - start -->
          <div class="bg-indigo-500 mix-blend-multiply absolute inset-0"></div>
          <!-- overlay - end -->
    
          <!-- text start -->
          <div class="sm:max-w-xl flex flex-col items-center relative p-4">
            <p class="text-indigo-200 text-lg sm:text-xl text-center mb-4 md:mb-8">新しいバイトを見つけよう</p>
            <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold text-center mb-8 md:mb-12"><p>個人経営のお店で</p><p>バイトをしませんか？</p></h1>

            <form method="GET" action ="{{ url('/search') }}" >
                @csrf
                <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
                  <input type = "search" placeholder="店名" name="shopName" class="flex-col inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3"/>
                  <input type = "search" placeholder="エリア" name="adress" class="flex-col inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3"/>
                  <select name="cat" class="flex-col inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
                    <option value="">カテゴリー選択</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <button type = "submit" class="ml-72 mt-3 flex-col inline-block bg-black hover:bg-gray-800 focus-visible:ring ring-indigo-300 text-white active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">絞り込み検索</button>
            </from>
          </div>
          <!-- text end -->
        </section>
      </div>
    </div>
</x-app-layout>