<?php
/**
 * iGMS Direct Booking Plugin
 *
 * @package           IgmsDirectBookingPlugin
 * @author            AirGMS Technologies Inc.
 * @copyright         2021 AirGMS Technologies Inc.
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       iGMS Direct Booking
 * Plugin URI:        https://www.igms.com/help/knowledge-base/igms-direct-booking-widget/
 * Description:       iGMS Direct Booking Widget allows your guests to make direct reservations with you right via your website.
 * Version:           1.3
 * Requires at least: 5.6 @todo define wordpress version
 * Requires PHP:      5.6
 * Author:            AirGMS Technologies Inc.
 * Author URI:        https://igms.com
 * Text Domain:       plugin-igms-direct-booking
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

define('IGMS_DIRECT_BOOKING_WIDGET_ROOT', dirname(__FILE__));
define('IGMS_DIRECT_BOOKING_WIDGET_PATH', __FILE__);

require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/route/IDBW_Route.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/settings/IDBW_Settings.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/view/direct-booking-reservation-widget.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/actions/IDBW_Auth.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/libraries/IDBW_IgmsLibrary.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/widgets/IDBW_ReservationWidget.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/actions/IDBW_Property.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/exceptions/IDBW_IgmsApiErrorException.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/dataTransferObjects/IDBW_DataTransferObject.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/dataTransferObjects/IDBW_PropertyDTO.php');
require_once(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/actions/IDBW_Options.php');

include(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/includes/register-activation-hook.php');
include(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/includes/register-uninstall-hook.php');
include(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/includes/register-reservation-widget-shortcode.php');
include(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/includes/register-reservation-widget-block.php');
include(IGMS_DIRECT_BOOKING_WIDGET_ROOT . '/includes/register-direct-booking-reservation-widget.php');


/** init settings and register direct booking section */
$settings = new IDBW_Settings();
$settings->init();

/** init routes */
$route = new IDBW_Route();
$route->init();
