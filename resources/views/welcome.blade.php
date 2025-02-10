<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to TalentHunt</h1>
        <div class="mt-4">
            <a href="{{ route('register') }}" class="btn btn-dark me-2">Register</a>
            <a href="{{ route('login') }}" class="btn btn-success">Login</a>
        </div>
    </div>
</body>
</html>
