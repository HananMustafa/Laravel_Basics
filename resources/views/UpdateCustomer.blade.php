<!-- resources/views/updateCustomer.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
</head>
<body>
    <h2>Update Customer</h2>
    <form action="{{ route('update.customer', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $customer->name }}" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $customer->address }}" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="{{ $customer->age }}" required><br><br>

        <button type="submit">Update Customer</button>
    </form>
</body>
</html>
