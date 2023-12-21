var cardWidth = $('.carousel-item').width();
var carouselWidth = $('.carousel-inner')[0].scrollWidth - 4*cardWidth;
var scrollPosition = 0;
var step = 4*cardWidth;
var carousel = $('.carousel-inner');
console.log(carousel[0]);

$('.carousel-control-next').on('click',function(){
    scrollPosition = scrollPosition + step;
    if(scrollPosition > carouselWidth){
        scrollPosition = carouselWidth;
    }
    var carousel = $(this).siblings('.carousel-inner');
    carousel.animate({scrollLeft:scrollPosition},700);
})

$('.carousel-control-prev').on('click',function(){
    scrollPosition = scrollPosition - step; 
    if(scrollPosition < 0){
        scrollPosition = 0;
    }
    var carousel = $(this).siblings('.carousel-inner');
    carousel.animate({scrollLeft:scrollPosition},700);
})

$('.carousel-item').on('click',function(){
  let id = $(this).attr('id');
  document.location.href="../product_detail.php?id="+id;
})