<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="./output.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>DELFINESPARK.COM</title>
</head>

<body class="flex flex-col">
  <!-- carrusel de fotos -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const menuToggle = document.getElementById('menu-toggle');
      const responsiveMenu = document.getElementById('responsive-menu');

      menuToggle.addEventListener('click', function() {
        responsiveMenu.classList.toggle('hidden');
      });
    });
  </script>


  <nav class="bg-blue-800 fixed z-10 text-white p-4 w-full sm:flex sm:justify-center sm:items-center sm:flex-col sm:min-h-12 lg:min-h-16">
    <div class="container mx-auto sm:flex sm:items-center flex justify-between items-center">
      <!-- Logo -->
      <div class="text-lg font-bold text-yellow-300 sm:text-1xl lg:text-2xl">JUAN DOLIO</div>

      <!-- Menu Toggle (hidden on large screens) -->
      <div class="lg:hidden">
        <button id="menu-toggle" class="focus:outline-none">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <!-- Navbar Links (hidden on small screens, shown on large screens) -->
      <div id="navbar-links" class="hidden lg:flex items-center space-x-4 gap-5">
        <a href="#header" class="hover:text-yellow-300">Home</a>
        <a href="#about" class="hover:text-yellow-300">About</a>
        <a onclick="window.location.href='galery.php'; return false;" class="hover:text-yellow-300 cursor-pointer">Gallery</a>
        <a href="#administrators" class="hover:text-yellow-300">Administrators</a>
        <a href="#footer" class="hover:text-yellow-300  cursor-pointer">Contact</a>
        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
          <a onclick="window.location.href='dashboard.php'; return false;" class="cursor-pointer md:text-1xl block px-4 py-2 bg-yellow-300 text-blue-800 rounded-lg hover:bg-yellow-400">You are an Administrator</a>
        <?php } ?>
      </div>


      <!-- "Log Out" Button -->
      <div class="hidden lg:flex items-center space-x-4 gap-5">
        <?php if (!isset($_SESSION["user_id"])) { ?>
          <a onclick="window.location.href='SignUp.php'; return false;" class="flex cursor-pointer items-center p-2 rounded-lg dark:text-white text-red-500 hover:text-red-600 group">
            <svg class="flex-shrink-0 w-5 h-5 transition duration-75 group-hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap text-center">Sign In</span>
          </a>
        <?php } ?>

        <?php if (isset($_SESSION["user_id"])) { ?>
          <a onclick="window.location.href='cerrarseccion.php'; return false;" class="flex items-center p-2 rounded-lg dark:text-white text-red-500 hover:text-red-600 group cursor-pointer">
            <svg class="flex-shrink-0 w-5 h-5 text-whate transition duration-75 group-hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
          </a>
        <?php } ?>


      </div>
    </div>

    <!-- Responsive Menu (hidden by default, shown when toggled) -->
    <div id="responsive-menu" class="lg:hidden hidden sm:w-full p-10 gap-4">
      <a href="#header" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Home</a>
      <a href="#about" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">About</a>
      <a onclick="window.location.href='galery.php'; return false;" class="md:text-2xl block px-4 py-2 hover:bg-gray-700 cursor-pointer">Gallery</a>
      <a href="#administrators" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Administrators</a>
      <a href="#footer" class="md:text-2xl block px-4 py-2 hover:bg-gray-700 cursor-pointer">Contact</a>
      <?php if (!isset($_SESSION["user_id"])) { ?>
        <a onclick="window.location.href='login.php'; return false;" class="flex items-center p-2 rounded-lg dark:text-white group cursor-pointer">
          <span class="flex-1 ms-3 whitespace-nowrap text-xl hover:text-red-700">Sign In</span>
        </a>
      <?php } ?>

      <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
        <a onclick="window.location.href='dashboard.php'; return false;" class="md:text-2xl block px-4 py-2 bg-yellow-300 text-blue-800 rounded-lg hover:bg-yellow-400 cursor-pointer mt-10">You are an Administrator</a>
      <?php } ?>


      <?php if (isset($_SESSION["user_id"])) { ?>
        <a onclick="window.location.href='cerrarseccion.php'; return false;" class="flex items-center p-2 rounded-lg dark:text-white text-red-500 hover:text-red-600 group cursor-pointer text-xl mt-5">
          <svg class="flex-shrink-0 w-5 h-5 text-whate transition duration-75 group-hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
        </a>
      <?php } ?>
      <!-- "Log Out" Button in the responsive menu 
      <div class="md:text-2xl block px-4 py-2 hover:bg-gray-700">
        <a href="cerrarseccion.php" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Log Out</a>
      </div>
      -->
    </div>
  </nav>

  <header id="header" class="flex justify-center items-center mb-36 min-h-screen bg-gradient-to-r from-blue-500 to-blue-800 text-white w-full">
    <div class="container mx-auto flex flex-col justify-center h-full items-center md:flex-col lg:flex-row gap-5 w-full sm:flex-col">
      <div class="flex flex-col items-center md:items-start px-5 text-center md:text-left">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl lg:text-start font-bold mb-4 sm:w-full sm:text-center">
          <span class="block text-yellow-300">
            JUAN DOLIO
          </span>
          <span>
            WATER VIEW LAND FOR SALE
          </span>
        </h1>
      </div>
      <div class="md:w-1/2 lg:w-1/2 flex justify-center">
        <img class="w-2/3 lg:w-1/2 rounded-md shadow-lg hover:shadow-xl transition-shadow duration-300" src="../assets/images/cartoon-house-sale-vector-illustration-53745307" alt="House for Sale">
      </div>
    </div>
  </header>

  <main class="flex flex-col">
    <section id="about" class="flex flex-col gap-36 p-10 container-xxl mb-36 min-h-screen pt-20">
      <div class="w-full flex gap-10 flex-col justify-center items-center h-32">
        <h1 class="text-3xl sm:text-3xl lg:text-4xl flex items-center justify-center p-10 text-center gap-3 flex-col w-full h-full text-white">
          <span class="text-yellow-300">
            get to know me
          </span>
          <span class="text-blue-800">
            see my perspective
          </span>
        </h1>
      </div>

      <div class="container-xxl">
        <div id="cont-text">
          <div class="flex items-center justify-center gap-10 sm:flex-col lg:flex-row">

            <div class="flex flex-col sm:flex-col lg:flex-row sm:gap-10 items-center">
              <div class="sm:w-full lg:w-1/2">
                <img src="../assets/images/blog-3-720x480" alt="About Us Image" class="w-full h-auto rounded-lg shadow-md">
              </div>
              <div class="sm:w-full lg:w-1/2 flex flex-col items-center lg:items-start mt-8 md:mt-0 p-5 lg:p-0">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-yellow-300">About Us</h2>
                <p class="mt-4 text-base sm:text-xl lg:text-lg text-gray-600 leading-relaxed text-center lg:text-left">Welcome to [Your Real Estate Company], where dreams find a home. With a dedicated team of professionals, we provide personalized service to help you find the perfect property. Whether you are looking for a cozy apartment, a spacious house, or an investment opportunity, we are here to assist you every step of the way.</p>
                <p class="mt-4 text-base sm:text-xl lg:text-lg text-gray-600 leading-relaxed text-center lg:text-left">Our mission is to make the process of buying, selling, or renting properties as smooth and stress-free as possible. With years of experience in the real estate industry, we have built a reputation for honesty, integrity, and excellence. Let us help you turn your real estate dreams into reality.</p>
                <a href="contact.html" class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:text-yellow-300 transition duration-300 sm:text-lg lg:text-base">Contact Us</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section id="administrators" class="flex flex-col sm:gap-20 items-center justify-center p-10 text-white mb-36 min-h-1/3">
      <h2 class="text-center text-2xl font-bold mb-8 text-yellow-300 sm:text-3xl lg:text-4xl">
        WATER FRONT PROPERTY FOR SALE @ JUAN DOLIO BEACH, SAN PEDRO<br> 978-578-0278
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
        <div class="flex flex-col justify-center bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl sm:text-2xl lg:text-xl font-semibold text-blue-700 mb-2">Fernando Pena</h3>
          <p class="text-sm sm:text-base lg:text-xl text-gray-600">(978)745-8848</p>
          <p class="text-gray-700 my-4 sm:text-base lg:text-sm">Come and Invest in this piece of Paradise / Water View / Juan Dolio Beach</p>
          <p class="text-gray-700 sm:text-base lg:text-sm">We speak French, Spanish, Portuguese, English, and Mandarin/Cantonese</p>
        </div>

        <div class="flex flex-col justify-center bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl sm:text-2xl lg:text-xl font-semibold text-blue-700 mb-2">Near Juan Dolio Beach, San Pedro</h3>
          <p class="text-sm sm:text-base lg:text-xl text-gray-600">Autovia del Este # 1492</p>
          <p class="text-gray-700 my-4 sm:text-base lg:text-sm">Financing Available / Local Bank and International Loans</p>
        </div>

        <div class="flex flex-col justify-center bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl sm:text-2xl lg:text-xl font-semibold text-blue-700 mb-2">Chen Yanyan</h3>
          <p class="text-sm sm:text-base lg:text-xl text-gray-600">(978)745-8848</p>
          <p class="text-gray-700 my-4 sm:text-base lg:text-sm">Come and Invest in this piece of Paradise / Water View / Juan Dolio Beach</p>
          <p class="text-gray-700 sm:text-base lg:text-sm">Mandarin/Cantonese Spoken</p>
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap justify-between items-center mb-8 sm:flex-col lg:flex-row sm:gap-10">
        <div class="w-full sm:w-[500px] lg:w-[300px] mb-6 md:mb-0">
          <img src="../assets/images/product-1-720x480" alt="Logo" class="w-full h-full">
        </div>

        <div class="sm:flex sm:flex-row sm:w-full sm:gap-20 lg:w-[60%]">
          <div class="w-full md:w-52 mb-6 md:mb-0 ">
            <h3 class="lg:text-xl sm:text-4xl font-semibold mb-4 text-yellow-300">Navegación</h3>
            <ul>
              <li class="mb-2"><a href="#header" class="hover:text-gray-400 sm:text-3xl lg:text-sm">Home</a></li>
              <li class="mb-2"><a href="#about" class="hover:text-gray-400 sm:text-3xl lg:text-sm">About</a></li>
              <li class="mb-2"><a href="#administrators" class="hover:text-gray-400 sm:text-3xl lg:text-sm">Administradores</a></li>
            </ul>
          </div>

          <div class="w-full md:w-1/3">
            <h3 class="text-xl sm:text-4xl font-semibold mb-4 text-yellow-300 lg:text-xl">Contacto</h3>
            <p class="sm:text-3xl lg:text-sm">Fernando peña</p>
            <p class="sm:text-3xl lg:text-sm">+(978)745-8848</p>
          </div>

        </div>
      </div>
      <div class="border-t border-gray-700 pt-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-400 sm:text-xl lg:text-sm">&copy; 2024 Fernando peña. Todos los derechos reservados.</p>
          <a href="#header" class="mt-4 md:mt-0 lg:text-xl text-gray-400 hover:text-gray-200 sm:text-3xl">Volver Arriba</a>
        </div>
      </div>
    </div>
  </footer>

  <!--
        <header>
            <div class="container flex h-full ls:flex-col">
                <div id="cont-link">
                    <a id="link1" href="aserca_D.php">About me</a>
                    <a id="link" href="proyectos.php">Projects</a>
                    <a id="link" href="contactos.php">contact</a>
                </div>
                <div class="flex justify-center items-center">
                    <div id="precentacion" class="h-60">
                        <span>hello</span>
                        <p>my name is Zadiel salas.</p>
                    </div>
                </div>
            </div>
        </header>
    -->
  <script src="../assets/js/ANI.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>

</html>