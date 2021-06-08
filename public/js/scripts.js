$(document).ready(function() {

//success toast



    var options = {
        autoClose: true,
        progressBar: true,
        enableSounds: true,
        sounds: {

            info: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233294/info.mp3",
// path to sound for successfull message:
            success: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233524/success.mp3",
// path to sound for warn message:
            warning: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233563/warning.mp3",
// path to sound for error message:
            error: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233574/error.mp3",
        },
    };

    var toast = new Toasty(options);
    toast.configure(options);





    $('#successtoast').click(function() {



        toast.success("Vous avez une nouvelle commande !");

    });
});
