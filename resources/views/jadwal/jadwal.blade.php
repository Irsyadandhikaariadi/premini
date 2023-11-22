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
          <!-- Hari-hari dalam seminggu -->
          <div class="text-center font-bold">Sunday</div>
          <div class="text-center font-bold">Monday</div>
          <div class="text-center font-bold">Tuesday</div>
          <div class="text-center font-bold">Wednesday</div>
          <div class="text-center font-bold">Thursday</div>
          <div class="text-center font-bold">Friday</div>
          <div class="text-center font-bold">Saturday</div>

          <!-- Isi kalender (menggunakan Blade syntax untuk menampilkan data dinamis) -->
          @foreach ($daysOfWeek as $day)
            <div class="border p-2">{{ $day->format('D, M d') }}</div>
          @endforeach
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>

</x-app-layout>
