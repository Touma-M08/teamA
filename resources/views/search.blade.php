<x-app-layout>
  <script src="../path/to/flowbite/dist/flowbite.js"></script>
  <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
  <div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
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
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
              </li>
              <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
              </li>
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
        <a href="login" class="hidden lg:inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
          Log in
        </a>
      @endif
    </header>
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
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
        <button type = "submit" class="justify-center mt-3 flex-col inline-block bg-black hover:bg-gray-800 focus-visible:ring ring-indigo-300 text-white active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">絞り込み検索</button>
        </div>
        
     </from>
      <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6 mt-5">検索結果</h2>

      <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto"></p>
    </div>
    <!-- text - end -->

    <div class="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 md:gap-6 xl:gap-8">
      <!-- article - start -->
      @foreach ($places as $place)
      <div class="flex flex-col md:flex-row items-center border rounded-lg overflow-hidden">
        <!--<a href="#" class="group w-full md:w-32 lg:w-48 h-48 md:h-full block self-start shrink-0 bg-gray-100 overflow-hidden relative">-->
        <!--  <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />-->
        <!--</a>-->

        <div class="flex flex-col gap-2 p-4 lg:p-6">

          <h2 class="text-gray-800 text-xl font-bold">
            <a href="#" class="hover:text-indigo-500 active:text-indigo-600 transition duration-100">{{$place->name}}</a>
          </h2>

          <p class="text-gray-500">{{$place->address}}</p>

          <div>
            <a href="/places/{{$place->id}}" class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 font-semibold transition duration-100">お店の詳細を見る</a>
          </div>
        </div>
      </div>
      @endforeach
      <!-- article - end -->
  
      </div>
    </div>
  </div>
  
</x-app-layout>
