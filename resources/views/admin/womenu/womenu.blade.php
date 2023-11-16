<x-app-layout>

  @include('components.toast')

  <a href="{{ route('womenu.create') }}" class="text-white text-2xl">Tambah</a>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @foreach ($womenu as $womenu)
              <div class="">
                {{ $womenu->nama }}
                <video width="640" height="360" controls>
                  <source src="{{ asset('storage/womenu/' . $womenu->video_url) }}" type="video/mp4">
                  <source src="{{ asset('storage/womenu/' . $womenu->video_url) }}" type="video/ogg">
                  <source src="{{ asset('storage/womenu/' . $womenu->video_url) }}" type="video/quicktime">
                  <source src="{{ asset('storage/womenu/' . $womenu->video_url) }}" type="video/x-msvideo">
                  <source src="{{ asset('storage/womenu/' . $womenu->video_url) }}" type="video/x-flv">
                  Your browser does not support the video tag.
                </video>
                <a href="{{ route('womenu.edit', $womenu->id_menu) }}">ubah</a>
                <a href="{{ route('womenu.destroy', $womenu->id_menu) }}">hapus</a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
