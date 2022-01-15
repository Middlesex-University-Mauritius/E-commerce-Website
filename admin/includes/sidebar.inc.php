<?php

function field($destination, $label, $icon)
{
  echo "<a href='" . "/web/admin/dashboard/" . $destination . "/" . $destination . ".php' class='" . (basename($_SERVER['PHP_SELF'], ".php") == $destination ? "bg-slate-800 " : "") . "text-left text-gray-200 px-4 py-2 rounded-lg hover:text-white flex space-x-3'" . ">";
  echo "<i class='my-auto text-center min-w-[18px] text-left " . $icon . "'></i>";
  echo "<p>" . ucfirst($label) . "</p>";
  echo "</a>";
}

echo "<div class='bg-slate-900 min-w-[250px] min-h-screen px-2 py-5 space-y-2 flex flex-col text-left'>";
field("customers", "Customers", "far fa-user");
field("recommendations", "Recommendations", "far fa-dot-circle");
field("events", "My Events", "far fa-star");
field("add event", "Add Event", "fas fa-plus");
field("orders", "View Orders", "fas fa-shopping-cart");
echo "</div>";
