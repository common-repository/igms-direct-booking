<?php

add_shortcode('igms-direct-booking-widget-reservation', 'IDBW_reservationWidgetShortcode');

/**
 * @param array $attributes
 * @param string $content
 * @return string
 */
function IDBW_reservationWidgetShortcode($attributes, $content)
{
    $userUid = IDBW_Settings::getUserUid();
    $directBookingWidgetUuid = IDBW_Settings::getDirectBookingWidgetUuid();

    if (!$userUid || !$directBookingWidgetUuid) {
        return '';
    }

    $isPreview = empty($attributes['is_preview']) ? false : $attributes['is_preview'];
    $propertyId = empty($attributes['property_id']) ? false : $attributes['property_id'];

    if (!$propertyId && !$isPreview) {
        return '';
    }

    $widgetColor = !empty($attributes['color'])
        ? $attributes['color']
        : IDBW_Settings::getReservationWidgetColor();
    $checkAvailabilityButtonText = !empty($attributes['check_availability_button_text'])
        ? str_replace('-', ' ', $attributes['check_availability_button_text'])
        : IDBW_Settings::getReservationWidgetCheckAvailabilityButtonText();
    $bookNowButtonText = !empty($attributes['book_button_text'])
        ? str_replace('-', ' ', $attributes['book_button_text'])
        : IDBW_Settings::getReservationWidgetBookNowButtonText();
    $blockId = !empty($attributes['block_id']) ? $attributes['block_id'] : 'reservationWidget';

    return IDBW_direct_booking_reservation_widget(
        IDBW_Settings::RESERVATION_WIDGET_URL,
        $propertyId,
        $directBookingWidgetUuid,
        $userUid,
        $widgetColor,
        $checkAvailabilityButtonText,
        $bookNowButtonText,
        $blockId,
        $isPreview
    );
}
