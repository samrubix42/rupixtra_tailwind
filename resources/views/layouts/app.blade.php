<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <div>
        <livewire:public.includes.header />
        <main class="bg-cyan">
            {{ $slot }}
        </main>
        <livewire:public.includes.footer />
    </div>
    <!-- Floating contact buttons: replace phone/wa numbers with real values -->
    <div class="floating-contact fixed right-4 bottom-6 flex flex-col gap-3 z-50">
        <a href="https://wa.me/1234567890" target="_blank" rel="noopener noreferrer" aria-label="Contact on WhatsApp" title="WhatsApp"
           class="w-14 h-14 rounded-full flex items-center justify-center bg-primary text-white shadow-lg hover:scale-110 transform transition-transform duration-150">
            <i class="ri-whatsapp-fill text-3xl"></i>
        </a>

          <a href="tel:+1234567890" aria-label="Call us" title="Call"
              class="w-14 h-14 rounded-full flex items-center justify-center bg-primary text-white shadow-lg hover:scale-110 transform transition-transform duration-150">
            <i class="ri-phone-fill text-3xl"></i>
        </a>
    </div>

    @livewireScripts
</body>

</html>