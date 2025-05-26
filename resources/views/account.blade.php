@extends('templates.mainTemplatedUser')

@section('title', 'Kontak')

@section('konten')
@if ($errors->any())
<div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert" style="width: 100%">
    <div class="d-flex align-items-center">
        <i class="bi bi-exclamation-circle-fill me-2"></i>
        <div>
            @foreach ($errors->all() as $error)
            <p class="m-0">{{ $error }}</p>
            @endforeach
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Jika Sukses Login --}}
@if (session('success'))
<div class="alert alert-success" style="width: 100%">
    {{ session('success') }}
</div>
@endif

{{-- jika Password telah di ubah --}}
@if (session('status'))
<div class="alert alert-success" style="width: 100%">
    {{ session('status') }}
</div>
@endif

<form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="nama_panjang">Nama Lengkap:</label>
        <input type="text" name="nama_panjang" id="nama_panjang"
            value="{{ old('nama_panjang', $userProfile->nama_panjang ?? '') }}">
    </div>

    <div>
        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki"
            {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Laki-laki' ? 'checked' : '' }}> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan"
            {{ old('jenis_kelamin', $userProfile->jenis_kelamin ?? '') === 'Perempuan' ? 'checked' : '' }}> Perempuan
    </div>

    <div>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
            value="{{ old('tanggal_lahir', $userProfile->tanggal_lahir ?? '') }}">
    </div>

    <div>
        <label for="noHp">Nomor HP:</label>
        <input type="text" name="noHp" id="noHp" value="{{ old('noHp', $userProfile->noHp ?? '') }}">
    </div>

    <div>
        <label for="foto_profil">Foto Profil:</label>
        <input type="file" name="foto_profil" id="foto_profil">
        @if (!empty($userProfile->foto_profil))
        <p>Current file: {{ $userProfile->foto_profil }}</p>
        <img src="{{ asset('img/user/profile/' . $userProfile->foto_profil) }}" width="100" alt="Preview">
        @endif
    </div>

    <button type="submit">Submit</button>
</form>

@endsection
