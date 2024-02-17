@extends('dashboard.layouts.main')

<style>
    #button:hover {
        background-color: transparent;
    }

    .form-group {
        margin-top: 20px;
    }
</style>

@section('container')
    <h1>Add Student</h1>
    <form action="/dashboard/students/add" method="POST">
        @csrf

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="number" name="nis" id="nis" class="form-control" required value="{{ old('nis') }}">
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                value="{{ old('tanggal_lahir') }}">
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select class="form-select" name="kelas_id">
                @foreach ($kelas as $Kelas)
                    <option name="kelas_id" value="{{ $Kelas->id }}">{{ $Kelas->kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required value="{{ old('alamat') }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-select" name="gender_id">
                @foreach ($gender as $Gender)
                    <option name="kelas_id" value="{{ $Gender->id }}">{{ $Gender->gender }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" id="button" class="btn btn-primary" style="margin-top: 40px; color: white;">Add
            Student</button>
        <a class="btn btn-danger" id="button" href="/dashboard/students" style="margin-top: 40px; color:white">Back</a>
    </form>
    <script src="/js/color-modes.js"></script>
@endsection
