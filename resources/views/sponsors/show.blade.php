<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $event->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/all.css'])
</head>
<body>
    
</body>
</html>