<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="font-[Poppins] bg-gray-50 text-gray-800">
<x-navbar></x-navbar>
<x-header>kelola barang</x-header>
 <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
      <div class="mx-auto max-w-screen-md sm:text-center">
          <form action="{{ route('barang.index') }}" method="GET">  
              <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                  <div class="relative w-full">
                      <label for="email" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                         <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                      </div>
                      <input name ="search" value="{{ request('search') }}" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search Barang" type="search" id="search" autocomplete="off">
                  </div>
                  <div>
                      <button type="submit"class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-gray-900 border-gray-900 sm:rounded-none sm:rounded-r-lg hover:bg-gray-800 focus:ring-4 focus:ring-gray-400">Search</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <!-- MAIN CONTENT -->
  <main class="mx-auto max-w-7xl p-6">
    @if(session('success'))
      <div class="mb-4 rounded-md bg-green-100 text-green-800 px-4 py-2">
        {{ session('success') }}
      </div>
    @endif

    <!-- Tombol Tambah -->
    <a href="{{ route('barang.create') }}"
       class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-md mb-4">
       + Tambah Barang
    </a>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
      <table class="min-w-full border-collapse text-sm">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">No</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Barang</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Kategori</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Harga</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Stok</th>
            <th class="px-4 py-3 text-left font-semibold text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($barang as $item)
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-3">{{ $barang->firstItem() + $loop->index }}</td>
              <td class="px-4 py-3">{{ $item->nama_barang }}</td>
              <td class="px-4 py-3">{{ $item->kategori }}</td>
              <td class="px-4 py-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
              <td class="px-4 py-3">{{ $item->stok }}</td>
              <td class="px-4 py-3 flex items-center space-x-2">
                <a href="{{ route('barang.edit', $item->id) }}"
                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-xs">
                   Edit
                </a>
                <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
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
              <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data barang</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="flex justify-center mt-6">
        {{ $barang->links() }}
    </div>
  </main>
</body>
</html>
