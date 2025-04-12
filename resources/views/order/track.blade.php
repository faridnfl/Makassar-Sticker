<x-layout>
    <div class="max-w-6xl mx-auto px-4">
        @if (!isset($order))
            <div class="flex items-center justify-center min-h-[calc(100vh-150px)] px-4">
                <form method="POST" action="{{ route('order.track') }}"
                    class="bg-white shadow rounded-xl p-6 w-full max-w-xl">
                    @csrf
                    <h1 class="text-2xl md:text-3xl font-bold text-center text-[#0A3D62] mb-6">Lacak Pesanan Anda</h1>

                    <label for="order_id" class="block mb-2 font-semibold text-[#0A3D62] text-sm md:text-base">Masukkan ID Pemesanan</label>
                    <input type="text" name="order_id" id="order_id" placeholder="Contoh: MS-1204-1234"
                        class="w-full border rounded p-2 mb-4 text-sm md:text-base" required>

                    <button type="submit"
                        class="w-full bg-[#FDCB58] text-[#0A3D62] font-semibold py-2 rounded hover:opacity-90 text-sm md:text-base">
                        Lacak Pesanan
                    </button>

                    @if (session('error'))
                        <p class="text-red-500 text-sm mt-4">{{ session('error') }}</p>
                    @endif
                </form>
            </div>
        @endif

        @if (isset($order))
            <div class="bg-white rounded-xl shadow-md p-4 md:p-6">
                <div class="bg-[#0A3D62] text-white text-center py-4 rounded-t-xl">
                    <h2 class="text-lg font-bold">Hasil Pelacakan Pesanan</h2>
                    <p class="text-xs md:text-sm mt-1 bg-[#2c5a84] px-3 py-1 inline-block rounded-full">
                        ID Pesanan: {{ $order->order_id }}
                    </p>
                </div>

                <div class="bg-white px-4 md:px-6 py-6 md:py-8">
                    <div class="mb-6 text-center">
                        <h3 class="text-xs md:text-sm text-gray-600">STATUS PESANAN</h3>
                        <p class="text-lg md:text-xl text-[#FDCB58] font-bold">{{ ucfirst($order->status) }}</p>
                    </div>
                    <div class="relative flex justify-between items-center mb-12 mt-10">
                        <div class="absolute top-5 left-[12.5%] w-[75%] h-1 bg-gray-300 z-0"></div>
                        @php
                            $steps = [
                                ['label' => 'Dalam Proses', 'icon' => '🕒', 'key' => 'dalam proses'],
                                ['label' => 'Pesanan Diterima', 'icon' => '📥', 'key' => 'pesanan diterima'],
                                ['label' => 'Siap Diambil', 'icon' => '📦', 'key' => 'siap diambil'],
                                ['label' => 'Selesai', 'icon' => '✅', 'key' => 'selesai'],
                            ];
                            $currentIndex = collect($steps)->pluck('key')->search($order->status);
                        @endphp
                        @if ($currentIndex >= 1)
                            <div class="absolute top-5 z-10 h-1 bg-yellow-400 left-[12.5%] w-[25%]"></div>
                        @endif
                        @if ($currentIndex >= 2)
                            <div class="absolute top-5 z-10 h-1 bg-yellow-400 left-[37.5%] w-[25%]"></div>
                        @endif
                        @if ($currentIndex >= 3)
                            <div class="absolute top-5 z-10 h-1 bg-yellow-400 left-[62.5%] w-[25%]"></div>
                        @endif

                        @foreach ($steps as $index => $step)
                            <div class="relative z-10 flex flex-col items-center w-1/4 text-xs md:text-sm">
                                <div
                                    class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full text-lg md:text-xl font-bold
                                    {{ $index <= $currentIndex
                                        ? 'bg-yellow-400 text-white'
                                        : ($index === $currentIndex
                                            ? 'border-2 border-yellow-400 text-yellow-400 bg-white'
                                            : 'bg-gray-200 text-gray-400') }}">
                                    {{ $step['icon'] }}
                                </div>
                                <p class="mt-2 text-[10px] md:text-sm text-center text-[#0A3D62] font-medium">{{ $step['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 text-center gap-4 text-sm mb-6">
                        <div>
                            <p class="font-semibold text-sm md:text-base">Nama Pemesan</p>
                            <p class="text-sm">{{ $order->name }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm md:text-base">Nomor WhatsApp</p>
                            <p class="text-sm">{{ $order->phone }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm md:text-base">Email</p>
                            <p class="text-sm">{{ $order->email ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-sm md:text-base">Tanggal Pesanan</p>
                            <p class="text-sm">
                                {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded text-sm">
                        <p class="font-semibold mb-2 text-sm md:text-base">Custom Plat Mobil</p>
                        <p class="py-1">Ukuran: {{ $order->plate_size }}</p>
                        <p class="py-1">Bahan: {{ $order->plate_material }}</p>
                        <p class="py-1">Warna Dasar: {{ $order->plate_color }} | Warna Font: {{ $order->font_type }} | Finishing: {{ $order->finishing }}</p>
                        <p class="py-1">Text: "{{ $order->vehicle_number }}"</p>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6 text-sm md:text-base">
                        <a href="{{ route('order.trackPage') }}"
                            class="px-4 py-2 border border-[#0A3D62] rounded-full text-[#0A3D62] text-center">Kembali</a>
                        <a href="#" target="_blank"
                            class="bg-[#FDCB58] text-[#0A3D62] font-semibold px-6 py-2 rounded-full text-center">Hubungi via WhatsApp</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout>
