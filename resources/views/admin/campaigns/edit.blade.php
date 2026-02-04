@extends('layouts.app')

@section('content')
<div class="admin-form">
    <h1>Edit Campaign</h1>

    <form method="POST" action="/admin/campaigns/{{ $campaign->id }}/update">
        @csrf

        <div class="form-group">
            <label>Judul</label>
            <input
                type="text"
                name="title"
                value="{{ $campaign->title }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" required>{{ $campaign->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Target Donasi</label>
            <input
                type="number"
                name="target_amount"
                value="{{ $campaign->target_amount }}"
                required
                min="1"
            >
        </div>

        <div class="form-actions">
            <button class="form-submit">Update</button>
            <a href="/admin/campaigns" class="form-cancel">Batal</a>
        </div>
    </form>
</div>
@endsection
