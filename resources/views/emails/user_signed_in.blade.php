<!DOCTYPE html>
<html>
<head>
    <title>New User Registration</title>
</head>
<body>
    <h1>New User Registration</h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Date & Time:</strong> {{ $dateTime }}</p>
    @if(isset($data['photo']))
        <p><strong>Photo:</strong></p>
        <img src="{{ asset('storage/' . $data['photo']) }}" alt="User Photo" style="max-width: 200px;">
    @endif
</body>
</html>
