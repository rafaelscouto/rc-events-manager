<div class="rc-events-manager rc-meta-boxes">
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_logo"><?php _e('Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <div class="institution_logo">
                    <img src="<?php echo $institution_logo; ?>" alt="Institution Logo">
                </div>
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_registration"><?php _e('Registration Number (TIN, NIF, CNPJ, RUT, UTR)', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_registration" name="institution_registration" value="<?php echo $institution_registration; ?>">
                <span class="input-description"><?php _e('If you select a country, a mask compatible with that country\'s registration number will be enabled', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></span>
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_email"><?php _e('Email', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="email" id="institution_email" name="institution_email" value="<?php echo $institution_email; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_phone"><?php _e('Phone', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_phone" name="institution_phone" value="<?php echo $institution_phone; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address"><?php _e('Address', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address" name="institution_address" value="<?php echo $institution_address; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_complement"><?php _e('Address Complement', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_complement" name="institution_address_complement" value="<?php echo $institution_address_complement; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_number"><?php _e('Address Number', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_number" name="institution_address_number" value="<?php echo $institution_address_number; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_neighborhood"><?php _e('Address Neighborhood', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_neighborhood" name="institution_address_neighborhood" value="<?php echo $institution_address_neighborhood; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_city"><?php _e('Address City', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_city" name="institution_address_city" value="<?php echo $institution_address_city; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_state"><?php _e('Address State', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_state" name="institution_address_state" value="<?php echo $institution_address_state; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_zip"><?php _e('Address Zip', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_zip" name="institution_address_zip" value="<?php echo $institution_address_zip; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_country"><?php _e('Address Country', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_country" name="institution_address_country" value="<?php echo $institution_address_country; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_website"><?php _e('Website', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_website" name="institution_website" value="<?php echo $institution_website; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_director_name"><?php _e('Director Name', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_director_name" name="institution_director_name" value="<?php echo $institution_director_name; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_director_position"><?php _e('Director Position', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_director_position" name="institution_director_position" value="<?php echo $institution_director_position; ?>">
            </div>
        </div>
    </div>
</div>