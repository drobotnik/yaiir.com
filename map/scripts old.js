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


//map.data.loadGeoJson('data/test_geo.json');

var layer = new google.maps.FusionTablesLayer({
    query: {
      select: 'geometry',
      from: '1hwdcT1NX6O5acJ8mwl_kiXF1X1FHj7r_tV6M7TZb'
    }
});
layer.setMap(map);



function createButton(context, func){
    var button = document.createElement("input");
    button.type = "button";
    button.value = "im a button";
    button.onclick = func;
    context.append(button);
}

createButton($('#sample-data'), function(){
	console.log('hello');
});
console.log('fin')