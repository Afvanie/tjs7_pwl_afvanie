@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- Menampilkan Search Box Pada Halaman Utama --}}
    <form method="get" action="{{ url('cari') }}">
        <div class="form-group w-100 mb-3">
            <input type="search" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari Nama Mahasiswa">
            <span class = "form-group-btn">
                <button type="submit" class="btn btn-dark">Cari Disini</button>
            </span>
        </div>
    </form>

    <table class="table table-bordered text-center">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($mahasiswa as $Mahasiswa)
        <tr>
            <td>{{ $Mahasiswa->nim }}</td>
            <td>{{ $Mahasiswa->nama }}</td>
            <td>{{ $Mahasiswa->tanggal_lahir }}</td>
            <td>{{ $Mahasiswa->kelas }}</td>
            <td>{{ $Mahasiswa->jurusan }}</td>
            <td>{{ $Mahasiswa->no_handphone }}</td>
            <td>{{ $Mahasiswa->email }}</td>
            <td>
                <form action="{{ route('mahasiswa.destroy',$Mahasiswa->nim) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <p>Showing
        {{$mahasiswa->firstItem()}}
        to
        {{$mahasiswa->lastItem()}}
        of
        {{$mahasiswa->total()}}
        entries</p>
     </div>
    <div class="d-flex justify-content-center">
        {{$mahasiswa->links()}}
    </div>
@endsection