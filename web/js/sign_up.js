function formValidate(){
    //Check thong tin bo sot
    if(document.sign_upForm.name.value==""){
        alert("Please provide your first name!");
        document.sign_upForm.name.focus();
        return false;
    }
    
    if(document.sign_upForm.email.value==""){
        alert("Please provide your email address!");
        document.sign_upForm.email.focus();
        return false;
    }
    if(document.sign_upForm.password.value==""){
        alert("Please provide password!");
        document.sign_upForm.password.focus();
        return false;
    }
    if(document.sign_upForm.re_password.value==""){
        alert("Please re-enter password!");
        document.sign_upForm.re_password.focus();
        return false;
    }
    //Kiem tra name
    if(document.sign_upForm.name.value.length < 2||
        document.sign_upForm.name.value.length > 30)
    {
        alert("Your name must be in between 2-30 charactors");
        document.sign_upForm.name.focus();
        return false;
    }
    //Kiem tra email
    var emailID = document.sign_upForm.email.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");
    if (atpos < 1 || ( dotpos - atpos < 2 ))
   {
       alert("Please enter correct email address!")
       document.sign_upForm.email.focus() ;
       return false;
    }
    //Kiem tra password
    if(document.sign_upForm.password.value.length < 2||
        document.sign_upForm.password.value.length > 30)
    {
        alert("The password must be in between 2-30 charactors");
        document.sign_upForm.password.focus();
        return false;
    }
    //Kiem tra repassword
    if(document.sign_upForm.password.value != document.sign_upForm.re_password.value)
    {
        alert("Please re-enter password correctly!");
        document.sign_upForm.re_password.focus();
        return false;
    }
    return true;
}