$(document).ready(function(){


    setInterval(function(){

        $.ajax({
            method: "POST",
            url: "ajax/getStatus.php",
            data: {
            }
        })
            .done(function (response) {

                if(response.final == true){
                    $(location).attr('href', 'mode.php');
                    console.log('final');
                }

                if(response.status == 1){
                    $('#butlerStatus').html('neemt bestellingen op');
                }

                if(response.status == 2){
                    $('#butlerStatus').html('is aan de bar');
                }


                if(response.status == 3){
                    $('#butlerStatus').html('is onderweg!');
                    $('#confirm').delay(500).addClass('animated');
                    $('#confirm').delay(500).addClass('flash');
                }

            });

    }, 2000);


});
