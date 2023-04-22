let now_choosed = 'home-page';
function choose(id){
    if(now_choosed != id){
        document.getElementById(now_choosed).style.backgroundColor = "white";
        document.getElementById(id).style.backgroundColor = "rgb(76, 168, 194)";
        document.getElementById(id).style.borderRadius = "10px";
        now_choosed = id;
        renderContent(now_choosed);
    }
}

function renderContent(id){
    main = document.getElementById('main');
    clearContent();
    if(id == 'policy-page'){
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                //Use parse() method to convert JSON string to JSON object
                //Noi dung heading
                createNew(JSON.parse(this.responseText));
            }
        }
        xmlhttp.open("GET", "/bookstore/apps/guest/modules/home/actions/policyAPI.php", false);
        xmlhttp.send();
    }
    else if(id == 'news-page'){
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                //Use parse() method to convert JSON string to JSON object
                //Noi dung heading
                createNewsList(JSON.parse(this.responseText));
            }
        }
        xmlhttp.open("GET", "/bookstore/apps/guest/modules/home/actions/newsAPI.php", false);
        xmlhttp.send();
    }
}

function createNew(json){
    var heading = "<h1 id='heading'>"+json['title']+"</h1>";
    var content = json['content'];
    var author = "<p id='author'>"+json['author']+','+"</p>";
    var date = "<p id='date'>"+json['date']+"</p>";
    var main = document.getElementById('main');
    main.innerHTML = heading + content + author+date;
}

function createNewsList(json){
    var main = document.getElementById('main');
    //console.log(json);
    for(item of json){
        main.innerHTML += createNewsItem(item['image'],item['title'],item['date']);
    }
}

function createNewsItem(img,title,date){
    return "<!-- News block -->"+
    "<!-- News -->"+
    "<a href='' class='text-dark'>"+
      "<div class='row mb-4 border-bottom pb-2'>"+
        "<div class='col-3'>"+
          "<img src='"+img+"'"+
            "class='img-fluid shadow-1-strong rounded' alt='Hollywood Sign on The Hill' />"+
        "</div>"+

        "<div class='col-9'>"+
          "<p class='mb-2'><strong>"+title+"</strong></p>"+
          "<p>"+
            "<u>"+date+"</u>"+
          "</p>"+
        "</div>"+
      "</div>"+
    "</a>";
}

function clearContent(){
    document.getElementById('main').innerHTML = "";
}