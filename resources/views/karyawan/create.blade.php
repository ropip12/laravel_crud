<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-3">Tambah Data Karyawan</h2>

    <!-- Tombol kembali ke daftar karyawan -->
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <!-- Form tambah data -->
    <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Karyawan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="foto_karyawan" class="form-label">Foto Karyawan</label>
            <input 
                type="file" 
                name="foto_karyawan" 
                accept="image/png, image/jpeg" 
                class="form-control @error('foto_karyawan') is-invalid @enderror">

            @error('foto_karyawan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
