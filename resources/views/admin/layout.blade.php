<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin | Makkasau Sticker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F8FAFC] flex min-h-screen">
    <aside class="w-64 bg-[#0A3D62] text-white flex flex-col justify-between py-6 px-4">
        <div>
            <h1 class="text-2xl font-bold mb-10"><span class="text-white">Makkasau</span> <span
                    class="text-[#FDCB58]">Sticker</span></h1>
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div
                        class="bg-yellow-400 text-black w-8 h-8 rounded-full flex items-center justify-center font-bold">
                        A</div>
                    <div>
                        <p class="text-sm font-semibold">Admin</p>
                        <p class="text-xs opacity-70">Administrator</p>
                    </div>
                </div>
            </div>
            <nav class="space-y-2 text-sm font-medium">
                <a href="#" class="flex items-center gap-2 px-3 py-2 bg-white text-[#0A3D62] rounded-md">🛒
                    Manajemen Pesanan</a>
                <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-[#FDCB58]/30 rounded-md">📁 Galeri
                    Produk</a>
            </nav>
        </div>
        <div class="text-xs text-white/70 mt-10">
            &copy; 2025 Makkasau Stiker
        </div>
    </aside>
    <div class="flex-1 flex flex-col">
        <header class="bg-[#0A3D62] text-white flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-2">
                <div class="bg-white/20 p-2 rounded text-white">
                    🛒
                </div>
                <h2 class="text-lg font-bold">Manajemen Pesanan</h2>
            </div>
            <div class="flex items-center gap-6">
                <form action="{{ route('admin.orders') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..."
                        class="pl-8 pr-4 py-2 rounded-full bg-white/20 text-white placeholder-white text-sm focus:outline-none focus:ring focus:ring-white/30">
                    <span class="absolute left-2 top-2.5 text-white text-sm">🔍</span>
                </form>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 hover:text-red-700">
                        Keluar
                    </button>
                </form>
            </div>
        </header>
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
