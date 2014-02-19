<?php
/**
 * Created by PhpStorm.
 * User: hiro
 * Date: 14/02/19
 * Time: 22:05
 */

class Tests_Options extends WP_UnitTestCase {

    function setUp()
    {
        global $hm_tor_plugin_loader;
        global $hm_tor_revisionmemo_loader;

        parent::setUp();
        $this->TOR       = $hm_tor_plugin_loader;
        $this->TOR_Memo = $hm_tor_revisionmemo_loader;
    }

    function tearDown()
    {
        parent::tearDown();
    }

    function test_options() {
        global $hm_tor_plugin_loader, $wpdb;
        $this->assertNotNull($wpdb);
        $this->assertNotNull($hm_tor_plugin_loader);

        $this->assertTrue($this->TOR->get_hm_tor_option('del_on_publish') === 'off');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_older_than') === '90');
        $this->assertTrue($this->TOR->get_hm_tor_option('schedule_enabled') === 'disabled');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_at') === '3:00');

        $input = array(
            'del_on_publish' => 'on',
            'del_older_than' => '90',
            'schedule_enabled' => 'disabled',
            'del_at' => "3:00",
            'quick_edit' => 'off', // deprecated
            'bulk_edit' => 'off', //deprecated
        );
        update_option( 'hm_tor_options', $this->TOR->validate_options($input));
        $this->assertTrue($this->TOR->get_hm_tor_option('del_on_publish') === 'on');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_older_than') === '90');
        $this->assertTrue($this->TOR->get_hm_tor_option('schedule_enabled') === 'disabled');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_at') === '3:00');

        $input = array(
            'del_on_publish' => 'on',
            'del_older_than' => '120',
            'schedule_enabled' => 'disabled',
            'del_at' => "3:00",
            'quick_edit' => 'off', // deprecated
            'bulk_edit' => 'off', //deprecated
        );

        update_option( 'hm_tor_options', $this->TOR->validate_options($input));
        $this->assertTrue($this->TOR->get_hm_tor_option('del_on_publish') === 'on');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_older_than') === '120');
        $this->assertTrue($this->TOR->get_hm_tor_option('schedule_enabled') === 'disabled');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_at') === '3:00');

        $input = array(
            'del_on_publish' => 'on',
            'del_older_than' => '120',
            'schedule_enabled' => 'enabled',
            'del_at' => "0:10",
            'quick_edit' => 'off', // deprecated
            'bulk_edit' => 'off', //deprecated
        );

        update_option( 'hm_tor_options', $this->TOR->validate_options($input));
        $this->assertTrue($this->TOR->get_hm_tor_option('del_on_publish') === 'on');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_older_than') === '120');
        $this->assertTrue($this->TOR->get_hm_tor_option('schedule_enabled') === 'enabled');
        $this->assertTrue($this->TOR->get_hm_tor_option('del_at') === '0:10');
    }
}