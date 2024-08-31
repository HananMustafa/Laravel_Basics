<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="formbg">
        <h2>Login</h2>

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn-submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
