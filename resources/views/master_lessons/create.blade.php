@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Tambah Lessons</h5>
                <div class="card-body">
                    <form action="{{ route('master_lessons.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="module_id" class="form-label">Pilih Modul</label>
                            <select name="module_id" id="module_id" class="form-control" required>
                                <option value="">-- Pilih Modul --</option>
                                @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="lesson-container">
                            <div class="lesson-group border p-3 mb-3">
                                <h6>Lesson 1</h6>
                                <div class="mb-3">
                                    <label>Judul</label>
                                    <input type="text" name="title[]" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Urutan</label>
                                    <input type="number" name="order[]" value="1" class="form-control order-input"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <input type="text" name="description[]" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary mb-4" id="add-lesson">+ Tambah Lesson</button>

                        <div class="row px-3">
                            <button class="btn btn-primary px-3">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
let lessonCount = 1;

function updateLessonOrders() {
    const orderInputs = document.querySelectorAll('.order-input');
    orderInputs.forEach((input, index) => {
        input.value = index + 1;
    });

    const lessonTitles = document.querySelectorAll('.lesson-group h6');
    lessonTitles.forEach((title, index) => {
        title.textContent = `Lesson ${index + 1}`;
    });
}
document.getElementById('add-lesson').addEventListener('click', function() {
    lessonCount++;
    const container = document.getElementById('lesson-container');
    const newLesson = document.createElement('div');
    newLesson.classList.add('lesson-group', 'border', 'p-3', 'mb-3');
    newLesson.innerHTML = `
            <h6>Lesson ${lessonCount}</h6>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title[]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Urutan</label>
                <input type="number" name="order[]" class="form-control order-input" value="${lessonCount}" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <input type="text" name="description[]" class="form-control">
            </div>
        `;
    container.appendChild(newLesson);
});
</script>
@endsection
