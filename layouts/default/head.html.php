<!DOCTYPE html>
<html>
<head>
	<title>HTMX is the shit</title>
	<link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
<header>
	<h1><a href="/"><?php echo "Hello world";?></a></h2>
</header>
<article><div id="content">
	<!-- This is replaced by responses on client side requests because hx-target="#content" -->
