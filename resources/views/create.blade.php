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
  <div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <!-- text - start -->
        <div class="mb-10 md:mb-16">
          <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">新規お店登録</h2>
          <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">登録したいお店を入力してください</p>
        </div>
        <!-- text - end -->
        <!-- form - start -->
        <div class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
          <div flex-col>
              <div>
                <label for="input" class="inline-block text-gray-800 text-sm sm:text-base mb-2">場所を検索する</label>
                <input name="input" type="text" id="keyword" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                <button id="search" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">検索開始</button>
                <p class="errors text-red-500">{{ $errors->first('place.name') }}</p>
              </div>
              <div>
                <div id="map" class="w-5, h-96"></div>
              </div>
          </div>
          <div>
            <h1 class="inline-block text-gray-800 text-sm sm:text-base mb-2">登録内容の確認</h2>
            <form action="/places" method="POST">
                @csrf
                <div>
                    <label for="place" class="inline-block text-gray-800 text-sm sm:text-base mb-2">お店名</label>
                    <div name="place" id="show-name" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" >{{ old('place.name')}}</div>
                </div>
                <div>
                    <label for="show-address" class="inline-block text-gray-800 text-sm sm:text-base mb-2">住所</label>
                    <div name="show-address" id="show-address">{{ old('place.address') }}</div>
                </div>
                <div>
                    <label for="show-phone-number" class="inline-block text-gray-800 text-sm sm:text-base mb-2">電話番号</label>
                    <div name="show-phone-number" id="show-phone-number">{{ old('tel') }}</div>
                </div>
                <div>
                    <div class="inline-block text-gray-800 text-sm sm:text-base mb-2">お店のカテゴリを選択してください</div>
                    <select name="place[category_id]">
                        <option value="">カテゴリー選択</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <p class="errors text-red-500">{{ $errors->first('place.category_id') }}</p>
                </div>
                <div>
                    <label for="place[detail]" class="inline-block text-gray-800 text-sm sm:text-base mb-2">求人の詳細*</label>
                    <textarea placeholder="入力してください" name="place[detail]" id="keyword" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" ></textarea>
                    <p class="errors text-red-500">{{ $errors->first('place.detail') }}</p>
                </div>
                <div>
                    <label for="review" class="inline-block text-gray-800 text-sm sm:text-base mb-2">レビュー*</label>
                    <textarea placeholder="入力してください" name="review" id="keyword" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" ></textarea>
                    <p class="errors text-red-500">{{ $errors->first('review') }}</p>
                </div>
            {{-- 送信用 --}}
                <input type="hidden" name="place[name]" id="name" value="{{ old('place.name') }}" >
                <div id="address" hidden></div>
                <input type="hidden" name="place[address]" id="street-address" value="{{ old('place.address') }}">
                <input type="hidden" name="place[tel]" id="phone-number" value="{{ old('tel') }}">
                <input type="hidden" name="place[lat]" id="lat" value="{{ old('place.lat') }}">
                <input type="hidden" name="place[lng]" id="lng" value="{{ old('place.lng') }}">
                <span class="text-gray-500 text-sm">*Required</span>
                <div class = "justify-end">
                    <input type="submit" value="保存" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3 justify-end"/>
                </div>
             </from>
          </div>
        </div>
    </div>
  </div>
    <script src="{{asset('js/createApi.js')}}"　defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key={{ config('app.api_key') }}&libraries=places&callback=initMap" async defer></script>
</x-app-layout>