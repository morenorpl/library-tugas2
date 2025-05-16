<header class="flex items-center justify-between px-6 py-4 bg-white border-b">
    <div class="flex items-center">
        <button class="text-gray-500 md:hidden" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="ml-2 text-xl font-semibold text-gray-800">Dashboard</h2>
    </div>
    <div class="flex items-center">
        <div class="relative">
            <input type="text" placeholder="Cari buku..." class="px-4 py-2 text-sm border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="absolute right-0 top-0 h-full px-4 text-gray-500">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="ml-4 relative">
            <button class="flex items-center text-gray-500 focus:outline-none">
                <img class="w-8 h-8 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin">
                <span class="ml-2 text-sm font-medium text-gray-700 hidden md:inline-block">Admin</span>
            </button>
        </div>
    </div>
</header>