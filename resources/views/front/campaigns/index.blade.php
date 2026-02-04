@extends('layouts.app')

@section('content')
<h1>Campaign Donasi</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

<div class="campaign-grid">
@foreach ($campaigns as $c)
    <div class="campaign-card">
        <h3>{{ $c->title }}</h3>

        <p>{{ $c->description }}</p>

        <p><strong>Target:</strong> Rp {{ number_format($c->target_amount) }}</p>
        <p><strong>Terkumpul:</strong> Rp {{ number_format($c->current_amount) }}</p>

        <div class="progress-wrapper">
            <div class="progress-bar">
                <div
                    class="progress-fill"
                    style="width: {{ $c->progress() }}%"
                ></div>
            </div>
            <small>{{ $c->progress() }}%</small>
        </div>

        <form method="POST" action={{ route('campaigns.donate', $c->id) }}>
            @csrf
            <input
                type="number"
                name="amount"
                placeholder="Nominal donasi"
                required
                min="1000"
            >
            <button type="submit">Donasi</button>
        </form>
    </div>
@endforeach
</div>
@endsection
