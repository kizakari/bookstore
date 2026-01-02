let numCateChoosed = 0;
function change(id){
    if(id=='change-password-row'){
        document.getElementById(id).hidden=false;
        document.getElementById('old-password').focus();
    }
    else{
        document.getElementById(id).readOnly=false;
        document.getElementById(id).focus();
    }
}

function chooseCate(id){
    if(numCateChoosed < 3){
        numCateChoosed+=1;
        document.getElementById(id).style.backgroundColor = '#00e600';
        document.getElementById('checkbox'+id).checked = true;
    }
}

function validate(){
    return true;
}