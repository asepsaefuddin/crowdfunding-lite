@extends('layouts.app')

@section('content')
<h1>Tambah Campaign</h1>

<form method="POST" action="/admin/campaigns">
    @csrf

    <div>
        <label>Judul</label><br>
        <input type="text" name="title">
    </div>

    <div>
        <label>Deskripsi</label><br>
        <textarea name="description"></textarea>
    </div>

    <div>
        <label>Target Donasi</label><br>
        <input type="number" name="target_amount">
    </div>

    <button type="submit">Simpan</button>
</form>
@endsection
