@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y px-4">
    <div class="row g-6">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header text-bold mt-3 mb-3">Detail Sub Lesson</h5>
                <div class="card-body">
                    <form action="{{ route('master_sub_lessons.update', $subLesson->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="lessons_id" value="{{ $subLesson->lesson_id }}">

                        <div class="mb-4">
                            <label for="title" class="form-label">Judul Sub Lesson</label>
                            <input type="text" name="title" class="form-control" id="title" required
                                value="{{ old('title', $subLesson->title) }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" id="description" rows="4"
                                required readonly>{{ old('description', $subLesson->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="order" class="form-label">Urutan</label>
                            <input type="number" name="order" class="form-control" id="order" min="1" required
                                value="{{ old('order', $subLesson->order) }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="use_table_data" class="form-label">Gunakan Table Data?</label>
                            <select name="use_table_data" id="use_table_data" class="form-control" readonly>
                                <option value="0" {{ !$subLesson->table_data ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ $subLesson->table_data ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>

                        <div class="table-builder mb-4" id="table-builder"
                            style="display: {{ $subLesson->table_data ? 'block' : 'none' }};">
                            <div class="d-flex mb-2">
                                <!-- <button type="button" class="btn btn-sm btn-secondary me-2" id="add-column">+
                                    Kolom</button>
                                <button type="button" class="btn btn-sm btn-secondary" id="add-row">+ Baris</button> -->
                            </div>
                            <table class="table table-bordered" readonly>
                                <thead>
                                    <tr id="table-head" readonly></tr>
                                </thead>
                                <tbody id="table-body" readonly></tbody>
                            </table>
                            <input type="hidden" name="table_data_json" id="table-data-json"
                                value="{{ old('table_data_json', $subLesson->table_data) }}">
                        </div>

                        <div class="mb-4">
                            <label for="use_image" class="form-label">Gunakan Gambar?</label>
                            <select name="use_image" id="use_image" class="form-control" readonly>
                                <option value="0" {{ !$subLesson->image_path ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ $subLesson->image_path ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>

                        <div class="mb-4 image-container" id="image-container"
                            style="display: {{ $subLesson->image_path ? 'block' : 'none' }};">
                            <label for="image_path" class="form-label">Upload Gambar</label>
                            <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*" readonly>
                            @if($subLesson->image_path)
                            <p class="mt-2">Gambar saat ini:</p>
                            <img src="{{ asset('storage/'.$subLesson->image_path) }}" alt="Gambar Sub Lesson"
                                style="max-width: 200px;">
                            @endif
                        </div>

                        <!-- <div class="row px-3">
                            <button type="submit" class="btn btn-primary px-3">Simpan Perubahan</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('use_table_data').addEventListener('change', function() {
    document.getElementById('table-builder').style.display = this.value == '1' ? 'block' : 'none';
});

document.getElementById('use_image').addEventListener('change', function() {
    document.getElementById('image-container').style.display = this.value == '1' ? 'block' : 'none';
});

let tableData = {!! $subLesson->table_data ?? 'null' !!};
console.log(tableData);

const tableHead = document.getElementById('table-head');
const tableBody = document.getElementById('table-body');
const tableDataInput = document.getElementById('table-data-json');

function renderTable() {
    tableHead.innerHTML = '';
    tableBody.innerHTML = '';

    if (!tableData || !tableData.headers || !tableData.rows) return;

    tableData.headers.forEach(header => {
        let th = document.createElement('th');
        th.textContent = header;
        tableHead.appendChild(th);
    });

    tableData.rows.forEach(row => {
        let tr = document.createElement('tr');
        tableData.headers.forEach(h => {
            let td = document.createElement('td');
            let input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control';
            input.value = row[h] || '';
            td.appendChild(input);
            tr.appendChild(td);
        });
        tableBody.appendChild(tr);
    });
}

renderTable();

document.getElementById('add-column').addEventListener('click', () => {
    let colName = prompt("Masukkan nama kolom:");
    if (!colName) return;

    if (!tableData) {
        tableData = {
            headers: [],
            rows: []
        };
    }

    if (tableData.headers.includes(colName)) {
        alert('Nama kolom sudah ada!');
        return;
    }

    tableData.headers.push(colName);
    tableData.rows.forEach(row => {
        row[colName] = '';
    });

    if (tableData.rows.length === 0) {
        let newRow = {};
        tableData.headers.forEach(h => {
            newRow[h] = '';
        });
        tableData.rows.push(newRow);
    }

    renderTable();
});

document.getElementById('add-row').addEventListener('click', () => {
    if (!tableData) {
        tableData = {
            headers: [],
            rows: []
        };
    }

    if (!tableData.headers || tableData.headers.length === 0) {
        alert('Silakan tambahkan kolom terlebih dahulu!');
        return;
    }

    let newRow = {};
    tableData.headers.forEach(h => {
        newRow[h] = '';
    });
    tableData.rows.push(newRow);
    renderTable();
});

document.querySelector('form').addEventListener('submit', function(e) {
    if (!tableData || !tableData.headers || tableData.headers.length === 0) {
        tableData = {
            headers: ['Kolom 1'],
            rows: [{
                'Kolom 1': ''
            }]
        };
    }
    const headers = Array.from(tableHead.querySelectorAll('th')).map(th => th.textContent.trim());

    const rows = Array.from(tableBody.querySelectorAll('tr')).map(tr => {
        const inputs = Array.from(tr.querySelectorAll('td input'));
        let obj = {};
        headers.forEach((header, i) => {
            obj[header] = inputs[i] ? inputs[i].value : "";
        });
        return obj;
    });

    tableData = {
        headers,
        rows
    };
    tableDataInput.value = JSON.stringify(tableData);
});
</script>
@endsection
