<?php
// Force errors to show in the browser for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<html><head><title>ROSA PHP Test</title></head><body style='font-family: sans-serif; padding: 20px;'>";

echo "<h1 style='color: #0066cc;'>🚀 PHP is Alive on ROSA!</h1>";

echo "<ul>";
echo "<li><strong>PHP Version:</strong> " . phpversion() . "</li>";
echo "<li><strong>Server Date/Time:</strong> " . date('Y-m-d H:i:s') . "</li>";
echo "<li><strong>Pod Name:</strong> " . gethostname() . "</li>";
echo "<li><strong>User ID:</strong> " . getmyuid() . "</li>";
echo "</ul>";

echo "<hr>";
echo "<h3>Server Details:</h3>";
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

echo "</body></html>";
?>