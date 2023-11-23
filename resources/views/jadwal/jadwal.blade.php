<x-app-layout>
  @include('components.toast')
  <div class="grid grid-cols-12 gap-4 px-10 py-5">
    <div class="col-span-3">
      <div inline-datepicker data-date="now"></div>
    </div>
    <div class="col-span-9">
      <div class="container dark:bg-gray-700 h-full bg-white rounded-lg shadow-md p-5">
        <div class="flex justify-end mb-4">
          <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah
          </button>
          <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Jadwal
                  </h3>
                  <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                </div>
                <form action="{{ route('jadwal.store') }}" method="POST">
                  @csrf
                  <div class="grid gap-4 mb-6 md:grid-cols-2 px-3">
                    <div>
                      <label for="date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                      <input type="date" id="date" name="tanggal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                      <label for="time"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam</label>
                      <input type="time" id="time" name="waktu"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                  </div>
                  <div class="mb-2 mx-3">
                    <label for="note"
                      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                    <textarea id="note" name="note"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Catatan Kamu"></textarea>
                  </div>
                  <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="submit"
                      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                    <button data-modal-hide="default-modal" type="button"
                      class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Keluar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-7 gap-4 bg-gray-900">
          @foreach ($weekDays as $day)
            <div class="p-4 rounded-lg text-white">
              <h2 class="text-lg text-center font-bold {{ $day['isActive'] ? 'text-blue-300' : 'text-gray-100' }}">
                {{ $day['day'] }}
              </h2>
              <h2 class="text-lg text-center font-bold {{ $day['isActive'] ? 'text-blue-300' : 'text-gray-100' }}">
                {{ $day['dayName'] }}
              </h2>
            </div>
          @endforeach
        </div>
        @foreach ($weekDays as $day)
          @foreach ($day['notes'] as $note)
            <div class="flex flex-wrap justify-start bg-gray-600 rounded-lg shadow-lg py-2 px-2 mb-2">
              <p class="text-black dark:text-white">{{ $day['date'] }} {{ $note->note }} {{ $note->waktu }}</p>
              <form action="{{ route('jadwal.destroy', $note->id_jadwal) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-500 hover:bg-red-600 rounded-lg text-black dark:text-white shadow-lg pb-1 mt-1 px-1">Hapus</button>
              </form>
            </div>
          @endforeach
        @endforeach

      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/datepicker.min.js"></script>

</x-app-layout>
