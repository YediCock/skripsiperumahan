<div class="gap-30 flex w-full flex-col">
    <div class="gap-30 grid">
        <input wire:model="name" type="text" placeholder="Nama Lengkap Anda" class="rounded-[20px] bg-new-100 focus:border-secondary focus:ring-secondary" />
        <div>
            @error('name') <span style="color: rgb(232, 109, 109)" class="text-sm">{{ $message }}</span> @enderror 
        </div>
        <input wire:model="phone" type="text" placeholder="Nomor Telepon Anda" class="rounded-[20px] bg-new-100 focus:border-secondary focus:ring-secondary" />
        <div>
            @error('phone') <span style="color: rgb(232, 109, 109)" class="text-sm">{{ $message }}</span> @enderror 
        </div>
    </div>
    <button wire:click="saveSession" class="mx-auto size-fit rounded-full bg-secondary px-[30px] py-2.5 text-center font-poppins text-lg font-medium text-white">
        <span wire:loading.remove>Simpan</span> 
        <span wire:loading>
            Menyimpan...
        </span>
    </button>
</div>
