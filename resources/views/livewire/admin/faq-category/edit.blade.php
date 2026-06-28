<div>
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="Kategori FAQ">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse"></a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('faqCategoryIndex') }}" wire:navigate>Kategori FAQ</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div class="layout-top-spacing">
        <div class="row layout-spacing layout-top-spacing">
            <div class="col-lg-6">
                <div class="widget-content widget-content-area">
                    <form wire:submit="save({{ $cat->id }})">
                        <div class="mb-3">
                            <label>Nama Kategori</label>
                            <input wire:model="name" type="text" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label>Urutan</label>
                            <input wire:model="urutan" type="number" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('faqCategoryIndex') }}" wire:navigate class="btn btn-secondary ms-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
