@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-sm-6 text-bold">Master Modules</div>
                <div class="col-sm-6 create-data"><a href="{{route('master_modules.create')}}"><button
                            class="btn btn-primary"><i class="bx bx-plus"></i>Tambah
                            Modules</button></a></div>
            </div>
        </h5>

        <div class="table-responsive text-wrap px-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Modules</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($modules as $modules)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $modules->title }}</td>
                        <td>{{ $modules->description }}</td>

                        <td>
                            <a href="{{ route('master_modules.detail', $modules->id) }}"
                                class="btn btn-primary btn-sm me-2">Detail</a>
                            <a href="{{ route('master_modules.edit', $modules->id) }}"
                                class="btn btn-warning btn-sm me-2">Edit</a>

                            <form action="{{ route('master_modules.destroy', $modules->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->


</div>@endsection