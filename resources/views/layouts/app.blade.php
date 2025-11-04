<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE NI FORD </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #000;
            background-image: radial-gradient(circle at 20% 20%, rgba(255,0,0,0.15), transparent 50%), 
                              radial-gradient(circle at 80% 80%, rgba(255,0,0,0.1), transparent 50%);
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .glow-text {
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
        }

        .movie-card {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .movie-card:hover {
            transform: scale(1.08);
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
        }

        .navbar {
            background: linear-gradient(90deg, #141414, #1f1f1f);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <header class="navbar text-red-600 p-4 shadow-lg">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-extrabold glow-text">MyNetflix</h1>
            <nav>
                <a href="{{ route('movies.index') }}" class="mr-6 hover:text-white transition">Home</a>
                <a href="{{ route('movies.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">Add Movie</a>
            </nav>
        </div>
    </header>

    <main class="flex-1 max-w-6xl mx-auto p-6">
        @yield('content')
    </main>

    <footer class="bg-[#141414] text-gray-500 text-center p-4 mt-auto border-t border-red-900/30">
        © {{ date('Y') }} <span class="text-red-600 font-bold">MyNetflix</span> 🎬
    </footer>
</body>
</html>
