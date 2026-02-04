<!DOCTYPE html>
<html>
<head>
    <title>Crowdfunding Lite</title>
</head>
<body>

<h1>Daftar Campaign</h1>

<ul>
    @foreach ($campaigns as $campaign)
        <li>
            <strong>{{ $campaign->title }}</strong><br>
            {{ $campaign->description }}<br>
            Target: {{ $campaign->target_amount }} <br>
            Terkumpul: {{ $campaign->current_amount }} <br>
            Progress: {{ $campaign->progress() }}%
        </li>
        <hr>
    @endforeach
</ul>

<h2>Buat Campaign Baru</h2>

<form action="/campaigns" method="POST">
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

</body>
</html>
