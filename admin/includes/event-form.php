<?php

function renderForm() {
  echo <<<DEV
    <div class='flex space-x-10'>
      <div class='flex-1 space-y-8'>
        <!-- Main Information -->
        <div class='card p-0'>
          <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
            <p class="font-semibold">Main Information</p>
          </div>

          <div class="py-2 px-5">
            <div>
              <p class='text-gray-900'>Title</p>
              <input class='my-2 w-full border border-gray-300 border border-gray-300' type='text' id='title' name='title'>
            </div>

            <div>
              <p class='text-gray-900'>Description</p>
              <textarea class='my-2 w-full border border-gray-300 border border-gray-300 p-4 h-[200px] resize-none rounded border-gray-300 focus:border-sky-50' id='description' name='description'></textarea>
            </div>

            <div>
              <p class='text-gray-900 mb-2'>Date</p>
              <input type='date' id='date' name='date'>
            </div>

            <div class="mb-2">
              <p class='text-gray-900 mb-2 mt-5'>Time</p>
              <input type='time' id='time' name='time'>
            </div>
          </div>
        </div>

        <!-- Image Upload -->
        <div class='card space-y-2 p-0'>
          <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
            <p class="font-semibold">Image Upload</p>
          </div>
          <div class='p-5'>
            <input
              class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer white:text-gray-400 focus:outline-none focus:border-transparent white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400"
              id="event-image"
              type="file"
              multiple
              name="image[]"
              accept="image/png, image/gif, image/jpeg"
            >
            <div class="mt-1 text-sm text-gray-500 white:text-gray-300">A profile picture is useful to confirm your are logged into your account</div>
            <div hidden id="preview" class="mt-5 grid grid-cols-4 gap-2">
            </div>
          </div>
        </div>
      </div>

      <div class='flex-1 space-y-8'>
        <!-- SEO -->
        <div class='card space-y-2 p-0'>
          <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
            <p class="font-semibold">SEO</p>
          </div>

          <div class='py-2 px-5 flex flex-col space-y-2'>
            <div>
              <input checked onchange="onCategoryChange(this)" type='checkbox' id='live-music' />
              <label class='ml-1 select-none cursor-pointer' for='live-music'>Live music</label>
            </div>

            <div>
              <input onchange="onCategoryChange(this)" type='checkbox' id='stand-up' />
              <label class='ml-1 select-none cursor-pointer' for='stand-up'>Stand up</label>
            </div>

            <div>
              <input onchange="onCategoryChange(this)" type='checkbox' id='arts-and-theater' />
              <label class='ml-1 select-none cursor-pointer' for='arts-and-theater'>Arts & Theater</label>
            </div>

            <br>
            <!-- Tags -->
            <div>
              <p>Tags</p>
              <input id="tag" placeholder="Press enter to add" class='my-2 w-full border border-gray-300 border border-gray-300' type='text'>

              <div id="tags-container" class="flex flex-wrap space-x-2">
              </div>
            </div>
          </div>

        </div>

        <!-- Pricing -->
        <div class="card p-0">
          <div class="bg-gray-50 border-b p-5 flex space-x-2 rounded-t-md">
            <p class="font-semibold">Pricing</p>
          </div>

          <div class="flex flex-col py-2 px-5 2xl:flex-row 2xl:space-x-4">
            <div>
              <p class='text-gray-900 whitespace-nowrap'>Price (Regular)</p>
              <input id="regular" class='my-2 w-full border border-gray-300 border border-gray-300' type='number' step="100">
            </div>

            <div>
              <p class='text-gray-900 whitespace-nowrap'>Price (Premium)</p>
              <input id="premium" class='my-2 w-full border border-gray-300 border border-gray-300' type='number' step="100">
            </div>

            <div>
              <p class='text-gray-900 whitespace-nowrap'>Price (VIP)</p>
              <input id="vip" class='my-2 w-full border border-gray-300 border border-gray-300' type='number' step="100">
            </div>
          </div>

        </div>
      </div>
    </div>
  DEV;
}