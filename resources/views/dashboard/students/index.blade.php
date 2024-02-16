@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Students</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->kelas->kelas }}</td>
                        <td>{{ $student->alamat }}</td>
                        <td>{{ $student->gender->gender }}</td>
                        <td>
                            <a type="button" id="button" class="btn btn-primary"
                                href="/dashboard/students/{{ $student->id }}">Detail <i class="bi bi-eye"></i></a>
                            <a type="button" id="button" class="btn btn-warning"
                                href="/dashboard/students/edit/{{ $student->id }}" style="color: white">Edit <i
                                    class="bi bi-pencil"></i></a>
                            <form action="/dashboard/students/delete/{{ $student->id }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="button"
                                    onclick="return confirm('Are you sure you want to delete this student?')">Delete <i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/color-modes.js"></script>
@endsection
