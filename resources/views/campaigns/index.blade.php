@extends('layouts.app')

@section('content')

@foreach (['success', 'error'] as $msg)
    @if(session($msg))
        <div class="{{ $msg === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' }} px-4 py-3 rounded mb-4">
            {{ session($msg) }}
        </div>
    @endif
@endforeach

<h1 class="text-2xl font-bold mb-6">Campaign Donasi</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($campaigns as $campaign)
        <div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
            <div>
                <h3 class="text-xl font-semibold mb-2">{{ $campaign->title }}</h3>
                <p class="mb-4 text-gray-700">{{ $campaign->description }}</p>
                <p><strong>Target:</strong> Rp {{ number_format($campaign->target_amount) }}</p>
                <p><strong>Terkumpul:</strong> Rp {{ number_format($campaign->current_amount) }}</p>

                <div class="mt-4 mb-2">
                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div class="bg-green-500 h-4 rounded-full" style="width: {{ $campaign->progress() }}%"></div>
                    </div>
                    <small>{{ $campaign->progress() }}%</small>
                </div>
            </div>

            <form method="POST" action="/campaigns/{{ $campaign->id }}/donate" class="mt-4 flex gap-2">
                @csrf
                <input 
                    type="number" 
                    name="amount" 
                    placeholder="Nominal donasi" 
                    required 
                    min="1000"
                    class="flex-1 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    Donasi
                </button>
            </form>
        </div>
    @endforeach
</div>

@endsection
