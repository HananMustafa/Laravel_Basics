<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard!</h2>
    <p>You are logged in successfully.</p>
    
    <!-- Add Customer Button -->
    <a href="{{ route('add.customer.form') }}">
        <button type="button">Add Customer</button>
    </a>
</body>
</html>
