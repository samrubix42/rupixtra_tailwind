<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $defaultSeoTitle = setting('seo_title', config('app.name'));
        $defaultSeoDescription = setting('seo_description');
        $defaultSeoKeywords = setting('seo_keywords');

        $sectionTitle = trim($__env->yieldContent('meta_title'));
        $sectionDescription = trim($__env->yieldContent('meta_description'));
        $sectionKeywords = trim($__env->yieldContent('meta_keywords'));

        $pageTitle = $sectionTitle !== ''
            ? $sectionTitle
            : ($title ?? $defaultSeoTitle);

        $pageDescription = $sectionDescription !== ''
            ? $sectionDescription
            : $defaultSeoDescription;

        $pageKeywords = $sectionKeywords !== ''
            ? $sectionKeywords
            : $defaultSeoKeywords;

        $faviconPath = setting('site_favicon');
    @endphp

    <title>{{ $pageTitle }}</title>
    @if(!empty($pageDescription))
        <meta name="description" content="{{ $pageDescription }}">
    @endif
    @if(!empty($pageKeywords))
        <meta name="keywords" content="{{ $pageKeywords }}">
    @endif

    @if(!empty($faviconPath))
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $faviconPath) }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . $faviconPath) }}">
    @else
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css"
        rel="stylesheet" /> @livewireStyles
</head>

<body>
    <div>
        <livewire:public.includes.header />
        <main class="bg-cyan">
            {{ $slot }}
        </main>
        <livewire:public.includes.footer />
    </div>
    <!-- Floating contact buttons: phone and WhatsApp from settings -->
    @php
        $sitePhone = setting('phone_number', '+1234567890');
        $siteWhatsApp = setting('whatsapp_number', '+1234567890');
        $waMessage = setting('whatsapp_message', 'Hi, I would like to know more about your services.');

        // Normalize numbers for tel and wa.me (remove spaces, parentheses, dashes)
        $telNumber = preg_replace('/[^0-9+]/', '', $sitePhone);
        $waNumber = preg_replace('/[^0-9+]/', '', $siteWhatsApp);
        $waText = urlencode($waMessage);
    @endphp

    <div class="floating-contact fixed right-4 bottom-6 flex flex-col gap-3 z-50">
        <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank" rel="noopener noreferrer" aria-label="Contact on WhatsApp" title="WhatsApp"
            class="w-14 h-14 rounded-full flex items-center justify-center bg-primary text-white shadow-lg hover:scale-110 transform transition-transform duration-150">
            <i class="ri-whatsapp-fill text-3xl"></i>
        </a>

        <a href="tel:{{ $telNumber }}" aria-label="Call us" title="Call"
            class="w-14 h-14 rounded-full flex items-center justify-center bg-primary text-white shadow-lg hover:scale-110 transform transition-transform duration-150">
            <i class="ri-phone-fill text-3xl"></i>
        </a>
    </div>

    @livewireScripts
</body>

</html>