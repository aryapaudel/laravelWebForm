<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Form</title>
    <link rel="stylesheet" href="style.css">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />


  </head>
  <body>
    <div class="container">
      <h2>Registration form</h2>

      <div class="form-container">
        <form action="{{ url('/') }}/register" name="myForm" method="post" onsubmit="return validateForm()">
            @csrf
          <div class="input_name">
            <i class="fa fa-user lock"></i>
            <input type="text" placeholder="First name" class="name" name="fname" />
            <span class="error" id="fnameError">First name is required</span>
          </div>
          <div class="input_name">
            <i class="fa fa-user lock"></i>
            <input type="text" placeholder="Last name" class="name" name="lname" />
            <span class="error" id="lnameError">Last name is required</span>
          </div>
          <div class="input_name">
            <i class="fa fa-envelope email lock"></i>
            <input type="email" name="email" placeholder="Email" class="text-name" />
            <span class="error" id="emailError">Valid email is required</span>
          </div>

          <div class="input_name">
            <i class="fa fa-lock lock"></i>
            <input type="password" name="password" placeholder="Password" class="text-name" />
            <span class="error" id="passwordError">Password is required</span>
          </div>

          <div class="input_name">
            <i class="fa fa-lock lock"></i>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" class="text-name" />
            <span class="error" id="confirmPasswordError">Passwords must match</span>
          </div>

          <div class="input_name">
            <input type="radio" class="radio-button" name="gender" value="Male" />
            <label style="margin-right: 30px;">Male</label>

            <input type="radio" class="radio-button" name="gender" value="Female" />
            <label style="margin-right: 30px;">Female</label>
            <span class="error" id="genderError">Please select a gender</span>
          </div>

          <div class="input_name">
            <select class="country" class="text-name" name="country">
              <option value="">Select a country</option>
              <option value="Nepal">Nepal</option>
              <option value="India">India</option>
              <option value="Italy">Italy</option>
              <option value="Bhutan">Bhutan</option>
              <option value="USA">USA</option>
              <option value="UK">UK</option>
              <option value="Australia">Australia</option>
              <option value="Japan">Japan</option>
            </select>
            <div class="arrow"></div>
            <span class="error" id="countryError">Please select a country</span>
          </div>

          <div class="input_name">
            <input type="checkbox" class="check-button" name="termsaccepted" />
            <label for="check-button" class="check">I accept the terms and conditions</label>
            <span class="error" id="termsError">You must accept the terms and conditions</span>
          </div>

          <div class="input_name">
            <input type="submit" class="button" value="Register" />
          </div>
        </form>
      </div>
    </div>

    <script>
      function validateForm() {
        let isValid = true;

        // Get form values
        const fname = document.forms["myForm"]["fname"].value.trim();
        const lname = document.forms["myForm"]["lname"].value.trim();
        const email = document.forms["myForm"]["email"].value.trim();
        const password = document.forms["myForm"]["password"].value.trim();
        const confirmpassword = document.forms["myForm"]["confirmpassword"].value.trim();
        const gender = document.forms["myForm"]["gender"].value;
        const country = document.forms["myForm"]["country"].value;
        const termsaccepted = document.forms["myForm"]["termsaccepted"].checked;


        if (fname === "") {
          document.getElementById("fnameError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("fnameError").style.display = "none";
        }


        if (lname === "") {
          document.getElementById("lnameError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("lnameError").style.display = "none";
        }


        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "" || !emailPattern.test(email)) {
          document.getElementById("emailError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("emailError").style.display = "none";
        }


        if (password === "") {
          document.getElementById("passwordError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("passwordError").style.display = "none";
        }


        if (confirmpassword === "" || password !== confirmpassword) {
          document.getElementById("confirmPasswordError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("confirmPasswordError").style.display = "none";
        }

        if (!gender) {
          document.getElementById("genderError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("genderError").style.display = "none";
        }


        if (country === "") {
          document.getElementById("countryError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("countryError").style.display = "none";
        }


        if (!termsaccepted) {
          document.getElementById("termsError").style.display = "block";
          isValid = false;
        } else {
          document.getElementById("termsError").style.display = "none";
        }

        return isValid;
      }
    </script>
  </body>
</html>
