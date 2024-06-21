<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="stylesheet" href="./output.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-clouds">
	<div class="w-full h-screen flex justify-center items-center">
		<form action="validateLogin.php" method="POST" class="bg-slate-100 p-8 rounded-xl shadow-lg max-w-md w-3/5 text-black font-mono transform transition-all hover:scale-105">
			<h1 class="text-3xl font-bold text-blue-700 mb-6 text-center hover:text-yellow-300 transition duration-200 ease-in-out">
				Sign In
			</h1>
			<div class="mb-5">
				<label for="username" class="cursor-pointer text-md block mb-2 text-blue-700 hover:text-yellow-300 transition duration-200 ease-in-out">Username</label>
				<input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition duration-200 ease-in-out" placeholder="Username" required />
			</div>
			<div class="mb-5">
				<label for="password" class="text-md block mb-2 text-blue-700 hover:text-yellow-300 transition duration-200 ease-in-out cursor-pointer">Password</label>
				<input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 transition duration-200 ease-in-out" placeholder="Password" required />
			</div>
			<div class="w-full flex items-center gap-10 h-20">
				<button type="submit" class="w-40 text-white bg-blue-700 hover:bg-yellow-300 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-200 ease-in-out transform hover:scale-105">
					Sign In
				</button>

				<a href="SignUp.php" class="text-xl cursor-pointer flex justify-center items-center text-blue-700 hover:text-yellow-300 transition duration-200 ease-in-out">
					Sign Up
				</a>
			</div>
		</form>
	</div>
</body>

</html>