<?php

/**
 * Class IDBW_Property
 */
class IDBW_Property
{
    /**
     * @return IDBW_PropertyDTO[]
     */
    public function getProperties()
    {
        $igmsLibrary = new IDBW_IgmsLibrary();
        try {
            return $igmsLibrary->getDirectBookingProperties();
        } catch (IDBW_IgmsApiErrorException $e) {
            error_log(print_r($e, true));

            return [];
        }
    }
}
