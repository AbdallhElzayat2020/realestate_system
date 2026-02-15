<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dashboard/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS (LTR) -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />



    <style>
        html {
            direction: ltr !important;
        }

        /* Summernote dropdown fixes - high z-index for navbar/fixed layout */
        .note-dropdown-menu {
            z-index: 99999 !important;
            position: absolute !important;
        }

        .note-popover {
            z-index: 99998 !important;
        }

        .note-modal {
            z-index: 99999 !important;
        }

        .note-editor.note-frame {
            z-index: 1 !important;
        }

        .note-dropdown-menu .dropdown-item {
            padding: 0.35rem 1rem;
            font-size: 0.875rem;
        }

        .note-dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Fix for Bootstrap 5 compatibility */
        .note-btn-group .dropdown-toggle::after {
            display: inline-block;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
        }

        .note-dropdown-menu.open {
            display: block !important;
        }

        .note-btn-group.open .note-dropdown-menu {
            display: block !important;
        }

        /* Products form - allow Summernote dropdown to show */
        .content-wrapper-overflow-visible {
            overflow: visible !important;
        }

        .products-form-card .card-body,
        .services-form-card .card-body,
        .blog-form-card .card-body {
            overflow: visible !important;
        }

        /* Summernote editor container - allow dropdown to show */
        .note-editor.note-frame {
            overflow: visible !important;
        }
    </style>
    @stack('css')
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/css/pages/cards-advance.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/dashboard/assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/dashboard/assets/js/config.js') }}"></script>

    {{-- summernote Plugine --}}
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
</head>
