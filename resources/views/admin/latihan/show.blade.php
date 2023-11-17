<x-app-layout>

  @include('components.toast')

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @foreach ($womenu as $womenu)
              <img class="rounded-t-lg" src="{{ asset('storage/latihan/' . $womenu->gambar) }}" alt="image" />
              <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $womenu->nama }}</h5>
              <p class="mb-1 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $womenu->jenis }}</p>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $womenu->deskripsi }}</p>
              <video width="640" height="360" controls>
                <source src="{{ asset('storage/womenu/' . $womenu->menuLatihan->video_url) }}" type="video/mp4">
                <source src="{{ asset('storage/womenu/' . $womenu->menuLatihan->video_url) }}" type="video/ogg">
                <source src="{{ asset('storage/womenu/' . $womenu->menuLatihan->video_url) }}" type="video/quicktime">
                <source src="{{ asset('storage/womenu/' . $womenu->menuLatihan->video_url) }}" type="video/x-msvideo">
                <source src="{{ asset('storage/womenu/' . $womenu->menuLatihan->video_url) }}" type="video/x-flv">
                Your browser does not support the video tag.
              </video>
            @endforeach
            <a href="{{ route('latihan.admin') }}">back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
