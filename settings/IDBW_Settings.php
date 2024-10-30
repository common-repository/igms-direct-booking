<?php

require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/view/direct-booking-settings-page.php');

/**
 * Class Settings
 */
class IDBW_Settings
{
    const IGMS_URL = 'https://igms.com'; // use "set DEVSITE=new_site_name" to change url during build
    const RESERVATION_WIDGET_URL = self::IGMS_URL . '/app/widgets/direct-booking/widget.js';

    const SETTINGS_PAGE_SLUG = 'direct_booking_widget_settings_page';

    const USER_UID_OPTION_NAME = 'direct_booking_widget_user_uid';//todo delete
    const DIRECT_BOOKING_WIDGET_UUID_OPTION_NAME = 'direct_booking_widget_uuid';
    const PROFILE_EMAIL_OPTION_NAME = 'direct_booking_widget_profile_email';
    const AVATAR_URL_OPTION_NAME = 'direct_booking_widget_profile_avatar';
    const PROFILE_NAME_OPTION_NAME = 'direct_booking_widget_profile_name';
    const RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME = 'direct_booking_reservation_widget_check_availability_button_text';
    const RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME = 'direct_booking_reservation_widget_book_now_button_text';
    const RESERVATION_WIDGET_COLOR_OPTION_NAME = 'direct_booking_widget_color';
    const DIRECT_BOOKING_SETTINGS_GROUP = 'direct-booking-settings-group';

    const DEFAULT_CHECK_AVAILABILITY_BUTTON_TEXT = 'Check Availability';
    const DEFAULT_WIDGET_COLOR = '#000000';
    const DEFAULT_BOOK_BUTTON_TEXT = 'Book Now';

    /**
     * Initialize direct booking plugin settings
     * @return void
     */
    public function init()
    {
        /** create direct booking plugin settings menu */
        add_action('admin_menu', [$this, 'addDirectBookingMenu']);
    }

    /**
     * @return false|mixed|void
     */
    public static function getUserUid()
    {
        return get_option(self::USER_UID_OPTION_NAME);
    }

    /**
     * @param $userUid
     * @return bool
     */
    public static function addUserUid($userUid)
    {
        return add_option(self::USER_UID_OPTION_NAME, $userUid);
    }

    /**
     * @return false|mixed|void
     */
    public static function deleteUserUid()
    {
        return delete_option(self::USER_UID_OPTION_NAME);
    }

    /**
     * @return false|mixed|void
     */
    public static function getDirectBookingWidgetUuid()
    {
        return get_option(self::DIRECT_BOOKING_WIDGET_UUID_OPTION_NAME);
    }

    /**
     * @return false|mixed|void
     */
    public static function getProfileEmail()
    {
        return get_option(self::PROFILE_EMAIL_OPTION_NAME);
    }

    /**
     * @return bool
     */
    public static function deleteProfileEmail()
    {
        return delete_option(self::PROFILE_EMAIL_OPTION_NAME);
    }

    /**
     * @return false|mixed|void
     */
    public static function getProfileAvatarUrl()
    {
        return get_option(self::AVATAR_URL_OPTION_NAME);
    }

    /**
     * @return bool
     */
    public static function deleteProfileAvatarUrl()
    {
        return delete_option(self::AVATAR_URL_OPTION_NAME);
    }

    /**
     * @return false|mixed|void
     */
    public static function getProfileName()
    {
        return get_option(self::PROFILE_NAME_OPTION_NAME);
    }

    /**
     * @return bool
     */
    public static function deleteProfileName()
    {
        return delete_option(self::PROFILE_NAME_OPTION_NAME);
    }

    /**
     * @param $userUid
     * @return bool
     */
    public static function updateUserUid($userUid)
    {
        return update_option(self::USER_UID_OPTION_NAME, $userUid);
    }

    /**
     * @param string $uuid
     * @return bool
     */
    public static function updateDirectBookingWidgetUuid($uuid)
    {
        return update_option(self::DIRECT_BOOKING_WIDGET_UUID_OPTION_NAME, $uuid);
    }

    /**
     * @param string $email
     * @return bool
     */
    public static function updateProfileEmail($email)
    {
        return update_option(self::PROFILE_EMAIL_OPTION_NAME, $email);
    }

    /**
     * @param string $avatarUrl
     * @return bool
     */
    public static function updateProfileAvatarUrl($avatarUrl)
    {
        return update_option(self::AVATAR_URL_OPTION_NAME, $avatarUrl);
    }

    /**
     * @param string $profileName
     * @return bool
     */
    public static function updateProfileName($profileName)
    {
        return update_option(self::PROFILE_NAME_OPTION_NAME, $profileName);
    }

    /**
     * @param string $uuid
     * @return bool
     */
    public static function addDirectBookingWidgetUuid($uuid)
    {
        return add_option(self::DIRECT_BOOKING_WIDGET_UUID_OPTION_NAME, $uuid);
    }

