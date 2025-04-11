<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-plat.jpg') }}');">
        <div class="absolute inset-0 bg-[#0A3D62]/80"></div>
        <div class="relative  mx-auto px-18 py-10 text-white">
            <p class="text-lg text-[#FDCB58] font-semibold mb-2">Selamat Datang</p>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                Temukan Plat Kendaraan <br>
                Custom untuk Setiap <br>
                Kebutuhan
            </h1>
            <p class="text-base md:text-lg text-gray-200 max-w-3xl">
                Makkasar Sticker menyediakan jasa pembuatan custom plat kendaraan premium dengan kualitas terbaik.
                Kami memiliki komitmen untuk memberikan layanan terbaik sejak tahun 2015.
            </p>
    
            <div class="mt-26 flex flex-wrap gap-24 justify-center">
                <a href="#tentang" class="bg-[#FDCB58] text-black font-semibold px-6 py-3 rounded-full hover:opacity-90 transition">
                    TENTANG KAMI
                </a>
                <a href="#kontak" class="border border-white text-white font-semibold px-6 py-3 rounded-full hover:bg-white hover:text-black transition">
                    HUBUNGI KAMI
                </a>
            </div>            
        </div>
    </section>

    <section class="bg-[#f8f9fa] py-8">
        <div class="max-w-xl mx-auto text-center px-4">
            <p class="text-[#FDCB58] font-semibold">STATUS PESANAN</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0A3D62]">Lacak Pesanan Anda</h2>
            <div class="w-16 h-1 bg-[#FDCB58] mx-auto mt-2 mb-6 rounded-full"></div>
            <p class="text-gray-600 mb-12">
                Masukkan ID pesanan anda untuk melihat status pemesanan produk custom plat kendaraan
            </p>
            <div class="bg-white shadow-md rounded-xl px-6 py-8">
                <input
                    type="text"
                    placeholder="Masukkan ID Pesanan (contoh: MS-2025xxxxxxx)"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md mb-6 text-sm focus:outline-none focus:ring-2 focus:ring-[#0A3D62]"
                />
                <button
                    class="w-full bg-[#0A3D62] text-white font-semibold py-3 rounded-md hover:opacity-90 transition">
                    CEK STATUS PESANAN
                </button>
            </div>
        </div>
    </section>
    

    <section class="bg-[#f8f9fa] py-20">
        <div class="max-w-7xl mx-auto px-14 text-center">
            <p class="text-[#FDCB58] font-semibold">HASIL KARYA KAMI</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0A3D62]">Galeri Produk</h2>
            <div class="w-16 h-1 bg-[#FDCB58] mx-auto mt-2 mb-6 rounded-full"></div>
            <p class="text-gray-600 mb-12 max-w-xl mx-auto">
                Temukan koleksi plat kendaraan kustom kami dengan material berkualitas tinggi
            </p>
            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('images/produk-1.jpg') }}" alt="Plat Vintage" class="w-full h-48 object-cover rounded-t-xl">
                    <div class="p-4 text-left">
                        <h3 class="text-[#0A3D62] font-bold text-lg mb-1">Custom Plat Mobil Vintage</h3>
                        <p class="text-sm text-gray-600">Plat mobil dengan design vintage dan klasik</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('images/produk-2.jpg') }}" alt="Plat Sport" class="w-full h-48 object-cover rounded-t-xl">
                    <div class="p-4 text-left">
                        <h3 class="text-[#0A3D62] font-bold text-lg mb-1">Custom Plat Mobil Sport</h3>
                        <p class="text-sm text-gray-600">Plat mobil dengan desain modern dan warna kontras</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset('images/produk-3.jpg') }}" alt="Plat Luxury" class="w-full h-48 object-cover rounded-t-xl">
                    <div class="p-4 text-left">
                        <h3 class="text-[#0A3D62] font-bold text-lg mb-1">Custom Plat Mobil Luxury</h3>
                        <p class="text-sm text-gray-600">Plat motor dengan design mewah dan font elegan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-14 text-center">
            <p class="text-[#FDCB58] font-semibold">Layanan</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0A3D62]">Layanan Custom Plat kendaraan</h2>
            <div class="w-16 h-1 bg-[#FDCB58] mx-auto mt-2 mb-6 rounded-full"></div>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
                Makkasau Stiker menawarkan pembuatan custom plat kendaraan berkualitas premium dengan berbagai pilihan
            </p>

            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2  md:grid-cols-3">
                <div class="bg-[#f8f9fa] rounded-xl p-8 shadow-md text-center">
                    <div class="mb-4">
                        <img src="{{ asset('images/icon-mobil.png') }}" alt="Plat Mobil" class="mx-auto w-16 h-16">
                    </div>
                    <h3 class="text-[#0A3D62] font-bold text-lg mb-2">Plat Mobil Custom</h3>
                    <p class="text-sm text-gray-600">
                        Pembuatan Custom plat nomor mobil dengan berbagai pilihan design, ukuran, dan material premium yang tahan lama.
                    </p>
                </div>
                <div class="bg-[#f8f9fa] rounded-xl p-8 shadow-md text-center">
                    <div class="mb-4">
                        <img src="{{ asset('images/icon-motor.png') }}" alt="Plat Motor" class="mx-auto w-16 h-16">
                    </div>
                    <h3 class="text-[#0A3D62] font-bold text-lg mb-2">Plat Motor Custom</h3>
                    <p class="text-sm text-gray-600">
                        Design dan cetak plat nomor motor custom dengan ukuran standar maupun khusus sesuai kebutuhan anda.
                    </p>
                </div>
                <div class="bg-[#f8f9fa] rounded-xl p-8 shadow-md text-center">
                    <div class="mb-4">
                        <img src="{{ asset('images/icon-desain.png') }}" alt="Custom Design" class="mx-auto w-16 h-16">
                    </div>
                    <h3 class="text-[#0A3D62] font-bold text-lg mb-2">Custom design</h3>
                    <p class="text-sm text-gray-600">
                        Layanan design custom plat kendaraan dengan pilihan font, warna, dan grafis sesuai keinginan pelanggan.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-[#FDCB58] font-semibold">Informasi</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-[#0A3D62]">Informasi Bisnis</h2>
            <div class="w-16 h-1 bg-[#FDCB58] mx-auto mt-2 mb-6 rounded-full"></div>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
                Temukan kami dan dapatkan layanan terbaik dari Makkasau Stiker
            </p>
            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-left">
                <div class="bg-[#f8f9fa] p-6 rounded-xl shadow-md w-[70%] max-w-[400px] mx-auto">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-[#FDCB58] p-2 rounded-full ">
                            <img src="{{ asset('images/icon-clock.png') }}" class="w-5 h-5" alt="Jam Icon">
                        </div>
                        <h3 class="text-[#0A3D62] font-bold text-xl">Jam Operasional</h3>
                    </div>
                    <ul class="text-sm text-[#0A3D62] divide-y divide-gray-300">
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Senin</span>
                            <span>09.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Selasa</span>
                            <span>09.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Rabu</span>
                            <span>09.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Kamis</span>
                            <span>09.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Jumat</span>
                            <span>09.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Sabtu</span>
                            <span>09.00 - 17.00</span>
                        </li>
                        <li class="flex justify-between py-4">
                            <span class="font-bold">Minggu</span>
                            <span>09.00 - 12.00</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-[#f8f9fa] p-6 rounded-xl shadow-md w-[85%] max-w-[400px] mx-auto">
                    <div class="flex justify-center mb-10 relative">
                        <div class="bg-[#FDCB58] p-2 rounded-full absolute left-1/6 -translate-x-1/2 top-1/2 -translate-y-1/2">
                            <img src="{{ asset('images/icon-map.png') }}" class="w-5 h-5" alt="Icon Lokasi">
                        </div>
                        <h3 class="text-[#0A3D62] font-bold text-xl">Lokasi Kami</h3>
                    </div>
                    <p class="text-md font-semibold text-[#0A3D62] mb-4 leading-relaxed">
                        Jl. Andi Makkasau No.20, Pangkajene,<br>
                        Kec. Maritengngae, Kabupaten<br>
                        Sidenreng Rappang, Sulawesi Selatan<br>
                        91611
                    </p>
                    <img src="{{ asset('images/map-preview.png') }}" class="rounded-md w-full" alt="Peta Lokasi">
                </div>
                <div class="bg-[#f8f9fa] p-6 rounded-xl shadow-md w-[85%] max-w-[400px] mx-auto">
                    <div class="flex justify-center mb-10 relative">
                        <div class="bg-[#FDCB58] p-2 rounded-full absolute left-1/6 -translate-x-1/2 top-1/2 -translate-y-1/2">
                            <img src="{{ asset('images/icon-phone.png') }}" class="w-5 h-5" alt="Icon Kontak">
                        </div>
                        <h3 class="text-[#0A3D62] font-bold text-xl">Kontak Kami</h3>
                    </div>
                    <ul class="text-sm text-[#0A3D62] space-y-8 ml-4 font-semibold">
                        <li class="flex gap-3 items-center">
                            <div class="w-6 flex justify-center ml-[7%]">
                                <img src="{{ asset('images/icon-hp.png') }}" class="w-5 h-5" alt="HP">
                            </div>
                            <span>+62 8528-2534-171</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <div class="w-6 flex justify-center ml-[7%]">
                                <img src="{{ asset('images/icon-fb.png') }}" class="w-5 h-5" alt="Facebook">
                            </div>
                            <span>Makkasar Stiker</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <div class="w-6 flex justify-center ml-[7%]">
                                <img src="{{ asset('images/icon-wa.png') }}" class="w-5 h-5" alt="WhatsApp">
                            </div>
                            <span>+62 8528-2534-171</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <div class="w-6 flex justify-center ml-[7%]">
                                <img src="{{ asset('images/icon-ig.png') }}" class="w-5 h-5" alt="Instagram">
                            </div>
                            <span>@makkasarstiker</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="bg-[#0A3D62] py-16">
            <div class="text-center text-white">
                <h2 class="font-bold text-5xl mb-6">Siap Untuk Memesan?</h2>
                <p>Hubungi kami sekarang untuk mendapatkan penawaran khusus <br> dan konsultasi gratis tentang custom
                    plat kendaraan anda</p>
            </div>
            <div class="mt-20 text-center space-x-20">
                <a href="#" class="font-lg text-black bg-[#FDCB58] px-8 py-2 rounded-full">
                    PESAN SEKARANG
                </a>
            </div>
        </div>
    </section>
</x-layout>
