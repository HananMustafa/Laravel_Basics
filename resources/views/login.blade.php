<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
