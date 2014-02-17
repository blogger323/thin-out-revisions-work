<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hiro
 * Date: 13/06/03
 * Time: 21:52
 * To change this template use File | Settings | File Templates.
 */
$path = '../../../../../wordpress-tests/bootstrap.php';

if( file_exists( $path ) ) {
	require_once $path;
} else {
	exit( "Couldn't find path to wordpress-tests/bootstrap.php\n" );
}