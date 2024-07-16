@extends('layouts.sbadmin2')
@section('isinya')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{ $judul }}
                            </div>
                            <div class="col-md-4">
    
                            </div>
                            <div class="col-md-4">
                                <form class="d-flex" role="search" method="get"
                                action="{{ url('pasien/cari/data', []) }}">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                                    &nbsp;
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Pasien</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $b)
                                    <tr>
                                        <td>{{ $b->id }}</td>
                                        <td>{{ $b->kode_pasien }}</td>
                                        <td>{{ $b->nama_pasien }}</td>
                                        <td>{{ $b->jenis_kelamin }}</td>
                                        <td>{{ $b->status }}</td>
                                        <td>{{ $b->alamat }}</td>
                                        <td>{{ $b->created_at }}</td>
                                        <td>
                                            <a href="{{ url('pasien/'.$b->id.'/edit', []) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ url('pasien/'.$b->id, []) }}" method="post" class="d-inline"
                                                onsubmit="return confirm('Apakah Dihapus?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $pasien->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection