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

                        <div class="page-title">
                        </div>
        
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a href="{{ route('homeCategory') }}" wire:navigate>List Kategori</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit list Kategori {{ $category->name }}</li>
                            </ol>
                        </nav>
        
                    </div>
                </div>
            </header>
        </div>
    </div>
    <!--  END BREADCRUMBS  -->
    <div class=" layout-top-spacing">
        <div class="row mb-4 layout-spacing layout-top-spacing">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="widget-content widget-content-area blog-create-section">
                    <form wire:submit="save({{ $category->id }})">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label>Nama Kategori</label>
                            <input wire:model="name" type="text" class="form-control" placeholder="nama kategori">
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label>Alamat / Lokasi</label>
                            <input wire:model="address" type="text" class="form-control" placeholder="contoh: Jl. Raya Batang No.1, Batang">
                            @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label>Upload Gambar Kategori</label>
                            <p class="text-danger mb-1">ukuran gambar maksimal 136 x 136</p>
                            <input wire:ignore wire:model="image" type="file" class="form-control" onchange="previewSketsa('.imageDemo1', this.files[0])">
                            <div wire:ignore class="mt-2">
                                @if ($category->image)
                                    <img src="{{ asset('storage/images/categories/'.$category->image) }}" class="img-preview img-fluid col-sm-5 d-block imageDemo1">
                                @else
                                    <img src="" alt="" class="img-preview img-fluid col-sm-5 d-block imageDemo1">
                                @endif
                            </div>
                            @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Upload Brosur Perumahan <span class="text-muted">(opsional)</span></label>
                            <input wire:ignore wire:model="brochure_image" type="file" class="form-control" onchange="previewSketsa('.imageDemo2', this.files[0])">
                            <div wire:ignore class="mt-2">
                                @if ($category->brochure_image)
                                    <img src="{{ asset('storage/images/categories/'.$category->brochure_image) }}" class="img-preview img-fluid col-sm-5 d-block imageDemo2">
                                @else
                                    <img src="" alt="" class="img-preview img-fluid col-sm-5 d-block imageDemo2">
                                @endif
                            </div>
                            @error('brochure_image') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Upload Site Plan / Denah Kawasan <span class="text-muted">(opsional)</span></label>
                            <input wire:ignore wire:model="site_plan_image" type="file" class="form-control" onchange="previewDenah('.imageDemo3', this.files[0])">
                            <div wire:ignore class="mt-2">
                                @if ($category->site_plan_image)
                                    <img src="{{ asset('storage/images/categories/'.$category->site_plan_image) }}" class="img-preview img-fluid col-sm-5 d-block imageDemo3">
                                @else
                                    <img src="" alt="" class="img-preview img-fluid col-sm-5 d-block imageDemo3">
                                @endif
                            </div>
                            @error('site_plan_image') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
