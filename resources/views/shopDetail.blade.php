<x-app-layout>
    <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
        <div class = "flex justify-end items-center py-4 md:py-8 mb-4">
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
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                  </li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                  </li>
                </ul>
            </div>
          @else
            <a href="login" class="hidden lg:inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
              Log in
            </a>
          @endif
        </div>
        <section class="text-gray-600 body-font relative">
          <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
              <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" id = "map"></iframe>
            </div>
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
              <h1 class="text-gray-900 text-lg mb-1 font-medium title-font">{{$place->name}}</h1>
              <h3 class="leading-relaxed mb-5 text-gray-600">{{$place->address}}</h3>
              <div class="relative mb-4">
                <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                <h3 name="tel">{{$place->tel}}</h3>
              </div>
              <div class="relative mb-4">
                <label for="message" class="leading-7 text-sm text-gray-600">お店の詳細</label>
                <h3 name="message">{{$place->detail}}</h3>
              </div>
              <a href= '/bbs/{{$place->id}}' class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">掲示板へ</a>
            </div>
          </div>
        </section>
        <div>
            @foreach($place->reviews as $review)
            {{ $review -> reviews }} 
            @endforeach
            
        </div>

    </div>
</x-app-layout>