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
                                <li class="breadcrumb-item active"><a href="{{ route('homeList') }}" wire:navigate>List Rumah</a></li>
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
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 class="pb-0">List Rumah</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('homeListAdd') }}" class="p-1 btn btn-info mb-2 align-items-center d-flex" wire:navigate>Tambah</a>
                        <div class="filtered-list-search mb-2">
                            <form class="form-inline my-2 my-lg-0 justify-content-center">
                                <div class="w-100">
                                    <input wire:model.live="search" type="text" class="py-2 w-100 form-control product-search br-30" id="input-search" placeholder="Cari...">
                                    <button class="btn btn-primary _effect--ripple waves-effect waves-light" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Type Properti</th>
                                    <th scope="col">Luas Bangunan</th>
                                    <th scope="col">Luas Tanah</th>
                                    <th scope="col">Kamar Tidur</th>
                                    <th scope="col">Kamar Mandi</th>
                                    <th scope="col">Daya Listrik</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">status</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = ($homeLists->currentPage() - 1) * $homeLists->perPage(); ?>
                                @forelse ($homeLists as $home)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $home->name }}</td>
                                    <td>
                                        {{-- @dd($home) --}}
                                        {{ $home->homeCategory->name }}
                                    </td>
                                    <td>{{ $home->building_area }} &nbsp;m<sup>2</sup></td>
                                    <td>{{ $home->land_area }} &nbsp;m<sup>2</sup></td>
                                    <td>{{ $home->number_of_bedrooms}}</td>
                                    <td>{{ $home->number_of_bathrooms}}</td>
                                    <td>{{ $home->electrical_power}} Watt</td>
                                    <td>{{ $home->price}}</td>
                                    <td>{{ $home->status}}</td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a wire:click="showDetail({{ $home->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                            <a wire:navigate href="{{ route('homeListEdit', $home->id) }}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                            <a wire:confirm="Apakah anda yakin ingin menghapus?" wire:click="deleteHome({{ $home->id }})" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">Tidak ada list rumah</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $homeLists->links() }}
                    
                </div>
            </div>
        </div>
    </div>

    {{-- modal detail rumah --}}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @if ($selectedHome)
                    <div class="modal-header">
                        <h5 class="modal-title fs-6" id="exampleModalLabel">Detail {{ $selectedHome->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-2">
                        <p class="fw-bold text-decoration-underline">Deskripsi</p>
                        <div class="">
                            <p>{!! $selectedHome->desc  !!}</p>
                        </div>
                        <p class="fw-bold text-decoration-underline">Gambar bangunan</p>
                        <div class="row">
                            @foreach ($selectedHome->homeImage as $img)
                                <div class="col-4">
                                    <img src="{{ asset('storage/images/detailHomeImages/' . $img->image) }}" alt="" class="img-fluid mb-1">
                                </div>
                            @endforeach
                        </div>
                        <p class="fw-bold text-decoration-underline">Gambar denah dan seketsa</p>
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ asset('storage/images/homeLists/' . $selectedHome->sketch_image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('storage/images/homeLists/' . $selectedHome->floorplan) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
