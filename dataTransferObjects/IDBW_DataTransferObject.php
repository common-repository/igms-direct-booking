<?php

/**
 * Class IDBW_DataTransferObject
 */
abstract class IDBW_DataTransferObject
{
    /**
     * IDBW_DataTransferObject constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $class = new ReflectionClass(static::class);

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {
            $property = $reflectionProperty->getName();
            if (isset($parameters[$property])) {
                $this->{$property} = $parameters[$property];
            }
        }
    }
}
