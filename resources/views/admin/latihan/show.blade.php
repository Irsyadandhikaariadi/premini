<x-app-layout>

  @include('components.toast')

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <img class="rounded-t-lg" src="{{ asset('storage/latihan/' . $latihan->gambar) }}" alt="image" />
            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $latihan->nama }}</h5>
            <p class="mb-1 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $latihan->jenis }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $latihan->deskripsi }}</p>
            @foreach ($video_urls as $video_url)
              <video width="640" height="360" controls>
                <source src="{{ $video_url }}" type="video/mp4">
                <source src="{{ $video_url }}" type="video/ogg">
                <source src="{{ $video_url }}" type="video/quicktime">
                <source src="{{ $video_url }}" type="video/x-msvideo">
                <source src="{{ $video_url }}" type="video/x-flv">
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
