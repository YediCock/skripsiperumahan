<div>
    <div class="flex min-h-[75vh] items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8 rounded-2xl bg-white p-8 shadow-xl border border-gray-100">
            <div>
                <h2 class="text-center text-3xl font-extrabold tracking-tight text-gray-900">Masuk</h2>
            </div>
            <form class="mt-8 space-y-6" wire:submit="proccesslogin">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input wire:model="name" id="name" name="name" type="text" required class="block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" placeholder="Masukkan nama Anda">
                        </div>
                        @error('name') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input wire:model="password" id="password" name="password" type="password" required class="block w-full appearance-none rounded-lg border border-gray-300 px-3 py-2.5 text-gray-900 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" placeholder="Masukkan password Anda">
                        </div>
                        @error('password') <span class="mt-1 block text-sm text-red-600">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-lg border border-transparent bg-blue-600 py-2.5 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                        Masuk
                    </button>
                </div>
                <div class="text-center text-sm">
                    <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-500 transition-colors">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
</div>