@extends('layouts.app')

@section('content')
<h1>Edit Campaign</h1>

<form method="POST" action="/admin/campaigns/{{ $campaign->id }}/update">
    @csrf

    <input type="text" name="title" value="{{ $campaign->title }}"><br><br>
    <textarea name="description">{{ $campaign->description }}</textarea><br><br>
    <input type="number" name="target_amount" value="{{ $campaign->target_amount }}"><br><br>

    <button>Update</button>
</form>
@endsection
