<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100" style="  background: rgb(2,0,36);
background: linear-gradient(70deg, rgba(2,0,36,1) 0%, rgba(9,45,121,1) 51%, rgba(0,212,255,1) 100%);
">

    <div class="container mx-auto mt-5">
        <div class="w-96 mx-auto bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold">Login</h1>
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
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
