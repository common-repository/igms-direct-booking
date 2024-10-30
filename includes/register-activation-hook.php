<?php

register_activation_hook(IGMS_DIRECT_BOOKING_WIDGET_PATH,
    function () {
        if (!(IDBW_Settings::getUserUid())) {
            IDBW_Settings::addUserUid(null);
        }

        if (!(IDBW_Settings::getDirectBookingWidgetUuid())) {
            IDBW_Settings::addDirectBookingWidgetUuid(null);
        }

        if (!(IDBW_Settings::getProfileName())) {
            IDBW_Settings::addProfileName(null);
        }

        if (!(IDBW_Settings::getProfileAvatarUrl())) {
            IDBW_Settings::addProfileAvatarUrl(null);
        }

        if (!(IDBW_Settings::getProfileEmail())) {
            IDBW_Settings::addProfileEmail(null);
        }

        if (!(IDBW_Settings::getReservationWidgetCheckAvailabilityButtonText())) {
            IDBW_Settings::addReservationWidgetCheckAvailabilityButtonText(
                IDBW_Settings::DEFAULT_CHECK_AVAILABILITY_BUTTON_TEXT
            );
        }

        if (!(IDBW_Settings::getReservationWidgetColor())) {
            IDBW_Settings::addReservationWidgetColor(IDBW_Settings::DEFAULT_WIDGET_COLOR);
        }

        if (!(IDBW_Settings::getReservationWidgetBookNowButtonText())) {
            IDBW_Settings::addReservationWidgetBookNowButtonText(IDBW_Settings::DEFAULT_BOOK_BUTTON_TEXT);
        }
    }
);
