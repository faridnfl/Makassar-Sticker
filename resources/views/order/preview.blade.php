<x-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
        <div class="w-full max-w-3xl bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-blue-900 text-center mb-4">
                Konfirmasi Ulang Pesanan
            </h2>
            <hr class="border-gray-300 mb-8">
            <div class="mb-8">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Informasi Pelanggan</h3>
                <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Pelanggan</label>
                        <p class="mt-1 text-gray-900">{{ $data['name'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-gray-900">{{ $data['email'] ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">WhatsApp</label>
                        <p class="mt-1 text-gray-900">{{ $data['phone'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <p class="mt-1 text-gray-900 whitespace-pre-line">{{ $data['address'] ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Informasi Plat Kendaraan</h3>
                <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Polisi</label>
                        <p class="mt-1 text-gray-900">{{ $data['vehicle_number'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Finishing</label>
                        <p class="mt-1 text-gray-900">{{ $data['finishing'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ukuran Plat</label>
                        <p class="mt-1 text-gray-900">{{ $data['plate_size'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <p class="mt-1 text-gray-900">{{ $data['quantity'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bahan</label>
                        <p class="mt-1 text-gray-900">{{ $data['plate_material'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Pesanan</label>
                        <p class="mt-1 text-gray-900">{{ now()->format('Y-m-d') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Warna Dasar</label>
                        <p class="mt-1 text-gray-900">{{ $data['plate_color'] }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">File STNK</label>
                        <p class="mt-1 text-gray-900">{{ $data['stnk_file_name'] ?? '-' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Warna Font</label>
                        <p class="mt-1 text-gray-900">{{ $data['font_type'] }}</p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-bold text-blue-900 mb-2">Catatan Tambahan</h3>
                <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>
                <div class="bg-gray-50 border border-gray-200 rounded p-4">
                    <p class="text-gray-900">{{ $data['notes'] ?? 'Tidak ada catatan tambahan.' }}</p>
                </div>
            </div>

            <div class="flex justify-between mt-10">
                <a href="{{ route('order.form') }}"
                    class="px-6 py-2 border border-gray-300 rounded-md bg-white text-[#0A3D62] font-medium hover:bg-gray-100 transition">
                    Kembali
                </a>
                <form action="{{ route('order.submit') }}" method="POST">
                    @csrf
                    @foreach ($data as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                    <button type="submit"
                        class="px-8 py-2 bg-[#FDCB58] text-[#0A3D62] font-bold rounded-md hover:opacity-90 transition">
                        Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
