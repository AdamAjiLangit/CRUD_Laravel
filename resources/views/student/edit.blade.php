@extends('layouts.main')

@section('container')
    <h1>Edit Student</h1>
    <form action="/student/update/{{ $student->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="number" name="nis" id="nis" class="form-control" readonly value="{{ old('nis', $student->nis) }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $student->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old( 'kelas', $student->kelas)}}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $student->alamat) }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 20px"
            onclick="return confirm('Are you sure you want to edit this student?')">Edit</button>
        <a class="btn btn-warning" href="/student/all" style="margin-top: 20px; color:white">Back</a>

    </form>
@endsection
