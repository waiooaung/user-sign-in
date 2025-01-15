<!DOCTYPE html>
<html>
<head>
    <title>User Signed Up</title>
    <style>
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .blink {
            animation: blink 1s infinite;
        }
    </style>
</head>
<body>
    <h1>User Signed Up</h1>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Date & Time:</strong> {{ $dateTime }}</p>
    @if(isset($data['photo']))
        <p><strong>Photo:</strong> <a href="{{ asset('storage/' . $data['photo']) }}" class="blink" target="_blank">Click here to view the photo</a></p>
    @endif
    @if(!empty($data->photo))
        <p><strong>Photo:</strong> Attached</p>
    @endif
</body>
</html>

