var map;

function setMapDimensions() {
    var heightOffset = $("#map").outerHeight() - $(".spinner").outerHeight();
    $("#map").height(heightOffset);
}

function plotWeatherStationsMap() {
    $.ajax({
        type: "GET",
        url: "/data/dashboard/map/weather_stations",
        success: function(data) {
            if (null !== data || typeof data !== 'undefined') {
                // Display map
                plotMap($.parseJSON(data));

                // Enable Bootstrap popovers to enable tooltips for points on the map
                activateMapPointToolTips();
            }
        }
    });
}

function getMap() {
    if (null === map || typeof map === 'undefined') {
        return null;
    }

    return map;
}

function plotMap(weatherStations) {
    var i, stationsCount = weatherStations.data.length;

    map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([weatherStations.data[0].attributes.longitude, weatherStations.data[0].attributes.latitude]),
            zoom: 4
        })
    });

    $('.spinner').hide();

    for (i = 0; i < stationsCount; i++) {
        var divItem = document.createElement("div"),
            stationData = weatherStations.data[i].attributes;

        divItem.className = 'weather-station-marker';

        map.addOverlay(new ol.Overlay({
            position: ol.proj.fromLonLat([stationData.longitude, stationData.latitude]),
            positioning: 'center-center',
            element: divItem,
            stopEvent: false
        }));

        $(divItem)
            .attr('title', toTitleCase(stationData.name))
            .attr('data-content', stationData.provider + ' Weather Station. ' + 'Coordinates (' + stationData.latitude + ', ' + stationData.longitude + ')');

        $('div.weather-station-marker').attr('data-toggle', 'popover').attr('data-placement', 'top');
    }
}

function activateMapPointToolTips() {
    $('[data-toggle="popover"]').popover({
        trigger: 'hover'
    });
}