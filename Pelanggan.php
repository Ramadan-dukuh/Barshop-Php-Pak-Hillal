<?php
session_start();
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
if($_SESSION['level'] != 'user'){
    header("location:AdminDashboard.php ");
    exit();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Pelanggan.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');


:root {
    --primary-color: #4a98f7;
    --secondary-color: #fff2df;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #f0faff;
}

/* Navbar */
.nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 15px 200px;
    background: var(--primary-color);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
}

.nav a {
    color: #fff;
    text-decoration: none;
}

.nav li:hover {
    transition: all 0.2s ease-in-out;
    font-weight: 700;
    text-shadow: 0 0 8px #949993;
}

.nav .logo {
    font-size: 22px;
    font-weight: 500;
}

.nav .nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav .nav-links a {
    transition: all 0.2s linear;
}

.navOpenBtn, .navCloseBtn {
    display: none;
}

/* Responsive Navigation */
@media screen and (max-width: 768px) {
    .navOpenBtn, .navCloseBtn {
        display: block;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
    }
    .nav .nav-links {
        position: fixed;
        top: 0;
        left: -100%;
        height: 100%;
        width: 280px;
        background-color: #11101d;
        flex-direction: column;
        padding-top: 100px;
        gap: 30px;
        transition: 0.4s ease;
    }
    .nav.openNav .nav-links {
        left: 0;
    }
}
.title{
    text-align: center;
    margin-top: 80px;
    color: var(--primary-color);
}
/* slider */
.slider {
    height: 100%;
    padding: 20px;
    position: relative;
    overflow: hidden;
  }
  
  .slider .list {
    display: flex; /* Make the list a flex container */
    transition: transform 0.5s ease-in-out;
  }
  
  .slider .list .item {
    min-width: 100%;
    position: relative;
    overflow: hidden;
  }
  
 /* Mengatur ukuran gambar dan menambahkan border */
.slider .list .item img {
    width: 70%; /* Mengurangi lebar gambar menjadi 80% */
    height: auto; /* Menjaga rasio gambar */
    padding: 20px;
    object-fit: cover;
    border: 5px solid #fff; /* Menambahkan border hitam dengan ketebalan 5px */
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
    rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    border-radius: 30px; /* Opsional: Menambahkan border-radius untuk membuat tepi gambar melengkung */
    margin: 0 auto; /* Menjaga gambar tetap di tengah */
    display: block; /* Mengatur gambar menjadi elemen blok agar efek margin berfungsi */
    margin-bottom: 30px;
}

  
  .slider .list .item.active {
    opacity: 1;
    z-index: 10;
  }
  .slider .list .item::after{
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
  }
  .slider .list .item .contents{
    position: absolute;
    left: 10%;
    top: 50%;
    width: 500px;
    max-width: 80%;
    z-index: 1;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
    rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    background-color: #fff;
    color: var(--primary-color);
    padding: 20px;
    border-radius: 10px;
  }
  .slider .list .item .contents p:nth-child(1){
    text-transform: uppercase;
    letter-spacing: 10px;
  }
  .slider .list .item .contents h2{
    font-size: 3rem;
    margin: 0;
  }
  @keyframes showContent {
    to{
        transform: translateY(0);
        filter: blur(0);
        opacity: 1;
    }
  }
  .slider .list .item.active p:nth-child(1),
  .slider .list .item.active h2,
  .slider .list .item.active p:nth-child(3){
      transform: translateY(30px);
      filter: blur(20px);
      opacity: 0;
      animation: showContent .5s .7s ease-in-out 1 forwards;
  }
  .slider .list .item.active h2{
      animation-delay: 1s;
  }
  .slider .list .item.active p:nth-child(3){
      animation-duration: 1.3s;
  }
  .arrows {
    position: absolute;
    width: 100%;
    top: 50%;
    transform: translateY(-50%);
    z-index: 15;
    display: flex;
    padding: 20px;
    justify-content: space-between; /* Ini akan memastikan tombol tersebar di kedua sisi */
}

.left button {
    position: absolute;
    left: 50px; /* Atur jarak dari kiri */
}

.right button {
    position: absolute;
    right: 50px; /* Atur jarak dari kanan */
}

.arrows button {
    background-color: rgba(0, 0, 0, 0.333);
    border: none;
    font-family: monospace;
    width: 40px;
    height: 40px;
    border-radius: 5px;
    font-size: x-large;
    color: #eee;
    transition: .5s;
}

.arrows button:hover {
    background-color: #eee;
    color: black;
    cursor: pointer;
}

