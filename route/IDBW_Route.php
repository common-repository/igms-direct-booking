<?php

/**
 * Class Route
 */
class IDBW_Route {
    const WIDGET_NAMESPACE = 'igms-direct-booking';
    const GET_USER_CALLBACK_ROUTE = '/get-user-callback';
    const LOGOUT_ROUTE = '/logout';
    const GET_PROPERTIES_ROUTE = '/get-properties';
    const SAVE_BOOK_NOW_BUTTON_TEXT_ROUTE = '/save-book-now-button-text';
    const SAVE_CHECK_AVAILABILITY_BUTTON_TEXT_ROUTE = '/save-check-availability-button-text';
    const SAVE_WIDGET_COLOR_ROUTE = '/save-widget-color';

    /**
     * Register routes
     */
    public function init()
    {
        $auth = new IDBW_Auth();
        $property = new IDBW_Property();
        $options = new IDBW_Options();

        add_action('rest_api_init', function () use ($auth, $property, $options) {
            register_rest_route(
                self::WIDGET_NAMESPACE,
                self::GET_USER_CALLBACK_ROUTE,
                [
                    'methods' => 'GET',
                    'callback' => [$auth, 'getUserCallback'],
                    'permission_callback' => '__return_true',
                ]
            );

            register_rest_route(
                self::WIDGET_NAMESPACE,
                self::LOGOUT_ROUTE,
                [
                    'methods' => 'GET',
                    'callback' => [$auth, 'logout'],
                    'permission_callback' => '__return_true',
                ]
            );

            register_rest_route(
                self::WIDGET_NAMESPACE,
                self::SAVE_BOOK_NOW_BUTTON_TEXT_ROUTE,
                [
                    'methods' => 'POST',
                    'callback' => [$options, 'actionSaveBookNowButtonText'],
                    'permission_callback' => '__return_true',
                ]
            );

            register_rest_route(
                self::WIDGET_NAMESPACE,
                self::SAVE_CHECK_AVAILABILITY_BUTTON_TEXT_ROUTE,
                [
                    'methods' => 'POST',
                    'callback' => [$options, 'actionSaveCheckAvailabilityButtonText'],
                    'permission_callback' => '__return_true',
                ]
            );

            register_rest_route(
                self::WIDGET_NAMESPACE,
                self::SAVE_WIDGET_COLOR_ROUTE,
                [
                    'methods' => 'POST',
                    'callback' => [$options, 'actionSaveWidgetColor'],
                    'permission_callback' => '__return_true',
                ]
            );

            register_rest_route(
                self::WIDGET_NAMESPACE,
                self::GET_PROPERTIES_ROUTE,
                [
                    'methods' => 'GET',
                    'callback' => [$property, 'getProperties'],
                    'permission_callback' => '__return_true',
                ]
            );
        });
    }

    /**
     * @param string $route
     * @return string
     */
    static function getUrlByRoute($route)
    {
        global $wp_rewrite;
        if (!$wp_rewrite) {
            $wp_rewrite = new WP_Rewrite();
        }
        return get_rest_url(null, self::WIDGET_NAMESPACE . $route);
    }
}
