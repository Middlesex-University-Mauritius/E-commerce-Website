<?php

include_once "sidebar.inc.php";

function renderTemplate($content)
{
  echo '<div class="flex">';
  echo renderSidebar();
  echo '<div class="w-full">';
  echo '<p class="text-3xl px-10 py-6 border-b w-full">';
  echo ucfirst(basename($_SERVER['PHP_SELF'], ".php"));
  echo '</p>';
  echo '<div class="flex-1 py-6 px-10">';
  echo $content;
  echo '</div>';
  echo "</div>";
  echo '</div>';
}
