@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Tempat Kuliner</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Tempat</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Alamat</th>
                <th>Gambar</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kuliners as $kuliner)
                <tr>
                    <td>{{ $kuliner->id }}</td>
                    <td>{{ $kuliner->name }}</td>
                    <td>{{ $kuliner->price_range }}</td>
                    <td>{{ $kuliner->description }}</td>
                    <td class="shorten-text">{{ $kuliner->address }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $kuliner->image) }}" class="img-thumbnail" alt="Kuliner Image">
                    </td>
                    <td>
                        {{ $kuliner->user ? $kuliner->user->name : 'Tidak Diketahui' }}
                    </td>
                    <td>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.kuliner.destroy', $kuliner->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tempat kuliner ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .shorten-text {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .img-thumbnail {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endsection
