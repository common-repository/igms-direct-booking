<?php

/**
 * Class IDBW_IgmsLibrary
 */
class IDBW_IgmsLibrary
{
    const PROPERTIES_URL = IDBW_Settings::IGMS_URL . '/api/direct-booking/get-direct-booking-properties';
    const GET_WIDGET_UUID_URL = IDBW_Settings::IGMS_URL . '/api/direct-booking/get-widget-uuid';
    const WIDGET_TYPE = 'wordpress';

    const METHOD_GET = 'GET';
    const TIMEOUT = 10;

    /**
     * @return IDBW_PropertyDTO[]
     * @throws IDBW_IgmsApiErrorException
     */
    public function getDirectBookingProperties()
    {
        $args = [
            'method' => self::METHOD_GET,
            'timeout' => self::TIMEOUT,
            'body' => [
                'directBookingWidgetUuid' => IDBW_Settings::getDirectBookingWidgetUuid(),
            ]
        ];

        $response = wp_remote_request(self::PROPERTIES_URL, $args);

        $properties = self::handleResponse($response);
        $propertyDTOArray = [];

        foreach ($properties as $property) {
            $propertyDTOArray[] = new IDBW_PropertyDTO([
                'id' => $property->id,
                'name' => $property->name,
            ]);
        }

        return $propertyDTOArray;
    }

    /**
     * @return string
     * @throws IDBW_IgmsApiErrorException
     */
    public function getWidgetUuid()
    {
        $domain = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

        $args = [
            'method' => self::METHOD_GET,
            'timeout' => self::TIMEOUT,
            'body' => [
                'userUid' => IDBW_Settings::getUserUid(),
                'domain' => $domain,
                'widgetType' => self::WIDGET_TYPE,
            ]
        ];

        $response = wp_remote_get(self::GET_WIDGET_UUID_URL, $args);
        $response = self::handleResponse($response);

        return $response->uuid;
    }

    /**
     * @param $response
     * @return array|object
     * @throws IDBW_IgmsApiErrorException
     */
    private static function handleResponse($response)
    {
        if ($response instanceof WP_Error) {
            throw new IDBW_IgmsApiErrorException($response->get_error_message());
        }

        $body = wp_remote_retrieve_body($response);
        $decodedResponse = json_decode($body);

        if ($decodedResponse && $decodedResponse->data) {
            return $decodedResponse->data;
        }

        throw new IDBW_IgmsApiErrorException('Cannot handle response');
    }
}
