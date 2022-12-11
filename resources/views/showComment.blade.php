<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<x-app-layout>
    <div class = "flex">
        <div class="bg-white py-6 sm:py-8 lg:py-12 w-1/2">
          <div class="max-w-screen-md px-4 md:px-8 mx-auto p-3">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 xl:mb-12">{{$place->name}}の掲示板</h2>
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
        <header class = "flex justify-end items-center py-4 md:py-8 mb-4">
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
                    </form>
                  </li>
                </ul>
            </div>
          @else
            <a href="/login" class="hidden lg:inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
              Log in
            </a>
          @endif
        </header>
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
              <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">掲示板へ投稿しよう</h2>
        
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
          </div>
       </div>
       
    </div> 
  </x-app-layout>