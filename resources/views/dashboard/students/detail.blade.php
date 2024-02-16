@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Students {{ $student->nama }}</h1>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tr>
                <td>{{ $student->nis }}</td>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->tanggal_lahir }}</td>
                <td>{{ $student->kelas->kelas }}</td>
                <td>{{ $student->alamat }}</td>
                <td>{{ $student->gender->gender }}</td>
                <td>
                    <div class="loading-text" id="loadingText">Image is loading...</div>
                    <img src="{{ $student->gambar }}" alt="Student Image" id="studentImage" style="display: none;">
                </td>
                <td></td>
            </tr>
        </table>
    </div>

<a class="btn btn-danger" id="button" href="/dashboard/students" style="margin-top: 20px; color:white">Back</a>
    <script src="/js/color-modes.js"></script>
    <script src="/js/image-load.js"></script>
@endsection
