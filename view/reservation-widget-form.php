<div class="direct-booking-reservation-widget-settings">
    <?php if (empty($properties)) : ?>
        <b> No property available </b>
    <?php else : ?>
        <label>Choose property</label>
        <select
                id="<?php echo $this->get_field_id(self::CURRENT_PROPERTY_ID) ?>"
                name="<?php echo $this->get_field_name(self::CURRENT_PROPERTY_ID); ?>"
        >
            <?php foreach ($properties as $property) : ?>
                <option value="<?php echo $property->id; ?>" <?php echo $property->id === $currentPropertyId ? 'selected' : '' ?>>
                    <?php echo $property->name; ?>
                </option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
</div>

<style>
    .direct-booking-reservation-widget-settings {
        margin: 15px 0;
        font-size: 14px;
        font-style: normal;
        font-weight: normal;
        /* font-family: SF Pro Display; - not included yet */
        display: flex;
        flex-direction: column;
    }

    .direct-booking-reservation-widget-settings select {
        height: 40px;
        border-radius: 3px;
        margin: 5px 0 8px 0;
    }

    .direct-booking-reservation-widget-settings input {
        border: 1px solid #7E8993;
        box-sizing: border-box;
        border-radius: 3px;
        background-color: #FFFFFF;
        height: 30px;
        padding: 0 9px;
    }
</style>