/* Main Section */
.main {
  min-height: 100vh;
  padding: 20px;
  background-color: var(--background-color);
  color: var(--primary-color);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  scrollbar-color: transparent transparent;
  overflow-x: scroll;
  scroll-snap-type: mandatory;
}
.shop {
  display: flex;
  justify-content: center;
  align-items: center;
  /* flex-wrap: wrap; */
  padding: 20px;
  gap: 20px;
  margin: 0 auto;
  width: max-content;
  cursor: pointer;
  scroll-snap-align: start;
}

/* Menu Section */
.menu {
  background-color: #fff;
  border-radius: 15px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
    rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
  width: 300px;
  padding: 20px;
  text-align: center;
  margin: 15px;
  transition: transform 0.3s;
}

.menu img {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 15px;
}

.menu .button {
  background-color: var(--primary-color);
  color: var(--secondary-color);
  border: none;
  padding: 10px 50px;
  border-radius: 20px;
  cursor: pointer;
  margin-top: 20px;
  margin-bottom: 30px;
  transition: background-color 0.3s;
  text-decoration: none;  
}

.menu .button:hover {
  background-color: var(--secondary-color);
  color: #323c39;
}

.menu h3 {
  font-size: 1.5em;
  margin-top: 20px;
  margin-bottom: 10px;
  color: var(--accent-color);
}

.menu p {
  font-size: 0.9em;
  color: #666;
  margin-bottom: 10px;
}

.menu h4 {
  font-size: 1.2em;
  color: var(--accent-color);
}

.menu h4 s {
  color: #999;
  font-size: 0.9em;
}
.menu input[type="text"] {
    width: 50px;
    text-align: center;
    font-size: 24px;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin: 0 10px;
    outline: none;
}
.cart{
    position: fixed;
    bottom: 20px; /* Jarak dari bawah */
    right: 20px;  /* Jarak dari kanan */
    width: 60px;  /* Lebar bulatan */
    height: 60px; /* Tinggi bulatan */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Agar berada di atas elemen lain */
}
.cart a {
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan */
    color: var(--secondary-color); /* Warna ikon cart */
    font-size: 24px; /* Ukuran ikon cart */
    text-decoration: none;
    background-color: var(--primary-color); /* Warna background bulat */
    border-radius: 50%; /* Membuat background bulat */
  }
.cart a:hover{
    color: var(--primary-color); /* Warna ikon cart ketika dihover */
    background-color: var(--secondary-color);
  }
  
  footer {
    display: block;
    justify-content: center;
    bottom: 0; 
}

footer .container {
    display: grid;
    justify-content: center;
    align-items: center;
    position: relative;
    grid-template-columns: 50% 50%;
    background: var(--primary-color);
    padding: 15px 0 15px 0;
    height: auto;
    width: 100%;
    left: 0;
}

footer .container .coloumn-1 .theme h1 {
    display: flex;
    justify-content: start;
    font-size: 1.5em;
    text-align: left;
    color: #fff;
    margin-left: 20px;
    margin-top: 20px;
}

footer .container .coloumn-1 .paragraph p {
    display: flex;
    justify-content: left;
    align-items: start;
    color: #fff;
    font-size: 0.9em;
    text-align: justify;
    margin: 10px 20px;
}

footer .container .coloumn-1 .social-icon,
footer .container .coloumn-1 .menu {
    position: relative;
    display: flex;
    justify-content: start;
    align-items: center;
    margin: 20px 0 10px 10px;
    flex-wrap: wrap;
}

footer .container .coloumn-1 .social-icon li,
footer .container .coloumn-1 .menu li {
    list-style: none;
}

footer .container .coloumn-1 .social-icon li a {
    display: grid;
    border-radius: 50px;
    align-content: center;
    justify-content: center;
    color: #fff;
    background: #758694;
    font-size: 1.5em;
    text-decoration: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin: 0 10px;
    transition: 0.3s ease;
}

footer .container .coloumn-1 .social-icon li .link {
    background: #426782;
}

footer .container .coloumn-1 .social-icon li .twitter {
    background: #1da1f2;
}

