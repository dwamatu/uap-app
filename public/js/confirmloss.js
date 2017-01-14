/**
 * Created by black on 06/01/2017.
 */


//triggered when modal is about to be shown
$('#confirmloss').on('show.bs.modal', function (e) {

    //get data-id attribute of the clicked element
    var uuid = $(e.relatedTarget).data('uuid');
    var farmername = $(e.relatedTarget).data('farmername');

    $('#farmername').text(farmername);



    $('#confirmation_event').on('click', function (e) {
        e.preventDefault();



        var url = '/confirm/loss/assessment/' + uuid;
        $.ajax({
            method: 'GET',
            url: url,
            success: function (data) {
                $('#confirmloss').modal('hide');
            location.reload();

            }

        });

    })

});

// //populate the textbox
// $(e.currentTarget).find('input[name="bookId"]').val(bookId); });