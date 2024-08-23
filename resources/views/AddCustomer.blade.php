<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="formbg">
        <h2>Add a New Customer</h2>
        <form action="{{ route('add.customer') }}" method="POST">
            @csrf

            <div class="field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="field">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>

            <div class="field">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>

            <button type="submit" class="btn-submit">Add Customer</button>
        </form>
    </div>
</body>
</html>
