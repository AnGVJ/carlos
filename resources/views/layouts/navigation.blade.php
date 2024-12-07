<nav x-data="{ open: false }" class="bgl border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center" style="margin-left: -90px;">
                <a href="{{ route('dashboard') }}">
    <img src="{{ asset('images/logoseinco.png') }}" alt="Logo" class="h-9 w-auto" style="margin-left: -40px;">
</a>

</div>



                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
        {{ __('INICIO') }}
    </x-nav-link>
</div>

            </div>

            <!-- Settings Dropdown with Search and Icons -->
            <div class="hidden sm:flex sm:items-center" >
                <!-- Search Form -->
                <form class="relative" style="margin-right:120px;">
    <input type="text" placeholder="Buscar..." 
        style="width: 300px;height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 10px;" 
        class="text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <button type="submit" 
        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
        <i style="margin-top:0px; margin-right:10px;" class="bi bi-search tex-white"></i>
    </button>
</form>


                <!-- Notification Icon -->
<button class="relative text-white hover:text-gray-800 focus:outline-none" style="margin-right:50px">
    <i class="bi bi-bell text-xl"></i>
    <span id="notification-count" class="absolute -top-1 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5">3</span>
</button>

<!-- Cloud Icon -->
<button class="text-white hover:text-gray-800 focus:outline-none" style="margin-right: 50px;">
    <i class="bi bi-cloud text-xl text-white"></i>
</button>


                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const notificationCount = document.getElementById('notification-count');
        const notificationIcon = document.querySelector('.bi-bell');

        notificationIcon.addEventListener('click', () => {
            notificationCount.textContent = '0'; // Reset notifications
        });
    });
</script>


<div class="sidebar d-flex flex-column position-fixed pl-0 pt-0" style="width: 250px; ">
    <ul class="nav nav-pills flex-column mt-3">
        <!-- Encabezado de navegación -->
        <li class="nav-item" >
            <a href="#" class="nav-link d-flex align-items-center" style="font-weight: bold;">
                <img src="images/hogar.png" alt="Inicio" style="width: 25px; height: 25px; margin-right: 10px;">
             
                <span>Inicio</span>
                

            </a>

        </li>
        <li class="nav-item">
            <a href="{{ route('proyectos.index') }}" class="nav-link">
                <img src="images/proyectos.png" alt="Proyectos" style="width: 25px; height: 25px; margin-right: 10px;">
                Proyectos
                <x-dropdown-link :href="route('Inicio.inici')"></x-dropdown-link>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('materiales.index') }}" class="nav-link">
                <img src="images/inventario.png" alt="Materiales"
                    style="width: 25px; height: 25px; margin-right: 10px;">

                Inventario

            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('proceso') }}" class="nav-link">
                <img src="images/proceso.png" alt="Materiales"
                    style="width: 25px; height: 25px; margin-right: 10px;">

                Procesos

            </a>
        </li>
       
        <li class="nav-item">
            <a href="#" class="nav-link">
                <img src="images/reportes.png" alt="Reportes" style="width: 25px; height: 25px; margin-right: 10px;">
                Reportes
            </a>
        </li>

        <!-- Encabezado de soporte -->
        <li class="nav-item mt-4">
            <h1  class="fia" style="text-align:center; font-size: 0.9em; color: rgba(255, 255, 255, 0.442); margin-bottom: 25px; ">Soporte</h1>
        </li>



        <li class="nav-item">
            <a href="#" class="nav-link">
                <img src="images/ajuste.png" alt="Ajustes" style="width: 20px; height: 25px; margin-right: 25px;">
                Ajustes
            </a>
        </li>
    </ul>
</div>

