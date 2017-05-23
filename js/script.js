// var video = document.querySelector("#videoElement");
// //if (video != null) {
//     navigator.getUserMedia = navigator.getUserMedia || navigator.media || navigator.mediaDevices.getUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
// //}
// if (navigator.getUserMedia) {
//     navigator.getUserMedia({video: true}, handleVideo, videoError);
// }
//
//
// function handleVideo(stream) {
//         video.src = window.URL.createObjectURL(stream);
//
// }
//
// function videoError(e) {
//     //
// }


var video = document.querySelector("#videoElement");
if (video != null) {

    navigator.getUserMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia );

    if (navigator.getUserMedia) {
        navigator.getUserMedia(
            // constraints
            {
                video: true
            },
            // successCallback
            function (localMediaStream) {
                var video = document.querySelector('#videoElement');
                video.src = window.URL.createObjectURL(localMediaStream);
                // Do something with the video
                video.play();
            },
            // errorCallback
            function (err) {
                console.log("The following error occured: " + err);
            }
        );
    } else {
        alert("getUserMedia not supported by your web browser or Operating system version");
    }

}



$('.qr').click(function () {
    var userIsCustomerId = $(this).parent().prop("id");
    $('#clickedOrder').html(userIsCustomerId);
});

$('.activeBeer').click(function () {
    var userIsCustomerId = $(this).parent().parent().prop("id");
    $('#beerActive').html(userIsCustomerId);
});

$('.fullpint').on('click', function () {
    var serviceID = $(this).parent().parent().prop("id");
    $('#modalServiceID').val(serviceID);
});


function changeDrink() {
    var changePrice = $('#sel1').find(':selected').attr('data-price')
    $('#priceDrinks').html('€ '+changePrice+ '.00');
}