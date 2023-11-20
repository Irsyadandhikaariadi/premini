<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <a href="{{ route('jadwal.create') }}">tambah</a>
          @foreach ($jadwal as $jadwal)
            <a href="#"
              class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $jadwal->note }}</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">{{ $jadwal->waktu }}</p>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
