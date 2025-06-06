@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">

        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Edit Lessons</h5>
                <div class="card-body">
                    <form action="{{ route('master_lessons.update', $lessons->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="module_id" class="form-label">Pilih Module</label>
                            <select name="module_id" class="form-control" id="module_id">
                                @foreach($modules as $module)
                                <option value="{{ $module->id }}"
                                    {{ $lessons->module_id == $module->id ? 'selected' : '' }}>
                                    {{ $module->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Masukkan Judul Lesson" value="{{ $lessons->title }}" />
                        </div>
                        <div class="mb-4">
                            <label for="order" class="form-label">Urutan</label>
                            <input type="text" name="order" class="form-control" id="order"
                                placeholder="Masukkan Urutan Lesson" value="{{ $lessons->order }}" min="1" />
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Masukkan Deskripsi Anda" value="{{ $lessons->description }}" />
                        </div>


                        <div class="row px-3">
                            <button class="btn btn-primary px-3">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection