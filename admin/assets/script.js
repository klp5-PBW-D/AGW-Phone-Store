$("#password").keypress(function (e) { 
    let uppercase = /[A-Z]/g;
    let numbers = /[0-9]/g;
    let values = $("#password").val();
    if(values.match(uppercase)){
        $("#error").val("");
    }else{
        $("#error").val("Password harus mengandung Uppercase");
    }

    if(values.match(numbers)){
        $("#error").val("");
        
    }else{
       $("#error").val("Password harus mengandung Angka");
    }

    if(values.length <= 8){
        $("#error").val("Password harus lebih dari sama dengan 8");
    }else{
         $("#error").val("");
    }
});