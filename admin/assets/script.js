var pass='';
var repass='';
$("#password").keyup(function (e) { 
    let uppercase = /[A-Z]/g;
    let numbers = /[0-9]/g;
    pass = $(this).val();
    if(pass.match(uppercase) || pass.length==0){
        $("#error1").text("");
    }else{
        $("#error1").text("Password harus mengandung Uppercase");
    }

    if(pass.match(numbers) || pass.length==0){
        $("#error2").text("");
        
    }else{
       $("#error2").text("Password harus mengandung Angka");
    }

    if (pass.length == 0) {
        $("#error3").text("");
    } else {
        if (pass.length <= 8) {
            $("#error3").text("Password harus lebih dari sama dengan 8");
        } else {
            $("#error3").text("");
        }
    }
    checkRePass();
});

$("#re-pass").keyup(function (e) { 
    checkRePass();
});

function checkRePass() { 
    repass = $("#re-pass").val();
    if(repass!=pass){
        $("#error4").text("Password tidak sama");
    }else{
         $("#error4").text("");
    }
 }