function init(){
    var geocoder = new google.maps.Geocoder();
    var browserSupportFlag = new Boolean();
    var country;
    if(navigator.geolocation){
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(position){
            geocoder.geocode({'location':myLocation}, function(result,status){
                console.log(result);
            });
        });
    }
}