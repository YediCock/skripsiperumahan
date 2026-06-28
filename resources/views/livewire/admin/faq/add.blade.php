<div>
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="FAQ">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse"></a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('faqIndex') }}" wire:navigate>List FAQ</a></li>
                                <li class="breadcrumb-item active">Tambah FAQ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div class="layout-top-spacing">
        <div class="row layout-spacing layout-top-spacing">
            <div class="col-xxl-8 col-lg-10">
                <div class="widget-content widget-content-area blog-create-section">
                    <form wire:submit="save">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label>Kategori <a href="{{ route('faqCategoryAdd') }}" wire:navigate class="text-primary small ms-1">+ Tambah Kategori</a></label>
                                <select wire:model="faq_category_id" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('faq_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-sm-3">
                                <label>Urutan</label>
                                <input wire:model="urutan" type="number" class="form-control" placeholder="0">
                            </div>
                            <div class="col-sm-3 d-flex align-items-end">
                                <div class="form-check">
                                    <input wire:model="aktif" class="form-check-input" type="checkbox" id="aktifCheck">
                                    <label class="form-check-label" for="aktifCheck">Aktif / Tampilkan</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Pertanyaan</label>
                            <input wire:model="pertanyaan" type="text" class="form-control" placeholder="Tulis pertanyaan...">
                            @error('pertanyaan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label>Jawaban</label>
                            <textarea wire:model="jawaban" class="form-control" rows="5" placeholder="Tulis jawaban..."></textarea>
                            @error('jawaban') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('faqIndex') }}" wire:navigate class="btn btn-secondary ms-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
