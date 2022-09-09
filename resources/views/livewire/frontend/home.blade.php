<div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/konser1.jpg') }}" class="d-block w-100" alt="..." height="450px">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/konser3.jpg') }}" class="d-block w-100" alt="..." height="450px">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/konser2.jpg') }}" class="d-block w-100" alt="..." height="450px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="card ">
        <div class="card-body">
            @if ($data == true)
            <div class="row d-flex justify-content-center mb-2">
                <div class="col-sm-11">
                    <input wire:model='search' type="text" class="form-control" placeholder="Search..">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-primary disabled">
                        <li class=" fa fa-search"></li>
                    </button>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 justify-content-center">
                @foreach ($Concerts as $konser)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{ asset('img/konser1.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $konser->namkor }}</li>
                                <li class="list-group-item">{{ $konser->jadwal }}</li>
                                <li class="list-group-item"></li>
                            </ul>
                            <div class="text-center">
                                <button wire:click='Order({{ $konser->id }})' class="btn btn-success">Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-7">
                    <p>
                        {{ $Concerts->links() }}
                    </p>
                </div>
            </div>
            @elseif($order == true)
            <div class="d-flex justify-content-center ">
                <div class="card" style="width: 800px;">
                    <div class="card-body">
                        <h5 class="card-title">Nama Konser: {{ $this->namkor }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Jadwal Konser: {{ $this->jadwal }}</h6>
                        <form>
                            <input wire:model='id_concert' type="hidden">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input wire:model='nama' type="text"
                                    class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Tempat Lahir</label>
                                    <input wire:model='tmp_lahir' type="text"
                                        class="form-control @error('tmp_lahir') is-invalid @enderror">
                                    @error('tmp_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault02" class="form-label">Tanggal Lahir</label>
                                    <input wire:model='tgl_lahir' type="date"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror">
                                    @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input wire:model='email' type="email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea wire:model='alamat' class="form-control @error('alamat') is-invalid @enderror"
                                    rows="3"></textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button wire:click.prevent='Simpan' type="submit" class="btn btn-primary">Daftar</button>
                            <button wire:click='Kembali' type="button" class="btn btn-danger">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
            @elseif($kode == true)
            <div class="notifikasi">
                @if (session()->has('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="d-flex justify-content-center ">
                <div class="card" style="width: 500px;">
                    <div class="card-body">
                        <p style="font-size: 50px; align-content: center; ">Nomor ID: {{ $kode_order }}</p>
                    </div>
                </div>
            </div>
            <button wire:click='Kembali' type="button" class="btn btn-danger">Kembali</button>
            @endif
        </div>

    </div>