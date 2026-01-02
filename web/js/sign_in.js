function formValidate(){
    //Check thong tin bo sot
    if(document.sign_inForm.email.value==""){
        alert("Please provide your email address!");
        document.sign_inForm.email.focus();
        return false;
    }
    if(document.sign_inForm.password.value==""){
        alert("Please provide password!");
        document.sign_inForm.password.focus();
        return false;
    }
    //Kiem tra email
    var emailID = document.sign_inForm.email.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 ))
   {
       alert("Please enter correct email address!")
       document.sign_inForm.email.focus() ;
       return false;
    }
    //Kiem tra password
    if(document.sign_inForm.password.value.length < 2||
        document.sign_inForm.password.value.length > 30)
    {
        alert("The password must be in between 2-30 charactors");
        document.sign_inForm.password.focus();
        return false;
    }
    return true;
}