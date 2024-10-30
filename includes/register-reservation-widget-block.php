<?php

add_action('admin_enqueue_scripts', 'IDBW_registerIgmsWidgetBlockScripts');

function IDBW_registerIgmsWidgetBlockScripts() {
    /** this code makes the properties available in the DirectBookingReservationBlock.js */
    wp_register_script(
        'setDirectBookingWidgetProperties',
        plugin_dir_url(IGMS_DIRECT_BOOKING_WIDGET_PATH) . 'blocks/DirectBookingReservationBlock.js',
        [],
        null,
        true
    );

    $property = new IDBW_Property();

    wp_localize_script(
        'setDirectBookingWidgetProperties',
        'directBookingWidgetProperties',
        ['properties' => $property->getProperties()]
    );
    wp_enqueue_script('setDirectBookingWidgetProperties', '', ['wp']);
}
