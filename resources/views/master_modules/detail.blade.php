@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">


        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Detail Modules
                </h5>
                <div class="card-body">
                    <form action="{{route('master_users.store')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Judul</label>
                            <input type="title" name="title" class="form-control" id="title"
                                placeholder="Masukkan Judul Modules" value="{{$modules->title}}" readonly />
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Masukkan Deskripsi Anda" value="{{$modules->description}}" readonly />
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