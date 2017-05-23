$(document).ready(function(){


setInterval(function(){


    $.ajax({
        method: "POST",
        url: "ajax/updateButlers.php",
        data: {
            //serviceids: serviceIDs,
        }
    })
        .done(function (response) {

            if(response.code == 500){

                alert('an error occurred')

            }
            if(response.code == 200){


                //$("#services").html("");

                if (response.services.length>0){
                    $('#emptyState').hide();
                } else {
                    $("#services").html("");
                    $('#emptyState').fadeIn();
                }

                for (i = 0; i < response.services.length; i++) {

                    var serviceID = response.services[i].serviceID;
                    var butlerName = response.services[i].butlerName;
                    var butlerPicture = response.services[i].butlerPicture;
                    var amount = response.services[i].amount;


                    var beer = "";
                    for (i = 0; i < amount; i++) {

                        beer += "<img class='beerSpots animated infinite pulse fullpint activeBeer' src='img/pint.svg' alt='Full Pint' data-toggle='modal' data-target='#popupmodal' onclick='updateServiceID()'>"

                    }

                    if (!$('#'+serviceID).length){
                        $("#services").append("<div class='service' id='"+serviceID+"'> <img class='userAvatar' src='"+butlerPicture+"' alt='butler avatar'> <p class='userName'>"+butlerName+"</p> <div class='inlineBeerSpots'> "+beer+" </div> </div>").fadeIn('slow');
                    }

                }

            // <div class='service' id='<?php echo $service["serviceID"]?>'>
            //
            //     <?php
            //         $serviceUser = new User();
            //     $activeServiceUser = $serviceUser->getUserById($service['userID']);
            //     $activeService = new Service();
            //     $activeService->setServiceID($service['serviceID']);
            //     $activeService->setAmount($service['amount']);
            //         ?>
            // <img class='userAvatar' src='<?php echo $activeServiceUser["picture"] ?>' alt='Avatar'>
            //         <p class='userName'><?php echo $activeServiceUser['first_name']?></p>
            //     <!--            <span class='glyphicon glyphicon-heart' aria-hidden='true'></span>-->
            //         <div class='inlineBeerSpots'>
            //     <?php
            //     for ($i = 0; $i < $activeService->getAvailableConsumptions(); $i++):
            //         ?>
            // <img class='beerSpots animated infinite pulse fullpint' src='img/pint.svg' alt='Full Pint' class='beerSpots animated infinite pulse' data-toggle='modal' data-target='#popupmodal'>
            //     <?php endfor; ?>
            //
            // <?php
            //     for ($i = 0; $i < $activeService->getClaimedConsumptions(); $i++):
            //         ?>
            // <img src='img/pintEmpty.svg' alt='Empty Pint' class='beerSpots'>
            //     <?php endfor; ?>
            // </div>
            //
            //
            //     </div>


            };

        });

}, 2000);


});