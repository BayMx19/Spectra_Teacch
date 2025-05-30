@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">
            <div class="row">
                <div class="col-sm-6 text-bold">Master Users</div>
                <div class="col-sm-6 create-data"><a href="{{route('master_users.create')}}"><button
                            class="btn btn-primary"><i class="bx bx-plus"></i>Tambah
                            Users</button></a></div>
            </div>
        </h5>

        <div class="table-responsive text-wrap px-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <span
                                style="color: {{ $user->status == 'ACTIVE' ? 'green' : ($user->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                {{ $user->status }}
                            </span>
                        </td>

                        <td>
                            <a href="{{ route('master_users.detail', $user->id) }}"
                                class="btn btn-primary btn-sm me-2">Detail</a>
                            <a href="{{ route('master_users.edit', $user->id) }}"
                                class="btn btn-warning btn-sm me-2">Edit</a>

                            <form action="{{ route('master_users.destroy', $user->id) }}" method="POST"
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