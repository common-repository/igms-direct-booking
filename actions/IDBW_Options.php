<?php

/**
 * Class IDBW_Options
 */
class IDBW_Options
{
    /**
     * Update check availability button text
     * @param array $data
     * @return void
     */
    public function actionSaveCheckAvailabilityButtonText($data = [])
    {
        if (!empty($data['checkAvailabilityButtonText'])) {
            IDBW_Settings::updateReservationWidgetCheckAvailabilityButtonText($data['checkAvailabilityButtonText']);
        }
    }

    /**
     * Update check availability button text
     * @param array $data
     * @return void
     */
    public function actionSaveBookNowButtonText($data = [])
    {
        if (!empty($data['bookNowButtonText'])) {
            IDBW_Settings::updateReservationWidgetBookNowButtonText($data['bookNowButtonText']);
        }
    }

    /**
     * Update check availability button text
     * @param array $data
     * @return void
     */
    public function actionSaveWidgetColor($data = [])
    {
        if (!empty($data['widgetColor'])) {
            IDBW_Settings::updateReservationWidgetColor($data['widgetColor']);
        }
    }
}
