<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META TAGS FOR CHARACTER ENCODING AND VIEWPORT SETTINGS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PAGE TITLE -->
    <title>User Registration</title>

    <!-- EXTERNAL JQUERY LIBRARY FOR HANDLING AJAX AND DOM MANIPULATION -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- LINK TO EXTERNAL CSS FOR STYLING THE PAGE -->
    <link rel="stylesheet" href="/HiveMind/public/phpPass/style.css">
</head>
<body>
    <!-- CONTAINER TO WRAP THE MAIN FORM CONTENT -->
    <div class="container">
        <h1>Sign Up</h1> <!-- MAIN HEADING FOR THE SIGN-UP FORM -->

        <p class="text-sm text-gray-500 text-center mb-6">
      Fill in the form below to register. Already a user? <a href="../Index/index.html" class="text-blue-600 hover:underline">Log in</a>. 
      Guest? <a href="http://localhost/port2/Index/guest.php" class="text-blue-600 hover:underline">Guest View</a>.
        </p>


        <!-- SIGN-UP FORM WITH POST METHOD FOR DATA SUBMISSION -->
        <form id="signupForm" method="POST" action="register.php">
            
            <!-- USERNAME INPUT FIELD -->
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>

            <div class="form-group">
                <label for="surname">Last Name</label>
                <input type="text" id="surname" name="surname" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>

            <!-- PASSWORD INPUT SECTION WITH GENERATOR OPTIONS -->
            <div class="form-group">
                <label for="password">Password</label>
                
                <div class="password-container">
                    <!-- PASSWORD INPUT FIELD -->
                    <input type="password" id="password" name="password" required>
                    
                    <!-- OPTION TO TOGGLE PASSWORD GENERATOR FEATURE -->
                    <div class="generator-option">
                        <input type="checkbox" id="useGenerator" name="useGenerator">
                        <label for="useGenerator">Generate secure password</label>
                    </div>
                    
                    <!-- PASSWORD GENERATOR CONTROLS (INITIALLY HIDDEN) -->
                    <div class="generator-controls" id="generatorControls">
                        
                        <!-- CONTROL FOR SETTING PASSWORD LENGTH -->
                        <div class="length-control">
                            <label for="passwordLength">Length:</label>
                            <input type="range" id="passwordLength" min="12" max="128" value="16">
                            <span id="lengthValue">16</span> <!-- DISPLAYS CURRENT LENGTH VALUE -->
                        </div>
                        
                        <!-- OPTIONS FOR SELECTING CHARACTER TYPES IN THE GENERATED PASSWORD -->
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" id="hasUpper" checked>
                                <label for="hasUpper">Uppercase</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="hasLower" checked>
                                <label for="hasLower">Lowercase</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="hasNums" checked>
                                <label for="hasNums">Numbers</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" id="hasSyms" checked>
                                <label for="hasSyms">Symbols</label>
                            </div>
                        </div>
                        
                        <!-- BUTTON TO TRIGGER PASSWORD GENERATION -->
                        <button type="button" id="generateBtn">Generate Password</button>

                        <!-- PLACEHOLDER FOR DISPLAYING ERROR MESSAGES RELATED TO PASSWORD GENERATION -->
                        <div class="error-message" id="errorMessage"></div>
                    </div>
                </div>
                
                <!-- NOTE WITH PASSWORD REQUIREMENTS -->
                <div class="requirements">
                    Password must be at least 12 characters long and include uppercase, lowercase, numbers, and symbols.
                </div>
            </div>

            <!-- FORM SUBMISSION BUTTON -->
            <button type="submit">Sign Up</button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
      By registering, you agree to our <a href="#" class="text-blue-600 hover:underline">Terms</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
        </p>
    </div>

    <!-- EXTERNAL JAVASCRIPT FILE FOR HANDLING AJAX REQUESTS AND EVENT LISTENERS -->
    <script src="/HiveMind/public/phpPass/ajaxHandler.js"></script>
    <script src="signup.js"></script>
</body>
</html>
