@extends('layouts.index')

@section('main')
<div class="main mt-4" style="height: 100%">
    Selamat Datang {{ auth()->user()->fullname }} di Aplikasi Peduli Diri ini
</div>
<div class="nav justify-content-end mt-3">
    <a class="btn" href="history/create">Isi Catatan Perjalanan</a>
</div>
@endsection
