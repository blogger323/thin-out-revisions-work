<?php

//$_tests_dir = getenv('WP_TESTS_DIR');
$_tests_dir = dirname( __FILE__ ) . '/../../../../../../tests\phpunit';
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../../../thin-out-revisions.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

