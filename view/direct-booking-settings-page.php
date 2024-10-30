<?php

add_action('wp_enqueue_scripts', 'IDBW_registerIgmsSettingsPageScripts');
add_action('admin_enqueue_scripts', 'IDBW_registerIgmsSettingsPageScripts');

function IDBW_registerIgmsSettingsPageScripts() {
    wp_enqueue_script(
        'updateDirectBookingWidgetSettings',
        plugin_dir_url(IGMS_DIRECT_BOOKING_WIDGET_PATH)  . '/view/UpdateDirectBookingWidgetSettings.js'
    );

    $dataToBePassed = array(
        'widgetColorUpdateUrl' => IDBW_Route::getUrlByRoute(IDBW_Route::SAVE_WIDGET_COLOR_ROUTE),
        'widgetCheckAvailabilityButtonTextUpdateUrl' => IDBW_Route::getUrlByRoute(
            IDBW_Route::SAVE_CHECK_AVAILABILITY_BUTTON_TEXT_ROUTE
        ),
        'widgetBookNowButtonTextUpdateUrl' => IDBW_Route::getUrlByRoute(IDBW_Route::SAVE_BOOK_NOW_BUTTON_TEXT_ROUTE),
    );

    wp_localize_script('updateDirectBookingWidgetSettings', 'updateRoutes', $dataToBePassed);
}

