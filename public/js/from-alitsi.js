var api_url = "http://api.pricing.netcengroup.com/weather_point/weather_points?where=weather_point_type&equals=SCHOOL&likes=weather_point_name&lequals=";
var weatherstationobjarr = Array();
var schoolobjarr = Array();

$('#weather_station').on('keyup', function () {
    var reqdata = $('#weather_station').val();
    if ($('#weather_station').val().length >= 2 ) {
        var namearr = Array();
        $.ajax({
            url: "http://api.pricing.netcengroup.com/weather_point/weather_points?where=weather_point_type&equals=WEATHER%20STATION&likes=weather_point_name&lequals=" + reqdata + "&all=true",
            dataType: 'jsonp',
            cache: true,
            success: function (result) {
                $.each(result.results, function (i, item) {
                    namearr.push(toTitleCase(item.weather_point_name));
                    weatherstationobjarr.push({
                        name: toTitleCase(item.weather_point_name),
                        latitude: item.latitude,
                        longitude: item.longitude,
                        point_id: item.weather_point_id
                    });
                });
                $('#weather_station').autocomplete(("option", "appendTo", "#copy_dialog", {
                    source: namearr,
                    minLength: 1,
                    select: function (event, ui) {
                        var result = getObjectFromArr(weatherstationobjarr, ui.item.label);
                        $('#latdiv div').html('<h4> You selected ' + ui.item.label + '. Latitude is ' + result.latitude + ' and Longitude is ' + result.longitude);
                        $('#selected-single-latitude').attr('value', result.latitude);
                        $('#selected-single-longitude').attr('value', result.longitude);
                        $('#weather_point_id').attr('value', result.point_id);
                        $('#closecancel').attr('value', 'Cancel').removeClass("btn-default").addClass("btn-danger").on('click', function () {
                            $('#latdiv div').html('<div class="row"> <div class="col-md-2"> <label class="control-label no-bottom-margin pull-right-10" for="weather_station">Weather Station:</label> </div> <div class="col-md-9 col-md-offset-1"> <input type="text" class="form-control text-input" id="weather_station" placeholder="Enter weather station name ..." name="weather_station" data-prompt-position="topLeft"> </div> </div>');
                            $('#closecancel').attr('value', 'Close').removeClass("btn-danger").removeClass("modal-close").addClass("btn-default");

                        });
                        $('#donesave').attr('value', 'Done').removeClass("btn-primary").addClass("btn-success").on('click', function () {
                            $('.modal').on('hidden.bs.modal', function () {
                                $(this).find('form')[0].reset();
                                // Display the selected locations in the form
                                $('#selected-location-wrapper').removeClass('hide');
                                $('#selected-location-wrapper .single').removeClass('hide');
                                if (!$('.selected-weather-station').hasClass('hide'))$('.selected-weather-station').removeClass('hide');
                                $('#selected-location-wrapper .selected-latitude').text($("#selected-single-latitude").val());
                                $('#selected-location-wrapper .selected-longitude').text($("#selected-single-longitude").val());
                                $('#selected-location-wrapper .weather_point').text($("#weather_point_id").val());

                                if (!$('#selected-location-wrapper .multiple').hasClass('hide')) {
                                    $('#selected-location-wrapper .multiple').addClass('hide')
                                }

                            });
                            //$('#donesave').attr('value', 'Save Location').removeClass("btn-success").addClass("btn-primary");
                            //$('#latdiv div').html('<div class="row"> <div class="col-md-2"> <label class="control-label no-bottom-margin pull-right-10" for="weather_station">Weather Station:</label> </div> <div class="col-md-9 col-md-offset-1"> <input type="text" class="form-control text-input" id="weather_station" placeholder="Enter weather station name ..." name="weather_station" data-prompt-position="topLeft"> </div> </div>');
                            //$('#closecancel').attr('value', 'Close').removeClass("btn-danger").removeClass("modal-close").addClass("btn-default");
                            //$('#byWeatherStation').modal('toggle');
                        });
                    }
                }));

            },
            error: function (request, status, error) {
            }
        });
    }
});

