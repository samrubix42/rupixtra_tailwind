<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div x-data="{ sidebarOpen:false }" class="flex h-screen bg-gray-100">

        <livewire:admin.include.sidebar />

        <div class="flex flex-col flex-1">
            <livewire:admin.include.header />

            <main class="flex-1 p-6 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>

    </div>
    @include('livewire.admin.include.toast')

    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    @livewireScripts
</body>

</html>