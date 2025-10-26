<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-3">Edit Data Karyawan</h2>

    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Karyawan</label>
            <input type="text" name="nama" value="{{ $karyawan->nama }}" class="form-control" required>
        </div>


        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ $karyawan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $karyawan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Foto Karyawan</label><br>
            @if($karyawan->foto_karyawan)
                <img src="{{ asset('storage/'.$karyawan->foto_karyawan) }}" width="80" class="mb-2"><br>
            @endif
            <input type="file" name="foto_karyawan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
</body>
</html>
