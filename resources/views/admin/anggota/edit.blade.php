<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="dark:text-white">Ubah Anggota</h1>

          <form action="{{ route('anggota.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label dark:text-white">Nama</label>
              <input type="text" name="name" id="name" class="form-control dark:bg-gray-700 dark:text-white" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label dark:text-white">Email</label>
              <input type="email" name="email" id="email" class="form-control dark:bg-gray-700 dark:text-white" value="{{ $user->email }}">
            </div>

            <button type="submit" class="btn btn-primary dark:bg-gray-700 dark:text-white">Ubah</button>
            <a href="{{ route('anggota') }}" class="btn btn-primary dark:bg-gray-700 dark:text-white">kembali</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
