<x-app-layout>

  @include('components.toast');
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="{{ route('kehadiran.store') }}" method="post">
            @csrf
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Absen
            </button>
          </form>
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Pengguna
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Hadir
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Tanggal
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kehadiran as $k)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                      {{ $k->user->name }}
                    </td>
                    <td class="px-6 py-4">
                      @if ($k->hadir == 1)
                        <span class="text-green-500">Hadir</span>
                      @else
                        <span class="text-red-500">Tidak Hadir</span>
                      @endif
                    </td>
                    <td class="px-6 py-4">
                      {{ $k->tanggal }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
