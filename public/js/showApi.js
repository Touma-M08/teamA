var map;
var service;
var infowindow;


function initMap() {
    
    var place = new google.maps.LatLng(lat, lng);

    infowindow = new google.maps.InfoWindow();

    map = new google.maps.Map(
        document.getElementById('map'), {center: place, zoom: 15});

    //マーカー配置
    var marker = new google.maps.Marker({
        map: map,
        position: place
    });
    
    //検索実行
    var place = name;

    var request = {
        query: place,
        fields: ['place_id'],
    };
    var service = new google.maps.places.PlacesService(map);

    service.findPlaceFromQuery(request, function(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            var placeDetail = {
                placeId: results[0].place_id,
                fields: ['photos']
            };
            service.getDetails(placeDetail, callback);
            
            function callback(place, status) {
                if (place.photos == undefined) {
                    document.getElementById('photo').src="/img/noimage.jpg";
                } else {
                    var photo = place.photos[0].getUrl({maxWidth: 600, maxHeight: 600});
                    document.getElementById('photo').src=photo;
                }
            }
        }
    });
}
