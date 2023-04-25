$(document).ready(function () {
    $("form").submit(function (event) {
        var formData = {
            email: $("#email").val(),
            username: $("#username").val(),
            password: $("#password").val(),
            confirm_password: $("#re_password").val()
    };

    $.ajax({
        type: "POST",
        url: "http://localserver:8001/API/Signup.php",
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        var result = data.innerhtml();
        if (result == "success"){
            console.log("success");
        } 
    });

    event.preventDefault();
    });
});