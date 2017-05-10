$(document).ready(function(){


setInterval(function(){

    $.ajax({
        method: "POST",
        url: "ajax/checkCustomer.php",
        data: {

        }
    })
        .done(function (response) {

            if(response.code == 500){

                alert('an error occurred')

            }
            if(response.code == 200){

                // if(response.flag == true){
                //     $('#'+postID).find('.flagIcon').addClass("flagged");
                //     $('.flagAlert').show();
                //     $('.flagAlert').delay(3000).fadeOut(800);
                //
                // } else{
                //     $('#'+postID).find('.flagIcon').removeClass("flagged");
                //
                // }

            }
        });

}, 3000);


});