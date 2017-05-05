var myImage= document.getElementById("myImage");
var imageArray= ["../project/images/the_bridge.jpg","../project/images/i1.jpg","../project/images/i2.jpg",
                 "../project/images/i3.jpg","../project/images/i4.jpg","../project/images/i5.jpg",
                 "../project/images/i6.jpg","../project/images/i7.jpg","../project/images/i8.jpg",
                 "../project/images/i9.jpg","../project/images/i10.jpg"];
var imageIndex=0;

function slideShow(){
  myImage.setAttribute("src",imageArray[imageIndex]);
  imageIndex++;
  if(imageIndex >= imageArray.length){
  imageIndex=0;
  }
}
//image changes every 3 seconds
setInterval(slideShow,3000);

window.onscroll= changePos;

function changePos(){
  var mn = document.getElementById("mainNav");
  if (window.pageYOffset >55) {
    mn.style.position="fixed";
    mn.style.top="0";
  }
  else {
    mn.style.position="";
    mn.style.top="";
  }
}
