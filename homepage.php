<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale-1.0>
  <title>Hostel managment</title>
  <link rel="stylesheet" href="homepage.css">
  <link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet'>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="hm.js"></script>
</head>
<body>
    
    <nav class="sticky">
        <img  id="logo" src="https://www.akgec.ac.in/wp-content/themes/twentysixteen/img/AKGEC_1_0.png" alt="logo">
         <ul class="links">
             <li><a href="#s1">About</a></li>
             <li><a href="http://localhost/hostel_manage/facilities.php">Hostel Factilites</a></li>
             <li><a href="http://localhost/hostel_manage/register.php">Sign up</a></li>
             <li><a href="http://localhost/hostel_manage/login.php">Login</a></li>
             <li><a href="http://localhost/hostel_manage/wlogin.php">Warden Panel</a></li>
         </ul>
    </nav>
    
    <h1 class="ml2">Helping    you    to    rise</h1>
    <script>
        var textWrapper = document.querySelector('.ml2');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
        .add({
            targets: '.ml2 .letter',
            scale: [4,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 1200,
            delay: (el, i) => 70*i
        }).add({
            targets: '.ml2',
            opacity: 0,
            duration: 1200,
            easing: "easeOutExpo",
            delay: 600
        });
    </script>
    <h1 class="dm">Home  <span>    </span> away   from   Home</h1>
    <div class="mu-title">
              <span class="mu-subtitle">Discover</span>
              <h2>ABOUT US</h2>
              <i class="fa fa-spoon"></i>              
              <span class="mu-title-bar">

              </span>
            </div>
            <p class="abu">The college provides well furnished hostel accommodation to its students.<br> The six campus hostels are spread over four complexes namely, the Junior Girls Hostel Complex, the Girls Hostel Complex, the Junior Boys Hostel Complex and the Senior Boys Hostel Complex. <br>The three girls hostel have double and triple seater rooms and accommodate about 600 students.<br> The Junior Boys Hostel having double occupancy rooms can accommodate about 300 students and is reserved for first year students. <br>The Senior Boys Hostel Complex has two hostels with single and triple seater accommodation and houses about 600 students.</p>

</body>
    
<footer class="footer-distributed">

<div class="footer-left">

    <h3><span>AKGEC</span></h3>

    <p class="footer-links">
        <a href="#" class="link-1">Facilities</a>
        
        <a href="#"> | Sign up</a>
    
        <a href="#"> | Login</a>
    
        <a href="#"> | Warden panel</a>
    </p>

    <p class="footer-company-name">Since © 1998</p>
</div>

<div class="footer-center">

    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>27th Km Stone,Delhi-Hapur<br></span> Ghaziabad - 201009</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>8744052891-94,<br>
        7290034978, 7290034976</p>
    </div>

    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:info@akgec.ac.in">info@akgec.ac.in</a></p>
    </div>

</div>

<div class="footer-right">

    <p class="footer-company-about">
        <span>Enquiry</span>
        Dr Aditya Pratap Singh: 9958883636<br>
                   Mr. Anuj Dwivedi	:  9910207556<br>
                   Mr. Vivek Pansari	:  9868666480
    </p>

    <div class="footer-icons">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>

    </div>

</div>

</footer>
