<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-12">
        <form action="{{ route('order.preview') }}" method="POST" enctype="multipart/form-data" class="bg-[#f8f9fa] p-8 rounded-2xl shadow space-y-10">
            @csrf
            <div>
                <h2 class="text-xl font-bold text-[#0A3D62] mb-2">Informasi Pribadi</h2>
                <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>

                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required class="w-full border rounded p-2 bg-white" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" required class="w-full border rounded p-2 bg-white" value="{{ old('phone') }}">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#0A3D62]">E-mail <span class="text-gray-400">(optional)</span></label>
                        <input type="email" name="email" class="w-full border rounded p-2 bg-white" value="{{ old('email') }}">
                    </div>
                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Alamat <span class="text-gray-400">(optional)</span></label>
                        <textarea name="address" rows="3" class="w-full border rounded p-2 bg-white">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-xl font-bold text-[#0A3D62] mb-2">Informasi Plat Kendaraan</h2>
                <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>

                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Nomor Kendaraan <span class="text-red-500">*</span></label>
                        <input type="text" name="vehicle_number" required class="w-full border rounded p-2 bg-white" value="{{ old('vehicle_number') }}">
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Ukuran Plat <span class="text-red-500">*</span></label>
                        <select name="plate_size" required class="w-full border rounded p-2 bg-white">
                            <option value="">--Pilih Ukuran Plat--</option>
                            @foreach ([
                                'Ukuran Standar (43cm x 13.5cm)',
                                'Ukuran Motor (25cm x 7cm)',
                                'Mobil Mini (30cm x 10cm)',
                                'Ukuran Custom'
                            ] as $size)
                                <option value="{{ $size }}" {{ old('plate_size') === $size ? 'selected' : '' }}>{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Bahan Plat <span class="text-red-500">*</span></label>
                        <select name="plate_material" required class="w-full border rounded p-2 bg-white">
                            <option value="">--Pilih Bahan Plat--</option>
                            @foreach (['Acrylic', 'Aluminium', 'Stainless Steel', 'ABS Plastic'] as $material)
                                <option value="{{ $material }}" {{ old('plate_material') === $material ? 'selected' : '' }}>{{ $material }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Warna Dasar Plat <span class="text-red-500">*</span></label>
                        <select name="plate_color" required class="w-full border rounded p-2 bg-white">
                            <option value="">--Pilih Warna Plat--</option>
                            @foreach (['Hitam', 'Putih', 'Merah', 'Kuning', 'Warna Lainnya'] as $color)
                                <option value="{{ $color }}" {{ old('plate_color') === $color ? 'selected' : '' }}>{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Warna Font <span class="text-red-500">*</span></label>
                        <select name="font_type" required class="w-full border rounded p-2 bg-white">
                            <option value="">--Pilih Warna Font--</option>
                            @foreach (['Hitam', 'Putih', 'Merah', 'Kuning', 'Warna Lainnya'] as $font)
                                <option value="{{ $font }}" {{ old('font_type') === $font ? 'selected' : '' }}>{{ $font }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Finishing <span class="text-red-500">*</span></label>
                        <select name="finishing" required class="w-full border rounded p-2 bg-white">
                            <option value="">--Pilih Jenis Finishing--</option>
                            @foreach (['Glossy', 'Doff (matte)', 'Chrome', 'Emboss (timbul)'] as $finish)
                                <option value="{{ $finish }}" {{ old('finishing') === $finish ? 'selected' : '' }}>{{ $finish }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Jumlah Pesanan <span class="text-red-500">*</span></label>
                        <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required class="w-full border rounded p-2 bg-white">
                    </div>

                    <div>
                        <label class="block font-semibold text-[#0A3D62]">Upload STNK (Optional)</label>
                        <input type="file" name="stnk_file" class="w-full border rounded p-2 bg-white">
                        <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, PNG, PDF. Maksimal 10MB.</p>
                    </div>
                </div>
            </div>


            <div>
                <h2 class="text-xl font-bold text-[#0A3D62] mb-2">Informasi Tambahan</h2>
                <div class="w-20 h-1 bg-[#FDCB58] mb-6"></div>

                <div>
                    <label class="block font-semibold text-[#0A3D62]">Catatan Tambahan (opsional)</label>
                    <textarea name="notes" rows="4" placeholder="Tuliskan informasi tambahan..." class="w-full border rounded p-2 bg-white">{{ old('notes') }}</textarea>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-[#FDCB58] text-[#0A3D62] font-semibold px-8 py-3 rounded-full hover:opacity-90 transition">
                    Pesan Sekarang
                </button>
            </div>
        </form>
    </div>
</x-layout>
