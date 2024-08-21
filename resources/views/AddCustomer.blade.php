<!-- resources/views/addCustomer.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <h2>Add a New Customer</h2>
    <form action="{{ route('add.customer') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <button type="submit">Add Customer</button>
    </form>
</body>
</html>
