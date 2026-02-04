@extends('layouts.app')

@section('content')
<h1>Admin - Campaign</h1>

<a href="/admin/campaigns/create">+ Tambah Campaign</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Judul</th>
        <th>Target</th>
        <th>Terkumpul</th>
        <th>Aksi</th>
    </tr>

    @foreach ($campaigns as $c)
    <tr>
        <td>{{ $c->title }}</td>
        <td>{{ $c->target_amount }}</td>
        <td>{{ $c->current_amount }}</td>
        <td>
            <a href="/admin/campaigns/{{ $c->id }}/edit">Edit</a>

            <form method="POST" action="/admin/campaigns/{{ $c->id }}/delete" style="display:inline">
                @csrf
                <button>Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
