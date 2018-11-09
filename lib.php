<?php

/**
 * Moodle null cache store.
 *
 * @author Luke Carrier <luke@carrier.im>
 * @copyright 2018 Luke Carrier
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Null cache store.
 *
 * A cache "store" that doesn't. Useful for testing.
 */
class cachestore_null extends cache_store
        implements cache_is_lockable, cache_is_key_aware, cache_is_searchable {
    /**
     * Store name.
     *
     * @var string
     */
    protected $name;

    /**
     * Cache definition.
     *
     * @var cache_definition
     */
    protected $definition;

    /**
     * @inheritdoc
     */
    public static function are_requirements_met() {
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function is_supported_mode($mode) {
        return true;
    }

    /**
     * @inheritdoc
     */
    public static function get_supported_features(array $configuration = array()) {
        return self::SUPPORTS_MULTIPLE_IDENTIFIERS
                + self::SUPPORTS_DATA_GUARANTEE + self::SUPPORTS_NATIVE_TTL
                + self::IS_SEARCHABLE + self::DEREFERENCES_OBJECTS;
    }

    /**
     * @inheritdoc
     */
    public static function get_supported_modes(array $configuration = array()) {
        return self::MODE_APPLICATION + self::MODE_SESSION + self::MODE_REQUEST;
    }

    /**
     * @inheritdoc
     */
    public static function initialise_test_instance(cache_definition $definition) {
        $cache = new static('Null test', []);
        $cache->initialise($definition);
        return $cache;
    }

    /**
     * @inheritdoc
     */
    public function __construct($name, array $configuration=[]) {
        $this->name = $name;
    }

    /**
     * Returns the name of this store instance.
     * @return string
     */
    public function my_name() {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function initialise(cache_definition $definition) {
        $this->definition = $definition;
    }

    /**
     * @inheritdoc
     */
    public function is_initialised() {
        return $this->definition !== null;
    }

    /**
     * @inheritdoc
     */
    public function get($key) {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function get_many($keys) {
        return array_fill_keys($keys, false);
    }

    /**
     * @inheritdoc
     */
    public function set($key, $data) {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function set_many(array $keyvaluearray) {
        return count($keyvaluearray);
    }

    /**
     * @inheritdoc
     */
    public function delete($key) {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete_many(array $keys) {
        return count($keys);
    }

    /**
     * @inheritdoc
     */
    public function purge() {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function acquire_lock($key, $ownerid) {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function check_lock_state($key, $ownerid) {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function release_lock($key, $ownerid) {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function has($key)
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function has_any(array $keys) {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function has_all(array $keys) {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function find_all() {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function find_by_prefix($prefix) {
        return [];
    }
}
