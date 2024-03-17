document.addEventListener('DOMContentLoaded', function() {

    // Get select register type
    const selectRegisterType = document.getElementById('rc_institution_register_type');

    // Get register field
    const registrationInput = document.getElementById('rc_institution_registration');

    // Get phone field
    const phoneInput = document.getElementById('rc_institution_phone');

    // Get the zip code field
    const zipCodeInput = document.getElementById('rc_institution_zip_code');

    // Get the input description in phone field
    const phoneDescriptionBR = document.getElementsByClassName('input-description phone-brazil')[0];
    
    // Define the mask instance for each input
    let maskInstanceRegistration = null;
    let maskInstancePhone = null;
    let maskInstanceZipCode = null;

    // Function to apply the mask based on the selected type
    function applyMask() {
        const registerType = selectRegisterType.value;

        let maskOptionsRegistration = '';
        let maskOptionsPhone = '';
        let maskOptionsZipCode = '';

        // Define the mask based on the selected type
        switch(registerType) {
            case 'CNPJ':
                maskOptionsRegistration = { mask: '00.000.000/0000-00' };
                maskOptionsPhone = { mask: '+55 (00) 0000[0]-0000' };
                maskOptionsZipCode = { mask: '00000-000' };
                break;
            case 'EIN':
                maskOptionsRegistration = { mask: '00-0000000' };
                maskOptionsPhone = { mask: '+1(000) 000-0000' };
                maskOptionsZipCode = { mask: '00000-0000' };
                break;
        }

        // Destroy the mask instance if it exists for each input
        if (maskInstanceRegistration !== null) {
            maskInstanceRegistration.destroy();
        }
        if (maskInstancePhone !== null) {
            maskInstancePhone.destroy();
        }
        if (maskInstanceZipCode !== null) {
            maskInstanceZipCode.destroy();
        }

        // Apply the masks to the respective input fields
        if (maskOptionsRegistration !== '') {
            maskInstanceRegistration = IMask(registrationInput, { ...maskOptionsRegistration });
        }
        if (maskOptionsPhone !== '') {
            maskInstancePhone = IMask(phoneInput, { ...maskOptionsPhone });
        }
        if (maskOptionsZipCode !== '') {
            maskInstanceZipCode = IMask(zipCodeInput, { ...maskOptionsZipCode });
        }
    }

    // Function to enable or disable registration input based on selected type
    function toggleRegistrationInput() {
        const registerType = selectRegisterType.value;

        // Enable or disable registration input based on the selected type
        if (registerType === '') {
            registrationInput.disabled = true;
            phoneInput.disabled = true;
            zipCodeInput.disabled = true;
            
            registrationInput.value = '';
            phoneInput.value = '';
            zipCodeInput.value = '';

            phoneDescriptionBR.style.display = 'none';
        } else {
            registrationInput.disabled = false;
            phoneInput.disabled = false;
            zipCodeInput.disabled = false;

            phoneDescriptionBR.style.display = 'block';
        }
    }

    // Apply mask on page load
    applyMask();

    // Enable field on select change
    selectRegisterType.addEventListener('change', function() {
        applyMask();
        toggleRegistrationInput();
    });

    // Toggle registration input on page load
    toggleRegistrationInput();
});