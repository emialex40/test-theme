<?php

$dir   = __DIR__ . '/functions';
$files = scandir( $dir );

foreach ( $files as $file ) {
	if ( $file !== '.' && $file !== '..' ) {
		include_once $dir . '/' . $file;
	}
}
