<x-admin.layout>
    <div x-data="{ showModal: false, showEditModal: false, selectedOrder: null }">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 text-sm rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-xl overflow-hidden py-4">
            <div class="px-10 py-4 border-b font-semibold text-[#0A3D62] text-lg">Daftar Pesanan</div>
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-sm text-left min-w-[800px]">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">WhatsApp</th>
                            <th class="px-4 py-3">No Polisi</th>
                            <th class="px-4 py-3">Bahan</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($orders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-semibold">{{ $order->order_id }}</td>
                                <td class="px-4 py-3">{{ $order->name }}</td>
                                <td class="px-4 py-3">{{ $order->phone }}</td>
                                <td class="px-4 py-3">{{ $order->vehicle_number }}</td>
                                <td class="px-4 py-3">{{ $order->plate_material }}</td>
                                <td class="px-4 py-3">{{ $order->quantity }}</td>
                                <td class="px-4 py-3">
                                    <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                        @csrf @method('PUT')
                                        <select name="status" onchange="this.form.submit()"
                                            class="text-xs bg-white border rounded px-2 py-1">
                                            @foreach (['dalam proses', 'pesanan diterima', 'siap diambil', 'selesai'] as $status)
                                                <option value="{{ $status }}"
                                                    {{ $order->status === $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td class="px-4 py-3">{{ $order->created_at->format('Y-m-d') }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2 items-center">
                                        <button @click="selectedOrder = {{ Js::from($order) }}; showModal = true"
                                            class="text-blue-600 hover:text-blue-800 text-sm cursor-pointer">👁️</button>
                                        <button @click="selectedOrder = {{ Js::from($order) }}; showEditModal = true"
                                            class="text-orange-500 hover:text-orange-700 text-sm cursor-pointer">✏️</button>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 text-sm cursor-pointer">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="md:hidden space-y-4">
                @foreach ($orders as $order)
                    <div class="bg-white rounded-xl shadow-md p-4">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-sm font-bold text-[#0A3D62]">#{{ $order->order_id }}</p>
                            <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()"
                                    class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">
                                    @foreach (['dalam proses', 'pesanan diterima', 'siap diambil', 'selesai'] as $status)
                                        <option value="{{ $status }}"
                                            {{ $order->status === $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <p class="text-sm text-gray-700"><strong>Nama:</strong> {{ $order->name }}</p>
                        <p class="text-sm text-gray-700"><strong>WA:</strong> {{ $order->phone }}</p>
                        <p class="text-sm text-gray-700"><strong>Plat:</strong> {{ $order->vehicle_number }}</p>
                        <p class="text-sm text-gray-700"><strong>Bahan:</strong> {{ $order->plate_material }}</p>
                        <p class="text-sm text-gray-700"><strong>Jumlah:</strong> {{ $order->quantity }}</p>
                        <p class="text-sm text-gray-700"><strong>Tanggal:</strong>
                            {{ $order->created_at->format('Y-m-d') }}</p>
                        <div class="flex gap-3 mt-3">
                            <button @click="selectedOrder = {{ Js::from($order) }}; showModal = true"
                                class="text-blue-600 hover:text-blue-800 text-sm">👁️</button>
                            <button @click="selectedOrder = {{ Js::from($order) }}; showEditModal = true"
                                class="text-orange-500 hover:text-orange-700 text-sm">✏️</button>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">🗑️</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 px-6">
                {{ $orders->links() }}
            </div>
        </div>

        <template x-if="showModal">
            <div class="fixed inset-0 z-50 backdrop-blur-sm bg-white/30 flex items-center justify-center">

                <div
                    class="relative bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 sm:mx-6 md:mx-8 max-h-[90vh] overflow-y-auto p-8">

                    <div class="flex justify-between items-start border-b pb-2 mb-6">
                        <h2 class="text-xl font-bold text-[#0A3D62]">
                            Detail Pesanan #<span x-text="selectedOrder.order_id"></span>
                        </h2>
                        <button @click="showModal = false"
                            class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-md font-bold text-[#0A3D62] border-b-2 border-yellow-400 inline-block mb-4">
                            Informasi Pelanggan</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-12 text-sm">
                            <div>
                                <p class="font-semibold text-[#0A3D62]">Nama Pelanggan</p>
                                <p class="pl-4" x-text="selectedOrder.name"></p>
                            </div>
                            <div>
                                <p class="font-semibold text-[#0A3D62]">Email</p>
                                <p class="pl-4" x-text="selectedOrder.email ?? '-'"></p>
                            </div>
                            <div>
                                <p class="font-semibold text-[#0A3D62]">WhatsApp</p>
                                <p class="pl-4" x-text="selectedOrder.phone"></p>
                            </div>
                            <div>
                                <p class="font-semibold text-[#0A3D62]">Alamat</p>
                                <p class="pl-4" x-text="selectedOrder.address ?? '-'"></p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-md font-bold text-[#0A3D62] border-b-2 border-yellow-400 inline-block mb-4">
                            Informasi Plat Kendaraan</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-12 text-sm">
                            <template
                                x-for="(value, label) in {
                                'Nomor Polisi': selectedOrder.vehicle_number,
                                'Finishing': selectedOrder.finishing,
                                'Ukuran Plat': selectedOrder.plate_size,
                                'Jumlah': selectedOrder.quantity,
                                'Bahan': selectedOrder.plate_material,
                                'Status Pesanan': selectedOrder.status,
                                'Warna Dasar': selectedOrder.plate_color,
                                'Tanggal Pesanan': new Date(selectedOrder.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }),
                                'Warna Font': selectedOrder.font_type,
                                'File STNK': selectedOrder.stnk_file
                            }"
                                :key="label">
                                <div>
                                    <p class="font-semibold text-[#0A3D62]" x-text="label"></p>
                                    <template x-if="label === 'Status Pesanan'">
                                        <p class="pl-4">
                                            <span
                                                class="text-xs px-3 py-1 rounded-full bg-red-100 text-red-600 font-semibold"
                                                x-text="value"></span>
                                        </p>
                                    </template>
                                    <template x-if="label === 'File STNK'">
                                        <p class="pl-4">
                                            <a :href="'/storage/' + selectedOrder.stnk_file"
                                                class="text-blue-600 underline break-words max-w-xs block leading-tight"
                                                target="_blank"
                                                x-text="selectedOrder.stnk_file ? selectedOrder.stnk_file.split('/').pop() : '-'"></a>
                                        </p>

                                    </template>
                                    <template x-if="label !== 'Status Pesanan' && label !== 'File STNK'">
                                        <p class="pl-4" x-text="value"></p>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="text-sm font-bold text-[#0A3D62] border-b-2 border-yellow-400 inline-block mb-2">
                            Catatan Tambahan</h3>
                        <div class="bg-gray-50 p-3 rounded text-sm text-gray-700" x-text="selectedOrder.notes || '-'">
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button @click="showModal = false"
                            class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-md text-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </template>

        <template x-if="showEditModal">
            <div class="fixed inset-0 z-50 backdrop-blur-sm bg-white/30 flex items-center justify-center">
                <form :action="'/admin/orders/' + selectedOrder.id + '/update'" method="POST"
                    enctype="multipart/form-data"
                    class="bg-white w-full max-w-4xl max-h-[90vh] overflow-y-auto rounded-lg shadow-lg p-8">
                    @csrf
                    @method('PUT')

                    <div class="flex justify-between items-start border-b pb-2 mb-6">
                        <h2 class="text-xl font-bold text-[#0A3D62]">Edit Pesanan #<span
                                x-text="selectedOrder.order_id"></span>
                        </h2>
                        <button type="button" @click="showEditModal = false"
                            class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
                    </div>

                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-[#0A3D62] mb-2">Informasi Pribadi</h2>
                        <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>
                        <div class="space-y-4">
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Nama Lengkap</label>
                                <input type="text" name="name" :value="selectedOrder.name"
                                    class="w-full border rounded p-2 bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Nomor WhatsApp</label>
                                <input type="text" name="phone" :value="selectedOrder.phone"
                                    class="w-full border rounded p-2 bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">E-mail</label>
                                <input type="email" name="email" :value="selectedOrder.email"
                                    class="w-full border rounded p-2 bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Alamat</label>
                                <textarea name="address" rows="3" class="w-full border rounded p-2 bg-white" x-text="selectedOrder.address"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-[#0A3D62] mb-2">Informasi Plat Kendaraan</h2>
                        <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>
                        <div class="space-y-4">
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Nomor Kendaraan</label>
                                <input type="text" name="vehicle_number" :value="selectedOrder.vehicle_number"
                                    class="w-full border rounded p-2 bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Ukuran Plat</label>
                                <select name="plate_size" class="w-full border rounded p-2 bg-white">
                                    <template
                                        x-for="option in ['Ukuran Standar (43cm x 13.5cm)', 'Ukuran Motor (25cm x 7cm)', 'Mobil Mini (30cm x 10cm)', 'Ukuran Custom']">
                                        <option :value="option" :selected="selectedOrder.plate_size === option"
                                            x-text="option"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Bahan Plat</label>
                                <select name="plate_material" class="w-full border rounded p-2 bg-white">
                                    <template
                                        x-for="option in ['Acrylic', 'Aluminium', 'Stainless Steel', 'ABS Plastic']">
                                        <option :value="option"
                                            :selected="selectedOrder.plate_material === option" x-text="option">
                                        </option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Warna Dasar Plat</label>
                                <select name="plate_color" class="w-full border rounded p-2 bg-white">
                                    <template x-for="option in ['Hitam', 'Putih', 'Merah', 'Kuning', 'Warna Lainnya']">
                                        <option :value="option"
                                            :selected="selectedOrder.plate_color === option" x-text="option"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Warna Font</label>
                                <select name="font_type" class="w-full border rounded p-2 bg-white">
                                    <template x-for="option in ['Hitam', 'Putih', 'Merah', 'Kuning', 'Warna Lainnya']">
                                        <option :value="option" :selected="selectedOrder.font_type === option"
                                            x-text="option"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Finishing</label>
                                <select name="finishing" class="w-full border rounded p-2 bg-white">
                                    <template
                                        x-for="option in ['Glossy', 'Doff (matte)', 'Chrome', 'Emboss (timbul)']">
                                        <option :value="option" :selected="selectedOrder.finishing === option"
                                            x-text="option"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Jumlah Pesanan</label>
                                <input type="number" name="quantity" :value="selectedOrder.quantity"
                                    class="w-full border rounded p-2 bg-white">
                            </div>
                            <div>
                                <label class="block font-semibold text-[#0A3D62]">Upload STNK (optional)</label>
                                <input type="file" name="stnk_file" class="w-full border rounded p-2 bg-white">
                                <p class="text-sm text-gray-500 mt-1" x-show="selectedOrder.stnk_file">
                                    File saat ini: <span class="text-blue-600"
                                        x-text="selectedOrder.stnk_file.split('/').pop()"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-[#0A3D62] mb-2">Informasi Tambahan</h2>
                        <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>
                        <div>
                            <label class="block font-semibold text-[#0A3D62]">Catatan Tambahan</label>
                            <textarea name="notes" rows="4" class="w-full border rounded p-2 bg-white" x-text="selectedOrder.notes"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button type="submit"
                            class="px-8 py-3 bg-[#FDCB58] text-[#0A3D62] font-bold rounded-full hover:opacity-90 transition text-sm">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </template>
    </div>
</x-admin.layout>
