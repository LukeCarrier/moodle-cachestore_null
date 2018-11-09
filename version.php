<?php

/**
 * Moodle null cache store.
 *
 * @author Luke Carrier <luke@carrier.im>
 * @copyright 2018 Luke Carrier
 */

defined('MOODLE_INTERNAL') || die;
/** @var \stdClass $plugin */

$plugin->component = 'cachestore_null';

$plugin->version = 2018110800;
$plugin->release = '0.1.0';
$plugin->maturity = MATURITY_ALPHA;

$plugin->requires = 2016052300;
