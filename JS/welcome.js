let slideindex=0;
slideShow();
function slideShow(){
    let slides = document.getElementsByClassName('slide');
    for(let i=0;i<slides.length;i++){
      slides[i].style.display="none";
    }
    slideindex++;
    if(slideindex>slides.length){
        slideindex=1;
    }
    slides[slideindex-1].style.display="block";
    setTimeout(slideShow,5000);
}

let slideindex2=0;
slideShow2();
function slideShow2(){
    let slides = document.getElementsByClassName('slide2');
    for(let i=0;i<slides.length;i++){
      slides[i].style.display="none";
    }
    slideindex2++;
    if(slideindex2>slides.length){
        slideindex2=1;
    }
    slides[slideindex2-1].style.display="block";
    setTimeout(slideShow2,5000);
}