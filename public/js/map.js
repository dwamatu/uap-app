
var markers = [];
var map;
//This global polygon variable is to ensure only ONE polygon is rendered.
var polygon = null;
function initMap() {

    // Create a styles array to use with the map.
    var styles = [
        {
            featureType: 'water',
            stylers: [
                {color: '#19a0d8'}
            ]
        }, {
            featureType: 'administrative',
            elementType: 'labels.text.stroke',
            stylers: [
                {color: '#ffffff'},
                {weight: 6}
            ]
        }, {
            featureType: 'administrative',
            elementType: 'labels.text.fill',
            stylers: [
                {color: '#e85113'}
            ]
        }, {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [
                {color: '#efe9e4'},
                {lightness: -40}
            ]
        }, {
            featureType: 'transit.station',
            stylers: [
                {weight: 9},
                {hue: '#e85113'}
            ]
        }, {
            featureType: 'road.highway',
            elementType: 'labels.icon',
            stylers: [
                {visibility: 'off'}
            ]
        }, {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [
                {lightness: 100}
            ]
        }, {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [
                {lightness: -100}
            ]
        }, {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [
                {visibility: 'on'},
                {color: '#f0e4d3'}
            ]
        }, {
            featureType: 'road.highway',
            elementType: 'geometry.fill',
            stylers: [
                {color: '#efe9e4'},
                {lightness: -25}
            ]
        }
    ];

    // These are the advertisement points listings that will be shown to the user.
    // We have these in a database instead.
    var locations = [];
    $.ajax({
        method: 'GET',
        url: '/fetch/locations',
        success: function (results) {
            $.each(JSON.parse(results), function (site, k) {

                /* console.log(k.landmark+' | '+k.latitude+' | '+k.longitude);*/

                locations.push(
                    {
                        // title: k.landmark.replace("\"", "'"),
                        location: {
                            lat: parseFloat(k.latitude),
                            lng: parseFloat(k.longitude)
                        }


                    }
                );

            });

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -1.274941, lng: 36.810459},
                zoom: 13,
                styles: styles,
                mapTypeControl: false
            });



            /*console.log(locations[0].title);*/
            // var largeInfoWindow = new google.maps.InfoWindow();
            //Inititalize the drawing manager
            var drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT,
                    drawingModes: [
                        google.maps.drawing.OverlayType.POLYGON
                    ]
                }
            });

            // Style the markers a bit. This will be our listing marker icon.
            var defaultIcon = makeMarkerIcon('0091ff');

            // Create a "highlighted location" marker color for when the user
            // mouses over the marker.
            var highlightedIcon = makeMarkerIcon('FFFF24');

            var bounds = new google.maps.LatLngBounds();
            // The following group uses the location array to create an array of markers on initialize
            for (var i = 0; i < locations.length; i++) {
                var position = locations[i].location;
                // var title = locations[i].title;
                //Create a marker per location, and put into markers array
                // console.log(title);
                var marker = new google.maps.Marker({
                    map: map,
                    position: position,
                    // title: title,
                    icon: defaultIcon,
                    animation: google.maps.Animation.DROP,
                    id: i

                });
                // push the marker to our arrat of markers
                markers.push(marker);

                // Create an onlick event to open an infowindow at each marker
                // marker.addListener('click', function () {
                //     populateInfoWindow(this, largeInfoWindow);
                //
                // });
                // Two event listeners - one for mouseover, one for mouseout,
                // to change the colors back and forth.
                marker.addListener('mouseover', function () {
                    this.setIcon(highlightedIcon);
                });
                marker.addListener('mouseout', function () {
                    this.setIcon(defaultIcon);
                });
                //Extend the boundaries of the map for each marker

                bounds.extend(markers[i].position);
            }
            /// Extend the boundaries of the map for each marker
            map.fitBounds(bounds);



            function populateInfoWindow(marker, infowindow) {
                // Check to make sure the infowindow is not already opened on this marker.
                if (infowindow.marker != marker) {
                    infowindow.marker = marker;
                    infowindow.setContent('<div>' + marker.position + '</div>');
                    infowindow.open(map, marker);
                    // Make sure the marker property is cleared if the infowindow is closed.
                    infowindow.addListener('closeclick',function(){
                        infowindow.setMarker(null);
                    });
                }
            }




            // This function takes in a COLOR, and then creates a new marker
            // icon of that color. The icon will be 21 px wide by 34 high, have an origin
            // of 0, 0 and be anchored at 10, 34).
            function makeMarkerIcon(markerColor) {
                var markerImage = new google.maps.MarkerImage(
                    'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|' + markerColor +
                    '|40|_|%E2%80%A2',
                    new google.maps.Size(21, 34),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(10, 34),
                    new google.maps.Size(21, 34));
                return markerImage;
            }



        }


    });


}
























