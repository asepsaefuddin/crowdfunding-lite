@extends('layouts.app')

@section('content')
<div class="admin-form">
    <h1>Tambah Campaign</h1>

    <form method="POST" action="/admin/campaigns">
        @csrf

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" required></textarea>
        </div>

        <div class="form-group">
            <label>Target Donasi</label>
            <input type="number" name="target_amount" required min="1">
        </div>

        <div class="form-actions">
            <button type="submit" class="form-submit">Simpan</button>
            <a href="/admin/campaigns" class="form-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection
