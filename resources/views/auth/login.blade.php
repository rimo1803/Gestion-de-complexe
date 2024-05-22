<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to OFPPT Espace de Formateur et Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: -webkit-linear-gradient(left, #4eaf6e, #2a2ac3);
            background: linear-gradient(to right, #4eaf6e, #2a2ac3);
        }

        .container {
            background-image: url('images/Computer_login_rafiki.png'); /* Remplacer l'URL par le chemin de votre image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8); /* Couleur de fond transparente */
        }
    </style>
</head>

<body>
    <div class="container mx-auto mt-5 flex justify-center items-center min-h-screen">
        <div class="flex bg-white rounded-lg shadow-lg w-full max-w-4xl form-container">
            <div class="w-full md:w-1/2 p-8">
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold">Bienvenue dans  OFPPT Espace des Formateurs et Administration</h1>
                </div>
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block">Email</label>
                        <input id="email" type="email" class="form-input w-full px-3 py-2 border rounded-md" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div>
                        <label for="password" class="block">Password</label>
                        <input id="password" type="password" class="form-input w-full px-3 py-2 border rounded-md" name="password" required>
                    </div>

                    <div class="flex items-center">
                        <input class="form-checkbox" type="checkbox" name="remember" id="remember">
                        <label class="ml-2" for="remember">Remember Me</label>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <div class="hidden md:block md:w-1/2">
                <img src="{{ asset('images/Computer login-rafiki (1).png') }}" >
            </div>
        </div>
    </div>
</body>

</html>
