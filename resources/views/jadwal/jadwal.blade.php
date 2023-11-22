<x-app-layout>
  @include('components.toast')
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-3">
      <div inline-datepicker data-date="now"></div>
    </div>
    <div class="col-span-9 ">
      <div class="container dark:bg-gray-700 bg-white rounded-lg shadow-md p-5">
        <h1 class="text-2xl font-bold mb-4 dark:text-white">Kalender Mingguan</h1>
        <div class="flex justify-end mb-4">
          <a href="{{ route('jadwal.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded dark:bg-blue-700 dark:hover:bg-blue-500">
            Tambah
          </a>
        </div>
        <div class="grid grid-cols-7 gap-4">
          @foreach ($weekDays as $day)
            <div
              class="p-4 rounded border border-gray-200 dark:border-blue-700 dark:bg-blue-700 dark:hover:bg-blue-500">
              <h2
                class="text-lg text-center font-bold mb-2 {{ $day['isActive'] ? 'text-blue-500 hover:text-blue-700' : 'text-gray-500' }}">
                {{ $day['day'] }}
              </h2>
              <h2
                class="text-lg text-center font-bold mb-2 {{ $day['isActive'] ? 'text-blue-500 hover:text-blue-700' : 'text-gray-500' }}">
                {{ $day['dayName'] }}
              </h2>
              @foreach ($day['notes'] as $note)
                <p class="dark:text-white">{{ $note->note }} - {{ $note->waktu }}</p>
                <form action="{{ route('jadwal.destroy', $note->id_jadwal) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Delete</button>
                </form>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>

</x-app-layout>
