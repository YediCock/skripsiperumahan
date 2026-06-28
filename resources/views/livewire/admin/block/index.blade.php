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
                                <li class="breadcrumb-item active" aria-current="page">List Blok</li>
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
            <div class="col-12">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <div class="d-flex gap-2 flex-wrap">
                            <input wire:model.live="search" type="text" class="form-control" placeholder="Cari blok..." style="max-width:200px">
                            <select wire:model.live="filterCategory" class="form-select" style="max-width:200px">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('blockAdd') }}" wire:navigate class="btn btn-primary">+ Tambah Blok</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Blok</th>
                                    <th>Kategori / Perumahan</th>
                                    <th>Jumlah Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blocks as $i => $block)
                                    <tr>
                                        <td>{{ $blocks->firstItem() + $i }}</td>
                                        <td>{{ $block->name }}</td>
                                        <td>{{ $block->homeCategory->name ?? '-' }}</td>
                                        <td>{{ $block->homeList->count() }} unit</td>
                                        <td>
                                            <a href="{{ route('blockEdit', $block->id) }}" wire:navigate class="btn btn-warning btn-sm">Edit</a>
                                            <button wire:click="deleteBlock({{ $block->id }})" wire:confirm="Hapus blok ini? Unit yang terhubung tidak akan terhapus." class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="text-center">Belum ada blok</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $blocks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
