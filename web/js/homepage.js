//Hard config for carousel 
const configCarousel = {
    numRetrivedCategories: 3, //Number of categories retrived a time
    numRetrivedBooks: 6, //NUmber of books retrived a time
    maxEachCarousel: 20 //Maximum number of books for each carousel
}

//This const tracking state of all carousels
const listCarouselsState = {
    numShownCategories: 0, //Number of categories that already been shown
    numShowedItems: {} //Number of item for each categories that already been shown
}

//Carousel's behavior will be add on a particular carousel
function setupCarousel(carouselId){
    const numCardsPerSlide = 5;
    var cardWidth = $('.carousel-item').width();
    var carouselInner = $(`[id='${carouselId}'] .carousel-inner`);
    var scrollPosition = 0;
    var step = numCardsPerSlide*cardWidth;
    var nextButton = document.getElementById(`${carouselId}`).getElementsByClassName('carousel-control-next')[0];
    var prevButton = document.getElementById(`${carouselId}`).getElementsByClassName('carousel-control-prev')[0];
    nextButton.addEventListener('click',(event)=>{
        //Calculate new scroll position
        var newScrollPosition = scrollPosition + step;
        console.log('click click');
        // //If the scroll position is out of border, then we load more items if not reach maximum yet
        if(newScrollPosition > carouselInner[0].scrollWidth-numCardsPerSlide*cardWidth){
            if(listCarouselsState.numShowedItems[carouselId] < configCarousel.maxEachCarousel){
                var button = event.target;
                var cate = button.parentNode.parentNode.parentNode.id;
                // Load more books
                console.log("load books");
                getSubListBooks(cate)
                .then((books)=>{
                    appendBooks(cate,books);
                    //If the new position is in range then move to it
                    if(newScrollPosition <= carouselInner[0].scrollWidth-numCardsPerSlide*cardWidth){
                        scrollPosition = newScrollPosition;
                        carouselInner.animate({scrollLeft:scrollPosition},700);
                    }
                    //If not we have to make it smaller
                    else{
                        scrollPosition = carouselInner[0].scrollWidth-numCardsPerSlide*cardWidth;
                        carouselInner.animate({scrollLeft:scrollPosition});
                    }
                })
                .catch((exception)=>{
                    console.log(exception);
                    console.log("Huhu");
                });
            }else{
                scrollPosition = carouselInner[0].scrollWidth-numCardsPerSlide*cardWidth;
                carouselInner.animate({scrollLeft:scrollPosition});
            }
        }else{
            scrollPosition = newScrollPosition;
            carouselInner.animate({scrollLeft:scrollPosition},700);
        }
    });

    prevButton.addEventListener('click',(event)=>{
        scrollPosition = scrollPosition - step; 
        if(scrollPosition < 0){
            scrollPosition = 0;
        }
        carouselInner.animate({scrollLeft:scrollPosition},700);
    });

    $('.carousel-item').on('click',function(){
    let id = $(this).attr('id');
    document.location.href="../product_detail.php?id="+id;
    });
}
/*-----------------APIs-----------------*/
/*
This function get multiple categories at once
param1 first: Index of first categories
param2 num: Identify the number of categories be retrieved at once
*/
async function getListCategories(){
    const response = await fetch(`http://127.0.0.1/api/cates`);
    const list = await response.json();
    return list;
}
/*
This function get multiple books for a category at once
The parameters have the same meaning as getListCategories()'s do
*/
async function getSubListBooks(category){
    try{
        var request = `http://127.0.0.1/api/books?cate=${category}&index=${listCarouselsState.numShowedItems[category]}&num=${configCarousel.numRetrivedBooks}`;
        const response = await fetch(request);
        books = await response.json();
        console.log('new books here: ',books);
        return books;
    }catch(err){
        console.log('Fetch from database unsucessfully :(',err);
    }
}
/*-----------------APIs-----------------*/


//Append books into a carousel
async function appendBooks(carouselId, books){
    //Push item into carousel
    console.log(`appending ${carouselId}`,books);
    for(const book of books){
        let itemHTML = `
        <div class='carousel-item' id='${book.BkId}'>
            <img src='${book.BkCvImg}' alt='${book.BkName}'>
        </div>
        `
        ;
        document.getElementById(`${carouselId}`).getElementsByClassName('carousel-inner')[0].innerHTML += itemHTML;
    }
    listCarouselsState.numShowedItems[carouselId]+=books.length;
}


//Show all carousel 
async function showCarousel(){
    //Get list of all categories and setup listCarouselsState
    if(listCarouselsState.numShownCategories == 0){
        configCarousel.cateList = await getListCategories();
        //Setup state 
        for(const cate of configCarousel.cateList){
            listCarouselsState.numShowedItems[cate] = 0;
        }
    }

    //Get list of categories that we're gonna show
    var subListCategories = configCarousel.cateList.slice(listCarouselsState.numShownCategories,
        listCarouselsState.numShownCategories+configCarousel.numRetrivedCategories);

    //Get item for each category
    for(const cate of subListCategories){
    //Set HTML code, used to create HTML object
        var carouselHTML = `
        <div class='carousel-wrapper' id='${cate}'>
            <div class='carousel-header'>
                <span class='carousel-name'>${cate}</span>
                <span class='carousel-viewAll'><a href='#'>Xem tất cả</a></span>
            </div>
            <div id='$cate' class='carousel'>
                <div class='carousel-inner'>
                </div>
                <button class='carousel-control-prev' type='button' data-bs-target='${cate}' data-bs-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Previous</span>
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='${cate}' data-bs-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Next</span>
                </button>
            </div>
        </div>
        `;
        bookList = await getSubListBooks(cate);
        //Add HTML code to the Page
        document.getElementById('main').insertAdjacentHTML("beforeend",carouselHTML);
        //Push list items into carousel
        appendBooks(cate,bookList);
        //Setup the carousel's behavior
        setupCarousel(cate);
        
    }

    //Update for carousel state
    listCarouselsState.numShownCategories+=configCarousel.numRetrivedCategories;
}

//EVENT: right after load page, we load some carousels
window.addEventListener("load",(event)=>{
    showCarousel();
})

//EVENT: when user scroll to the bottome, we load more carousels if there are more to show
window.addEventListener("scroll",(event)=>{
    if($(window).scrollTop() + $(window).height() == $(document).height()){
        showCarousel();
    }
})