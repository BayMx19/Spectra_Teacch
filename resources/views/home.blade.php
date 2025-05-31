@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row">
        <!-- Statistik Cards -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <h3 class="text-primary">{{ $userCount }}</h3>
                    <p class="text-muted mb-0">Jumlah pengguna terdaftar</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Total Modules</h5>
                    <h3 class="text-success">{{ $moduleCount }}</h3>
                    <p class="text-muted mb-0">Jumlah Modul Pembelajaran</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Total Lessons</h5>
                    <h3 class="text-warning">{{ $lessonCount }}</h3>
                    <p class="text-muted mb-0">Jumlah Lesson atau Materi yang tersedia</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="row">
        <div class="col-xxl-12 mb-6 order-0">
            <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Selamat datang <b>{{Auth::user()->name }}</b> di
                                Dashboard
                                Spectra TEACCH!</h5>
                            <p class="mb-4">
                                Kelola modul pembelajaran, pantau progress lesson, dan pastikan setiap informasi mudah
                                diakses.
                                Terima kasih sudah berkontribusi dalam proses belajar anak berkebutuhan khusus 💙
                            </p>

                            <a href="{{ route('master_modules.index') }}" class="btn btn-sm btn-outline-primary">Kelola
                                Modules</a>
                            <a href="{{ route('master_lessons.index') }}" class="btn btn-sm btn-outline-primary">Kelola
                                Lessons atau Materi</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