    /**
     * @return bool
     */
    public static function deleteDirectBookingWidgetUuid()
    {
        return delete_option(self::DIRECT_BOOKING_WIDGET_UUID_OPTION_NAME);
    }

    /**
     * @param string $email
     * @return bool
     */
    public static function addProfileEmail($email)
    {
        return add_option(self::PROFILE_EMAIL_OPTION_NAME, $email);
    }

    /**
     * @param string $avatarUrl
     * @return bool
     */
    public static function addProfileAvatarUrl($avatarUrl)
    {
        return add_option(self::AVATAR_URL_OPTION_NAME, $avatarUrl);
    }

    /**
     * @param string $profileName
     * @return bool
     */
    public static function addProfileName($profileName)
    {
        return add_option(self::PROFILE_NAME_OPTION_NAME, $profileName);
    }

    /**
     * @return false|string
     */
    public static function getReservationWidgetCheckAvailabilityButtonText()
    {
        return get_option(self::RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME);
    }

    /**
     * @param string $checkAvailabilityButtonText
     * @return false|string
     */
    public static function addReservationWidgetCheckAvailabilityButtonText($checkAvailabilityButtonText)
    {
        return add_option(self::RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME, $checkAvailabilityButtonText);
    }

    /**
     * @return bool
     */
    public static function deleteReservationWidgetCheckAvailabilityButtonText()
    {
        return delete_option(self::RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function updateReservationWidgetCheckAvailabilityButtonText($value)
    {
        return update_option(self::RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME, $value);
    }

    /**
     * @return false|string
     */
    public static function getReservationWidgetBookNowButtonText()
    {
        return get_option(self::RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME);
    }

    /**
     * @param string $bookNowButtonText
     * @return bool
     */
    public static function addReservationWidgetBookNowButtonText($bookNowButtonText)
    {
        return add_option(self::RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME, $bookNowButtonText);
    }

    /**
     * @return bool
     */
    public static function deleteReservationWidgetBookNowButtonText()
    {
        return delete_option(self::RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function updateReservationWidgetBookNowButtonText($value)
    {
        return update_option(self::RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME, $value);
    }

    /**
     * @return false|string
     */
    public static function getReservationWidgetColor()
    {
        return get_option(self::RESERVATION_WIDGET_COLOR_OPTION_NAME);
    }

    /**
     * @param string $widgetColor
     * @return bool
     */
    public static function addReservationWidgetColor($widgetColor)
    {
        return add_option(self::RESERVATION_WIDGET_COLOR_OPTION_NAME, $widgetColor);
    }

    /**
     * @return bool
     */
    public static function deleteReservationWidgetColor()
    {
        return delete_option(self::RESERVATION_WIDGET_COLOR_OPTION_NAME);
    }

    /**
     * @param string $value
     * @return bool
     */
    public static function updateReservationWidgetColor($value)
    {
        return update_option(self::RESERVATION_WIDGET_COLOR_OPTION_NAME, $value);
    }

    /**
     * Create new top-level menu
     * @return void
     */
    public function addDirectBookingMenu()
    {
        $logoUrl = plugin_dir_url(IGMS_DIRECT_BOOKING_WIDGET_PATH) . '/img/airgmsWordpressSectionLogo.svg';

        //create new top-level menu
        add_menu_page(
            'Direct Booking Settings',
            'IGMS',
            'administrator',
            self::SETTINGS_PAGE_SLUG,
            [$this, 'directBookingSettings'],
            $logoUrl
        );

        //call register settings function
        add_action('admin_init', [$this, 'registerDirectBookingWidgetSettings']);
    }

    /**
     * register settings
     * @return void
     */
    public function registerDirectBookingWidgetSettings()
    {
        register_setting(
            self::DIRECT_BOOKING_SETTINGS_GROUP,
            self::RESERVATION_WIDGET_COLOR_OPTION_NAME
        );
        register_setting(
            self::DIRECT_BOOKING_SETTINGS_GROUP,
            self::RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME
        );
        register_setting(
            self::DIRECT_BOOKING_SETTINGS_GROUP,
            self::RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME
        );
    }

    /**
     * Settings page
     * @return void
     */
    public function directBookingSettings()
    {
        $callbackUrl = IDBW_Route::getUrlByRoute(IDBW_Route::GET_USER_CALLBACK_ROUTE);
        $getUserUrl = self::IGMS_URL . '/api/direct-booking/get-user?redirectUrl=' . $callbackUrl;

        $userUid = self::getUserUid();
        $profileEmail = self::getProfileEmail();
        $profileAvatarUrl = self::getProfileAvatarUrl();
        $profileName = self::getProfileName();

        $profileAvatarUrl = $profileAvatarUrl
            ? $profileAvatarUrl
            : plugin_dir_url(IGMS_DIRECT_BOOKING_WIDGET_PATH) . '/img/igmsLogo.ico';

        IDBW_direct_booking_settings_page($getUserUrl, $userUid, $profileEmail, $profileName, $profileAvatarUrl);
    }
}
