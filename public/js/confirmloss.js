/**
 * Created by black on 06/01/2017.
 */


//triggered when modal is about to be shown
$('#confirmloss').on('show.bs.modal', function (e) {

    //get data-id attribute of the clicked element
    var uuid = $(e.relatedTarget).data('uuid');

    //get data-farmername attribute of the clicked element
    var farmername = $(e.relatedTarget).data('farmername');

    //passes the farmer name to the p tag on the modal
    $('#farmername').text(farmername);

    //Confirms a Loss Claims
    $('#confirmation_event').on('click', function (e) {
        e.preventDefault();


        var url = '/confirm/loss/assessment/' + uuid;
        $.ajax({
            method: 'GET',
            url: url,
            success: function (data) {
                $('#confirmloss').modal('hide');


            }

        });

        //Creates a notification  to confirm a loss

        var n = noty({
            text: ' Loss Assessment Successfully Updated!',
            type: "success",
            dismissQueue: true,
            layout: 'topLeft',
            closeWith: ['click'],
            theme: 'relax',
            maxVisible: 10,
            timeout: '1500',
            animation: {
                open: 'animated bounceInLeft',
                close: 'animated bounceOutRight',
                easing: 'swing',
                speed: 500
            }
        });

        location.reload();

    })

});

