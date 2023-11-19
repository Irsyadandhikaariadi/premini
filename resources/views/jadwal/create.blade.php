<x-app-layout>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <label for="date">tanggal</label>
                    <input type="date" name="tanggal" class="placeholder-black text-black">
                    <label for="note">note</label>
                    <input type="text" name="note" class="placeholder-black text-black">
                    <label for="jam">jam</label>
                    <input type="time" name="jam" value="12:00" class="placeholder-black text-black">
                    <button type="submit">tambah notes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
