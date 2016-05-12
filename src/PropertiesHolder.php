<?php

namespace Studiow\Properties;

class PropertiesHolder implements PropertiesHolderInterface
{

    private $properties = [];

    public function __construct(array $properties = [])
    {
        $this->set($properties);
    }
    /**
     * Check if a property is set
     * 
     * @param string $prop_name
     * @return bool
     */
    public function has($prop_name)
    {
        return array_key_exists($prop_name, $this->properties);
    }

    /**
     * Get the value for a property if it is set, or return the default value
     * 
     * @param string $prop_name
     * @param mixed $default
     * @return mixed
     */
    public function get($prop_name, $default = null)
    {
        return $this->has($prop_name) ? $this->properties[$prop_name] : $default;
    }

    /**
     * Remove a property
     * 
     * @param string $prop_name
     * @return \Studiow\Properties\PropertiesHolder
     */
    public function remove($prop_name)
    {
        foreach ((array) $prop_name as $prop) {
            if ($this->has($prop)) {
                unset($this->properties[$prop]);
            }
        }
        return $this;
    }

    /**
     * Set the value for one or more properties
     * 
     * @param string|array $prop_name
     * @param mixed $value
     * @return \Studiow\Properties\PropertiesHolder
     */
    public function set($prop_name, $value = null)
    {
        if (is_array($prop_name)) {
            foreach ($prop_name as $prop => $val) {
                $this->set($prop, $val);
            }
        } else {
            $this->properties[$prop_name] = $value;
        }
        return $this;
    }

    /**
     * Get an iterator
     * 
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->properties);
    }

}
