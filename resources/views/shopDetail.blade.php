<x-app-layout>
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
        <section class="text-gray-600 body-font relative flex item-stretch">
          <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
             <div class="flex flex-col w-1/2">
                <div class="bg-gray-300 rounded-lg overflow-hidden  flex items-end justify-start relative">
                  <img id="photo" class="w-full h-full object-contain" src="">
                </div>
                  <div id="map" class=" bg-gray-300 rounded-lg overflow-hidden sm:mr-10 flex items-end justify-start relative w-full h-full"></div>
            </div>
            <div class="w-1/2 bg-white flex flex-col md:ml-auto border-2 border-black">
              <h1 class="text-gray-900 text-lg mb-1 font-medium title-font flex-center">{{$place->name}}</h1>
              <h3 class="leading-relaxed mb-5 text-gray-600">{{$place->address}}</h3>
              <div class="relative mb-4">
                <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                <h3 name="tel">{{$place->tel}}</h3>
              </div>
              <div class="relative mb-4">
                <label for="message" class="leading-7 text-sm text-gray-600">お店の詳細</label>
                <h3 name="message">{{$place->detail}}</h3>
              </div>
              <div class="justify-end">
                <a href= '/bbs/{{$place->id}}' class="text-white bg-indigo-500 border-l-2 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-fit ablolute right 0 buttom 0">掲示板へ</a>
              </div>
              <div class="justify-end">
                <form method="POST" action="/places/{{$place->id}}">
                  @csrf
                  @auth
                    @if(!$favorite->where("user_id", Auth::user()->id)->where("place_id", $place->id)->first())
                      <input value="お気に入り登録" type="submit" class="text-white bg-indigo-500 border-l-2 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-fit ablolute right 0 buttom 0 mt-5"></input>
                    @else
                      <input value="登録済み" type="button" class="text-white bg-indigo-500 border-l-2 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-fit ablolute right 0 buttom 0 mt-5"></input>
                    @endif
                  @else
                    <input value="お気に入り登録" type="submit" disabled class="text-white bg-indigo-500 border-l-2 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-fit ablolute right 0 buttom 0 mt-5"></input>
                  @endauth
                </form>
              </div>
            </div>
          </div>
        </section>
        <div>
            <h2>このお店のレビュー</h2>
        @foreach($place->reviews as $review)
         <div class="flex flex-col md:flex-row items-center border rounded-lg overflow-hidden">
          <div class="flex flex-col gap-2 p-4 lg:p-6">
              <div>
                  {{$review->user->name}}さん：
              </div>
            <h2 class="text-gray-800 text-xl font-bold">
             <div class="hover:text-indigo-500 active:text-indigo-600 transition duration-100">{{$review->review}}</div>
            </h2>
            <h2 class="text-gray-800 text-xl font-bold flex">
              @if($review->images)
                @foreach($review->images as $image)
                  <img src="{{$image->image}}" class="w-1/4 w-1/4 border-2"></img>
                @endforeach
              @endif
            </h2>
          </div>
          </div>
         </div>
       @endforeach
     </div>
    </div>
    
    <script>
      const lat = @json($place->lat);
      const lng = @json($place->lng);
      const name = @json($place->name);
    </script>
    <script src="{{asset('js/showApi.js')}}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key={{ config('app.api_key') }}&libraries=places&callback=initMap" defer></script>
    <script src="../path/to/flowbite/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</x-app-layout>