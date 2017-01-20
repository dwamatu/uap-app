var map, weatherStationOverlay;

function getMap() {
	if (null === map || typeof map === 'undefined') {
		return null;
	}

	return map;
}


function displayMultipleWeatherPointsMap(numberOfWeatherPoints, weatherPointsData) {

    map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([ weatherPointsData[0]['longitude'], weatherPointsData[0]['latitude'] ]),
            zoom: 8
        })
    });

    // Display the user provided locations on the map

    for (index = 0; index < numberOfWeatherPoints; index++) {

        var divItem = document.createElement("div"),
            latitude = weatherPointsData[index]['latitude'],
            longitude = weatherPointsData[index]['longitude'],
            weatherPointName = weatherPointsData[index]['weather_report_entry_name'];

        divItem.className = 'marker';
        divItem.innerText = index;

        map.addOverlay(new ol.Overlay({
            position: ol.proj.fromLonLat([longitude, latitude]),
            positioning: 'center-center',
            element: divItem,
            stopEvent: true
        }));

        if (null === weatherPointName || typeof weatherPointName === 'undefined' || weatherPointName === '') {
            weatherPointName = "[Name Not Specified]";
        }

        $(divItem)
            .attr('title', 'Location Name: ' + toTitleCase(weatherPointName))
            .attr('data-content', 'Location provided. Coordinates: (' + latitude + ', ' + longitude + ')')
            .attr('data-toggle','popover')
            .attr('data-placement','top');

    }

}

function plotNearestWeatherStations(map, nearestWeatherStations) {

    var i, stationsCount = nearestWeatherStations.data.length;

    for(i = 0; i < stationsCount; i++) {

        var divItem = document.createElement("div");
        divItem.className = 'weather-station-marker';

        map.addOverlay(new ol.Overlay({
            position: ol.proj.fromLonLat([ nearestWeatherStations.data[i].attributes.longitude, nearestWeatherStations.data[i].attributes.latitude ]),
            positioning: 'center-center',
            element: divItem,
            stopEvent: false
        }));

        $(divItem)
            .attr('title', toTitleCase(nearestWeatherStations.data[i].attributes.name))
            .attr('data-content', 'Nearby Weather Station. ' + 'Coordinates (' + nearestWeatherStations.data[i].attributes.latitude + ', ' + nearestWeatherStations.data[i].attributes.longitude + ')');

    }

    $('div.weather-station-marker').attr('data-toggle','popover').attr('data-placement','top');

}

function activateMapPointToolTips() {

    // Enable Bootstrap popovers to enable tooltips for points on the map

    $('[data-toggle="popover"]').popover({ trigger: 'hover' });

}


function hideNearestWeatherStations() {

    $('#map .ol-overlaycontainer .weather-station-marker').hide();

}


function showNearestWeatherStations() {

    $('#map .ol-overlaycontainer .weather-station-marker').show();

}