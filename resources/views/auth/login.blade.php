<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: rgb(2,0,36);
    background: linear-gradient(70deg, rgba(2,0,36,1) 0%, rgba(9,45,121,1) 51%, rgba(0,212,255,1) 100%);

        }
        .left img{
            margin-left: 100px;
            margin-bottom: 100px;
            float: left;
            width: 600px;
            height: 500px;
        }

        .container {
            max-width: 350px;
            height: 3px;
            margin: 0 auto;
            margin-top: 150px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-right: 200px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }


        .form-control {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 90%;
        }

        .btn-primary {
            display: block;
            align-items: center;
            width: 60%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            margin-left: 60px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        </style>
</head>
<body>
    <div class="left">
        <img src="{{ asset('images/Secure login-rafiki.png') }}" alt="Texte alternatif">
    </div>

    <div class="container mt-5">
        <h1>Authentification</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label><br><br>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label><br><br>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Intégration de Bootstrap JS (optionnel, pour les fonctionnalités avancées de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
