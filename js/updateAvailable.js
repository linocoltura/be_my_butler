$(document).ready(function(){


setInterval(function(){

    var serviceIDs = $('.service').map(function(){
        return $(this).attr('id');
    }).get();

   // console.log(serviceIDs);

    $.ajax({
        method: "POST",
        url: "ajax/updateAvailable.php",
        data: {
            serviceids: serviceIDs,
        }
    })
        .done(function (response) {

            if(response.code == 500){

                alert('an error occurred')

            }
            if(response.code == 200){

                for (i = 0; i < response.services.length; i++) {
                    var serviceID = response.services[i].serviceid;
                    var available = response.services[i].available;
                    var claimed = response.services[i].claimed;


                    var ava = available;

                    $('#'+serviceID+' .inlineBeerSpots img').each(function() {
                        if(ava > 0){
                            $(this).attr('class','beerSpots animated infinite pulse fullpint');
                            $(this).attr('src','img/pint.svg');
                            $(this).attr('data-toggle','modal');
                            $(this).attr('data-target','#popupmodal');
                            ava--;
                        } else {
                            $(this).attr('class','beerSpots');
                            $(this).attr('src','img/pintEmpty.svg');
                            $(this).attr('data-toggle','');
                            $(this).attr('data-target','');
                        }

                    });


                };


            };

        });

}, 2000);


});