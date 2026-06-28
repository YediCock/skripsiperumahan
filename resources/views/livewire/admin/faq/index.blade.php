<div>
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="FAQ">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">List FAQ</li>
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
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <input wire:model.live="search" type="text" class="form-control" placeholder="Cari pertanyaan atau kategori..." style="max-width:300px">
                        <a href="{{ route('faqAdd') }}" wire:navigate class="btn btn-primary">+ Tambah FAQ</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Pertanyaan</th>
                                    <th>Urutan</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($faqs as $i => $faq)
                                <tr>
                                    <td>{{ $faqs->firstItem() + $i }}</td>
                                    <td><span class="badge bg-primary">{{ $faq->kategori }}</span></td>
                                    <td class="text-wrap" style="max-width:400px">{{ Str::limit($faq->pertanyaan, 80) }}</td>
                                    <td>{{ $faq->urutan }}</td>
                                    <td>
                                        <button wire:click="toggleAktif({{ $faq->id }})"
                                            class="badge border-0 {{ $faq->aktif ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $faq->aktif ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('faqEdit', $faq->id) }}" wire:navigate class="btn btn-warning btn-sm">Edit</a>
                                        <button wire:click="deleteFaq({{ $faq->id }})" wire:confirm="Hapus FAQ ini?" class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center">Belum ada FAQ</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">{{ $faqs->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
