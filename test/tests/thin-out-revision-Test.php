<?php
/**
 * Created by JetBrains PhpStorm.
 * User: blogger323
 * Date: 13/06/03
 * Time: 22:16
 * To change this template use File | Settings | File Templates.
 */

class HM_TOR_Plugin_LoaderTest extends WP_UnitTestCase {
	public function testCheckInstance() {
		global $hm_tor_plugin_loader;
		$this->assertNotNull($hm_tor_plugin_loader);
	}

	public function testGetOption() {
		global $hm_tor_plugin_loader;
		$this->assertEquals($hm_tor_plugin_loader->get_hm_tor_option('quick_edit'), 'off');
	}

}