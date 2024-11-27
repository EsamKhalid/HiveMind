// COPYRIGHT (C) HARRY CLARK 2024
// PHP PASSWORD GENERATOR AJAX HANDLER 

// THIS FILE PERTAINS TOWARDS THE MAIN FUNCTIONALITY OF
// ALLOWING THE PHP FILE TO COMMUNICATE WITH THE POST AND GET METHODS

$(document).ready(function() 
{
    // HIDES THE PASSWORD GENERATOR CONTROLS INITIALLY
    $('#generatorControls').hide(); 

    // HANDLES THE TOGGLE OF THE PASSWORD GENERATOR CONTROL PANEL
    $('#useGenerator').on('change', function() 
    {
        if ($(this).is(':checked')) 
        {
            $('#generatorControls').slideDown(); 
        } 
        else 
        {
            // HIDES THE CONTROL PANEL IF THE TOGGLE IS UNCHECKED
            $('#generatorControls').slideUp();
        }
    });

    // HANDLES THE CLICK EVENT OF THE GENERATE BUTTON
    $('#generateBtn').on('click', function() 
    {
        $('#errorMessage').hide();

        // CHECKS IF AT LEAST ONE CHARACTER TYPE IS SELECTED
        if (!$('#hasUpper').is(':checked') && 
            !$('#hasLower').is(':checked') && 
            !$('#hasNums').is(':checked') && 
            !$('#hasSyms').is(':checked')) 
            {
            // SHOWS ERROR MESSAGE IF NO CHARACTER TYPE IS SELECTED
            $('#errorMessage').text('Please select at least one character type').show();
            return;
        }

        // GATHERS THE PASSWORD GENERATOR DATA TO BE SENT VIA AJAX
        const requestData = 
        {
            length: parseInt($('#passwordLength').val()), // PASSWORD LENGTH
            requirements: 
            {
                HAS_UPPER: $('#hasUpper').is(':checked') ? 1 : 0, // INCLUDE UPPERCASE
                HAS_LOWER: $('#hasLower').is(':checked') ? 1 : 0, // INCLUDE LOWERCASE
                HAS_NUMBER: $('#hasNums').is(':checked') ? 1 : 0, // INCLUDE NUMBERS
                HAS_SYMBOL: $('#hasSyms').is(':checked') ? 1 : 0, // INCLUDE SYMBOLS
                MIN_UPPER: 1, // MINIMUM REQUIRED UPPERCASE CHARACTERS
                MIN_LOWER: 1, // MINIMUM REQUIRED LOWERCASE CHARACTERS
                MIN_NUMBER: 1, // MINIMUM REQUIRED NUMERIC CHARACTERS
                MIN_SYMBOL: 1  // MINIMUM REQUIRED SYMBOL CHARACTERS
            }
        };

        // LOGGING REQUEST DATA BEFORE SENDING IT TO THE SERVER
        console.log("Sending AJAX request with data:", requestData);

        // MAKING THE AJAX REQUEST TO THE PHP FILE
        $.ajax(
        {
            url: 'password.php', // TARGET PHP FILE
            method: 'POST', // POST REQUEST METHOD
            data: JSON.stringify(requestData), // SEND REQUEST DATA AS JSON
            contentType: 'application/json', // SPECIFY CONTENT TYPE
            success: function(response) 
            {
                // LOGGING THE SERVER RESPONSE
                console.log("Response from server:", response);

                // CHECKS IF PASSWORD IS RETURNED IN THE RESPONSE
                if (response.password) 
                {
                    // DISPLAYS THE GENERATED PASSWORD
                    $('#password').val(response.password);
                } 
                else 
                {
                    // DISPLAYS ERROR MESSAGE IF PASSWORD GENERATION FAILS
                    $('#errorMessage').text(response.error || 'Failed to generate password').show();
                }
            },
            error: function(xhr, status, error) 
            {
                // DISPLAYS ERROR MESSAGE IN CASE OF AJAX FAILURE
                $('#errorMessage').text('Error: ' + error).show();
                // LOGGING AJAX ERROR DETAILS
                console.error("AJAX Error:", status, error);
            }
        });
    });

    // UPDATES THE DISPLAYED PASSWORD LENGTH VALUE AS THE USER CHANGES IT
    $('#passwordLength').on('input', function() 
    {
        $('#lengthValue').text($(this).val()); // SHOWS CURRENT VALUE OF PASSWORD LENGTH
    });
});
