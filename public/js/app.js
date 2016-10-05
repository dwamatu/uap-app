//Append Role values on the Select field on the Booking Modal
$('#role_id').empty();
$.ajax({
    type: "GET",
    url: "/getRoles",
    data: {'status': status},
    success: function (data) {
        // Parse the returned json data
        var opts = $.parseJSON(data);
        // console.log(data);
        $('#role_id').append('<option value=""></option>');
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function (i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#role_id').append('<option value="' + d.id + '">' + d.name + '</option>');
        });
    }
});