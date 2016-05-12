<?php

namespace Studiow\Properties;

trait HasPropertiesTrait
{

    /**
     *
     * @var PropertiesHolderInterface 
     */
    protected $propertiesHolder;

    /**
     * Set the properties holder
     * 
     * @param \Studiow\Properties\PropertiesHolderInterface $properties
     * @return $this
     */
    public function setProperties(PropertiesHolderInterface $properties)
    {
        $this->propertiesHolder = $properties;
        return $this;
    }

    /**
     * Get the properties holder
     * 
     * @return \Studiow\Properties\PropertiesHolderInterface 
     */
    public function getProperties()
    {
        return $this->propertiesHolder;
    }

}
