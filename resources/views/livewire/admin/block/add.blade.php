<div>
    <!--  BEGIN BREADCRUMBS  -->
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="Analytics">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">
                        <div class="page-title"></div>
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('blockIndex') }}" wire:navigate>List Blok</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Blok</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <!--  END BREADCRUMBS  -->

    <div class="layout-top-spacing">
        <div class="row layout-spacing layout-top-spacing">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="widget-content widget-content-area blog-create-section">
                    <form wire:submit="save">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label>Perumahan / Kategori</label>
                                <select wire:model="home_category_id" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('home_category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-sm-6">
                                <label>Nama Blok</label>
                                <input wire:model="name" type="text" class="form-control" placeholder="contoh: Blok A">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('blockIndex') }}" wire:navigate class="btn btn-secondary ms-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
