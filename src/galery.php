<?php
include("config.php");
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>DELFINESPARK.COM</title>
  <?php include("linking.php") ?>
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


  <nav class="bg-blue-800 fixed z-10 text-white p-4 w-full sm:flex sm:justify-center sm:items-center sm:flex-col">
    <div class="container mx-auto sm:flex sm:items-center flex justify-between items-center">
      <!-- Logo -->
      <div class="text-lg font-bold text-yellow-300 sm:text-2xl">JUAN DOLIO</div>

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
        <a href="galery.php" onclick="window.location.href='main.php'; return false;" class="hover:text-yellow-300 cursor-pointer">Home</a>
        <a href="#footer" class="hover:text-yellow-300">Contact</a>
        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
          <a href="dashboard.php" class="md:text-1xl block px-4 py-2 bg-yellow-300 text-blue-800 rounded-lg hover:bg-yellow-400">You are an Administrator</a>
        <?php } ?>
      </div>
    </div>

    <!-- Responsive Menu (hidden by default, shown when toggled) -->
    <div id="responsive-menu" class="lg:hidden hidden sm:w-full p-10">
      <a href="main.php" class="md:text-2xl block px-4 py-2 hover:bg-gray-700 cursor-pointer">Home</a>
      <a href="#footer" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Contact</a>
      <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
        <a onclick="window.location.href='dashboard.php'; return false;" class="md:text-2xl block px-4 py-2 bg-yellow-300 text-blue-800 rounded-lg hover:bg-yellow-400">You are an Administrator</a>
      <?php } ?>
    </div>
  </nav>

  <header id="header" class="flex justify-center items-center mb-20 h-80 bg-gradient-to-r from-green-500 to-blue-600 text-white">
    <div class="container mx-auto text-center px-4">
      <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">Real Estate Gallery</h1>
      <p class="text-xl font-light">Explore our collection of stunning properties</p>
    </div>
  </header>



  <main class="flex flex-col min-h-screen">

    <div class="container mx-auto">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-28">
        <?php
        $sql = "SELECT * FROM imagenes";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) < 1) {
        ?>

          <h3 id="aviso" class="text-1xl">we don't any images available.</h3>

          <?php
        } else {
          while ($row = mysqli_fetch_array($result)) {
            $nameimag = $row["Name"];
            $url = "../assets/imgbasedata/" . $nameimag;
          ?>
            <div class=" bg-slate-200 p-6 rounded-lg shadow-md hover:shadow-xl transform transition duration-300 ease-in-out">
              <img src="<?= $url ?>" alt="Imagen <?= $row['ID'] ?>" class="object-cover w-full h-48 rounded-t-lg">
              <div class="p-4">
                <!--
            <h5 class="text-1xl font-bold tracking-tight text-gray-900 dark:text-white mb-2"><?= $row["Name"] ?></h5>
            -->
                <p class="text-gray-700 dark:text-gray-400 mb-4 text-xl"><?= $row["Description"] ?></p>
              </div>
            </div>
        <?php
          }
        }
        ?>

      </div>

    </div>
  </main>

  <footer id="footer" class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap justify-between items-center mb-8">
        <div class="w-full md:w-1/3 mb-6 md:mb-0">
          <img src="../assets/images/product-1-720x480" alt="Logo" class="w-full h-full">
        </div>

        <div class="w-full md:w-52 mb-6 md:mb-0">
          <h3 class="text-xl font-semibold mb-4 text-yellow-300">Navegación</h3>
          <ul>
            <li class="mb-2"><a href="#header" class="hover:text-gray-400">Home</a></li>
            <li class="mb-2"><a href="#about" class="hover:text-gray-400">About</a></li>
            <li class="mb-2"><a href="#administrators" class="hover:text-gray-400">Administradores</a></li>
          </ul>
        </div>

        <div class="w-full md:w-1/3">
          <h3 class="text-xl font-semibold mb-4 text-yellow-300">Contacto</h3>
          <p class="text-gray-400">Fernando peña</p>
          <p class="text-gray-400">+(978)745-8848</p>
        </div>
      </div>
      <div class="border-t border-gray-700 pt-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-400">&copy; 2024 Fernando peña. Todos los derechos reservados.</p>
          <a href="#header" class="mt-4 md:mt-0 text-gray-400 hover:text-gray-200">Volver Arriba</a>
        </div>
      </div>
    </div>
  </footer>
  <a href="#header" class="floating-btn fixed bottom-10 right-10 bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
    Back to Top
  </a>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="../assets/js/ANI.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>

</html>