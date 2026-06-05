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
                                <li class="breadcrumb-item active"><a href="{{ route('setting') }}" wire:navigate>Setting</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Edit</li> --}}
                            </ol>
                        </nav>
        
                    </div>
                </div>
            </header>
        </div>
    </div>
    <!--  END BREADCRUMBS  -->
    
    <div class="row layout-top-spacing">
        <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class=" d-flex">
                        <div class="">
                            <h4 class="pb-0">Setting</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="d-flex">
                        <h4 class="mb-0">Setting Umum</h4>
                        <a wire:navigate href="{{ route('settingEdit', $setting[0]->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                {{-- tabel setting --}}
                                <tr>
                                    <td>Nama Perumahan</td>
                                    <td>{{ $setting[0]->company_name }}</td>
                                </tr>
                                <tr>
                                    <td>Nomer HP Marketing</td>
                                    <td>{{ $setting[0]->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Logo Perumahan</td>
                                    <td>
                                        <img src="{{ asset('storage/images/settings/' . $setting[0]->image_logo) }}" class="img-fluid" alt="" style="width: 250px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gambar Promasi</td>
                                    <td>
                                        <img src="{{ asset('storage/images/settings/' . $setting[0]->image_promotion) }}" class="img-fluid" alt="" style="width: 250px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>deskripsi Perumahan</td>
                                    <td>{!! $setting[0]->desc !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- tabel slider --}}
                    <h4 class="mt-4">Setting Gambar Slider</h4>
                    <form wire:submit="saveSlider({{ $imgSlider[0]->id }})">
                        <label class="mb-0">Tambah Gambar Slider baru</label>
                        <p class="text-danger mb-0">*maksimal 5 file dan diusahakan ukuran gambar maksimal 348 x 292</p>
                        <input wire:ignore wire:model="sliderImg"  type="file" name="imageSketsa" id="imageSketsa" class="form-control @error('imageSketsa') has-error @enderror" placeholder="image" onchange="previewMulti('.imageDemo', this.files)" multiple>
                        @error('sliderImg') <span class="error text-danger ">{{ $message }}</span> @enderror 
                        <div wire:ignore class="row mt-3 imageDemo">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                    <div class="row mt-3">
                        <label>Gambar lama</label>
                        @foreach ($imgSlider as $slider)
                            <div class="col-6 col-sm-4 col-md-3">
                                <img src="{{ asset('storage/images/sliders/'.$slider->image) }}" class="img-preview img-fluid mb-1 d-block"> 
                                <a wire:click="deleteImageSlider({{ $slider->id }})" wire:confirm="Apakah anda yakin ingin menghapus?" class=" btn btn-danger mb-1 _effect--ripple waves-effect waves-light">Hapus Gambar</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
