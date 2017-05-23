$(document).ready(function(){


$('#statusButton').click(function () {

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

            if(response.status == 2){
                $('#statusButton').html('Op terugweg');
                $('.infoStatus').fadeOut();
            }


            if(response.status == 3){
                $('#statusButton').fadeOut();
                $('.infoStatus').fadeOut();
            }

        });

})


});