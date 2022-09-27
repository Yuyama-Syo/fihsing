function initMap() {
    const target = document.getElementById("map");
    const title = '釣り場';
    
    var address = new Array(2);
    var prefectures = document.getElementById("prefectures");
    var city = document.getElementById("city");
    
    
    var prefIdx = prefectures.innerHtml;
    var cityIdx = city.innerHTML;
    /*
    address[0]  = prefectures.options[prefIdx].text;
    address[1] = city.options[cityIdx].text;
    */
    address[0]=prefIdx;
    address[1]=cityIdx;

    
    const make_address = address.join('');
    
    console.log(make_address);
    
    const geocoder = new google.maps.Geocoder();
    
    geocoder.geocode({ address:make_address}, function(results,status){
        if(status == 'OK' && results[0]){
            const map = new google.maps.Map(target,{
                center: results[0].geometry.location,
                zoom:11,
            });
            
            const marker = new google.maps.Market({
                position: results[0].geometry.location,
                map:map,
            });
            
            const latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
            
            const content = '<div id="map_content"><p>' + title + '<br/>' + make_address + '<br/><a href="https://maps.google.co.jp/maps?q=' + latlng + '&iwloc=J" target="_blank" rel="noopener noreferrer">Googleマップで見る</a></p></div>';
            
            var infowindow = new google.maps.InfoWindow({
                content: content,
            });
            
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
            } else {
                alert("住所から位置の取得ができませんでした。: " + status);
                return;
            }
            
    });
                
}