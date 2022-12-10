var map;
var service;
var infowindow;

function initMap() {
  let errors = document.getElementsByClassName("errors")[1].innerHTML;
  
  if (errors == "") {
    var gunmaUniv = new google.maps.LatLng(36.4307571, 139.0450519);
  
    infowindow = new google.maps.InfoWindow();
  
    map = new google.maps.Map(
        document.getElementById('map'), {center: gunmaUniv, zoom: 15});
  
    //マーカー配置
    var marker = new google.maps.Marker({
      map: map,
      position: gunmaUniv
    });
  } else {
    var lat = document.getElementById('lat').value;
    var lng = document.getElementById('lng').value;
    
    var place = new google.maps.LatLng(lat, lng);

    infowindow = new google.maps.InfoWindow();

    map = new google.maps.Map(
        document.getElementById('map'), {center: place, zoom: 15});

    //マーカー配置
    var marker = new google.maps.Marker({
        map: map,
        position: place
    });
  }
  
  //検索実行
  document.getElementById('search').addEventListener('click', function() {
    
    const errors = document.getElementsByClassName("errors");
    errors[0].innerHTML = "";
    errors[1].innerHTML = "";
  

    var place = document.getElementById('keyword').value;
    
    var request = {
      query: place,
      fields: ['place_id'],
    };
    var service = new google.maps.places.PlacesService(map);
    
    service.findPlaceFromQuery(request, function(results, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        var placeDetail = {
          placeId: results[0].place_id,
          fields: ['name', 'adr_address', 'geometry', 'formatted_phone_number', 'opening_hours']
        };
        service.getDetails(placeDetail, callback);

        function callback(place, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
            map.setCenter(place.geometry.location);
            //マーカー削除
            marker.setMap(null);
            //マーカー再配置
            marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
          }
          
          var name = place.name;
          document.getElementById('name').value=name;
          document.getElementById('show-name').innerHTML=name;
          
          var phoneNumber = place.formatted_phone_number;
          document.getElementById('phone-number').value=phoneNumber;
          if (phoneNumber == undefined) {
            document.getElementById('show-phone-number').innerHTML=" ";
          }else {
            document.getElementById('show-phone-number').innerHTML=phoneNumber;
          }
          
          var address = place.adr_address;
          document.getElementById('address').innerHTML=address;
          
          var region = document.getElementsByClassName('region');
          document.getElementById('region').value=region[0].innerHTML;
          
          var streetAddress = document.getElementsByClassName('street-address');
          document.getElementById('street-address').value=streetAddress[0].innerHTML;
          
          document.getElementById('show-address').innerHTML=region[0].innerHTML + streetAddress[0].innerHTML;
          
          if (!(place.opening_hours == undefined)) {
            var hours = place.opening_hours.weekday_text;
            for (var i = 0; i <= 6; i++) {
              document.getElementById('hours-' + i).value=hours[i];
            }
            for (var i = 0; i <= 6; i++) {
              document.getElementById('show-hours-' + i).innerHTML=hours[i];
            }
          } else {
            for (var i = 0; i <= 6; i++) {
              document.getElementById('hours-' + i).value="";
            }
          }
          
          document.getElementById('lat').value=place.geometry.location.lat();
        　document.getElementById('lng').value=place.geometry.location.lng();

        }
      }
    });
  });
}
