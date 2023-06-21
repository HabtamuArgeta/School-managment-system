let widowSize = window.matchMedia("(min-width: 720px)");
    midiacontroler(widowSize) ;
    widowSize.addListener(midiacontroler);
    function midiacontroler(widowsize) {
       if (widowsize.matches) {
        document.getElementById('rightAside').style.display="none"; 
        } 
      }
function chengeTitl(newTitle){
    document.title = newTitle;
    document.getElementById('rightAside').style.display="none";
   } 
   function closeMe(){
     document.getElementById('rightAside').style.display="none";
   }
  function showBars(){
   document.getElementById('rightAside').style.display="block";
  } 

  let header=document.getElementsByClassName('HeaderShow');
  for(let i=0;i<header.length;i++){
    header[i].addEventListener("click",function(){
      for(let j=0;j<header.length;j++){
        header[j].style.textDecoration="none";
      }
       this.style.textDecoration = 'underline';
    });
  }

 