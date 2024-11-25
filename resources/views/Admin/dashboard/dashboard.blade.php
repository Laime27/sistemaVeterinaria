<!DOCTYPE html>
<html lang="es" >

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
   
    {{-- 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> --}}
    
    <meta name="csrf-token" content="{{ csrf_token() }}">



    @vite('resources/css/app.css')

  
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js" defer></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    
</head>

<body class="dark">


    <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">

        <a class="sr-only" href="#main-content">skip to the main content</a>

        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-neutral-950/10 backdrop-blur-sm md:hidden"
            aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

        @include('Admin.dashboard.slidebar')

        <div class="h-svh w-full overflow-y-auto bg-white dark:bg-neutral-950">
         
            @include('Admin.dashboard.header')

            <div id="main-content" class="p-4">
                <div class="overflow-y-auto text-white">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
