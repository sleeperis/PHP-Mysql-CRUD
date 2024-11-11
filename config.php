<?php
mysqli_report(MYSQLI_REPORT_OFF);

# Database credentials
define("DB_SERVER", "sql312.infinityfree.com");
define("DB_USERNAME", "if0_36912085");
define("DB_PASSWORD", "WhOyhbxtvl9hz");
define("DB_NAME", "if0_36912085_localhost");

# Create connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$link) {
  echo "Connection error: " . mysqli_connect_error();
}
