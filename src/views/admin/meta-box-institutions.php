<div class="rc-events-manager rc-meta-boxes">
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_logo"><?php _e('Institution Logo', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="file" id="institution_logo" name="institution_logo">
            </div>
        </div>
        <?php
        if($institution_logo) {
            ?>
            <div class="rc-col">
                <div class="rc-form-field">
                    <img src="<?php echo $institution_logo; ?>" alt="<?php echo get_the_title($post->ID); ?>">
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_registration"><?php _e('Institution Registration', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_registration" name="institution_registration" value="<?php echo $institution_registration; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_email"><?php _e('Institution Email', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="email" id="institution_email" name="institution_email" value="<?php echo $institution_email; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_phone"><?php _e('Institution Phone', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_phone" name="institution_phone" value="<?php echo $institution_phone; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address"><?php _e('Institution Address', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address" name="institution_address" value="<?php echo $institution_address; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_complement"><?php _e('Institution Address Complement', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_complement" name="institution_address_complement" value="<?php echo $institution_address_complement; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_number"><?php _e('Institution Address Number', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_number" name="institution_address_number" value="<?php echo $institution_address_number; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_neighborhood"><?php _e('Institution Address Neighborhood', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_neighborhood" name="institution_address_neighborhood" value="<?php echo $institution_address_neighborhood; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_city"><?php _e('Institution Address City', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_city" name="institution_address_city" value="<?php echo $institution_address_city; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_state"><?php _e('Institution Address State', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_state" name="institution_address_state" value="<?php echo $institution_address_state; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_zip"><?php _e('Institution Address Zip', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_zip" name="institution_address_zip" value="<?php echo $institution_address_zip; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_address_country"><?php _e('Institution Address Country', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_address_country" name="institution_address_country" value="<?php echo $institution_address_country; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_website"><?php _e('Institution Website', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_website" name="institution_website" value="<?php echo $institution_website; ?>">
            </div>
        </div>
    </div>
    <div class="rc-row">
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_director_name"><?php _e('Institution Director Name', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_director_name" name="institution_director_name" value="<?php echo $institution_director_name; ?>">
            </div>
        </div>
        <div class="rc-col">
            <div class="rc-form-field">
                <label for="institution_director_position"><?php _e('Institution Director Position', RC_EVENTS_MANAGER_TEXT_DOMAIN); ?></label>
                <input type="text" id="institution_director_position" name="institution_director_position" value="<?php echo $institution_director_position; ?>">
            </div>
        </div>
    </div>
</div>