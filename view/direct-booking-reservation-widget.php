<?php
function IDBW_direct_booking_reservation_widget(
    $directBookingReservationWidgetUrl,
    $propertyId,
    $directBookingWidgetUuid,
    $userUid,
    $widgetColor,
    $checkAvailabilityButtonText,
    $bookNowButtonText,
    $blockId,
    $isPreview
) {
    $divId = 'igmsDirectBooking' . uniqid();
    $dataPreview = $isPreview ? 'data-preview="true"' : '';

    return <<<WIDGET
<div
    class="igms-direct-booking-widget"
    id="${divId}"
    data-listing-id="${propertyId}"
    data-user-id="${userUid}"
    data-widget-color="${widgetColor}"
    data-text-check-availability="${checkAvailabilityButtonText}"
    data-text-book-now="${bookNowButtonText}"
    ${dataPreview}
></div>
<script
    src="${directBookingReservationWidgetUrl}"
    type="application/javascript"
></script>
WIDGET;
}