$('#school').on('keyup', function () {
    var reqdata = $('#school').val();
    if ($('#school').val().length >= 2 ) {
        var namearr = Array();
        $.ajax({
            url: "http://api.pricing.netcengroup.com/weather_point/weather_points?where=weather_point_type&equals=SCHOOL&likes=weather_point_name&lequals=" + reqdata + "&all=true",
            dataType: 'jsonp',
            cache: true,
            success: function (result) {
                $.each(result.results, function (i, item) {
                    namearr.push(toTitleCase(item.weather_point_name));
                    schoolobjarr.push({
                        name: toTitleCase(item.weather_point_name),
                        latitude: item.latitude,
                        longitude: item.longitude,
                        point_id: item.weather_point_id
                    });
                });
                $('#school').autocomplete({
                    source: namearr,
                    minLength: 1,
                    select: function (event, ui) {
                        var result = getObjectFromArr(schoolobjarr, ui.item.label);
                        $('#latdiv2 div').html('<h4> You selected ' + ui.item.label + '. Latitude is ' + result.latitude + ' and Longitude is ' + result.longitude);
                        $('#selected-single-latitude').attr('value', result.latitude);
                        $('#selected-single-longitude').attr('value', result.longitude);
                        $('#weather_point_id').attr('value', result.point_id);
                        $('#closecancel2').attr('value', 'Cancel').removeClass("btn-default").addClass("btn-danger").on('click', function () {
                            $('#latdiv2 div').html('<div class="row"> <div class="col-md-2"> <label class="control-label no-bottom-margin pull-right-10" for="weather_station">Weather Station:</label> </div> <div class="col-md-9 col-md-offset-1"> <input type="text" class="form-control text-input" id="weather_station" placeholder="Enter weather station name ..." name="weather_station" data-prompt-position="topLeft"> </div> </div>');
                            $('#closecancel2').attr('value', 'Close').removeClass("btn-danger").removeClass("modal-close").addClass("btn-default");
                        });
                        $('#donesave2').attr('value', 'Done').removeClass("btn-primary").addClass("btn-success").on('click', function () {
                            $('#donesave2').attr('value', 'Save Location').removeClass("btn-success").addClass("btn-primary");
                            $('#latdiv2 div').html('<div class="row"> <div class="col-md-2"> <label class="control-label no-bottom-margin pull-right-10" for="weather_station">Weather Station:</label> </div> <div class="col-md-9 col-md-offset-1"> <input type="text" class="form-control text-input" id="weather_station" placeholder="Enter weather station name ..." name="weather_station" data-prompt-position="topLeft"> </div> </div>');
                            $('#closecancel2').attr('value', 'Close').removeClass("btn-danger").removeClass("modal-close").addClass("btn-default");
                            $('#bySchool').modal('toggle');
                            // Display the selected locations in the form
                            $('#selected-location-wrapper').removeClass('hide');
                            $('#selected-location-wrapper .single').removeClass('hide');
                            if (!$('.selected-weather-station').hasClass('hide'))$('.selected-weather-station').removeClass('hide');
                            $('#selected-location-wrapper .selected-latitude').text($("#selected-single-latitude").val());
                            $('#selected-location-wrapper .selected-longitude').text($("#selected-single-longitude").val());
                            $('#selected-location-wrapper .weather_point').text($("#weather_point_id").val());

                            if (!$('#selected-location-wrapper .multiple').hasClass('hide')) {
                                $('#selected-location-wrapper .multiple').addClass('hide')
                            }
                        });
                    }
                });

            },
            error: function (request, status, error) {
            }
        });
    }
});

function getObjectFromArr(arr, value) {
    var result = arr.filter(function (o) {
        return o.name == value;
    });
    return result ? result[0] : null;
}

function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

//TODO:1. Cache -> Done
//TODO:2. Websockets -> Done
//TODO:3. Country Selector
//TODO:4. Session -> Done
//TODO:5. PubSub -> Done


//maps
//TODO:check leaflet.js