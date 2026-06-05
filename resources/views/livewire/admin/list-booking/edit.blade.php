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
                                <li class="breadcrumb-item "><a href="{{ route('listBooking') }}" wire:navigate>List Booking</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit list Booking {{ $booking->customer->name }}</li>
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
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $booking->customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No HP</td>
                                        <td>{{ $booking->customer->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Properti</td>
                                        <td>{{ $booking->homeList->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>{{ $booking->homeList->homeCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>{{ $booking->homeList->price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form wire:submit="save({{ $booking->id }})">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label for="inputState" class="form-label">Status</label>
                            <select wire:model="status" id="inputState" class="form-select">
                                <option value="pending" @if ($booking->status === 'pending') selected @endif>Pending</option>
                                <option value="process" @if ($booking->status === 'process') selected @endif>Process</option>
                                <option value="accept" @if ($booking->status === 'accept') selected @endif>Accept</option>
                            </select>
                            @error('status') <span class="error text-danger ">{{ $message }}</span> @enderror 
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
