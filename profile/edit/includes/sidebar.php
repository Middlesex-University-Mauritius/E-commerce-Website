<?php

function renderSidebar() {
  echo <<<DEV
    <div class="w-[300px] mt-8">
      <div class="mb-4 flex space-x-3 border rounded-lg border-gray-200 px-4 py-2">
        <img class="rounded-full w-8 h-8" src="/web/includes/img/avatar.png" />
        <a id="profile-name" href="/web/profile" class="my-auto text-blue-600 font-semibold"></a>
      </div>

      <div class="text-gray-900 bg-white rounded-lg border border-gray-200 h-max">
        <a href="/web/profile/edit/details?active=details" id="edit-details" type="button" class="inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
          <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          Profile
        </a>
        <a href="/web/profile/edit/password?active=password" id="edit-password" type="button" class="inline-flex relative items-center py-2 px-4 w-full text-sm font-medium rounded-t-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
          <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
          Change password
        </a>
      </div>
    </div>
  DEV;
}