footer .container .coloumn-1 .social-icon li .instagram {
    background-image: linear-gradient(to right, #833ab4, #fd1d1d, #fcb045);
}

footer .container .coloumn-1 .social-icon li .youtube {
    background: #ff0000;
}

footer .container .coloumn-1 .social-icon li a:hover {
    color: #000;
    background: #fff;
    border-radius: 50%;
    transform: translateY(-10px);
}

footer .container .coloumn-2 {
    margin: 0 20px 0 20px;
}

footer .container .coloumn-2 .theme h1 {
    display: flex;
    justify-content: start;
    font-size: 1.5em;
    text-align: left;
    color: #fff;
    margin-left: 20px;
    margin-bottom: 10px;
}

footer .container .coloumn-2 .info {
    position: relative;
}

footer .container .coloumn-2 .info li {
    display: grid;
    grid-template-columns: 30px 1fr;
    margin-bottom: 10px;
}

footer .container .coloumn-2 .info li span {
    color: #fff;
    margin-top: 4px;
    font-size: 1.1em;
}

footer .container .coloumn-2 .info li p a {
    color: #fff;
    text-decoration: none;
    font-size: 0.9em;
    transition: 0.3s ease-in-out;
}

footer .container .coloumn-2 .info li p a:hover {
    transition: 0.2s ease-in-out;
    text-decoration: underline;
    color: #1da1f2;
}

footer .container hr {
    width: 50%;
    text-align: center;
    margin-left: 0;
}

footer .coloumn-3 {
    position: relative;
    display: flex;
    justify-content: center;
    padding: 20px 0 20px 0;
    background: var(--primary-color);
    bottom: 0;
    left: 0;
}

footer .coloumn-3 p {
    color: #fff;
    font-size: 0.8em;
}

/* footer */


/* Media-Screen */
@media only screen and (max-width: 1170px) {

    /* Ini buat perangkat sekitar lebar layar kurang dari 768px */
    #card-team .wrapper {
        flex-direction: column;
        align-items: center;
    }

    .card-container .card {
        width: 200px;
        margin: 10px 0;
    }
}

/* Gaya untuk perangkat dengan lebar layar kurang dari 480px */
@media only screen and (max-width: 680px) {
    footer .container {
        display: flex;
        flex-direction: column;
        padding: 20px;
        grid-template-columns: 1fr;
        height: auto;
        padding: 0;
    }

    footer .container .coloumn-1,
    footer .container .coloumn-2 {
        margin: 0;
        padding: 10px;
    }

    footer .container .coloumn-1 .theme h1,
    footer .container .coloumn-2 .theme h1 {
        font-size: 1.2em;
        text-align: center;
    }

    footer .container .coloumn-1 .paragraph p,
    footer .container .coloumn-2 .info li span {
        font-size: 0.8em;
    }

    .copyright {
        font-size: 0.7em;
    }
}


    </style>
    <title>Home | Barshop</title>
</head>
<body>
<!-- nav -->
<nav class="nav">
        <i class="uil uil-bars navOpenBtn" onclick="openNav()"></i>
        <a href="#" class="logo">Barshop</a>
        <ul class="nav-links">
            <i class="uil uil-times navCloseBtn" onclick="closeNav()"></i>
            <li><a href="#">Home</a></li>
            <li><a href="#inventory">Pesanan</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
<!-- main -->
    <div class="title">        
        <h1>Halo
             <b><?= $_SESSION['user']; ?></b> 
            , Selamat Datang Di Barshop
        </h1>
        <p>Mau beli apa nih?</p>
    </div>
    <div class="slider">
      <div class="list">
        <div class="item active">
          <img src="img/banner.jpeg" alt="Espresso Coffee">
          <div class="contents">
            <p>Barshop</p>
            <h2>Espresso</h2>
            <p>Espresso dengan susu kental manis buat harimu lebih menyenangkan </p>
          </div>
        </div>
        <div class="item">
          <img src="img/banner.jpeg" alt="Mocha Coffee">
          <div class="contents">
            <p>Barshop</p>
            <h2>Mocha</h2>
            <p>Coffee dengan latte gula aren buat hidupmu lebih berwarna</p>
          </div>
        </div>
      </div>
    </div>
     <!-- button arrow -->
     <div class="arrows">
      <button id="prev" class="left"><</button>
      <button id="next" class="right">></button>
  </div>
    <div class="main">
      <div class="shop">
        <div class="menu">
          <img src="img/coffe.jpg" alt="Coffe Image">
          <a href="formRegis.php" class="button">Buy</a>          
          <h3>Coffee</h3>
          <p>Coffee dengan latte gula aren</p>
          <h4>65.100 <s>93.000</s></h4>
        </div>
      <div class="menu">
        <img src="img/coffe.jpg" alt="">
        <a href="afTransaksi.php" class="button">Buy</a>   
        <h3>Coffe</h3>
        <p>Coffe dengan latte gula aren</p>
        <h4>65.100 <s>93.000</s></h4>
    </div>
    <div class="menu">
      <img src="img/coffe.jpg" alt="">
      <a href="afTransaksi.php" class="button">Buy</a>   
      <h3>Coffe</h3>
      <p>Coffe dengan latte gula aren</p>
      <h4>65.100 <s>93.000</s></h4>
  </div>
  <div class="menu">
    <img src="img/coffe.jpg" alt="">
    <a href="afTransaksi.php" class="button">Buy</a>   
    <h3>Coffe</h3>
    <p>Coffe dengan latte gula aren</p>
    <h4>65.100 <s>93.000</s></h4>
