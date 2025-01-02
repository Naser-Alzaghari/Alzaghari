$(function () {
    var form = $('#contact-form');
    var submitButton = form.find('.submit-button');
    
    // Add spinner to submit button
    submitButton.append('<div class="spinner"></div>');
    
    $(form).submit(function (e) {
        e.preventDefault();
        
        // Clear previous messages
        $('.error-message').text('');
        $('.error-message-global').hide();
        $('.success-message').hide();
        
        // Perform client-side validation
        var name = $('#contact_name').val().trim();
        var email = $('#contact_email').val().trim();
        var phone = $('#contact_phone').val().trim();
        var message = $('#contact_message').val().trim();
        var isValid = true;
        
        if (!name) {
            isValid = false;
            $('#contact_name').siblings('.error-message').text('Name is required.');
        }
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            isValid = false;
            $('#contact_email').siblings('.error-message').text('A valid email is required.');
        }
        if (!phone || !/^[0-9\-\+\s]*$/.test(phone)) {
            isValid = false;
            $('#contact_phone').siblings('.error-message').text('A valid phone number is required.');
        }
        if (!message) {
            isValid = false;
            $('#contact_message').siblings('.error-message').text('Message cannot be empty.');
        }
        
        if (!isValid) {
            return;
        }
        
        // Show loading state
        submitButton.prop('disabled', true);
        submitButton.find('.spinner').show();
        
        // Submit the form using AJAX
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: $(this).serialize(),
        })
        .done(function (response) {
            // Show success message
            $('.success-message').css('display', 'block');
            // Clear the form fields
            $('#contact-form input, #contact-form textarea').val('');
            
        })
        .fail(function (data) {
            if (data.responseJSON && data.responseJSON.errors) {
                // Display server-side validation errors under each input
                $.each(data.responseJSON.errors, function (field, error) {
                    $('#' + field).siblings('.error-message').text(error[0]);
                });
            } else {
                // Show global error message
                $('.error-message-global').css('display', 'block');
                
                
            }
        })
        .always(function () {
            // Hide loading state
            submitButton.prop('disabled', false);
            submitButton.find('.spinner').hide();
        });
    });
});