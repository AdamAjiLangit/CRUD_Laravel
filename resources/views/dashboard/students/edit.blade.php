@extends('dashboard.layouts.main')

<style>
    .form-group {
        margin-top: 20px;
    }

    h1 {
        padding-top: 20px;
    }
</style>

@section('container')
    <h1>Edit Student</h1>
    <form action="/dashboard/students/update/{{ $student->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="number" name="nis" id="nis" class="form-control" readonly
                value="{{ old('nis', $student->nis) }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control"
                value="{{ old('nama', $student->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select class="form-select" name="kelas_id">
                @foreach ($kelas as $Kelas)
                    <option name="kelas_id" value="{{ $Kelas->id }}"
                        {{ $Kelas->id == $student->kelas_id ? 'selected' : '' }}>
                        {{ $Kelas->kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control"
                value="{{ old('alamat', $student->alamat) }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-select" name="gender_id">
                @foreach ($gender as $Gender)
                    <option name="gender_id" value="{{ $Gender->id }}"
                        {{ $Gender->id == $student->gender_id ? 'selected' : '' }}>
                        {{ $Gender->gender }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" id="button" class="btn btn-warning" style="margin-top: 20px; color:white;"
            onclick="return confirm('Are you sure you want to edit this student?')">Edit</button>
        <a class="btn btn-danger" id="button" href="/dashboard/students"
            style="margin-top: 20px; margin-left:5px; color:white">Back</a>

    </form>
    <script src="/js/color-modes.js"></script>
@endsection
