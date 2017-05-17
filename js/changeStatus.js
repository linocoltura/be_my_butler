$(document).ready(function(){


setInterval(function(){

    $.ajax({
        method: "POST",
        url: "ajax/changeStatus.php",
        data: {
        }
    })
        .done(function (response) {

            if(response.code == 500){

                alert('an error occurred')

            }
            if(response.code == 200){

                if(response.status == 1){

                }
            }
        });

}, 3000);


});