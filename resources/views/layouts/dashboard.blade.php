<div class="antialiased bg-gray-50 dark:bg-gray-900">

  <?php

  use App\Models\Setting;

  $setting = Setting::first();

  ?>

  <nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex justify-between items-center">

      <h1 class=""><a href="/">@if(1 == 2)
          <img src="{{ asset($userPhoto) }}" alt="Logo" class="h-10 w-auto object-contain">
          @else
          <span class="text-xl font-bold text-blue-700">MVW</span>
          @endif
        </a></h1>

      <div class="flex items-center lg:order-2">
        <button
          type="button"

          aria-controls=""
          class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
          <span class="sr-only">Toggle search</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
          </svg>
        </button>



        <button
          type="button"
          class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
          id="user-menu-button"
          aria-expanded="false"
          data-dropdown-toggle="dropdown">
          <span class="sr-only">Open user menu</span>


          <img
            class="w-8 h-8 rounded-full"
            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
            alt="user photo" />



        </button>

        <!-- Notification button -->
        <button id="notificationButton" data-dropdown-toggle="notificationDropdown" class="relative inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" type="button">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 01-3.46 0"></path>
          </svg>
          <!-- Red dot badge -->
          <!-- @isset($userWarnings)
          <span class="absolute top-1 right-1 inline-flex items-center justify-center w-2 h-2 text-xs font-bold text-white bg-red-600 rounded-full"></span>
          @endisset -->
        </button>

        <!-- Dropdown menu -->
        <div id="notificationDropdown" class="hidden z-10 w-80 bg-white rounded-lg shadow-lg dark:bg-gray-800" aria-labelledby="notificationButton">
          <div class="p-4 border-b dark:border-gray-700">
            <h3 class="text-base font-semibold text-gray-900 dark:text-white">Notifications</h3>
          </div>
        </div>



        <!-- Dropdown menu -->
        <div
          class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
          id="dropdown">
          <div class="py-3 px-4">
            <span
              class="block text-sm font-semibold text-gray-900 dark:text-white">{{auth()->user()->name}}</span>
            <span
              class="block text-sm text-gray-900 truncate dark:text-white">{{auth()->user()->email}}</span>
          </div>
          <ul
            class="py-1 text-gray-700 dark:text-gray-300"
            aria-labelledby="dropdown">
            <li>
              <a
                href="{{route('profile.edit')}}"
                class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
            </li>
            @if(auth()->user()->role == 'admin' )
            <li>
              <a
                href="{{route('settings.index')}}"
                class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Settings</a>
            </li>
            @endif
          </ul>
          <!-- @if(auth()->user()->role == 'admin' )
          <ul
            class="py-1 text-gray-700 dark:text-gray-300"
            aria-labelledby="dropdown">
            <li>
              <a
                href="#"
                class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                  class="mr-2 w-5 h-5 text-gray-400"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                    clip-rule="evenodd"></path>
                </svg>
                My likes</a>
            </li>
            <li>
              <a
                href="#"
                class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                  class="mr-2 w-5 h-5 text-gray-400"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                </svg>
                Collections</a>
            </li>
            <li>
              <a
                href="#"
                class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <span class="flex items-center">
                  <svg
                    aria-hidden="true"
                    class="mr-2 w-5 h-5 text-primary-600 dark:text-primary-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                      clip-rule="evenodd"></path>
                  </svg>
                  Pro version
                </span>
                <svg
                  aria-hidden="true"
                  class="w-5 h-5 text-gray-400"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </li>
          </ul>
          @endif -->
          <ul
            class="py-1 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-md shadow-md"
            aria-labelledby="dropdown">
            <li>
              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                  type="submit"
                  class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                  {{ __('Log Out') }}
                </button>
              </form>

            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>

   

  <!-- Sidebar -->

  <aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

      <ul class="space-y-2">
        <li>
          <a
            href="{{route('dashboard')}}"
            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              aria-hidden="true"
              class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
          </a>
        </li>

        <li>
          <button
            type="button"
            class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-pages"
            data-collapse-toggle="dropdown-pages">
            <svg
              aria-hidden="true"
              class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap">Products</span>
            <svg
              aria-hidden="true"
              class="w-6 h-6"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>

           <ul id="dropdown-pages" class="hidden py-2 space-y-2">
            <li>
              <a
                href="{{route('products.index')}}"
                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">All products</a>
            </li>
            <li>
              <a
                href="{{route('products.create')}}"
                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Create product</a>
            </li>

          </ul>

         
        </li>

         <li>
          <button
            type="button"
            class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-pages-order"
            data-collapse-toggle="dropdown-pages-order">
            <svg
              aria-hidden="true"
              class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap">Orders</span>
            <svg
              aria-hidden="true"
              class="w-6 h-6"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>

           <ul id="dropdown-pages-order" class="hidden py-2 space-y-2">
            <li>
              <a
                href="{{route('orders.index')}}"
                class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">All orders</a>
            </li>
           

          </ul>

         
        </li>


        <ul id="settings.menu" class="hidden py-2 space-y-2">
          <li>
            <a
              href="{{route('profile.edit')}}"
              class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">My profile settings</a>
          </li>
        </ul>
        </li>

        <li>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
              type="submit"
              class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
              {{ __('Log Out') }}
            </button>
          </form>

        </li>

      </ul>

    </div>




</div>
</aside>



<main class="p-4 md:ml-64 h-auto pt-20 first-wrapper">
   <!-- Tooltip Element -->
    
      <!-- Tooltip Element -->
  <!-- Tooltip container -->



    
  @yield('content')
</main>
</div>