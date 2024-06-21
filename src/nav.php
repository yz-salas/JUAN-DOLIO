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
    <div class="text-lg font-bold text-yellow-300 sm:text-2xl">My Site</div>

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
      <a href="galery.php" class="hover:text-yellow-300">Gallery</a>
      <a href="#administrators" class="hover:text-yellow-300">Administrators</a>
      <a href="#footer" class="hover:text-yellow-300">Contact</a>
      <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
        <a href="./src/dashboard.php" class="md:text-1xl block px-4 py-2 bg-yellow-300 text-blue-800 rounded-lg hover:bg-yellow-400">Eres Administrador</a>
      <?php } ?>
    </div>
  </div>

  <!-- Responsive Menu (hidden by default, shown when toggled) -->
  <div id="responsive-menu" class="lg:hidden hidden sm:w-full p-10">
    <a href="#header" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Home</a>
    <a href="#about" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">About</a>
    <a href="./src/galery.php" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Gallery</a>
    <a href="#administrators" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Administrators</a>
    <a href="#footer" class="md:text-2xl block px-4 py-2 hover:bg-gray-700">Contact</a>
    <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
      <a href="./src/dashboard.php" class="md:text-2xl block px-4 py-2 bg-yellow-300 text-blue-800 rounded-lg hover:bg-yellow-400">Eres Administrador</a>
    <?php } ?>
  </div>
</nav>