/**
 * Created by black on 29/11/2016.
 */
$('#role_id').empty();
$.ajax({
    type: "GET",
    url: "/fetch/roles",
    data: {'status': status},
    success: function (data) {
        // Parse the returned json data
        var opts = $.parseJSON(data);
        // console.log(data);
        $('#role_id').append('<option value=""> All Roles</option>');
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function (i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#role_id').append('<option value="' + d.id + '">' + d.role_name + '</option>');
        });
    }
});