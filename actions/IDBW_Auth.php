<?php

/**
 * Class IDBW_Auth
 */
class IDBW_Auth
{
    /**
     * @param array $data
     */
    public function getUserCallback($data = [])
    {
        if (!empty($data['userUid'])) {
            IDBW_Settings::updateUserUid($data['userUid']);

            if (!empty($data['profileEmail'])) {
                IDBW_Settings::updateProfileEmail($data['profileEmail']);
            }

            if (!empty($data['profileFullName'])) {
                IDBW_Settings::updateProfileName($data['profileFullName']);
            }

            if (!empty($data['profileAvatarUrl'])) {
                IDBW_Settings::updateProfileAvatarUrl($data['profileAvatarUrl']);
            }

            $igmsLibrary = new IDBW_IgmsLibrary();

            try {
                $widgetUuid = $igmsLibrary->getWidgetUuid();
                IDBW_Settings::updateDirectBookingWidgetUuid($widgetUuid);
            } catch (IDBW_IgmsApiErrorException $e) {
                error_log(print_r($e, true));

                IDBW_Settings::updateUserUid(null);
            }
        }

        $settingsUrl = admin_url('?page=' . IDBW_Settings::SETTINGS_PAGE_SLUG);
        wp_redirect($settingsUrl);
        exit();
    }

    /**
     * Redirects to direct booking section page.
     */
    public function logout()
    {
        IDBW_Settings::updateUserUid(null);
        IDBW_Settings::updateDirectBookingWidgetUuid(null);
        IDBW_Settings::updateProfileEmail(null);
        IDBW_Settings::updateProfileAvatarUrl(null);
        IDBW_Settings::updateProfileName(null);

        $settingsUrl = admin_url('?page=' . IDBW_Settings::SETTINGS_PAGE_SLUG);
        wp_redirect($settingsUrl);
        exit();
    }
}
