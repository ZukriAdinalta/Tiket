<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Konser</h1>
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
            <div class="create">
                @if ($this->create == true || $this->update == true)
                <button wire:click='Close' type="button" class="btn btn-secondary border">
                    <li class="fas fa-minus"></li>
                </button>
                <form>
                    <div class="card mt-1 border-warning">
                        <div class="card-body">
                            <form>
                                <div class="row justify-content-strat mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode">Nama Konser <span class="text-danger">*</span></label>
                                            <input wire:model='namkor' type="text"
                                                class="form-control @error('namkor') is-invalid @enderror"
                                                placeholder="Masukan Nama Konser">
                                            @error('namkor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kode">Jadwal Konser <span class="text-danger">*</span></label>
                                            <input wire:model='jadwal' type="text"
                                                class="form-control @error('jadwal') is-invalid @enderror"
                                                placeholder="Jum'at, 09-09-2022">
                                            @error('jadwal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer mb-0">
                                    @if ($this->update == true)
                                    <button wire:click.prevent='Update({{ $this->id_konser }})'
                                        class="btn btn-primary">Update</button>
                                    @else
                                    <button wire:click.prevent='Simpan' class="btn btn-primary">Simpan</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
                @else
                <button wire:click='Create' type="button" class="btn btn-success border">
                    <li class="fas fa-plus"></li>
                </button>
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
                        <th scope="col">Nama Konser</th>
                        <th scope="col">Jadwal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $Concerts->firstItem()  ?>
                    @foreach ($Concerts as $konser)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $konser->namkor }}</td>
                        <td>{{ $konser->jadwal }}</td>
                        <td><a wire:click="Edit({{ $konser->id }}) " type="button" data-toggle="modal"
                                data-target="#create"><i class="fas fa-pen text-primary"></i></a>
                            |
                            <a wire:click="DeleteData({{ $konser->id }}) " type="button"><i
                                    class=" fas fa-trash text-danger" data-toggle="modal" data-target="#delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @if ($Concerts->firstItem() == 0)
                    <tr>
                        <td colspan="4" class="text-center">Data Kosong</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-5 d-flex align-items-center ">
                    <p>
                        Showing {{ $Concerts->firstItem() }} to {{ $Concerts->lastItem() }} of {{
                        $Concerts->total() }}
                        entries
                    </p>
                </div>
                <div class="col-md-7">
                    <p>
                        {{ $Concerts->links() }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    <div wire:ignore.self class="modal fade" id="delete" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content text-white bg-danger border-primary">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                    <button wire:click='Close' type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body justify-content-center">
                    <input wire:model="id_konser" type="hidden">
                    <p class="col-form-label">Yakin Hapus Konser: {{ $this->namkor }}
                </div>
                <div class="modal-footer">
                    <button wire:click='Close' type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"
                        wire:click.prevent="Delete({{ $this->id_konser }})">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>