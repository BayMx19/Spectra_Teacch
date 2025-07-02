@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Tambah Sub Lessons</h5>
                <div class="card-body">
                    <form id="form-sublesson" action="{{ route('master_sub_lessons.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="lessons_id" class="form-label">Pilih Lesson</label>
                            <select name="lessons_id" id="lessons_id" class="form-control" required>
                                <option value="">-- Pilih Lesson --</option>
                                @foreach($lessons as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="sublessons-container">
                            <!-- Template sublesson -->
                            <div class="sublesson-group border p-3 mb-3">
                                <h6>Sub Lesson 1</h6>

                                <div class="mb-3">
                                    <label>Judul Sub Lesson</label>
                                    <input type="text" name="title[]" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <textarea name="description[]" class="form-control summernote" rows="4" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label>Urutan</label>
                                    <input type="number" name="order[]" class="form-control order-input" value="1"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gunakan Table Data?</label>
                                    <select class="form-control use_table_data" name="use_table_data[]">
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>

                                <div class="table-builder mb-4" style="display: none;">
                                    <div class="d-flex mb-2">
                                        <button type="button" class="btn btn-sm btn-secondary me-2 add-column">+
                                            Kolom</button>
                                        <button type="button" class="btn btn-sm btn-secondary add-row">+ Baris</button>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="table-head"></tr>
                                        </thead>
                                        <tbody class="table-body"></tbody>
                                    </table>
                                    <input type="hidden" name="table_data_json[]" class="table-data-json">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gunakan Gambar?</label>
                                    <select class="form-control use_image" name="use_image[]">
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>

                                <div class="mb-3 image-container" style="display: none;">
                                    <label>Upload Gambar</label>
                                    <input type="file" name="image_path[]" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary mb-4" id="add-sublesson">+ Tambah Sub
                            Lesson</button>

                        <div class="row px-3">
                            <button class="btn btn-primary px-3">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let subLessonCount = 1;

function activateSublessonEvents(group) {
    const useTableSelect = group.querySelector('.use_table_data');
    const tableBuilder = group.querySelector('.table-builder');
    const tableHead = group.querySelector('.table-head');
    const tableBody = group.querySelector('.table-body');
    const tableDataJson = group.querySelector('.table-data-json');

    const updateTableJson = () => {
        const headers = [...tableHead.querySelectorAll('th')].map(th => th.textContent.trim());
        const rows = [...tableBody.querySelectorAll('tr')].map(tr => {
            const inputs = tr.querySelectorAll('td input');
            if (inputs.length < headers.length) {
                throw new Error('Setiap baris harus punya jumlah input sesuai kolom!');
            }
            const obj = {};
            headers.forEach((header, i) => {
                obj[header] = inputs[i]?.value.trim() || "";
            });
            return obj;
        });

        if (headers.length && rows.length) {
            tableDataJson.value = JSON.stringify({
                headers,
                rows
            }, null, 2);
        } else {
            tableDataJson.value = '';
        }
    };

    useTableSelect.addEventListener('change', function() {
        tableBuilder.style.display = this.value === '1' ? 'block' : 'none';
    });

    group.querySelector('.add-column').addEventListener('click', () => {
        const colName = prompt("Masukkan nama kolom:");
        if (!colName || colName.trim() === "") return;

        const th = document.createElement('th');
        th.textContent = colName.trim();
        tableHead.appendChild(th);

        tableBody.querySelectorAll('tr').forEach(row => {
            const td = document.createElement('td');
            td.innerHTML = '<input type="text" class="form-control">';
            row.appendChild(td);
        });
    });

    group.querySelector('.add-row').addEventListener('click', () => {
        const row = document.createElement('tr');
        const colCount = tableHead.querySelectorAll('th').length;
        for (let i = 0; i < colCount; i++) {
            const td = document.createElement('td');
            td.innerHTML = '<input type="text" class="form-control">';
            row.appendChild(td);
        }

        const deleteTd = document.createElement('td');
        deleteTd.innerHTML = '<button type="button" class="btn btn-sm btn-danger remove-row">×</button>';
        row.appendChild(deleteTd);

        tableBody.appendChild(row);
    });

    group.querySelector('.use_image').addEventListener('change', function() {
        const imageContainer = group.querySelector('.image-container');
        imageContainer.style.display = this.value === '1' ? 'block' : 'none';
    });

    tableBody.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
        }
    });

    group.querySelector('.generate-json')?.addEventListener('click', updateTableJson);
}

document.getElementById('add-sublesson').addEventListener('click', function() {
    subLessonCount++;
    const container = document.getElementById('sublessons-container');
    const firstGroup = container.querySelector('.sublesson-group');
    const newGroup = firstGroup.cloneNode(true);

    newGroup.querySelector('h6').textContent = `Sub Lesson ${subLessonCount}`;

    newGroup.querySelectorAll('input[type="text"], input[type="number"], textarea').forEach(input => {
        input.value = '';
    });

    newGroup.querySelectorAll('select').forEach(sel => {
        sel.value = sel.options[0].value;
    });

    newGroup.querySelector('.table-head').innerHTML = '';
    newGroup.querySelector('.table-body').innerHTML = '';
    newGroup.querySelector('.table-data-json').value = '';
    newGroup.querySelector('.table-builder').style.display = 'none';
    newGroup.querySelector('.image-container').style.display = 'none';
    newGroup.querySelector('.order-input').value = subLessonCount;

    activateSublessonEvents(newGroup);
    container.appendChild(newGroup);
});

document.querySelectorAll('.sublesson-group').forEach(activateSublessonEvents);

document.getElementById('form-sublesson').addEventListener('submit', function(e) {
    e.preventDefault();

    try {
        document.querySelectorAll('.sublesson-group').forEach(group => {
            const tableHead = group.querySelector('.table-head');
            const tableBody = group.querySelector('.table-body');
            const tableDataJson = group.querySelector('.table-data-json');

            const headers = [...tableHead.querySelectorAll('th')].map(th => th.textContent.trim());
            const rows = [...tableBody.querySelectorAll('tr')].map(tr => {
                const inputs = tr.querySelectorAll('td input');
                if (inputs.length < headers.length) {
                    throw new Error('Setiap baris harus punya jumlah input sesuai kolom!');
                }
                const rowObj = {};
                headers.forEach((header, i) => {
                    rowObj[header] = inputs[i]?.value.trim() || "";
                });
                return rowObj;
            });

            tableDataJson.value = headers.length ? JSON.stringify({
                headers,
                rows
            }, null, 2) : '';
        });

        this.submit();
    } catch (err) {
        alert("Gagal memproses tabel:\n" + err.message);
        console.error(err);
    }
});
</script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250,
            toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']], // ✅ aktifkan menu tabel
        ['insert', ['link', 'picture']],
        ['view', ['fullscreen', 'codeview']]
    ]
        });
    });
</script>

@endsection
