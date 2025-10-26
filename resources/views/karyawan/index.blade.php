<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>kelola karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="font-[Poppins] bg-gray-50 text-gray-800">
<x-navbar></x-navbar>
<x-header>kelola karyawan</x-header>
<body class="bg-gray-50 font-sans antialiased text-gray-800">

  <!-- MAIN CONTENT -->
  <main class="mx-auto max-w-7xl p-6">
    
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Data Karyawan</h2>

    <!-- Form Pencarian -->
    <form action="{{ route('karyawan.index') }}" method="GET" class="flex items-center gap-2 mb-5">
      <input type="text" name="search" value="{{ $search }}"
             placeholder="Cari karyawan..."
             class="border border-gray-300 rounded-md px-3 py-2 w-1/4 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
      <button type="submit"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium">
        Cari
      </button>
    </form>

    <!-- Tombol Navigasi -->
    <div class="flex gap-2 mb-5">
      <a href="{{ route('barang.index') }}"
         class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md font-medium">
         Lihat Data Barang
      </a>
      <a href="{{ route('karyawan.create') }}"
         class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-medium">
         + Tambah Karyawan
      </a>
    </div>

    <!-- Alert Sukses -->
    @if(session('success'))
      <div class="mb-4 rounded-md bg-green-100 text-green-800 px-4 py-2">
        {{ session('success') }}
      </div>
    @endif

    <!-- TABLE -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
      <table class="min-w-full border-collapse text-sm">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">No</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Foto</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Jenis Kelamin</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($karyawans as $karyawan)
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-3">{{ $karyawans->firstItem() + $loop->index }}</td>
              <td class="px-4 py-3">
                @if($karyawan->foto_karyawan)
                  <img src="{{ asset('storage/'.$karyawan->foto_karyawan) }}" class="w-14 h-14 object-cover rounded-md border">
                @else
                  <span class="text-gray-400">-</span>
                @endif
              </td>
              <td class="px-4 py-3">{{ $karyawan->nama }}</td>
              <td class="px-4 py-3">{{ $karyawan->jenis_kelamin }}</td>
              <td class="px-4 py-3 flex items-center space-x-2">
                <a href="{{ route('karyawan.edit', $karyawan->id) }}"
                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-xs">
                   Edit
                </a>
                <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs">
                          Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data karyawan</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
      {{ $karyawans->links() }}
    </div>

  </main>

</body>
</html>