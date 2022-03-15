function iniciarMap(){
    var coord = {lat: 2.080821 ,lng:  -76.812696};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}
