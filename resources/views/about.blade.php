@extends('layouts.main')

@section('container')
      {{-- tempat content --}}
    <h1>Ini adalah halaman about</h1>
    <h3>{{$Nama}}</h3>
    <h3>{{$Kelas}}</h3>
    <img src="{{$Image}}" width="120px">

@endsection