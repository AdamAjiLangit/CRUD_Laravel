@extends('layouts.main')

<style>
    table {
        border-collapse: separate;
        border-spacing: 0 2px;
    }

    th,
    td {
        padding: 5px 10px;
    }
</style>

@section('container')
    {{-- tempat content --}}
    <h1>Tabel Data Siswa</h1>
    <a type="button" class="btn btn-primary" href="/student/create/" style="margin-bottom: 15px">Add Data</a>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>

                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->kelas }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>
                        <a type="button" class="btn btn-primary" href="/student/detail/{{ $student->id }}">Detail</a>
                        <a type="button" class="btn btn-warning" href="/student/edit/{{ $student->id }}"
                            style="color: white"">Edit</a>
                        <form action="/student/delete/{{ $student->id }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
