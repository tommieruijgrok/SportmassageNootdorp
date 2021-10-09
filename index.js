window.onscroll = function() {

  if (screen.width > 600){
    scrollHeader();
  }
};

if (screen.width < 600){
  document.getElementById("headerTitle").style.fontSize = "25px";
  document.getElementById("header").style.backgroundColor = "#3DB2D4";
  document.getElementById("header").style.height = "90px";
}


function scrollHeader() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("headerTitle").style.fontSize = "25px";
    document.getElementById("header").style.backgroundColor = "#3DB2D4";
    document.getElementById("header").style.height = "90px";
  } else {
    document.getElementById("headerTitle").style.fontSize = "40px";
    document.getElementById("header").style.backgroundColor = "#3DB2D4";
    document.getElementById("header").style.height = "110px";
  }
}




function scrollToDiv(idName){
    x = (document.getElementById(idName).getBoundingClientRect().y + document.body.scrollTop - 110);
    window.scrollTo(0,x);
}