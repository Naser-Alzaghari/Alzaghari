$(function () {
    // Get the form
    var form = $('#contact-form');

    // Set up an event listener for the contact form
    $(form).submit(function (e) {
        // Stop the browser from submitting the form
        e.preventDefault();

        // Clear previous error messages
        $('.error-message').text('');

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

        // Stop form submission if validation fails
        if (!isValid) {
            return;
        }

        // Serialize the form data
        var formData = $(this).serialize();

        // Submit the form using AJAX
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
        })
            .done(function (response) {
                alert('Message sent successfully.');
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
                    alert('An error occurred. Please try again later.');
                }
            });
    });
});