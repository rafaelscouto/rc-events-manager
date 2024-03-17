<div class="rc_events_manager rc_meta_boxes">
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_associated_institution"><?php _e('Associated Institution', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <select id="rc_associated_institution" name="rc_associated_institution">
                    <option value=""><?php _e('Select', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></option>
                    <?php
                    foreach ($institutions as $institution) {
                        $selected = ($institution->ID == $associated_institution) ? 'selected' : '';
                        echo '<option value="' . $institution->ID . '" ' . $selected . '>' . $institution->post_title . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
