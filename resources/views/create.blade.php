
        <x-app-layout>
            <h2 class="section-ttl">新規場所登録</h2>
            
            <div class="search">
                <div class="left-side">
                    <p>登録したい場所を入力してください</p>
                    <div class="flex">
                        <input class="input" type="text" id="keyword">
                        
                        <button id="search" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button>
                    </div>
                    <p class="errors">{{ $errors->first('place.name') }}</p>
                    
                    <div id="map" class="w-5, h-96"></div>
                </div>
                
                <div class="right-side">
                    <h3>登録内容</h3>
                    <form action="/places" method="POST">
                        @csrf
                        <div class="place-contents">
                            <p>場所:</p>
                            <div id="show-name">{{ old('place.name') }}</div>
                        </div>
                        
                        
                        
                        <div class="place-contents">
                            <p>住所:</p>
                            <div class="address">
                                <div id="show-address">{{ old('place.address') }}</div>
                            </div>
                        </div>
                        
                        <div class="place-contents">
                            <p>電話番号:</p>
                            <div id="show-phone-number">{{ old('tel') }}</div>
                        </div>
                        
                        <div>
                            <p>レビュー</p>
                            <textarea name=place[detail]></textarea>
                            <p>レビュー</p>
                            <textarea name=review></textarea>
                        </div>
                    
                    {{-- 送信用 --}}
                        <input type="hidden" name="place[name]" id="name" value="{{ old('place.name') }}" >
                        <div id="address" hidden></div>
                
                        <input type="hidden" name="place[address]" id="street-address" value="{{ old('place.address') }}">
                        
                        <input type="hidden" name="place[tel]" id="phone-number" value="{{ old('tel') }}">
              
                        <input type="hidden" name="place[lat]" id="lat" value="{{ old('place.lat') }}">
                        <input type="hidden" name="place[lng]" id="lng" value="{{ old('place.lng') }}">
                    
                        <input class="store-btn" type="submit" value="保存">
                    </form>
                </div>
            </div>
            <script src="{{asset('js/createApi.js')}}"　defer></script>
        <script src="https://maps.googleapis.com/maps/api/js?lang=ja&key={{ config('app.api_key') }}&libraries=places&callback=initMap" async defer></script>
        </x-app-layout>
   