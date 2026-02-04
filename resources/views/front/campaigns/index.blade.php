@extends('layouts.app')

@section('content')
<h1>Campaign Donasi</h1>

<div style="display:flex; gap:20px;">
@foreach ($campaigns as $c)
    <div style="border:1px solid #ccc; padding:15px; width:250px;">
        <h3>{{ $c->title }}</h3>
        <p>{{ $c->description }}</p>

        <p>Target: {{ $c->target_amount }}</p>
        <p>Terkumpul: {{ $c->current_amount }}</p>
        <p>Progress: {{ $c->progress() }}%</p>

        <form method="POST" action="/campaigns/{{ $c->id }}/donate">
            @csrf
            <input type="number" name="amount" placeholder="Nominal">
            <button>Donasi</button>
        </form>
    </div>
@endforeach
</div>
@endsection
