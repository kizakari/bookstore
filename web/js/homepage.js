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
    else if(id == 'home-page'){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                //Use parse() method to convert JSON string to JSON object
                //Noi dung heading
                createHome(JSON.parse(this.responseText));
                //console.log(JSON.parse(this.responseText));
            }
            else if(this.readyState == 4){
                console.log("Fck"); 
            }   
        }
        xmlhttp.open("GET", "/bookstore/apps/guest/modules/home/actions/homeAPI.php", false);
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

function createHome(json){
    var main = document.getElementById('main');
    main.innerHTML = "<div class='container' style='max-width: 1000px; margin-top: 100px;'>";
    for(item of json){
        main.innerHTML += createCarousel(item);
    }
    main.innerHTML += "</div>";
}

function createCarousel(json){
    //Create header of the carousel
    let str = "<div class='new-book'>"+
        "<div class='NB-text'>"+json['category']+"</div>"+
        "<div id='carouselExample' class='carousel'>"+
        "<div class='carousel-inner'>";
    for(item of json['data']){
        str+=createCard();
    }
    str+='</div>'+
    "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExample' data-bs-slide='prev'>"+
    "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"+
    "<span class='visually-hidden'>Previous</span>"+
    "</button>"+
    "<button class='carousel-control-next' type='button' data-bs-target='#carouselExample' data-bs-slide='next'>"+
    "<span class='carousel-control-next-icon' aria-hidden='true'></span>"+
    "<span class='visually-hidden'>Next</span>"+
    "</button>"+
    "</div>";
    return str;
}

function createCard(json){ 
    return "<div class='carousel-item active'>"+
            "<div class='card'>"+ 
                "<div class='image-part'>"+
                    "<div class='text-center'>"+ 
                        "<img src='https://images-us.bookshop.org/ingram/9781638930228.jpg?height=500&v=v2-b0d66fb83651bd85cc458dfcbe6f85e9'"+ 
                        "class='img-fluid' width='200' />"+
                    "</div>"+ 
                    "<div class='content'>"+
                        "<div class='buttons d-flex justify-content-center'>"+ 
                            "<button class='btn btn-outline-primary mr-1'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>"+
                                "<path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>"+
                                "<path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>"+
                                "</svg></button>"+ 
                            "<button class='btn btn-primary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart-plus' viewBox='0 0 16 16'>"+
                                "<path d='M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z'/>"+
                                "<path d='M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>"+
                                "</svg></button>"+
                        "</div>"+ 
                    "</div>"+
                "</div>"+
                "<div class='NB-items'>"+
                    "<div class='NBi-category'>Biography</div>"+
                    "<div class='NBi-name'>Such a Fun Age</div>"+
                    "<div class='NBi-author'>Kiley Reid</div>"+
                    "<div class='NBi-price'>190,000 đ</div>"+
                "</div>"+
            "</div>"+
    "</div>";
}

function clearContent(){
    document.getElementById('main').innerHTML = "";
}
