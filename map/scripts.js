function initialize() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: new google.maps.LatLng(0, 100),
        zoom: 3,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    return new google.maps.Map(mapCanvas, mapOptions);
};


var map = initialize();

map.data.loadGeoJson('data/test_geo.json');
