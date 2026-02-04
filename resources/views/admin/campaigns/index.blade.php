@extends('layouts.app')

@section('content')
<div class="admin-header">
    <h1>Admin - Campaign</h1>
    <a href="/admin/campaigns/create" class="admin-add-btn">
        + Tambah Campaign
    </a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Target</th>
            <th>Terkumpul</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($campaigns as $c)
        <tr>
            <td>{{ $c->title }}</td>
            <td>Rp {{ number_format($c->target_amount) }}</td>
            <td>Rp {{ number_format($c->current_amount) }}</td>
            <td>
                <div class="admin-actions">
                    <a
                        href="/admin/campaigns/{{ $c->id }}/edit"
                        class="admin-edit"
                    >
                        Edit
                    </a>

                    <form
                        method="POST"
                        action="/admin/campaigns/{{ $c->id }}/delete"
                    >
                        @csrf
                        <button class="admin-delete">
                            Hapus
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
