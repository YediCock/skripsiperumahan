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
                                <li class="breadcrumb-item active" aria-current="page">Tambah list kategori</li>
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
                    <form wire:submit="save">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label>Nama kategori</label>
                            <input wire:model="name" type="text" class="form-control" id="post-title" placeholder="nama kategori">
                            @error('name') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label>Upload Gambar kategori</label>
                            <p class="text-danger">ukuran gambar maksimal 136 x 136</p>
                            <input wire:ignore wire:model="image"  type="file" name="image" id="imageSketsa" class="form-control @error('image') has-error @enderror" placeholder="image" onchange="previewSketsa('.imageDemo1', this.files[0])">
                            <div wire:ignore class="col-md mt-3">
                                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo1">
                            </div>
                            @error('image') <span class="error text-danger ">{{ $message }}</span> @enderror 
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
