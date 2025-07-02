<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="icon" href="{{ asset('assets/logo-image.png') }}"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- CDN DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- CDN sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Siakad SMP 1 Atap Merangin</title>

    <style>
        body {
            font-family: "Roboto", sans-serif;
        }

        .active {
            background-color: #5DB9FF;
            color: white !important;
        }

        .drawer-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Animasi untuk sidebar yang keluar dari kiri ke kanan */
        .sidebar-enter {
            transform: translateX(-100%);
        }

        .sidebar-enter-active {
            transform: translateX(0);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-exit {
            transform: translateX(0);
        }

        .sidebar-exit-active {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        /* Style untuk drawer */
        .drawer {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background-color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .drawer.open {
            transform: translateX(0);
        }

        .drawer-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Drawer (Sidebar for mobile) -->
        @include('components.drawer')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('components.navbar')

            <!-- Content -->
            <div class="flex-1 py-5 px-4 lg:px-8 overflow-auto ">
                @yield('content')
            </div>

        </div>
    </div>

    <!-- Drawer Backdrop -->
    <div id="drawerBackdrop" class="drawer-backdrop hidden"></div>

    <script>
        // Sidebar Toggle
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarTitle = document.getElementById('sidebarTitle');
        const sidebarTexts = document.querySelectorAll('.sidebar-text');

        let isSidebarCollapsed = false;

        toggleSidebar?.addEventListener('click', () => {
            isSidebarCollapsed = !isSidebarCollapsed;

            if (isSidebarCollapsed) {
                sidebar.classList.remove('lg:w-64');
                sidebar.classList.add('lg:w-14');
                sidebarTitle.classList.add('hidden');
                sidebarTexts.forEach(text => text.classList.add('hidden'));
            } else {
                sidebar.classList.remove('lg:w-14');
                sidebar.classList.add('lg:w-64');
                sidebarTitle.classList.remove('hidden');
                sidebarTexts.forEach(text => text.classList.remove('hidden'));
            }
        });

        // Drawer Toggle
        const toggleDrawer = document.getElementById('toggleDrawer');
        const drawer = document.getElementById('drawer');
        const drawerBackdrop = document.getElementById('drawerBackdrop');
        const closeDrawer = document.getElementById('closeDrawer');

        toggleDrawer.addEventListener('click', () => {
            drawer.classList.add('open');
            drawerBackdrop.classList.remove('hidden');
        });

        closeDrawer.addEventListener('click', () => {
            drawer.classList.remove('open');
            drawerBackdrop.classList.add('hidden');
        });

        drawerBackdrop.addEventListener('click', () => {
            drawer.classList.remove('open');
            drawerBackdrop.classList.add('hidden');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
