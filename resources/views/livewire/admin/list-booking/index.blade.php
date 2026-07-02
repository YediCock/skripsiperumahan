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
                                <li class="breadcrumb-item active"><a href="{{ route('listBooking') }}" wire:navigate>List Booking</a></li>
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
                            <h4 class="pb-0">List Booking</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <a></a>
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
                                    <th scope="col">Nomer HP</th>
                                    <th scope="col">Nama Properti</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">status</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = ($bookings->currentPage() - 1) * $bookings->perPage(); ?>
                                @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $booking->customer->name }}</td>
                                    <td>{{ $booking->customer->phone }}</td>
                                    <td>{{ $booking->homeList->name }}</td>
                                    <td>{{ $booking->homeList->homeCategory->name }}</td>
                                    <td>{{ $booking->homeList->price }}</td>
                                    <td>{{ $booking->status}}</td>
                                    <td class="text-center">
    <div class="action-btns" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
        
        @if(strtolower($booking->status) !== 'accept')
            <a href="javascript:void(0);" wire:confirm="Yakin ingin ACC pesanan ini? Properti akan otomatis berstatus Terjual/Tersewa." wire:click="acceptBooking({{ $booking->id }})" class="action-btn text-success bs-tooltip" data-toggle="tooltip" data-placement="top" title="ACC Pesanan">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </a>
        @endif

        <a href="javascript:void(0);" wire:click="kirimPesan({{ $booking->id }})" class="action-btn text-info bs-tooltip" data-toggle="tooltip" data-placement="top" title="Kirim Pesan WA">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
        </a>

        <a wire:navigate href="{{ route('listBookingEdit', $booking->id) }}" class="action-btn btn-edit bs-tooltip" data-toggle="tooltip" data-placement="top" title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
        </a>

        <a wire:confirm="Apakah anda yakin ingin menghapus?" wire:click="deleteBooking({{ $booking->id }})" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
        </a>
    </div>
</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">Tidak ada list booking</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $bookings->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
