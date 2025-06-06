@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">

        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Edit Modules</h5>
                <div class="card-body">
                    <form action="{{ route('master_modules.update', $modules->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Masukkan Judul Modules" value="{{ $modules->title }}" />
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Masukkan Deskripsi Anda" value="{{ $modules->description }}" />
                        </div>

                        <div class="mb-4">
                            <label for="filepdf" class="form-label">Upload File PDF (Opsional)</label>
                            <input type="file" name="filepdf" class="form-control" id="filepdf"
                                accept="application/pdf" />
                            @if($modules->pdf_path)
                            <small class="form-text text-muted mt-1">
                                File saat ini: <a href="{{ asset('storage/'.$modules->pdf_path) }}"
                                    target="_blank">Lihat PDF</a>
                            </small>
                            @endif
                        </div>

                        <div class="row px-3">
                            <button type="submit" class="btn btn-primary px-3">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
