function choose(id){
    items = document.getElementsByClassName("nav-item");
    for(item of items){
        if(item.id == id){
            item.style.backgroundColor = "rgb(76, 168, 194)";
            item.style.borderRadius = "10px";
        }
        else 
            item.style.backgroundColor = "white";
    }
    renderContent(id);
    return;
}

function renderContent(id){
    main = document.getElementById('main');
    if(id == 'policy-page'){
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                //Use parse() method to convert JSON string to JSON object
                var policy = JSON.parse(this.responseText);
                //Noi dung heading
                newsReder(policy);
            }
        }

        xmlhttp.open("GET", "/bookstore/apps/guest/modules/home/actions/policyAPI.php", false);
        xmlhttp.send();
    }
}

function newsReder(jsonNews){

}

function clearContent(){

}