<x-app-layout>

  @include('components.toast');

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          @foreach ($kehadiran as $kehadiran)
            {{ $kehadiran->user->name }}
            @if ($kehadiran->hadir == 1)
              Hadir
            @endif
            {{ $kehadiran->tanggal }}
            <br>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
