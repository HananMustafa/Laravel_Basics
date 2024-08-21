<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
</head>
<body>
    <h2>Signup Form</h2>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('signup.process') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
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
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <div>
            <button type="submit">Signup</button>
        </div>
    </form>
</body>
</html>
