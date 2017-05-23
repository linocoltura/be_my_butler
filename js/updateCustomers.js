$(document).ready(function(){


setInterval(function(){


    $.ajax({
        method: "POST",
        url: "ajax/updateCustomers.php",
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

                if (response.customers.length>0){
                    $('#emptyState').hide();
                } else {
                    $("#services").html("");
                    $('#emptyState').fadeIn();
                }

                for (i = 0; i < response.customers.length; i++) {

                    var customerName = response.customers[i].customerName;
                    var customerPicture = response.customers[i].customerPicture;
                    var customerID = response.customers[i].userID;
                    var complete = response.customers[i].complete;
                    var drink = response.customers[i].drink;

                    var completeSnippet;
                    var qr = '<img src="img/qr_red.svg" class="qr-red qr" alt="QR Code Not Ready" data-toggle="modal" data-target="#popupmodal">';
                    var dri = '<div class="drinkOrder"><img src="img/drinkIcon.svg" alt="drank">'+drink+'</div>';
                    var loc = '<div class="location"><img src="img/location.svg" alt="location">tribune 1 plaats 7</div>';

                    if (complete == 1){
                        completeSnippet = "<p class='orderStatus green'>Voltooid</p>"
                    } else completeSnippet = "<p class='orderStatus orange'>Actief</p>"

                    if (!$('#'+customerID).length){
                        $("#customers").append("<div class='orderOverview' id='"+customerID+"'> <img class='userAvatar' src='"+customerPicture+"' alt=''> <p class='userName'>"+customerName+"</p> "+completeSnippet+" "+dri+"  "+qr+" "+loc+" </div>").fadeIn('slow');
                    }

                }

            //<p class="orderStatus <?php echo ($customer['complete']) ? 'green' : 'orange';?>"><?php echo ($userIsCustomerData['complete'] == true) ? 'Voltooid' : 'Actief';?></p>


            };

        });

}, 2000);


});