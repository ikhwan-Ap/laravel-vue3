<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const showSideBarNavigation = ref(true);
</script>

<template>
   <div class="h-full min-h-screen w-full bg-gray-100">
      
      <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
               <div class="flex justify-between h-16">
                  <div class="flex">
                        <!-- Logo -->
                        
                        <div class="shrink-0 flex items-center">
                           <Link :href="route('dashboard')">
                              <ApplicationLogo
                                    class="block h-9 w-auto fill-current text-gray-800"
                              />
                           </Link>
                        </div>
                        
                        <!-- Navigation Links -->
                        <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                           <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                              Dashboard
                           </NavLink>
                        </div> -->
                  </div>
                  
                  <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                           <Dropdown align="right" width="48">
                              <template #trigger>
                                    <span class="inline-flex rounded-md">
                                       <button
                                          type="button"
                                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                       >
                                          {{ $page.props.auth.user.name }}

                                          <svg
                                                class="ml-2 -mr-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                          >
                                                <path
                                                   fill-rule="evenodd"
                                                   d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                   clip-rule="evenodd"
                                                />
                                          </svg>
                                       </button>
                                    </span>
                              </template>

                              <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                       Log Out
                                    </DropdownLink>
                              </template>
                           </Dropdown>
                        </div>
                  </div>

                  <!-- Hamburger -->
                  <div class="-mr-2 flex items-center sm:hidden">
                        <button
                           @click="showingNavigationDropdown = !showingNavigationDropdown"
                           class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out "
                        >
                           <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path
                                    :class="{
                                       hidden: showingNavigationDropdown,
                                       'inline-flex': !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                              />
                              <path
                                    :class="{
                                       hidden: !showingNavigationDropdown,
                                       'inline-flex': showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                              />
                           </svg>
                        </button>
                  </div>
               </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
               :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
               class="sm:hidden"
            >
               <div class="pt-2 pb-3 space-y-1">
                  <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                  </ResponsiveNavLink>
               </div>

               <!-- Responsive Settings Options -->
               <div class="pt-4 pb-1 border-t border-gray-200">
                  <div class="px-4">
                        <div class="font-medium text-base text-gray-800">
                           {{ $page.props.auth.user.name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                  </div>

                  <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                           Log Out
                        </ResponsiveNavLink>
                  </div>
               </div>
            </div>
      </nav>

      <div class="grid grid-cols-5 grid-flow-col gap-4 h-full min-h-[88vh]">
         <aside id="default-sidebar" 
         :class="{'col-span-1 transition-transform h-full' : true, ' sm:translate-x-0  md:block hidden' : showSideBarNavigation, 'md:-translate-x-full sm:translate-x- md:hidden block' : !showSideBarNavigation }" aria-label="Sidebar">
            <div class="px-3 py-4 overflow-y-auto min-h-[88vh]  bg-gray-50 dark:bg-gray-800">
               <ul class="space-y-2 font-medium">
                  <li>
                     <a :href="route('dashboard')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                           <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                           <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                           <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                              Dashboard
                           </ResponsiveNavLink>
                        </span>
                     </a>
                  </li>
                  <li>
                     <a :href="route('profile.edit')"  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                           <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                           <ResponsiveNavLink :href="route('profile.edit')" :active="route().current('profile.edit')">
                              Profile
                           </ResponsiveNavLink>
                        </span>
                     </a>
                  </li>
                  <li>
                     <a :href="route('user.index')"  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                           <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">
                           <ResponsiveNavLink :href="route('user.index')" :active="route().current('user.index')">
                              Profile
                           </ResponsiveNavLink>
                        </span>
                     </a>
                  </li>
               </ul>
            </div>
         </aside>
         <div :class="{
            'col-span-5 md:col-span-4 lg:col-span-4 overflow-y-auto h-[88vh]': showSideBarNavigation,
            'col-span-5 md:col-span-5 lg:col-span-5 overflow-y-auto h-[88vh]': !showSideBarNavigation
         }"  
         >
            <button
                  @click="showSideBarNavigation = !showSideBarNavigation"
                  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
               >
                  <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                     <path
                           :class="{
                              hidden: !showSideBarNavigation,
                              'inline-flex': showSideBarNavigation,
                           }"
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16"
                     />
                     <path
                           :class="{
                              hidden: showSideBarNavigation,
                              'inline-flex': !showSideBarNavigation,
                           }"
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16"
                     />
                  </svg>
            </button>

            <main>
            
               <slot />
            </main>
         </div>
      </div>

   </div>
</template>
