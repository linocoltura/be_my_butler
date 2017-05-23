$(document).ready(function(){


$('#confirmOrder').click(function () {


    var userID = $('#clickedOrder').html();

    $.ajax({
        method: "POST",
        url: "ajax/confirmOrder.php",
        data: {
            userID: userID
        }
    })
        .done(function (response) {

            if(response.code == 500){

                alert('an error occurred')

            }
            if(response.code == 200){

                $('#' + response.userIDfb).find('.orderStatus').removeClass('orange');
                $('#' + response.userIDfb).find('.orderStatus').addClass('green');
                $('#' + response.userIDfb).find('.orderStatus').html('Voltooid');

                if(response.final){
                    $(location).attr('href', 'mode.php');
                    console.log('final');
                }

            };

        });


    });


});