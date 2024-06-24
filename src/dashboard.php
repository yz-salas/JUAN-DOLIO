<?php
include("config.php");
include("session_check.php");
if ($_SESSION["level"] != 1) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administración de Imágenes</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include SweetAlert from CDN for simplicity -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/sweetalert.js"></script>
    <?php include("linking.php") ?>
</head>

<body class="bg-gray-200">
    <!-- JavaScript to toggle sidebar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('menu-toggle').addEventListener('click', function() {
                var sidebar = document.getElementById('default-sidebar');
                sidebar.classList.toggle('-translate-x-full');
            });

            // Agregar evento para cerrar el sidebar en pantallas pequeñas
            document.getElementById('close-sidebar').addEventListener('click', function() {
                var sidebar = document.getElementById('default-sidebar');
                sidebar.classList.add('-translate-x-full');
            });
        });
    </script>

    <div class="flex flex-col md:flex-row">
        <button id="menu-toggle" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                <!-- Botón de cerrar (X) -->
                <button id="close-sidebar" type="button" class="text-gray-500 md:hidden focus:outline-none absolute top-2 right-2">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M13.414 6.586a2 2 0 1 0-2.828 2.828L10.586 10l-2.828 2.828a2 2 0 1 0 2.828 2.828L13.414 13.42l2.828 2.828a2 2 0 1 0 2.828-2.828L16.242 10l2.828-2.828a2 2 0 1 0-2.828-2.828L13.414 6.586z" clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Contenido del sidebar -->
                <div class="flex flex-col justify-between h-full">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a onclick="window.location.href='main.php'; return false;" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 11L12 2L21 11V20C21 20.552 20.552 21 20 21H16C15.448 21 15 20.552 15 20V15C15 14.448 14.552 14 14 14H10C9.448 14 9 14.448 9 15V20C9 20.552 8.552 21 8 21H4C3.448 21 3 20.552 3 20V11Z" />
                                </svg>
                                <span class="ml-3">Home</span>
                            </a>
                        </li>

                        <li>
                            <a onclick="window.location.href='galery.php'; return false;" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group cursor-pointer">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Gallery</span>
                            </a>
                        </li>
                    </ul>

                    <a href="cerrarseccion.php" class="flex items-center p-2 rounded-lg dark:text-white text-red-500 hover:text-red-600 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 group-hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
                    </a>

                </div>
            </div>
        </aside>


        <div id="container" class="flex-1 p-4 md:ml-64">
            <!-- Content -->
            <div class="flex items-center mb-8 p-5">
                <h1 class="text-3xl font-semibold text-blue-700">Image Administration Panel</h1>
            </div>

            <!-- Form to add image -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-10">
                <h2 class="text-xl font-semibold mb-4">Add New Image</h2>
                <form action="addimg.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="nameInput" class="block text-sm font-medium text-gray-700 mb-2">Add a description to the image</label>
                        <input id="nameInput" name="nameInput" type="text" class="block w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div class="mb-4">
                        <label for="fileInput" class="block text-sm font-medium text-gray-700 mb-2">Upload image</label>
                        <label for="fileInput" class="relative cursor-pointer bg-gray-200 rounded-lg p-6 border-2 border-gray-300 hover:border-gray-400 flex justify-center items-center w-full h-32">
                            <span class="block text-center text-gray-700">Select the image</span>
                            <input id="fileInput" name="fileInput" type="file" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer">
                        </label>
                    </div>
                    <button id="add" type="submit" name="btnsubmit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add Image</button>
                </form>
            </div>

            <!-- Table of images -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden overflow-y-scroll min-h-96">
                <h2 class="text-xl font-semibold p-6" id="nododepurar">Added Images</h2>
                <?php
                $sql = "SELECT * FROM imagenes";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) < 1) { ?>
                    <div id="content-aviso">
                        <div id="cont-aviso">
                            <h3 id="aviso">We don't have any images available.</h3>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left py-2 px-4">ID</th>
                                <th class="text-left py-2 px-4">Image</th>
                                <th class="text-left py-2 px-4">Name</th>
                                <th class="text-left py-2 px-4">Description</th>
                                <th class="text-left py-2 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM imagenes";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td class="py-2 px-4"><?= $row["ID"] ?></td>
                                        <td class="py-2 px-4">
                                            <img src="../assets/imgbasedata/<?= $row["Name"] ?>" alt="Imagen de ejemplo" class="h-12 object-cover rounded-md">
                                        </td>
                                        <td class="py-2 px-4"><?= $row["Name"]  ?></td>
                                        <td class="py-2 px-4"><?= $row["Description"]  ?></td>
                                        <td class="py-2 px-4">
                                            <a onclick="confirmarEliminacion(<?= $row['ID'] ?>, '<?= $row['Name'] ?>')" name="btndelete" class="text-red-500 hover:text-red-700 cursor-pointer">delete</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>