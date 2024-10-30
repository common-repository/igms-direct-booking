<?php
register_uninstall_hook('Direct booking widget', 'IDBW_uninstallHook');

function IDBW_uninstallHook () {
    if (IDBW_Settings::getUserUid()) {
        IDBW_Settings::deleteUserUid();
    }

    if (IDBW_Settings::getDirectBookingWidgetUuid()) {
        IDBW_Settings::deleteDirectBookingWidgetUuid();
    }

    if (IDBW_Settings::getProfileName()) {
        IDBW_Settings::deleteProfileName();
    }

    if (IDBW_Settings::getProfileAvatarUrl()) {
        IDBW_Settings::deleteProfileAvatarUrl();
    }

    if (IDBW_Settings::getProfileEmail()) {
        IDBW_Settings::deleteProfileEmail();
    }

    if (IDBW_Settings::getReservationWidgetCheckAvailabilityButtonText()) {
        IDBW_Settings::deleteReservationWidgetCheckAvailabilityButtonText();
    }

    if (IDBW_Settings::getReservationWidgetColor()) {
        IDBW_Settings::deleteReservationWidgetColor();
    }

    if (IDBW_Settings::getReservationWidgetBookNowButtonText()) {
        IDBW_Settings::deleteReservationWidgetBookNowButtonText();
    }
}
