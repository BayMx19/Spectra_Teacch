@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">


        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Profile
                </h5>
                <div class="card-body">
                    <form action="{{route('master_users.store')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Masukkan Email Anda" value="{{$users->email}}" readonly />
                        </div>
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Masukkan Nama Anda" value="{{$users->name}}" readonly />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Masukkan Password" />
                        </div> -->
                        <!-- <div class="mb-4">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" aria-label="Default select example">
                                <option selected>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div> -->
                        <div class="mb-4">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" name="role" class="form-control" id="role"
                                placeholder="Masukkan Role Anda" value="{{$users->role}}" readonly />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" aria-label="Default select example">
                                <option selected>Pilih Status</option>
                                <option value="ACTIVE">Aktif</option>
                                <option value="INACTIVE">Tidak Aktif</option>
                            </select>
                        </div> -->
                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" id="status"
                                placeholder="Masukkan Status Anda" value="{{$users->status}}" readonly />
                        </div>
                        <!-- <div class="row px-3">
                            <button class="btn btn-primary px-3">Simpan Data</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection