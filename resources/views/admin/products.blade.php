<x-admin.layout>
    <div x-data="{ open: false }">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-[#0A3D62]">Galeri Produk</h2>
            <button @click="open = true"
                class="bg-[#FDCB58] text-[#0A3D62] font-semibold px-5 py-2 rounded-full hover:opacity-90 flex items-center gap-2">
                <span>➕</span> Tambah Foto
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="relative bg-white rounded-xl shadow-md overflow-hidden group hover:bg-red-50 transition">
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                        class="absolute top-2 right-2 hidden group-hover:flex bg-red-100 text-red-600 w-10 h-10 rounded-full items-center justify-center shadow">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Produk">🗑️</button>
                    </form>

                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                        class="w-full h-48 object-cover rounded-t-xl">
                    <div class="p-4">
                        <h3 class="font-bold text-[#0A3D62]">{{ $product->title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $product->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div x-show="open" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center"
            style="display: none;">
            <div @click.away="open = false" class="bg-white rounded-xl shadow-lg p-6 w-full max-w-xl relative">
                <button @click="open = false" class="absolute top-4 right-4 text-2xl text-[#0A3D62]">✕</button>
                <h2 class="text-2xl font-bold text-[#0A3D62] mb-4">Tambah Foto ke Galeri</h2>
                <div class="w-16 h-1 bg-[#FDCB58] mb-6 rounded-full"></div>

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div>
                        <label class="font-semibold text-[#0A3D62]">Judul</label>
                        <input type="text" name="title" class="w-full border rounded p-2" required>
                    </div>
                    <div>
                        <label class="font-semibold text-[#0A3D62]">Kategori</label>
                        <select name="category" class="w-full border rounded p-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="mobil">Mobil</option>
                            <option value="motor">Motor</option>
                            <option value="premium">Premium</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-semibold text-[#0A3D62]">Deskripsi</label>
                        <textarea name="description" rows="3" class="w-full border rounded p-2" required></textarea>
                    </div>
                    <div>
                        <label class="font-semibold text-[#0A3D62]">Upload Foto</label>
                        <input type="file" name="image" accept="image/*,.pdf" class="w-full border rounded p-2"
                            required>
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, PDF. Maks. 10MB.</p>
                    </div>
                    <div class="text-center pt-4">
                        <button type="submit"
                            class="bg-[#FDCB58] text-[#0A3D62] font-semibold px-6 py-2 rounded-full hover:opacity-90">
                            ⬆️ Unggah Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
