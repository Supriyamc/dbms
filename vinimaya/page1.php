<!Doctype>
<html>
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://localhost/vinimaya/page1.css" type="text/css" rel="stylesheet">
        <title> vinimaya </title>
     </head>

<body>
        <h1><strong> VINIMAYA </strong> </h1>
        <br/>
        <div class="topnav">
          <a class="active" href="#home">Vinimaya</a>
  <a href="#">Home</a>
  <a href="#1">About</a>
  <a href="#2">Gallery</a>
  <a href="#section3">contact</a>
  
       </div>
       <a href="http://localhost/vinimaya/registeras.html"><button type="button">Sign up</button></a>
        <a href="http://localhost/vinimaya/login.html"><button type="button">Login</button><a>
        <br/> <br/><br/><br/>

        <img src="http://localhost/vinimaya/images/pic%20(2).jpg" alt="Library"\>
        <br/> <br/>
      
      <section id="1">
        <blockquote>
             <h2> About </h2>
            <p> VINIMAYA - Expand the books for student-library and develop interest in literature
                VINIMAYA - Enhancing experience

                Vinimaya is a student library in uvce supported by Vision uvce is filled with collections of books and videos of various genres.
                VINIMAYA meaning exchange in kannada firmly hold the very purpose of its birth that, being exchange of knowledge, not just knowledge but also about all those wonderful experiences.
                VINIMAYA aims to spread creative ideas embedded in books and enhanced through video in the form of TV series and anime.
                Reviewing which is considered to be a rear art that needs practise to perform, we from VINIMAYA nuture young reviewers to post their opinion.
                VINIMAYA also provides support for one to showcase their talent in literature and art by posting their creations on  fb page of vinimaya.</p>
        </blockquote>
        </section>
        <br/> 

       
       
       
       <section id="2">
        <blockquote> 
            <h2>  Gallery </h2>

    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 7</div>
  <img src="http://localhost/vinimaya/images/book.jpg" style="width:100%">
  <div class="text">Caption One</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 7</div>
  <img src="http://localhost/vinimaya/images/pic6.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 7</div>
  <img src="http://localhost/vinimaya/images/libr.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 7</div>
  <img src="http://localhost/vinimaya/images/vide.jpg" style="width:100%">
  <div class="text">Caption Four</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 7</div>
  <img src="http://localhost/vinimaya/images/pic9.jpg" style="width:100%">
  <div class="text">Caption Five</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 7</div>
  <img src="http://localhost/vinimaya/images/vid.jpg" style="width:100%">
  <div class="text">Caption Six</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">7 / 7</div>
  <img src="http://localhost/vinimaya/images/pic7.jpg" style="width:100%">
  <div class="text">Caption Seven</div>
</div>

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
 

</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<br/>
</section>

           <section id="section3">
        <blockquote>
            <h2> Contact us </h2>
             <strong>staff name</strong> - Mobile number<br/>
              email-id<br/><br/>

            <a href="https://www.facebook.com/Vinimaya-1794935317501317/" target="_blank">Vinimaya fb page</a>
       </blockquote>
       </section>
       <br/><br/>
        
       
       <div id="link">
       <a href="http://localhost/vinimaya/registeras.html">/Register Now</a>
       <a href="http://localhost/vinimaya/login.html" >Login</a>
       <div>
</body>
</html>
