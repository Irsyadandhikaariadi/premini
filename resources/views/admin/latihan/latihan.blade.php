<x-app-layout>

  @include('components.toast')

  <a href="{{ route('latihan.create') }}" class="text-white text-2xl">tambah</a>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @foreach ($latihan as $latihan)
              <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('latihan.show', $latihan->id) }}">
                  <img class="rounded-t-lg" src="{{ asset('storage/latihan/'.$latihan->gambar)}}" alt="image" />
                </a>
                <div class="p-5">
                  <a href="{{ route('latihan.show', $latihan->id) }}">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $latihan->nama }}</h5>
                  </a>
                  <p class="mb-1 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $latihan->jenis }}</p>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $latihan->deskripsi }}</p>
                  <a href="{{ route('latihan.edit', $latihan->id) }}">edit</a>
                  <a href="{{ route('latihan.destroy', $latihan->id) }}" onclick="return confirm('yakin mau menghapus data latihan ini')">hapus</a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
