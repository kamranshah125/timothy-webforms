<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Form Wizard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    <main class="py-10">
        <div class="max-w-3xl mx-auto bg-white shadow p-6 rounded">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>
</html>
