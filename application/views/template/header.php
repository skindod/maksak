<!DOCTYPE html>
<html lang="en">
<?php
// Malay month abbreviations
$malayMonths = array(
    'Jan' => 'Jan',
    'Feb' => 'Feb',
    'Mar' => 'Mac',
    'Apr' => 'Apr',
    'May' => 'Mei',
    'Jun' => 'Jun',
    'Jul' => 'Jul',
    'Aug' => 'Ogo',
    'Sep' => 'Sep',
    'Oct' => 'Okt',
    'Nov' => 'Nov',
    'Dec' => 'Dis'
);

// Get the current month and day
$month = date('M'); // e.g., 'Jan'
$day = date('j');
?>
	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../">

		<!--end::Base Path -->
		<meta charset="utf-8" />