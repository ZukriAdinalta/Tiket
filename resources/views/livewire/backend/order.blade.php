<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
    </div>

    <div class="card">
        <div class="card-header">Konser</div>
        <div class="card-body">
            <div class="notifikasi">
                @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif (session()->has('hapus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('hapus') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="row mb-2 justify-content-end mt-1">
                <div class="col-md-6">
                    <select wire:model='perpage' class="form-control w-auto">
                        <option value="10" selected>10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input wire:model="search" type="text" class="form-control bg-light border-0 small"
                            placeholder="Search...">
                        <div class="input-group-append">
                            <span class="btn btn-primary ">
                                <i class="fas fa-search fa-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kode Order</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $Orders->firstItem()  ?>
                    @foreach ($Orders as $konser)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $konser->nama }}</td>
                        <td>{{ $konser->kode_order }}</td>
                        <td>{{ $konser->email }}</td>
                        <td><a type="button" data-toggle="modal" data-target="#create"><i
                                    class="fas fa-pen text-primary"></i></a>
                            |
                            <a type="button"><i class=" fas fa-trash text-danger" data-toggle="modal"
                                    data-target="#delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @if ($Orders->firstItem() == 0)
                    <tr>
                        <td colspan="5" class="text-center">Data Kosong</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-5 d-flex align-items-center ">
                    <p>
                        Showing {{ $Orders->firstItem() }} to {{ $Orders->lastItem() }} of {{
                        $Orders->total() }}
                        entries
                    </p>
                </div>
                <div class="col-md-7">
                    <p>
                        {{ $Orders->links() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>