<x-app-layout>
    <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
      <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <header class="flex justify-between items-center py-4 md:py-8 mb-4">
          <!-- logo - start -->
          <a href="/" class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5" aria-label="logo">
            <svg width="95" height="94" viewBox="0 0 95 94" class="w-6 h-auto text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              
            </svg>
    
            アプリ名
          </a>
          <!-- logo - end -->
    
          <!-- nav - start -->
          <nav class="hidden lg:flex gap-12">
            <!--<a href="#" class="text-indigo-500 text-lg font-semibold">Home</a>-->
            <!--<a href="#" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">Features</a>-->
            <!--<a href="#" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">Pricing</a>-->
            <!--<a href="#" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">About</a>-->
          </nav>
          <!-- nav - end -->
    
          <!-- buttons - start -->
          <a href="login" class="hidden lg:inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
              @if( $user )
              {{$user->name}}
              @else
              Log in
              @endif
          </a>
    
          <button type="button" class="inline-flex items-center lg:hidden bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold rounded-lg gap-2 px-2.5 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
    
            Menu
          </button>
          <!-- buttons - end -->
        </header>
    
        <section class="h-0 flex justify-center items-center flex-1 shrink-0 bg-gray-100 overflow-hidden shadow-lg rounded-lg relative py-16 md:py-20 xl:py-48">
          <!-- image - start -->

          <!-- image - end -->
    
          <!-- overlay - start -->
          <div class="bg-indigo-500 mix-blend-multiply absolute inset-0"></div>
          <!-- overlay - end -->
    
          <!-- text start -->
          <div class="sm:max-w-xl flex flex-col items-center relative p-4">
            <p class="text-indigo-200 text-lg sm:text-xl text-center mb-4 md:mb-8">新しいバイトを見つけよう</p>
            <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold text-center mb-8 md:mb-12">個人経営のお店でバイトをしませんか？</h1>

            <form method="GET" action ="{{ url('/search') }}" >
                @csrf
                <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
                  <input type = "search" placeholder="店名" name="shopName" class="flex-col inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3"/>
                  <input type = "search" placeholder="エリア" name="adress" class="flex-col inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3"/>
                </div>
                
                <button type = "submit" class="ml-44 mt-3  flex-col inline-block bg-black hover:bg-gray-800 focus-visible:ring ring-indigo-300 text-white active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">絞り込み検索</button>
            </from>
          </div>
          <!-- text end -->
        </section>
      </div>
    </div>
</x-app-layout>