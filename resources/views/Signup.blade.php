<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="formbg">
        <h2>Signup Form</h2>

        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <form action="{{ route('signup.process') }}" method="POST">
            @csrf
            <div class="field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <div>
                <button type="submit" class="btn-submit">Signup</button>
            </div>
        </form>
    </div>
</body>
</html>
