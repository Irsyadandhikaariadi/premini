<x-app-layout>

  @include('components.toast')

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <!-- show.blade.php -->

            <h1>Data Latihan</h1>

            <!-- Informasi latihan -->
            <p>ID: {{ $latihan->id }}</p>
            <p>Nama: {{ $latihan->nama }}</p>
            <p>Jenis: {{ $latihan->jenis }}</p>
            <p>Deskripsi: {{ $latihan->deskripsi }}</p>
            <p>Gambar: {{ $latihan->gambar }}</p>

            <h2>Data Menu Latihan</h2>

            <!-- Informasi menu latihan -->
            @foreach ($menuLatihan as $menu)              
              <p>Nama Menu: {{ $menu->nama }}</p>
            @endforeach

            <a href="{{ route('latihan.admin') }}">back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
