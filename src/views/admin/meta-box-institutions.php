<div class="rc_events_manager rc_meta_boxes">
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_logo"><?php _e('Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <div class="rc_post_image_column_data rc_circle">
                    <img src="<?php echo $institution_logo; ?>" alt="Institution Logo">
                </div>
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_register_type"><?php _e('Select Register Type', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <select id="rc_institution_register_type" name="rc_institution_register_type" required>
                    <option value=""><?php _e('Select', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></option>
                    <?php
                    foreach ($institution_register_types as $register_type) {
                        $selected = ($register_type['code'] == $institution_register_type) ? 'selected' : '';
                        echo '<option value="' . $register_type['code'] . '" ' . $selected . '>' . $register_type['title'] . '</option>';
                    }
                    ?>
                </select>
                <span class="input-description"><?php _e('Select a type, a mask compatible with that country\'s registration number will be enabled in registration field', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></span>
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_registration"><?php _e('Registration Number (CNPJ, EIN, BN, CRN, HRB, ABN or any other)', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_registration" name="rc_institution_registration" value="<?php echo $institution_registration; ?>" required>
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_email"><?php _e('Email', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="email" id="rc_institution_email" name="rc_institution_email" value="<?php echo $institution_email; ?>">
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_phone"><?php _e('Phone', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_phone" name="rc_institution_phone" value="<?php echo $institution_phone; ?>">
                <span class="input-description phone-brazil"><?php _e('Select the last character before the hyphen and press "X" to remove it, so you can use the two masks (telephone and cell phone) used in Brazil. Example: +55 (00) 0000[0]-0000 The field in square brackets can be removed.', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></span>
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_address"><?php _e('Address', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_address" name="rc_institution_address" value="<?php echo $institution_address; ?>">
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_address_complement"><?php _e('Address Complement', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_address_complement" name="rc_institution_address_complement" value="<?php echo $institution_address_complement; ?>">
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_address_number"><?php _e('Address Number', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_address_number" name="rc_institution_address_number" value="<?php echo $institution_address_number; ?>">
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_neighborhood"><?php _e('Address Neighborhood', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_neighborhood" name="rc_institution_neighborhood" value="<?php echo $institution_address_neighborhood; ?>">
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_city"><?php _e('Address City', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_city" name="rc_institution_city" value="<?php echo $institution_address_city; ?>">
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_state"><?php _e('Address State', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_state" name="rc_institution_state" value="<?php echo $institution_address_state; ?>">
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_zip_code"><?php _e('Address Zip Code', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_zip_code" name="rc_institution_zip_code" value="<?php echo $institution_address_zip; ?>">
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_country"><?php _e('Address Country', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_country" name="rc_institution_country" value="<?php echo $institution_address_country; ?>">
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_website"><?php _e('Website', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_website" name="rc_institution_website" value="<?php echo $institution_website; ?>">
            </div>
        </div>
    </div>
    <div class="rc_row">
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_director_name"><?php _e('Director Name', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_director_name" name="rc_institution_director_name" value="<?php echo $institution_director_name; ?>">
            </div>
        </div>
        <div class="rc_col">
            <div class="rc_form_field">
                <label for="rc_institution_director_position"><?php _e('Director Position', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="rc_institution_director_position" name="rc_institution_director_position" value="<?php echo $institution_director_position; ?>">
            </div>
        </div>
    </div>
</div>