function IDBW_direct_booking_settings_page(
    $getUserUrl,
    $userUid = null,
    $profileEmail = null,
    $profileName = null,
    $profileAvatarUrl = null
) {
    ?>
    <div class="wordpress-direct-booking" id="wordpressDirectBookingWidget">
        <div class="main-content">
            <div class="auth-block">
                <?php if (!$userUid) : ?>
                    <div class="direct-booking-login">
                        <svg
                                width="120"
                                height="104"
                                viewBox="0 0 120 104"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                            <g clip-path="url(#clip0)">
                                <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M0 50.4973L29.0328 0H90.9317L120 50.5327L90.6832 103.333H29.8137L0 50.4973ZM26.7123 11.8915L5.75342 49.5274L24.4253 53.7169L26.7123 11.8915ZM7.39726 54.9471L28.3562 92.672L24.6185 58.7408L7.39726 54.9471ZM30 60.6878L34.1463 97.5926L76.8493 85.9291L30 60.6878ZM47.6712 98.4127H86.3014L82.0368 89.3915L47.6712 98.4127ZM85.8904 87.1036L89.8336 95.5423L106.438 66.4286L85.8904 87.1036ZM32.0548 56.8384L80.5479 82.8307L77.4617 31.164L32.0548 56.8384ZM30 52.0767L73.9726 27.4413L32.5971 6.56085L30 52.0767ZM38.6301 4.10053L78.0054 24.1931L84.2466 4.10053H38.6301ZM85.0717 81.6005L113.836 51.9477L82.1918 32.8042L85.0717 81.6005ZM82.1918 27.3189L110.959 45.1058L88.7202 5.74074L82.1918 27.3189Z"
                                        fill="url(#paint0_linear)"
                                />
                            </g>
                            <defs>
                                <linearGradient
                                        id="paint0_linear"
                                        x1="60"
                                        y1="0"
                                        x2="60"
                                        y2="103.333"
                                        gradientUnits="userSpaceOnUse"
                                >
                                    <stop stop-color="#FFC107" />
                                    <stop offset="1" stop-color="#FFA000" />
                                </linearGradient>
                                <clipPath id="clip0">
                                    <path d="M0 0H120V103.333H0V0Z" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <div class="login-main-title">Use your iGMS account for login</div>
                        <div class="direct-booking-widget-igms-login">
                            <a href="<?php echo $getUserUrl ?>" class="button">
                                Log in with iGMS
                            </a>
                        </div>
                        <div>
                            <p>Don't you have a iGMS account? </p>
                            <a href="<?php echo IDBW_Settings::IGMS_URL . '/app/register.html' ?>">Sign up</a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($userUid) : ?>
                    <div class="direct-booking-settings-header">
                        <div class="direct-booking-settings-title">iGMS Widgets Settings</div>
                        <div>
                            <div class="direct-booking-settings-user-info" id="directBookingSettingsProfileInfo">
                                <div>
                                    <p class="name"><?php echo $profileName ?></p>
                                    <p class="email"><?php echo $profileEmail ?></p>
                                </div>
                                <div class="avatar-block">
                                    <div class="avatar">
                                        <img src="<?php echo $profileAvatarUrl ?>" alt="profile avatar" class="profile-avatar">
                                    </div>
                                    <button class="logout">
                                        <span id="userBlockArrow" class="dashicons dashicons-arrow-down-alt2"></span>
                                    </button>
                                </div>
                            </div>
                            <a href="<?php echo IDBW_Route::getUrlByRoute(IDBW_Route::LOGOUT_ROUTE) ?>">
                                <div class="direct-booking-logout-tooltip"
                                     id="directBookingWidgetWordpressLogoutTooltip">
                                    <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 0.5H1.5C0.67275 0.5 0 1.1735 0 2V7.25H5.6925L3.96975 5.531L5.0295 4.469L8.5605 7.99325L5.031 11.5295L3.969 10.4705L5.6865 8.75H0V14C0 14.8273 0.67275 15.5 1.5 15.5H10.5C11.3273 15.5 12 14.8273 12 14V2C12 1.1735 11.3273 0.5 10.5 0.5Z"
                                              fill="#007CBA" />
                                    </svg>
                                    <span class="logout-text">Logout</span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!--            settings-block-->
            <?php if ($userUid) : ?>
                <div class="settings-block">
                        <div class="settings-sidebar">
                            <div class="direct-booking-settings-item">
                                <label for="colorHexValue">Brand Color:</label>
                                <div class="directBookingColorWrapper">
                                    <div
                                            id="colorCircle"
                                            class="directBookingColorBlock"
                                            style="background-color:<?php echo IDBW_Settings::getReservationWidgetColor(); ?> "
                                    >
                                    </div>
                                    <div id="colorHexValue"><?php echo IDBW_Settings::getReservationWidgetColor(); ?></div>
                                    <input
                                            id="favColor"
                                            name="<?php echo IDBW_Settings::RESERVATION_WIDGET_COLOR_OPTION_NAME ?>"
                                            type="color"
                                            value="<?php echo IDBW_Settings::getReservationWidgetColor(); ?>"
                                            onchange={chooseWidgetColor(this)}
                                    />
                                </div>
                            </div>
                            <div class="direct-booking-settings-item">
                                <label for="directBookingCheckAvailabilityText">Check Availability Button Text:</label>
                                <input
                                        id="directBookingCheckAvailabilityText"
                                        name="<?php echo IDBW_Settings::RESERVATION_WIDGET_CHECK_AVAILABILITY_BUTTON_TEXT_OPTION_NAME ?>"
                                        value="<?php echo IDBW_Settings::getReservationWidgetCheckAvailabilityButtonText(); ?>"
                                        onkeyup={changeCheckAvailabilityButtonText(this)}
                                />
                            </div>
                            <div class="direct-booking-settings-item">
                                <label for="directBookingBookNowButtonText">Book Button Text:</label>
                                <input
                                        id="directBookingBookNowButtonText"
                                        name="<?php echo IDBW_Settings::RESERVATION_WIDGET_BOOK_NOW_BUTTON_TEXT_OPTION_NAME ?>"
                                        value="<?php echo IDBW_Settings::getReservationWidgetBookNowButtonText(); ?>"
                                        onkeyup={changeBookNowButtonText(this)}
                                />
                            </div>
                            <div style="display: none" id="directBookingSettingsSaveBlock" class="direct-booking-settings-save">
                                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7544 1.12056C11.9985 1.36464 11.9985 1.76036 11.7544 2.00444L4.56694 9.19194C4.32286 9.43602 3.92714 9.43602 3.68306 9.19194L0.245558 5.75444C0.00148056 5.51036 0.00148056 5.11464 0.245558 4.87056C0.489636 4.62648 0.885364 4.62648 1.12944 4.87056L4.125 7.86612L10.8706 1.12056C11.1146 0.876481 11.5104 0.876481 11.7544 1.12056Z" fill="#62B970"/>
                                </svg>

                                <span>Saved</span>
                            </div>
                        </div>

                    <div class="direct-booking-preview-content">
                        <div class="preview-header">
                            <div>Direct reservation widget</div>
                        </div>
                        <div class="preview-body">
                            <?php
                            $widgetColor = IDBW_Settings::getReservationWidgetColor();
                            $bookNowButtonText = IDBW_Settings::getReservationWidgetBookNowButtonText();
                            $checkAvailabilityButtonText = IDBW_Settings::getReservationWidgetCheckAvailabilityButtonText();
                            $checkAvailabilityButtonText = str_replace(' ', '-', $checkAvailabilityButtonText);
                            $bookNowButtonText = str_replace(' ', '-', $bookNowButtonText);
                            ?>
                            <?php echo do_shortcode("[igms-direct-booking-widget-reservation color=$widgetColor book_button_text=$bookNowButtonText check_availability_button_text=$checkAvailabilityButtonText is_preview=true ]") ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="wordpress-direct-booking-footer">
            <p>Learn about iGMS Direct Booking on <a href="<?php echo IDBW_Settings::IGMS_URL . '/help' ?>">Help Desk</a>.</p>
            <div class="poweredByIgms">
                <svg width="28" height="25" viewBox="0 0 28 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 11.7675L6.69981 0H20.984L27.692 11.7757L20.9267 24.08H6.88L0 11.7675ZM6.16431 2.77111L1.3277 11.5415L5.63654 12.5178L6.16431 2.77111ZM1.70704 12.8044L6.54366 21.5956L5.68113 13.6885L1.70704 12.8044ZM6.923 14.1422L7.87982 22.7422L17.7343 20.0243L6.923 14.1422ZM11.0009 22.9333H19.9155L18.9314 20.8311L11.0009 22.9333ZM19.8206 20.2979L20.7306 22.2644L24.5624 15.48L19.8206 20.2979ZM7.39718 13.2452L18.5878 19.3022L17.8756 7.26222L7.39718 13.2452ZM6.923 12.1356L17.0704 6.39471L7.52232 1.52889L6.923 12.1356ZM8.91455 0.955556L18.0011 5.63778L19.4413 0.955556H8.91455ZM19.6317 19.0156L26.2695 12.1055L18.9671 7.64444L19.6317 19.0156ZM18.9671 6.36618L25.6056 10.5111L20.4737 1.33778L18.9671 6.36618Z" fill="url(#paint0_linear)"/>
                    <defs>
                        <linearGradient id="paint0_linear" x1="13.846" y1="0" x2="13.846" y2="24.08" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#FFC107"/>
                            <stop offset="1" stop-color="#FFA000"/>
                        </linearGradient>
                    </defs>
                </svg>
                <svg width="50" height="16" viewBox="0 0 50 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.16829 0.342783C1.02443 0.342783 0.887383 0.370569 0.758206 0.426525C0.631107 0.481582 0.519008 0.556753 0.42277 0.652041C0.325692 0.74816 0.249725 0.863425 0.19431 0.996309C0.137984 1.12419 0.109985 1.25991 0.109985 1.4024C0.109985 1.5453 0.138113 1.6814 0.19476 1.8096L0.195877 1.81197C0.251811 1.93064 0.327659 2.0372 0.42277 2.13137C0.519008 2.22666 0.631107 2.30183 0.758205 2.35689C0.887383 2.41284 1.02443 2.44063 1.16829 2.44063C1.31216 2.44063 1.44921 2.41284 1.57838 2.35689C1.70548 2.30183 1.81758 2.22666 1.91382 2.13137C2.00858 2.03755 2.08421 1.93143 2.14009 1.81329C2.2049 1.68446 2.23741 1.54705 2.23741 1.4024C2.23741 1.2586 2.20527 1.12195 2.14122 0.993769C2.08589 0.861956 2.01028 0.747547 1.91382 0.652041C1.81758 0.556753 1.70548 0.481582 1.57838 0.426525C1.44921 0.370569 1.31216 0.342783 1.16829 0.342783Z" fill="#111111"/>
                    <path d="M1.16829 0.342783C1.02443 0.342783 0.887383 0.370569 0.758206 0.426525C0.631107 0.481582 0.519008 0.556753 0.42277 0.652041C0.325692 0.74816 0.249725 0.863425 0.19431 0.996309C0.137984 1.12419 0.109985 1.25991 0.109985 1.4024C0.109985 1.5453 0.138113 1.6814 0.19476 1.8096L0.195877 1.81197C0.251811 1.93064 0.327659 2.0372 0.42277 2.13137C0.519008 2.22666 0.631107 2.30183 0.758205 2.35689C0.887383 2.41284 1.02443 2.44063 1.16829 2.44063C1.31216 2.44063 1.44921 2.41284 1.57838 2.35689C1.70548 2.30183 1.81758 2.22666 1.91382 2.13137C2.00858 2.03755 2.08421 1.93143 2.14009 1.81329C2.2049 1.68446 2.23741 1.54705 2.23741 1.4024C2.23741 1.2586 2.20527 1.12195 2.14122 0.993769C2.08589 0.861956 2.01028 0.747547 1.91382 0.652041C1.81758 0.556753 1.70548 0.481582 1.57838 0.426525C1.44921 0.370569 1.31216 0.342783 1.16829 0.342783Z" fill="#111111"/>
                    <path d="M1.16829 0.342783C1.02443 0.342783 0.887383 0.370569 0.758206 0.426525C0.631107 0.481582 0.519008 0.556753 0.42277 0.652041C0.325692 0.74816 0.249725 0.863425 0.19431 0.996309C0.137984 1.12419 0.109985 1.25991 0.109985 1.4024C0.109985 1.5453 0.138113 1.6814 0.19476 1.8096L0.195877 1.81197C0.251811 1.93064 0.327659 2.0372 0.42277 2.13137C0.519008 2.22666 0.631107 2.30183 0.758205 2.35689C0.887383 2.41284 1.02443 2.44063 1.16829 2.44063C1.31216 2.44063 1.44921 2.41284 1.57838 2.35689C1.70548 2.30183 1.81758 2.22666 1.91382 2.13137C2.00858 2.03755 2.08421 1.93143 2.14009 1.81329C2.2049 1.68446 2.23741 1.54705 2.23741 1.4024C2.23741 1.2586 2.20527 1.12195 2.14122 0.993769C2.08589 0.861956 2.01028 0.747547 1.91382 0.652041C1.81758 0.556753 1.70548 0.481582 1.57838 0.426525C1.44921 0.370569 1.31216 0.342783 1.16829 0.342783Z" fill="#111111"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.05808 0.86362C10.016 0.487178 11.092 0.300003 12.2844 0.300003C12.8726 0.300003 13.4149 0.339534 13.9112 0.419014C14.4141 0.498403 14.8818 0.617637 15.3138 0.777088C15.7453 0.929212 16.1481 1.12131 16.5219 1.3535C16.8945 1.57779 17.2522 1.83804 17.595 2.13411L17.6656 2.1951L17.3137 2.74262C17.253 2.84479 17.1696 2.91963 17.0601 2.94803C16.953 2.97581 16.8393 2.9543 16.7261 2.90272C16.603 2.85335 16.4388 2.74552 16.2378 2.58916C16.0443 2.43863 15.7743 2.27836 15.4249 2.10893C15.0803 1.94181 14.6482 1.79064 14.1268 1.65629C13.6198 1.52381 12.9953 1.45643 12.252 1.45643C11.2694 1.45643 10.3826 1.61149 9.58998 1.91977C8.80408 2.22825 8.133 2.66918 7.57526 3.24232C7.02495 3.81521 6.59676 4.51508 6.29166 5.3439C5.99406 6.17191 5.84433 7.1042 5.84433 8.14215C5.84433 9.19452 5.9941 10.1376 6.29175 10.9727C6.59672 11.8083 7.03189 12.515 7.59639 13.095C8.16822 13.6751 8.86065 14.1197 9.67539 14.4283C10.4897 14.7368 11.4093 14.8921 12.4357 14.8921C12.8851 14.8921 13.2975 14.8638 13.6732 14.8077C14.0575 14.7513 14.4202 14.6738 14.7606 14.5755C15.1086 14.4701 15.442 14.3436 15.7611 14.1962C16.0721 14.0489 16.3864 13.8857 16.7041 13.7066V9.80086H13.8835C13.7795 9.80086 13.6858 9.76729 13.6079 9.69973L13.6051 9.69739L13.6026 9.69487C13.5342 9.62709 13.4951 9.54336 13.4951 9.44731V8.74072H17.9239V14.2853L17.8781 14.3174C17.1062 14.8581 16.2828 15.273 15.4083 15.5617C14.5312 15.8511 13.5471 15.995 12.4573 15.995C11.2364 15.995 10.1356 15.8115 9.15641 15.4425L9.15576 15.4423C8.17794 15.0665 7.34041 14.5383 6.64482 13.8568L6.64401 13.856C5.95557 13.1671 5.42541 12.3375 5.05304 11.3687L5.05278 11.3681C4.68745 10.3986 4.50565 9.32289 4.50565 8.14215C4.50565 6.96167 4.68377 5.88962 5.04182 4.92736L5.04198 4.92694C5.407 3.95834 5.92624 3.13213 6.60038 2.45013C7.28154 1.76119 8.1013 1.23248 9.05808 0.86362ZM0.758206 0.426525C0.887383 0.370569 1.02443 0.342783 1.16829 0.342783C1.31216 0.342783 1.44921 0.370569 1.57838 0.426525C1.70548 0.481582 1.81758 0.556753 1.91382 0.652041C2.01028 0.747547 2.08589 0.861956 2.14122 0.993769C2.20527 1.12195 2.23741 1.2586 2.23741 1.4024C2.23741 1.54705 2.2049 1.68446 2.14009 1.81329C2.08421 1.93143 2.00858 2.03755 1.91382 2.13137C1.81758 2.22666 1.70548 2.30183 1.57838 2.35689C1.44921 2.41284 1.31216 2.44063 1.16829 2.44063C1.02443 2.44063 0.887383 2.41284 0.758205 2.35689C0.631107 2.30183 0.519008 2.22666 0.42277 2.13137C0.327659 2.0372 0.251811 1.93064 0.195877 1.81197L0.19476 1.8096C0.138113 1.6814 0.109985 1.5453 0.109985 1.4024C0.109985 1.25991 0.137984 1.12419 0.19431 0.996309C0.249725 0.863425 0.325692 0.74816 0.42277 0.652041C0.519008 0.556753 0.631107 0.481582 0.758206 0.426525ZM21.3901 0.471171H22.2647C22.3712 0.471171 22.465 0.482206 22.5398 0.509988C22.6314 0.544 22.7051 0.62618 22.7666 0.725188L22.7681 0.72756L28.9394 11.2576C29.0087 11.3857 29.0721 11.5194 29.1297 11.6586C29.1424 11.6303 29.1552 11.6022 29.1684 11.5743C29.2201 11.4574 29.2756 11.3474 29.3351 11.2443L35.3334 0.725147C35.395 0.626143 35.4686 0.544001 35.5602 0.509988L35.5639 0.508613C35.6435 0.482356 35.7388 0.471171 35.8462 0.471171H36.71V15.8238H35.5334V2.81455C35.5334 2.77244 35.5339 2.72982 35.535 2.68669L29.7495 12.8578L29.749 12.8587C29.6323 13.0729 29.455 13.1921 29.2229 13.1921H29.05C28.8181 13.1921 28.6409 13.073 28.5242 12.8592L28.5234 12.8578L22.5751 2.65415C22.5767 2.70836 22.5775 2.76183 22.5775 2.81455V15.8238H21.3901V0.471171ZM0.553003 4.96433H1.79444V15.8238H0.553003V4.96433Z" fill="#111111"/>
                    <path d="M1.16829 0.342783C1.02443 0.342783 0.887383 0.370569 0.758206 0.426525C0.631107 0.481582 0.519008 0.556753 0.42277 0.652041C0.325692 0.74816 0.249725 0.863425 0.19431 0.996309C0.137984 1.12419 0.109985 1.25991 0.109985 1.4024C0.109985 1.5453 0.138113 1.6814 0.19476 1.8096L0.195877 1.81197C0.251811 1.93064 0.327659 2.0372 0.42277 2.13137C0.519008 2.22666 0.631107 2.30183 0.758205 2.35689C0.887383 2.41284 1.02443 2.44063 1.16829 2.44063C1.31216 2.44063 1.44921 2.41284 1.57838 2.35689C1.70548 2.30183 1.81758 2.22666 1.91382 2.13137C2.00858 2.03755 2.08421 1.93143 2.14009 1.81329C2.2049 1.68446 2.23741 1.54705 2.23741 1.4024C2.23741 1.2586 2.20527 1.12195 2.14122 0.993769C2.08589 0.861956 2.01028 0.747547 1.91382 0.652041C1.81758 0.556753 1.70548 0.481582 1.57838 0.426525C1.44921 0.370569 1.31216 0.342783 1.16829 0.342783Z" fill="#111111"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M43.0178 0.639149C43.5871 0.412268 44.2311 0.300003 44.948 0.300003C45.7516 0.300003 46.4749 0.426579 47.1161 0.681987C47.7644 0.937321 48.3528 1.32727 48.8809 1.85023L48.9375 1.90627L48.6411 2.46884L48.6408 2.46942C48.6018 2.5424 48.5508 2.60311 48.4856 2.64537C48.4197 2.68804 48.3449 2.70809 48.2651 2.70809C48.1946 2.70809 48.1229 2.68427 48.0531 2.64766C47.9825 2.61068 47.9075 2.55729 47.8281 2.48999L47.824 2.48643C47.687 2.35756 47.4954 2.2155 47.2467 2.06068L47.2448 2.05953C47.0018 1.90139 46.693 1.75499 46.3167 1.6214L46.3161 1.62118C45.9569 1.49122 45.5055 1.42433 44.9589 1.42433C44.4143 1.42433 43.9376 1.50136 43.5269 1.65293C43.1211 1.80537 42.7811 2.01208 42.5047 2.2719C42.2346 2.53264 42.0271 2.83399 41.8816 3.17662C41.743 3.51991 41.6737 3.88036 41.6737 4.25878C41.6737 4.75714 41.7784 5.15953 41.9802 5.47292C42.1949 5.79493 42.4757 6.0699 42.8243 6.29769C43.1765 6.52782 43.5755 6.72385 44.022 6.88533C44.4822 7.04196 44.9533 7.1986 45.4351 7.35525C45.9202 7.51298 46.391 7.68867 46.8475 7.88233C47.3169 8.07124 47.7363 8.31149 48.1049 8.60349C48.4772 8.89835 48.7748 9.26318 48.9977 9.69677C49.2313 10.1302 49.345 10.6657 49.345 11.2981C49.345 11.9456 49.2311 12.558 49.0026 13.1345C48.7812 13.7046 48.456 14.2023 48.0274 14.6266C47.5983 15.0514 47.0744 15.387 46.4575 15.6343L46.4564 15.6347C45.8368 15.8757 45.1317 15.995 44.343 15.995C43.3224 15.995 42.4377 15.8182 41.6925 15.4602L41.6917 15.4598C40.9516 15.097 40.303 14.6035 39.7464 13.98L39.692 13.919L40.0419 13.3746L40.0456 13.3701C40.148 13.2433 40.2776 13.1697 40.4317 13.1697C40.5378 13.1697 40.6465 13.2359 40.7498 13.3236C40.8512 13.4097 40.974 13.517 41.1179 13.6452C41.2594 13.7643 41.4298 13.8978 41.6293 14.046C41.8247 14.1841 42.0528 14.3163 42.3141 14.4422C42.5732 14.56 42.8725 14.6612 43.2127 14.7454C43.5483 14.8285 43.932 14.8707 44.3646 14.8707C44.9589 14.8707 45.4857 14.7832 45.9468 14.6103C46.4104 14.4294 46.7973 14.1872 47.1098 13.8846L47.1107 13.8838C47.4306 13.5808 47.6739 13.223 47.8411 12.8094C48.0086 12.3877 48.0927 11.9377 48.0927 11.4585C48.0927 10.9382 47.9841 10.5216 47.7753 10.2014L47.7738 10.1992C47.5666 9.86413 47.2903 9.5868 46.9434 9.36695L46.9421 9.36613C46.5904 9.13629 46.1881 8.9439 45.7346 8.78952L45.7341 8.78935C45.2814 8.63284 44.8143 8.47986 44.3327 8.33041C43.8474 8.17979 43.3728 8.01121 42.9091 7.82467L42.9085 7.82445C42.446 7.63544 42.0301 7.3951 41.6615 7.10313L41.6605 7.10232C41.2885 6.80029 40.9876 6.42849 40.7578 5.9881L40.7568 5.9862C40.5313 5.53216 40.4214 4.97255 40.4214 4.31227C40.4214 3.79173 40.5215 3.28925 40.7213 2.8056C40.9216 2.32093 41.2146 1.89491 41.5997 1.52819C41.9856 1.15356 42.459 0.857581 43.0178 0.639149Z" fill="#111111"/>
                </svg>
            </div>
        </div>
    </div>

    <style>
        #wpcontent {
            padding: 0;
        }

        .wordpress-direct-booking {
            min-height: calc(100vh - 78px);
            display: flex;
            flex-direction: column;
            padding: 23px 13px;
            position: absolute;
            top: 0;
            width: calc(100% - 26px);
            background-color: #E5E5E5;
            z-index: 1;
        }

        .wordpress-direct-booking .direct-booking-settings-header {
            display: flex;
            justify-content: space-between;
        }

        .wordpress-direct-booking .direct-booking-settings-header p {
            margin: 0;
        }

        .wordpress-direct-booking .direct-booking-settings-header a {
            color: unset;
        }

        .wordpress-direct-booking .direct-booking-settings-header a:focus {
            box-shadow: none;
        }

        .wordpress-direct-booking .direct-booking-settings-title {
            /* font-family: SF Pro Display; - not included yet */
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 24px;
            color: #000000;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info {
            display: flex;
            border-radius: 3px;
            padding: 6px 6px 6px 12px;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info:hover {
            cursor: pointer;
            background: #EFF7FE;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .name {
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 16px;
            text-align: right;
            color: #007CBA;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .email {
            font-style: normal;
            font-weight: normal;
            font-size: 13px;
            line-height: 16px;
            text-align: right;
            color: #757575;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block {
            display: flex;
            margin-left: 8px;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .avatar {
            height: 32px;
            width: 32px;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .logout {
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background-color: unset;
            width: 32px;
            margin: 0;
            padding: 0;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .logout span {
            display: flex;
            align-items: center;
            border: none;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .logout:focus {
           border: none;
            outline: none;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .logout .dashicons {
            font-size: 14px;
            color: #007CBA;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .logout .dashicons:focus {
            cursor: pointer;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .logout .dashicons:hover {
            cursor: pointer;
        }

        .wordpress-direct-booking .direct-booking-settings-user-info .avatar-block .avatar img {
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            border-radius: 3px;
            position: relative;
        }

        .wordpress-direct-booking .direct-booking-logout-tooltip {
            display: none;
            z-index: 1;
            flex-direction: row;
            align-items: center;
            padding: 8px 12px;
            position: absolute;
            width: 112px;
            height: 24px;
            background: #FFFFFF;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 0 0 3px 3px;
            right: 12px;
        }

        .wordpress-direct-booking .direct-booking-logout-tooltip .logout-text {
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 22px;
            display: flex;
            align-items: center;
            color: #007CBA;
            margin-left: 10px;
        }


        .wordpress-direct-booking button {
            background-color: #007CBA;
            border-radius: 3px;
            color: #FFFFFF;
            font-size: 14px;
            line-height: 30px;
            width: 100%;
            margin: 9px 0;
            border: none;
        }

        .wordpress-direct-booking button:focus {
            outline: none;
        }

        .wordpress-direct-booking a {
            color: #1F88E5;
            text-decoration: none;
        }

        .wordpress-direct-booking .direct-booking-login {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            flex: 1;
            background-color: #FFFFFF;
            height: 395px;
        }

        .wordpress-direct-booking .direct-booking-login > div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .wordpress-direct-booking .direct-booking-login .direct-booking-widget-igms-login .button{
            cursor: pointer;
            margin-bottom: 16px;
            min-width: 144px;
            min-height: 38px;
            border: none;
            border-radius: 3px;
            background-color: #007CBA;
            color: white;
            line-height: 30px;
            padding: 5px;
            text-align: center;
        }

        .wordpress-direct-booking .direct-booking-login .direct-booking-widget-igms-login:focus {
            outline: none;
        }

        .wordpress-direct-booking .direct-booking-login .login-main-title {
            font-size: 24px;
            font-weight: bold;
            line-height: 32px;
            text-align: center;
            margin-top: 24px;
            margin-bottom: 16px;
        }

        .wordpress-direct-booking .profile-avatar {
            margin-bottom: 12px;
            /*todo edit*/
            width: 104px;
        }

        .wordpress-direct-booking .direct-booking-login p {
            margin: 0;
        }

        .wordpress-direct-booking form {
            display: flex;
        }

        .wordpress-direct-booking .settings-block {
            display: flex;
            background-color: #FFFFFF;
            margin-top: 16px;
            border: 1px solid #CCD0D4;
            box-sizing: border-box;
            border-radius: 4px;
            position: relative;
        }

        .wordpress-direct-booking .direct-booking-preview-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .wordpress-direct-booking .direct-booking-preview-content .preview-header {
            display: flex;
            height: 52px;
            border-bottom: 1px solid #DCE0E0;
        }

        .wordpress-direct-booking .direct-booking-preview-content .preview-body {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .wordpress-direct-booking .direct-booking-preview-content .preview-header > div {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 22px;
            color: #444444;
        }

        .wordpress-direct-booking .direct-booking-settings-save {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 7px;
            width: inherit;
        }

        .wordpress-direct-booking .direct-booking-settings-save span {
            font-family:Lato;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 30px;
            display: flex;
            align-items: center;
            text-align: center;
            color: #62B970;
            margin-left: 6px;
        }

        .wordpress-direct-booking .settings-block .settings-sidebar {
            background: #F0F0F080;
            border-radius: 0 0 0 2px;
            width: 270px;
            border-right: 1px solid #CCD0D4;
            padding: 24px;
        }

        .wordpress-direct-booking .settings-block .settings-sidebar .direct-booking-settings-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 16px;
        }

        .wordpress-direct-booking .settings-block .settings-sidebar .direct-booking-settings-item label {
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
            color: #333333;
        }

        .wordpress-direct-booking .settings-sidebar .direct-booking-settings-item input {
            border: 1px solid #DCE0E0;
            box-sizing: border-box;
            border-radius: 3px;
            background-color: #FFFFFF;
            height: 40px;
            padding: 8px;
            color: #333333;
        }

        .wordpress-direct-booking .settings-sidebar .direct-booking-settings-item input:focus {
            outline: none;
        }

        .wordpress-direct-booking .settings-sidebar .direct-booking-settings-item .directBookingColorWrapper {
            display: flex;
            border: 1px solid #DCE0E0;
            box-sizing: border-box;
            border-radius: 3px;
            background-color: #FFFFFF;
            height: 40px;
            color: #333333;
            align-items: center;
            position: relative;
        }

        .wordpress-direct-booking .settings-sidebar .direct-booking-settings-item .directBookingColorWrapper input {
            position: absolute;
            opacity: 0;
        }

        .wordpress-direct-booking .settings-sidebar .direct-booking-settings-item .directBookingColorBlock {
            width: 38px;
            height: 38px;
            margin-right: 8px;
        }

        .wordpress-direct-booking .settings-sidebar .direct-booking-settings-item .direct-booking-setting-color input {
            border: none;
            height: 100%;
        }

        .wordpress-direct-booking .booking-form .booking-form-body .customize-color label {
            display: flex;
            width: fit-content;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .wordpress-direct-booking .booking-form .booking-form-body label {
            color: #444444;
            font-size: 14px;
            text-align: left;
            margin-bottom: 3px;
        }

        .wordpress-direct-booking .booking-form .booking-form-body input:focus {
            border: 1px solid #1F88E5;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
            outline: none;
        }

        .wordpress-direct-booking .main-content {
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .wordpress-direct-booking .wordpress-direct-booking-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
        }

        .wordpress-direct-booking .wordpress-direct-booking-footer .poweredByIgms {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 82px;
        }

        .wordpress-direct-booking .wordpress-direct-booking-footer p {
            margin: 0;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 22px;
            color: #444444;
        }
    </style>
    <script>
        if (document.getElementById('directBookingSettingsProfileInfo')) {
            document.getElementById('directBookingSettingsProfileInfo').addEventListener('click', openLogoutTooltip);
        }
    </script>
<?php
}
