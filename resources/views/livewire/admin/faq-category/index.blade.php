<div>
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="Kategori FAQ">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Kategori FAQ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div class="layout-top-spacing">
        <div class="row layout-spacing layout-top-spacing">
            <div class="col-12">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('faqCategoryAdd') }}" wire:navigate class="btn btn-primary">+ Tambah Kategori</a>
                    </div>
                    <table class="table table-hover">
                        <thead><tr><th>No</th><th>Nama Kategori</th><th>Urutan</th><th>Jumlah FAQ</th><th>Aksi</th></tr></thead>
                        <tbody>
                            @forelse($categories as $i => $cat)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->urutan }}</td>
                                <td><span class="badge bg-primary">{{ $cat->faqs_count }}</span></td>
                                <td>
                                    <a href="{{ route('faqCategoryEdit', $cat->id) }}" wire:navigate class="btn btn-warning btn-sm">Edit</a>
                                    <button wire:click="delete({{ $cat->id }})" wire:confirm="Hapus kategori ini?" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center">Belum ada kategori</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
