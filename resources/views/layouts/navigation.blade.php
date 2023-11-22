<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ route('dashboard') }}">
      <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button"
        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
        id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <x-dropdown-link :href="route('profile.edit')">
              {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                  this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 gap-x-10" id="navbar-user">
      @if (Auth::user()->role == 'user')
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('latihan.user')" :active="request()->routeIs('latihan.user')">
          {{ __('Latihan') }}
        </x-nav-link>
        <x-nav-link :href="route('kehadiran.user')" :active="request()->routeIs('kehadiran.user')">
          {{ __('Kehadiran') }}
        </x-nav-link>
        <x-nav-link :href="route('jadwal.user')" :active="request()->routeIs('jadwal.user')">
          {{ __('Jadwal') }}
        </x-nav-link>
      @endif
      @if (Auth::user()->role == 'admin')
        <x-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
          {{ __('Dashboard') }}
        </x-nav-link>
        <x-nav-link :href="route('anggota')" :active="request()->routeIs('anggota')">
          {{ __('Anggota') }}
        </x-nav-link>
        <x-nav-link :href="route('latihan.admin')" :active="request()->routeIs('latihan.admin')">
          {{ __('Latihan') }}
        </x-nav-link>
        <x-nav-link :href="route('womenu.admin')" :active="request()->routeIs('womenu.admin')">
          {{ __('Womenu') }}
        </x-nav-link>
        <x-nav-link :href="route('kehadiran.admin')" :active="request()->routeIs('kehadiran.admin')">
          {{ __('Kehadiran') }}
        </x-nav-link>
      @endif
    </div>
  </div>
</nav>
