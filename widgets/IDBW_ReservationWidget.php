<?php

/**
 * Class IDBW_ReservationWidget
 */
class IDBW_ReservationWidget extends WP_Widget
{
    const CURRENT_PROPERTY_ID = 'current_property_id';
    const DEFAULT_CURRENT_PROPERTY_ID = null;

    /**
     * IDBW_ReservationWidget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'IDBW_direct_booking_reservation_widget',
            'direct booking reservation widget',
            ['description' => 'Igms direct booking reservation widget']
        );
    }

    /**
     * Creating widget front-end
     *
     * @param $args
     * @param $instance
     */
    public function widget($args, $instance)
    {
        $currentPropertyId = $this->getValue(
            $instance,
            self::CURRENT_PROPERTY_ID,
            self::DEFAULT_CURRENT_PROPERTY_ID
        );

        $blockId = str_replace('-', '_', $this->get_field_id('reservation-widget'));

        // This is where you run the code and display the output
        echo do_shortcode("[" .
            "igms-direct-booking-widget-reservation 
                block_id={$blockId} 
                property_id={$currentPropertyId}
            ]"
        );
    }

    /**
     * @param array $instance
     * @param $key
     * @param $default
     * @param false $stripTags
     * @return mixed|string
     */
    public function getValue(array $instance, $key, $default, $stripTags = false)
    {
        $result = isset($instance[$key])
            ? $instance[$key]
            : $default;

        if ($stripTags) {
            $result = strip_tags($result);
        }

        return $result;
    }

    /**
     * Widget Backend
     *
     * @param $instance
     */
    public function form($instance)
    {
        $currentPropertyId = $this->getValue(
            $instance,
            self::CURRENT_PROPERTY_ID,
            self::DEFAULT_CURRENT_PROPERTY_ID
        );

        $property = new IDBW_Property();
        $properties = $property->getProperties();

        // Widget admin form
        include (IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/view/reservation-widget-form.php');
    }

    /**
     * Updating widget replacing old instances with new
     *
     * @param $new_instance
     * @param $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = [];

        $instance[self::CURRENT_PROPERTY_ID] = $this->getValue(
            $new_instance,
            self::CURRENT_PROPERTY_ID,
            null,
            true
        );

        return $instance;
    }
}
