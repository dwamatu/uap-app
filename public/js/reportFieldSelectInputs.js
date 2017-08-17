$('#cause_of_loss').empty();
$.ajax({
    type: "GET",
    url: "/fetch/loss/causes",
    data: {'status': status},
    success: function (data) {
        // Parse the returned json data
        var opts = $.parseJSON(data);
        // console.log(data);
        $('#cause_of_loss').append('<option value="0"> All Causes of Loss</option>');
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function (i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#cause_of_loss').append('<option value="' + d.id + '">' + d.loss_name + '</option>');
        });
    }
});


$('#ext_area').empty();
$.ajax({
    type: "GET",
    url: "/fetch/zones",
    data: {'status': status},
    success: function (data) {
        // Parse the returned json data
        var opts = $.parseJSON(data);
        // console.log(data);
        $('#ext_area').append('<option value=""> All Extension Areas</option>');
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function (i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#ext_area').append('<option value="' + d.zone + '">' + d.zone + '</option>');
        });
    }
});

$('#season').empty();
$.ajax({
    type: "GET",
    url: "/fetch/seasons",
    data: {'status': status},
    success: function (data) {
        // Parse the returned json data
        var opts = $.parseJSON(data);
        // console.log(data);
        $('#season').append('<option value="0"> All Seasons</option>');
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function (i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#season').append('<option value="' + d.id + '">' + d.season_date + '</option>');
        });
    }
});
$('#crop_inspector').empty();
$.ajax({
    type: "GET",
    url: "/fetch/users",
    data: {'status': status},
    success: function (data) {
        // Parse the returned json data
        var opts = $.parseJSON(data);
        // console.log(data);
        $('#crop_inspector').append('<option value="0"> All Crop Inspectors</option>');
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function (i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#crop_inspector').append('<option value="' + d.id + '">' + d.user_name + '</option>');
        });
    }
});

