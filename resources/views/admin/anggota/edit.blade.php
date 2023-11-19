<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="text-lg font-semibold text-white">Ubah Anggota</h1>

          <form action="{{ route('anggota.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label text-white font-medium">Nama :</label>
              <input type="text" name="name" id="name" class="form-control dark:bg-gray-700 dark:text-white font-medium rounded-lg max-w-full mx-3" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label dark:text-white font-medium">Email :</label>
              <input type="email" name="email" id="email" class="form-control dark:bg-gray-700 dark:text-white font-medium rounded-lg max-w-full mx-3" value="{{ $user->email }}">
            </div>

            <button type="submit" class="btn btn-primary text-white border bg-blue-600 border-blue-600 rounded-lg py-2 px-2 shadow-lg hover:bg-blue-700 hover:border-blue-700 me-2">Ubah</button>
            <a href="{{ route('anggota') }}" class="btn btn-primary text-white border bg-red-600 border-red-600 hover:bg-red-700 hover:border-red-700 rounded-lg py-2 px-2">kembali</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
