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
                                <li class="breadcrumb-item "><a href="{{ route('homeList') }}" wire:navigate>List Rumah</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit list properti {{ $homes->name }}</li>
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
                    <form wire:submit="save({{ $homes->id }})">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label>Nama Properti</label>
                            <input wire:model="name" type="text" class="form-control" id="post-title" placeholder="nama properti" value="{{ $homes->name ?? '' }}">

                            @error('name') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label for="category">Kategori</label>
                            <select  wire:model="category" id="category" class="form-select">
                                @foreach ($homeCategory as $ctg)
                                    <option value="{{$ctg->id}}" {{ $ctg->id == $homes->category_id ? 'selected' : '' }}>{{$ctg->name}}</option>
                                @endforeach
                            </select>
                            
                            @error('category') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label>Harga</label>
                            <input wire:model="price" type="number" class="form-control" id="post-title" placeholder="harga">
                            @error('price') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label>Luas bangunan</label>
                            <input wire:model="building_area" type="number" class="form-control" id="post-title" placeholder="dalam meter persegi" value="{{ $homes->building_area ?? '' }}">
                            @error('building_area') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label>Luas tanah</label>
                            <input wire:model="land_area" type="number" class="form-control" id="post-title" placeholder="dalam meter persegi" value="{{ $homes->land_area ?? '' }}">
                            @error('land_area') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label>Daya listrik</label>
                            <input wire:model="electrical_power" type="number" class="form-control" id="post-title" placeholder="daya listrik" value="{{ $homes->electrical_power ?? '' }}">
                            @error('electrical_power') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label>Kamar tidur</label>
                            <input wire:model="number_of_bedrooms" type="number" class="form-control" id="post-title" placeholder="jumlah kamar tidur" value="{{ $homes->number_of_bedrooms ?? '' }}">
                            @error('number_of_bedrooms') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label>Kamar mandi</label>
                            <input wire:model="number_of_bathrooms" type="number" class="form-control" id="post-title" placeholder="jumlah kamar mandi" value="{{ $homes->number_of_bathrooms ?? '' }}">
                            @error('number_of_bathrooms') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-4">
                            <label for="inputState" class="form-label">Status</label>
                            <select wire:model="status" id="inputState" class="form-select">
                                <option value="dijual" @if ($homes->status === 'dijual') selected @endif>Dijual</option>
                                <option value="terjual" @if ($homes->status === 'terjual') selected @endif>Terjual</option>
                                <option value="sewa" @if ($homes->status === 'sewa') selected @endif>Sewa</option>
                                <option value="tersewa" @if ($homes->status === 'tersewa') selected @endif>Tersewa</option>
                            </select>
                            @error('status') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label>Deskripsi Properti</label>
                            <input id="desc" type="hidden" name="desc" value="{{ $homes->desc }}">
                            <trix-editor input="desc" wire:model="desc"></trix-editor>
                        </div>
                        @error('desc') <span class="error text-danger ">{{ $message }}</span> @enderror 
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <label class="mb-0">Upload Gambar Properti</label>
                            <p class="text-danger mb-0">*maksimal 5 file dan diusahakan ukuran gambar maksimal 660 x 492</p>
                            <input wire:ignore wire:model="homeImage"  type="file" name="homeImage" id="imageSketsa" class="form-control @error('homeImage') has-error @enderror" placeholder="image" onchange="previewMulti('.imageDemo', this.files)" multiple>
                            @error('homeImage') <span class="error text-danger ">{{ $message }}</span> @enderror 
                            <div wire:ignore class="row mt-3 imageDemo">
                            </div> 
                            <div class="row mt-3">
                                <label>Gambar lama</label>
                                @foreach ($homeImages as $img)
                                    <div class="col-sm-6 col-md-4">
                                        <img src="{{ asset('storage/images/detailHomeImages/'.$img->image) }}" class="img-preview img-fluid mb-1 d-block"> 
                                        <a wire:click="deleteImage({{ $img->id }})" wire:confirm="Apakah anda yakin ingin menghapus?" class=" btn btn-danger mb-1 _effect--ripple waves-effect waves-light">Hapus Gambar</a>
                                    </div>
                                @endforeach
                            </div> 
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <label>Upload Gambar Sketsa</label>
                            <input wire:ignore wire:model="sketch_image"  type="file" name="imageSketsa" id="imageSketsa" class="form-control @error('imageSketsa') has-error @enderror" placeholder="image" onchange="previewSketsa('.imageDemo1', this.files[0])">
                            <div wire:ignore class="col-md mt-3">
                                <input type="hidden" name="oldImage" value="{{ $homes->sketch_image }}">
                                @if ($homes->sketch_image)
                                    <img src="{{ asset('storage/images/homeLists/'.$homes->sketch_image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo1">   
                                @endif
                            </div>
                            @error('sketch_image') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                        <div class="col-sm-6">
                            <label>Upload Gambar Denah</label>
                            <input wire:ignore wire:model="floorplan" type="file" name="imageSketsa" id="imageSketsa" class="form-control @error('imageSketsa') has-error @enderror" placeholder="image" onchange="previewDenah('.imageDemo2', this.files[0])">
                            <div wire:ignore class="col-md mt-3">
                                <input type="hidden" name="oldImage" value="{{ $homes->floorplan }}">
                                @if ($homes->floorplan)
                                    <img src="{{ asset('storage/images/homeLists/'.$homes->floorplan) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block imageDemo2">   
                                @endif
                            </div>
                            @error('floorplan') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        </div>
                    </div>

                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
