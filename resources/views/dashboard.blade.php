<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 8px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .card h3 {
            margin: 0;
            font-size: 24px;
        }
        .card p {
            margin: 4px 0;
        }
        .delete-icon {
            position: absolute;
            top: 16px;
            right: 16px;
            cursor: pointer;
            color: red;
        }
    </style>
</head>
<body>
    <h2>Welcome to the Dashboard!</h2>
    <p>You are logged in successfully.</p>
    
    <!-- Add Customer Button -->
    <a href="{{ route('add.customer.form') }}">
        <button type="button">Add Customer</button>
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
                
                <!-- Delete Icon -->
                <form action="{{ route('delete.customer', $customer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-icon" onclick="return confirm('Are you sure you want to delete this customer?');">🗑️</button>
                </form>
            </div>
        @endforeach
    @endif
</body>
</html>
