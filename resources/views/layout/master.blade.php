@php
    $url = request()->path();
    $pageTitle = 'Main Street Finance Group LLC';

    if (str_contains($url, 'submit')) {
        $pageTitle = 'APP MSFG - Congrats - Pre-Approved';
    } elseif (str_contains($url, 'form')) {
        $pageTitle = 'APP MSFG - Pre-Qualification';
    } elseif (str_contains($url, 'applynow')) {
        $pageTitle = 'APP MSFG - Pre-Approved';
    }elseif (str_contains($url, 'form-submit')) {
        $pageTitle = 'APP MSFG - Thank You';
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! printHtmlAttributes('html') !!}>
<!--begin::Head-->
<head>
    <base href=""/>
    <title>{{ $pageTitle }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>
	<meta property="og:description" content="Apply Now"/>
	<meta property="og:url" content="https://app.msfg.finance/"/>
	<meta property="og:image" content="https://app.msfg.finance/storage/app/logo/logo-1200x630.svg"/>
    <link rel="canonical" href="{{ url()->current() }}"/>
	

    {!! includeFavicon() !!}

    <!--begin::Fonts-->
    {!! includeFonts() !!}
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    @foreach(getGlobalAssets('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Vendor Stylesheets(used by this page)-->
    @foreach(getVendors('css') as $path)
        {!! sprintf('<link rel="preload"  href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Vendor Stylesheets-->

    <!--begin::Custom Stylesheets(optional)-->
    @foreach(getCustomCss() as $path)
        {!! sprintf('<link rel="preload" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Custom Stylesheets-->

    @livewireStyles

<?php //print_r(session()->all());?>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WVPCLSL3');</script>
<!-- End Google Tag Manager -->
 
</head>
<!--end::Head-->

<!--begin::Body-->
<body {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVPCLSL3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('partials/theme-mode/_init')

@yield('content')

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
@foreach(getGlobalAssets() as $path)
    {!! sprintf('<script src="%s"></script>', asset($path)) !!}
@endforeach
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used by this page)-->
@foreach(getVendors('js') as $path)
    {!! sprintf('<script src="%s"></script>', asset($path)) !!}
@endforeach
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(optional)-->
@foreach(getCustomJs() as $path)
    {!! sprintf('<script src="%s"></script>', asset($path)) !!}
@endforeach
<!--end::Custom Javascript-->
@stack('scripts')
<!--end::Javascript-->

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('success', (message) => {
            toastr.success(message);
        });
        Livewire.on('error', (message) => {
            toastr.error(message);
        });

        Livewire.on('swal', (message, icon, confirmButtonText) => {
            if (typeof icon === 'undefined') {
                icon = 'success';
            }
            if (typeof confirmButtonText === 'undefined') {
                confirmButtonText = 'Ok, got it!';
            }
            Swal.fire({
                text: message,
                icon: icon,
                buttonsStyling: false,
                confirmButtonText: confirmButtonText,
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        });
    });
</script>

@livewireScripts
</body>
<!--end::Body-->
<!-- @yield('bottom') -->

</html>