</div>
<div class="menu">
  <img src="img/coffe.jpg" alt="">
  <a href="afTransaksi.php" class="button">Buy</a>   
  <h3>Coffe</h3>
  <p>Coffe dengan latte gula aren</p>
  <h4>65.100 <s>93.000</s></h4>
</div>
<div class="menu">
  <img src="img/coffe.jpg" alt="">
  <a href="afTransaksi.php" class="button">Buy</a>   
  <h3>Coffe</h3>
  <p>Coffe dengan latte gula aren</p>
  <h4>65.100 <s>93.000</s></h4>
</div>
    </div>
    </div>

    <footer id="footer">
        <div class="container">

            <!-- Coloumn-01 -->
            <div class="coloumn-1">
                <ul class="theme">
                    <h1>Barshop</h1>
                </ul>
                <ul class="paragraph">
                    <p>Our Media Sosial</p>
                </ul>
                <ul class="social-icon">
                    <li>
                        <a href="https://uks.kemdikbud.go.id/sekolah-sehat" class="link">
                            <i class='bx bx-link-alt'></i>
                        </a>
                    </li>
                    <li>
                        <a href="" class="twitter">
                            <i class='bx bxl-twitter'></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtu.be/MdZ5cLCvEio?si=0f4lNk7f9irEhSeX" class="youtube">
                            <i class='bx bxl-youtube'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="instagram">
                            <i class='bx bxl-instagram'></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Coloumn-01 -->

            <!-- Coulumn-02 -->
            <div class="coloumn-2">
                <ul class="theme">
                    <h1>Meet us at</h1>
                </ul>
                <ul class="info">
                    <li>
                        <span>
                            <i class='bx bx-location-plus'></i>
                        </span>
                        <p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.94090105738!2d106.86404917387829!3d-6.3103563617520235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed7636461889%3A0xa26c6e6181e00473!2sJl.%20Makmur%2C%20Susukan%2C%20Kec.%20Ciracas%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013750!5e1!3m2!1sid!2sid!4v1731241900810!5m2!1sid!2sid" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </p>
                    </li>                    
                    <li>
                    <span>
                            <i class='bx bx-envelope'></i>
                        </span>
                        <p>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ramadan2609062gmail.com"
                                target="_blank">BarokGanteng@Barshop.co.id</a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Coulumn-02 -->

        <!-- Coulumn-03 -->
        <hr>
        <div class="coloumn-3">
            <p>&copy Copyright 2024 | Barshop</p>
        </div>
        <!-- Coulumn-03 -->

    </footer>

</body>
<script>
    let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');

// config param
let countItem = items.length;
let itemActive = 0;

// event next click
next.addEventListener('click', () => {
    itemActive = (itemActive + 1) % countItem;
    showSlider();
});

// event prev click
prev.addEventListener('click', () => {
    itemActive = (itemActive - 1 + countItem) % countItem;
    showSlider();
});

// auto run slider
let refreshInterval = setInterval(() => {
    next.click();
}, 10000);

function showSlider() {
    // remove active class from the old item
    let itemActiveOld = document.querySelector('.slider .list .item.active');
    if (itemActiveOld) itemActiveOld.classList.remove('active');

    // add active class to the new item
    items[itemActive].classList.add('active');

    // Adjust the position of the slider using transform
    let sliderList = document.querySelector('.slider .list');
    sliderList.style.transform = `translateX(-${itemActive * 100}%)`;

    // reset the auto slide interval
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 10000);
}
let count = 0;

function increment(button) {
    let counter = button.parentElement.querySelector('.counter');
    count = parseInt(counter.value);
    counter.value = ++count;
}

function decrement(button) {
    let counter = button.parentElement.querySelector('.counter');
    count = parseInt(counter.value);
    if (count > 0) {
        counter.value = --count;
    }
}

function sendData(button) {
    let form = button.closest('form');
    let counter = form.querySelector('.counter').value;
    form.querySelector('#counterValue').value = counter;
}


</script>
</html>