@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-sm-6 text-bold">Master Lessons</div>
                <div class="col-sm-6 create-data"><a href="{{route('master_lessons.create')}}"><button
                            class="btn btn-primary"><i class="bx bx-plus"></i>Tambah
                            Lessons</button></a></div>
            </div>
        </h5>

        <div class="table-responsive text-wrap px-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Lessons</th>
                        <th>Nama Modules</th>
                        <th>Urutan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($lessons as $lessons)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lessons->title }}</td>
                        <td>{{ $lessons->modules->title }}</td>
                        <td>{{ $lessons->order }}</td>
                        <td>{{ $lessons->description }}</td>
                        <td>{{ $lessons->created_at->format('d-m-Y') }}</td>

                        <td>
                            <a href="{{ route('master_lessons.detail', $lessons->id) }}"
                                class="btn btn-primary btn-sm me-2">Detail</a>
                            <a href="{{ route('master_lessons.edit', $lessons->id) }}"
                                class="btn btn-warning btn-sm me-2">Edit</a>

                            <form action="{{ route('master_lessons.destroy', $lessons->id) }}" method="POST"
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
