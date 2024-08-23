<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>


    <div class="formbg">
        <h2>Update Customer</h2>
        <form action="{{ route('update.customer', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $customer->Name) }}" required>
            </div>
            
            <div class="field">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ old('address', $customer->Address) }}" required>
            </div>
            
            <div class="field">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="{{ old('age', $customer->Age) }}" required>
            </div>
            
            

            <button type="submit" class="btn-submit">Update Customer</button>
        </form>
    </div>
</body>
</html>
