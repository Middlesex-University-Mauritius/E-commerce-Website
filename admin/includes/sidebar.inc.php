<?php

function field($destination, $label, $icon)
{
  echo "<a href='" . "/web/admin/dashboard/" . $destination . "/" . $destination . ".php' class='" . (basename($_SERVER['PHP_SELF'], ".php") == $destination ? "bg-slate-800 " : "") . "text-left text-gray-200 px-4 py-2 rounded-lg hover:text-white flex space-x-3'" . ">";
  echo "<i class='my-auto text-center min-w-[18px] text-left " . $icon . "'></i>";
  echo "<p>" . ucfirst($label) . "</p>";
  echo "</a>";
}

echo "<div id='admin-sidebar' class='bg-slate-900 min-w-[250px] min-h-screen px-2 py-5'>";
echo <<<DEV
<div class="border-b border-slate-700 mb-4 pb-4">
  <a href="/web/home" class="text-left text-gray-200 px-4 py-2 rounded-lg hover:text-white flex space-x-3">
    <i class="my-auto text-center min-w-[18px] text-left fas fa-home"></i>
    <p>Main Page</p>
  </a>

  <a href="/web/admin/logout" class="text-left text-gray-200 px-4 py-2 rounded-lg hover:text-white flex space-x-3">
    <i class="my-auto text-center min-w-[18px] text-left fas fa-sign-out-alt"></i>
    <p>Log out</p>
  </a>
</div>
DEV;
echo "<div class='space-y-2 flex flex-col text-left'>";
field("customers", "Customers", "far fa-user");
field("events", "My Events", "far fa-star");
field("add event", "Add Event", "fas fa-plus");
field("bookings", "View Bookings", "fas fa-shopping-cart");
echo "</div>";
echo "</div>";
