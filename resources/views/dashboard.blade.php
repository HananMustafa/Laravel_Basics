<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="formbg">
        <h2>Welcome to the Dashboard!</h2>
        
        <!-- Add Customer Button -->
        <a href="{{ route('add.customer.form') }}">
            <button type="button" class="btn-submit">Add Customer</button>
        </a>

        <!-- Display customers as cards -->
        @if($customers->isEmpty())
            <p>No customers found.</p>
        @else
            @foreach($customers as $customer)
                <div class="card">
                    <h3>{{ $customer->Name }}</h3>
                    <p><strong>Address:</strong> {{ $customer->Address }}</p>
                    <p><strong>Age:</strong> {{ $customer->Age }}</p>

                    <!-- Edit Icon -->
                    <a href="{{ route('edit.customer', $customer->id) }}" class="edit-icon">✏️</a>

                    <!-- Delete Icon -->
                    <form action="{{ route('delete.customer', $customer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-icon" onclick="return confirm('Are you sure you want to delete this customer?');">🗑️</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
