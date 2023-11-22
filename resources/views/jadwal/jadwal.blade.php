<x-app-layout>
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-3">
      <div inline-datepicker data-date="now"></div>
    </div>
    <div class="col-span-9">
      <a href="{{ route('jadwal.create') }}" class="underline">Tambah</a>
      <div class="container mx-auto my-8 p-4 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Weekly Calendar</h1>
        <div class="grid grid-cols-7 gap-4">
          @foreach ($weekDays as $day)
                <div class="p-4 bg-gray-200">
                    <h2 class="text-lg font-bold mb-2">{{ $day['dayName'] }}</h2>

                    @foreach ($day['notes'] as $note)
                        <p>{{ $note->note }} - {{ $note->waktu }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
      </div>

    </div>
  </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>

</x-app-layout>
