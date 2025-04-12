<x-layout>
    <div class="min-h-screen bg-[#F8FAFC] flex items-center justify-center px-4 py-12">
        <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
            <div class="bg-[#0A3D62] text-white text-center py-4 rounded-t-xl -mt-8 -mx-8 mb-6 relative">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <p class="text-sm">Masuk untuk mengelola website</p>
                <span
                    class="absolute top-3 right-4 bg-[#FDCB58] text-[11px] font-bold text-black px-2 py-0.5 rounded-full">
                    ADMIN
                </span>
            </div>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-300 text-red-700 p-3 rounded text-sm">
                    {{ $errors->first('login') ?? 'ID atau Password salah' }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @if (session('error'))
                    <div class="mb-4 text-red-600 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                @endif
                @csrf
                <div class="mb-6">
                    <label class="block text-[#0A3D62] font-semibold mb-1">Username</label>
                    <input type="text" name="username" placeholder="Masukkan ID Admin" value="{{ old('username') }}"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#0A3D62]">
                </div>

                <div class="mb-4">
                    <label class="block text-[#0A3D62] font-semibold mb-1">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password Admin"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-[#0A3D62]">
                </div>
                <button type="submit"
                    class="w-full bg-[#FDCB58] text-[#0A3D62] font-bold py-3 rounded-full hover:opacity-90 transition text-sm">
                    MASUK
                </button>
            </form>

            <div class="mt-8 bg-[#F1F5F9] p-4 text-xs text-[#0A3D62] rounded-md">
                <p><span class="font-bold">Catatan Keamanan :</span> Halaman ini hanya untuk administrator yang
                    berwenang. Setiap aktivitas mencurigakan akan dipantau dan dicatat</p>
            </div>
        </div>
    </div>
</x-layout>
