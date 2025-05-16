<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 px-4 bg-gray-900">
            <h1 class="text-xl font-semibold text-white">E-Library Admin</h1>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-700 rounded-md">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('books.create') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-plus mr-3"></i>
                    Add Book
                </a>
                <a href="{{ route('books.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-book mr-3"></i>
                    Books
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-users mr-3"></i>
                    User
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
                <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white mt-8">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </div>
    </div>
</div>