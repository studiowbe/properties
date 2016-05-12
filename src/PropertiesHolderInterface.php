<?php

namespace Studiow\Properties;

use IteratorAggregate;

interface PropertiesHolderInterface extends IteratorAggregate
{

    /**
     * Check if a property is set
     * 
     * @param string $prop_name
     * @return bool
     */
    public function has($prop_name);

    /**
     * Get the value for a property if it is set, or return the default value
     * 
     * @param string $prop_name
     * @param mixed $default
     * @return mixed
     */
    public function get($prop_name, $default = null);

    /**
     * Set the value for one or more properties
     * 
     * @param string|array $prop_name
     * @param mixed $value
     * @return $this
     */
    public function set($prop_name, $value = null);

    /**
     * Remove a property
     * 
     * @param string $prop_name
     * @return $this
     */
    public function remove($prop_name);
}
