<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="grid grid-cols-3 gap-4">
            @foreach ($latihan as $latihan)
              <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                  <img class="rounded-t-lg" src="{{ asset('storage/latihan/' . $latihan->gambar) }}" alt="image" />
                </a>
                <div class="p-5">
                  <a href="detail">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $latihan->nama }}
                    </h5>
                  </a>
                  <p class="mb-1 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $latihan->jenis }}</p>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $latihan->deskripsi }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
