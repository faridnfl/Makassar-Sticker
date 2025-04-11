<x-layout>
    <div class="min-h-screen bg-white flex items-center justify-center">
        <div class="bg-white border border-blue-200 rounded-3xl p-12 max-w-3xl text-center">
            <h1 class="text-4xl font-bold text-[#0A3D62] mb-6">ID PEMESANAN</h1>
            <p class="text-xl text-[#0A3D62] leading-relaxed mb-10">
                ID Pemesanan anda adalah <span class="font-bold text-black">{{ $order_id }}</span>.
                Tolong disalin, dicatat, atau screenshoot untuk
                <span class="font-bold">Melacak Pesanan</span> anda.
            </p>
            <button onclick="window.location.href='{{ route('home') }}'"
                class="bg-[#FDCB58] px-10 py-6 text-[#0A3D62] text-xl font-bold rounded-md hover:opacity-90 transition">
                SUDAH DISALIN
            </button>
        </div>
    </div>
</x-layout>
