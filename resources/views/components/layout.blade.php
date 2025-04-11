<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makkasar Sticker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <header class="bg-[#0A3D62] text-white py-4 px-4 md:px-8" x-data="{ open: false }">
        <div class="mx-auto flex items-center justify-between">
            <div class="text-2xl font-bold">
                Makkasar <span class="text-[#FDCB58]">Sticker</span>
            </div>
            <button class="md:hidden focus:outline-none" @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="hidden md:flex items-center gap-14">
                <nav class="flex gap-14 text-sm font-semibold">
                    <a href="{{ url('/') }}" class="hover:text-[#FDCB58]">Beranda</a>
                    <a href="{{ url('/galeri') }}" class="hover:text-[#FDCB58]">Galeri Produk</a>
                    <a href="#" class="hover:text-[#FDCB58]">Layanan</a>
                    <a href="#" class="hover:text-[#FDCB58]">Pemesanan</a>
                    <a href="#" class="hover:text-[#FDCB58]">Kontak</a>
                    <a href="#" class="hover:text-[#FDCB58]">Lacak Pesanan</a>
                </nav>
                <a href="#" class="bg-[#FDCB58] text-black font-semibold px-6 py-1.5 rounded-full hover:opacity-90">
                    MASUK
                </a>
            </div>
        </div>
        <div x-show="open" class="md:hidden mt-4 space-y-4 text-sm font-semibold px-4">
            <a href="{{ url('/') }}" class="block hover:text-[#FDCB58]">Beranda</a>
            <a href="{{ url('/galeri') }}" class="hover:text-[#FDCB58]">Galeri Produk</a>
            <a href="#" class="block hover:text-[#FDCB58]">Layanan</a>
            <a href="#" class="block hover:text-[#FDCB58]">Pemesanan</a>
            <a href="#" class="block hover:text-[#FDCB58]">Kontak</a>
            <a href="#" class="block hover:text-[#FDCB58]">Lacak Pesanan</a>
            <a href="#" class="block bg-[#FDCB58] text-black font-semibold px-4 py-2 rounded-full w-fit">
                MASUK
            </a>
        </div>
    </header>
    
    <main class="flex-grow">
        {{ $slot }}
    </main>
    
    <footer class="bg-[#2C3E50] text-white text-sm text-center py-4">
        <p class="opacity-70">
            &copy; 2025 Makkasau Stiker. Semua hak dilindungi
        </p>
    </footer>

<script src="https://unpkg.com/alpinejs" defer></script>
</body>
</html>