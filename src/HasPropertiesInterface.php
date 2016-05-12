<?php

namespace Studiow\Properties;

interface HasPropertiesInterface
{

    /**
     * Set the properties holder
     * 
     * @param \Studiow\Properties\PropertiesHolderInterface $properties
     * @return $this
     */
    public function setProperties(PropertiesHolderInterface $properties);

    /**
     * Get the properties holder
     * 
     * @return \Studiow\Properties\PropertiesHolderInterface 
     */
    public function getProperties();
}
