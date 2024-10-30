<?php

/** Register and load the widget */
function IDBW_wpb_load_widget()
{
    register_widget('IDBW_ReservationWidget');
}

add_action('widgets_init', 'IDBW_wpb_load_widget');
