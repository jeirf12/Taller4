function iniciarMap(){
    let coord = {lat: 2.080821 ,lng:  -76.812696};
    let map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    let marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}
