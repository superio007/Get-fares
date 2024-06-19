<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .passenger-form {
            background-color: #f2f2f2;
            border: 1px solid #e5e5e5;
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .passenger-form h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            margin-right: 10px;
            flex: 1;
        }

        .form-row label {
            margin-bottom: 5px;
        }

        .form-row input,
        .form-row select,
        .more-options button {
            padding: 5px;
            box-sizing: border-box;
            width: 100%;
            height: 38px;
        }

        .inner-div,
        .dob-row,
        .id-number-row {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            margin-top: 15px;
        }

        .dob-row label,
        .id-number-row label {
            flex-basis: 100%;
            margin-bottom: 5px;
        }

        .dob-row select,
        .id-number-row input,
        .id-number-row select {
            flex: 1;
            height: 38px;
            margin-right: 10px;
        }

        .dob-row {
            align-items: baseline;
            margin-bottom: 1rem;
        }

        .outer-div {
            padding: 10px;
            border: 1px solid grey;
            background-color: white;
            margin-bottom: 20px;
        }

        .middle-div {
            padding: 15px;
            background-color: white;
            border: 1px solid grey;
        }

        .inner-div {
            background-color: white;
        }

        .info-div {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .info-div .info-icon {
            margin-left: 5px;
            font-size: 14px;
            color: #000;
        }

        .more-options {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .more-options button {
            padding: 5px 10px;
            height: 38px;
        }

        .notice-box {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .id-number-row .form-row {
            flex: 0 0 20%;
            margin-right: 10px;
        }

        .id-number-row .dob-row {
            flex: 1;
            display: flex;
        }

        .id-number-row .dob-row select {
            margin-right: 10px;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            display: none;
        }

        .form-row select,
        .form-row input {
            margin-bottom: 5px;
        }

        #main {
            display: flex;
            justify-content: center;
        }

        #main #outer-div {
            border: 1px solid #00000073;
            width: 100%;
            background-color: white;
        }

        #main .form-container {
            width: 98%;
            margin: 10px auto;
            padding: 20px;
            border: 1px solid #00000073;
            background-color: #ffffff;
        }

        #main .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        #main .form-group {
            flex: 1;
            margin-right: 10px;
        }

        #main .form-group:last-child {
            margin-right: 0;
        }

        #main label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus {
            border-color: #0073e6;
            outline: none;
        }

        #main .form-note {
            text-align: right;
            margin-top: 10px;
        }

        #main .form-note p {
            font-size: 12px;
            color: #666;
        }

        #main .form-submit {
            text-align: center;
            margin-top: 20px;
        }

        #main .form-submit button {
            padding: 10px 20px;
            background-color: #0073e6;
            border: none;
            border-radius: 3px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        #main .form-submit button:hover {
            background-color: #005bb5;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    $traceId = $_GET['traceId'];
    echo $traceId;
    $purchaseId = $_GET['purchaseId'];
    echo $purchaseId;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        // Validation functions
        function validate_required($field, $value)
        {
            global $errors;
            if (empty($value)) {
                $errors[$field] = ucfirst(str_replace('-', ' ', $field)) . ' is required.';
            }
        }

        function validate_date($day, $month, $year, $field_name)
        {
            global $errors;
            if (!checkdate($month, $day, $year)) {
                $errors[$field_name] = 'Invalid date for ' . str_replace('-', ' ', $field_name) . '.';
            }
        }

        // Fetch and validate inputs
        $title = $_POST['title'];
        validate_required('title', $title);

        $first_name = $_POST['first-name'];
        validate_required('first-name', $first_name);

        $last_name = $_POST['last-name'];
        validate_required('last-name', $last_name);

        $agentsid = $_POST['agents-id'];
        validate_required('agents-id', $agentsid);

        $emailaddress = $_POST['email-address'];
        validate_required('email-address', $emailaddress);

        $phonenumber = $_POST['phone-number'];
        validate_required('phone-number', $phonenumber);

        $country = $_POST['country'];
        validate_required('country', $country);

        $city = $_POST['city'];
        validate_required('city', $city);

        $zipcode = $_POST['zip-code'];
        validate_required('zip-code', $zipcode);

        $houseno = $_POST['house-no'];
        validate_required('house-no', $houseno);

        $street = $_POST['street'];
        validate_required('street', $street);

        $dob_day = $_POST['dob-day'];
        $dob_month = $_POST['dob-month'];
        $dob_year = $_POST['dob-year'];
        validate_required('dob-day', $dob_day);
        validate_required('dob-month', $dob_month);
        validate_required('dob-year', $dob_year);
        if (!isset($errors['dob-day']) && !isset($errors['dob-month']) && !isset($errors['dob-year'])) {
            validate_date($dob_day, $dob_month, $dob_year, 'date of birth');
        }

        $id_method = $_POST['id-method'];
        validate_required('id-method', $id_method);

        $gender = $_POST['gender'];
        validate_required('gender', $gender);

        $id_number = $_POST['id-number'];
        validate_required('id-number', $id_number);

        $emergency_emailaddress = isset($_POST['emergency_email-address']);

        $emergency_phonenumber = isset($_POST['emergency_phone-number']);

        $emergency_country = isset($_POST['emergency_country']);

        $id_expire_day = $_POST['id-expire-day'];
        $id_expire_month = $_POST['id-expire-month'];
        $id_expire_year = $_POST['id-expire-year'];
        validate_required('id-expire-day', $id_expire_day);
        validate_required('id-expire-month', $id_expire_month);
        validate_required('id-expire-year', $id_expire_year);
        if (!isset($errors['id-expire-day']) && !isset($errors['id-expire-month']) && !isset($errors['id-expire-year'])) {
            validate_date($id_expire_day, $id_expire_month, $id_expire_year, 'ID expire date');
        }

        $country_issue = $_POST['country-issue'];
        validate_required('country-issue', $country_issue);

        $country_birth = $_POST['country-birth'];
        validate_required('country-birth', $country_birth);

        // Check for errors before processing
        if (empty($errors)) {
            // Process form data
            echo "<h1>Form Details</h1>";
            echo "<p>Title: $title</p>";
            echo "<p>First Name: $first_name</p>";
            echo "<p>Last Name: $last_name</p>";
            echo "<p>Date of Birth: $dob_day/$dob_month/$dob_year</p>";
            echo "<p>Identification Method: $id_method</p>";
            echo "<p>Gender: $gender </p>";
            echo "<p>Identification Number: $id_number</p>";
            echo "<p>Date of Expire: $id_expire_day/$id_expire_month/$id_expire_year</p>";
            echo "<p>Country of Issue: $country_issue</p>";
            echo "<p>Country of Birth: $country_birth</p>";
            echo "invoice addrees :";
            echo "<p>Agents ID: $agentsid</p>";
            echo "<p>Email Address: $emailaddress</p>";
            echo "<p>Phone Number: $phonenumber</p>";
            echo "<p>Country: $country</p>";
            echo "<p>City: $city</p>";
            echo "<p>ZIP Code: $zipcode</p>";
            echo "<p>House Number: $houseno</p>";
            echo "<p>Street: $street</p>";
            echo "Emergency info";
            echo "Emergency Email Address: " . $emergency_emailaddress . "<br>";
            echo "Emergency Phone Number: " . $emergency_phonenumber . "<br>";
            echo "Emergency Country: " . $emergency_country . "<br>";
        } else {
            // Display errors
            foreach ($errors as $field => $error) {
                echo "<p>$error</p>";
            }
        }
    }
    $formData = $_SESSION['formData'];
    ?>

    <form action="" method="post" id="passenger-form">
        <div class="passenger-form mb-3">
            <?php $index = 0; $passengers_count = $formData['total']; for($i = 0 ; $i < $passengers_count; $i++):?>
                <div class="outer-div">
                    <div class="middle-div">
                        <div class="info-div">
                            1. Adult
                            <i class="fas fa-info-circle info-icon"></i>
                        </div>
                        <div class="inner-div">
                            <div class="form-row">
                                <label for="title-<?php echo $i; ?>">Title*</label>
                                <select id="title-<?php echo $i; ?>" name="title" required>
                                    <option value="Mr">Mr.</option>
                                    <option value="Mrs">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms.</option>
                                </select>
                                <div id="title-<?php echo $i; ?>-error" class="error-message">Title is required.</div>
                            </div>
                            <div class="form-row">
                                <label for="first-name-<?php echo $i; ?>">First name*</label>
                                <input type="text" id="first-name-<?php echo $i; ?>" placeholder="Enter first name" name="first-name" required>
                                <div id="first-name-<?php echo $i; ?>-error" class="error-message">First name is required.</div>
                            </div>
                            <div class="form-row">
                                <label for="last-name-<?php echo $i; ?>">Last name*</label>
                                <input type="text" id="last-name-<?php echo $i; ?>" placeholder="Enter last name" name="last-name" required>
                                <div id="last-name-<?php echo $i; ?>-error" class="error-message">Last name is required.</div>
                            </div>
                        </div>
                        <div class="dob-row">
                            <label for="dob-<?php echo $i; ?>">Date of birth*</label>
                            <select id="dob-day-<?php echo $i; ?>" name="dob-day" class="dob-field" required>
                                <option value="" selected disabled hidden>DD</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select id="dob-month-<?php echo $i; ?>" name="dob-month" class="dob-field" required>
                                <option value="" selected disabled hidden>MM</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select id="dob-year-<?php echo $i; ?>" name="dob-year" class="dob-field" required>
                                <option value="" selected disabled hidden>YYYY</option>
                            </select>
                            <div id="dob-<?php echo $i; ?>-error" class="error-message">Complete date of birth is required.</div>
                        </div>
                        <div class="form-row">
                            <label for="id-method-<?php echo $i; ?>">Identification method</label>
                            <select id="id-method-<?php echo $i; ?>" name="id-method" required>
                                <option value="" selected disabled hidden>Select</option>
                                <option value="Passport">Passport</option>
                            </select>
                            <div id="id-method-<?php echo $i; ?>-error" class="error-message">Identification method is required.</div>
                        </div>
                        <div class="id-number-row">
                            <div class="form-row">
                                <label style="display: flex;align-items: end;" for="gender-<?php echo $i; ?>">Gender</label>
                                <select id="gender-<?php echo $i; ?>" name="gender" required>
                                    <option value="" selected disabled hidden>Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                <div id="gender-<?php echo $i; ?>-error" class="error-message">Gender is required.</div>
                            </div>
                            <div class="form-row">
                                <label style="display: flex;align-items: end;" for="id-number-<?php echo $i; ?>">Identification Number</label>
                                <input type="text" id="id-number-<?php echo $i; ?>" name="id-number" required>
                                <div id="id-number-<?php echo $i; ?>-error" class="error-message">Identification number is required.</div>
                            </div>
                            <div class="dob-row">
                                <label for="id-expire-day-<?php echo $i; ?>" style="flex-basis: 100%; margin-bottom: 5px;">Date of expire</label>
                                <select id="id-expire-day-<?php echo $i; ?>" name="id-expire-day" class="dob-field" required>
                                    <option value="" selected disabled hidden>DD</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <select id="id-expire-month-<?php echo $i; ?>" name="id-expire-month" class="dob-field" required>
                                    <option value="" selected disabled hidden>MM</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select id="id-expire-year-<?php echo $i; ?>" name="id-expire-year" class="dob-field" required>
                                    <option value="">YYYY</option>
                                </select>
                                <div id="id-expire-<?php echo $i; ?>-error" class="error-message">Complete ID expiration date is required.</div>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="form-row">
                                <label for="country-issue-<?php echo $i; ?>">Country of issue</label>
                                <select id="country-issue-<?php echo $i; ?>" name="country-issue" required>
                                    <option value="" selected disabled hidden>Select country</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brazil</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="CV">Cabo Verde</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, Democratic Republic of the</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="SZ">Eswatini</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GR">Greece</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia (Federated States of)</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="MK">North Macedonia</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                <div id="country-issue-<?php echo $i; ?>-error" class="error-message">Country of issue is required.</div>
                            </div>
                            <div class="form-row">
                                <label for="country-birth-<?php echo $i; ?>">Country of birth</label>
                                <select id="country-birth-<?php echo $i; ?>" name="country-birth" required>
                                    <option value="" selected disabled hidden>Select country</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brazil</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="CV">Cabo Verde</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, Democratic Republic of the</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="SZ">Eswatini</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GR">Greece</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia (Federated States of)</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="MK">North Macedonia</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                <div id="country-birth-<?php echo $i; ?>-error" class="error-message">Country of birth is required.</div>
                            </div>
                        </div>
                    </div>
                    <div class="notice-box">
                        <strong>Sharing of emergency contact details.</strong><br>
                        Please confirm and provide your contact details (mobile number and/or email) if you wish the carriers operating your flights to be able to contact you due to operational disruption such as cancellations, delays and schedule changes etc.
                        <div class="d-flex gap-5 row ms-3 my-3">
                            <div style="border:1px solid #00000073" class="d-flex gap-3 col-6">
                                <input type="radio" id="share-<?php echo $i; ?>" name="emergency_contact_<?php echo $i; ?>" value="share">
                                <label for="share-<?php echo $i; ?>">I wish to share emergency contact details</label>
                            </div>
                            <div style="border:1px solid #00000073" class="d-flex gap-3 col-5">
                                <input type="radio" id="no-share-<?php echo $i; ?>" name="emergency_contact_<?php echo $i; ?>" value="no-share" checked>
                                <label for="no-share-<?php echo $i; ?>">I don't wish to share my details</label>
                            </div>
                        </div>
                        <div id="contact-details-<?php echo $i; ?>" style="margin: 0 1rem;" class="hidden">
                            <div class="form-row row d-flex">
                                <div class="form-group col-6">
                                    <label for="emergency_country-<?php echo $i; ?>">Country*</label>
                                    <select id="emergency_country-<?php echo $i; ?>" name="emergency_country" required>
                                        <option value="" selected disabled hidden>Select country</option>
                                        <option value="+91">India</option>
                                    </select>
                                    <div id="emergency_country-<?php echo $i; ?>-error" class="error-message">Country is required.</div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="emergency_phone-number-<?php echo $i; ?>">Phone number*</label>
                                    <input placeholder="Enter phone number" type="tel" id="emergency_phone-number-<?php echo $i; ?>" name="emergency_phone-number" required>
                                    <div id="emergency_phone-number-<?php echo $i; ?>-error" class="error-message">Phone no is required.</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group" style="margin-right: 50.36666%">
                                    <label for="emergency_email-address-<?php echo $i; ?>">E-mail address*</label>
                                    <input type="email" id="emergency_email-address-<?php echo $i; ?>" name="emergency_email-address" placeholder="Enter email" required>
                                    <div id="emergency_email-address-<?php echo $i; ?>-error" class="error-message">Email address is required.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor;?>
            <div>
                <h2 class="text-start ">Invoice Address</h2>
                <div id="main">
                    <div id="outer-div">
                        <div class="form-container">
                            <form id="passenger-form" action="#" method="post">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="street">Street*</label>
                                        <input type="text" id="street" name="street" placeholder="Enter Street name" required>
                                        <div id="street-error" class="error-message">Street is required.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="house-no">House no.*</label>
                                        <input type="text" id="house-no" name="house-no" placeholder="Enter house no" required>
                                        <div id="house-no-error" class="error-message">House no is required.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip-code">ZIP code*</label>
                                        <input type="text" id="zip-code" placeholder="Enter zip code" name="zip-code" required>
                                        <div id="zip-code-error" class="error-message">Zip code is required.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City*</label>
                                        <input type="text" id="city" placeholder="Enter city" name="city" required>
                                        <div id="city-error" class="error-message">City is required.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="country">Country*</label>
                                        <select id="country" name="country" required>
                                            <option value="" selected disabled hidden>Select country</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BR">Brazil</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="CV">Cabo Verde</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, Democratic Republic of the</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="SZ">Eswatini</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GR">Greece</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia (Federated States of)</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="MK">North Macedonia</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                        <div id="country-error" class="error-message">Country is required.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-number">Phone number*</label>
                                        <input placeholder="Enter phone number" type="tel" id="phone-number" name="phone-number" required>
                                        <div id="phone-number-error" class="error-message">Phone no is required.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email-address">E-mail address*</label>
                                        <input type="email" id="email-address" name="email-address" placeholder="Enter email" required>
                                        <div id="email-address-error" class="error-message">Email address is required.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="agents-id">Agents ID</label>
                                        <select id="agents-id" name="agents-id">
                                            <option value="" selected disabled hidden>Select Agent</option>
                                            <option value="Kiran">Kiran Dhoke</option>
                                            <option value="Sriharshan">Sriharshan southranjan</option>
                                        </select>
                                        <div id="agents-id-error" class="error-message">Agents ID is required.</div>
                                    </div>
                                </div>
                                <div class="form-note">
                                    <p>* required field</p>
                                </div>
                                
                        </div>
                        <div class="d-flex justify-content-end">
                            <button style="    background: #ffbb00;width: 20%;font-size: larger;color: #000;font-weight: 700;" class="btn btn-primary" type="submit">Submit -></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Populate year dropdowns
            function populateYearDropdowns() {
                const currentYear = new Date().getFullYear();

                for (let i = 0; i < <?php echo $passengers_count; ?>; i++) {
                    const dobYear = document.getElementById('dob-year-' + i);
                    const idExpireYear = document.getElementById('id-expire-year-' + i);

                    for (let year = currentYear; year >= 1900; year--) {
                        let option = new Option(year, year);
                        dobYear.add(option);
                    }

                    for (let year = currentYear; year <= currentYear + 50; year++) {
                        let option = new Option(year, year);
                        idExpireYear.add(option);
                    }
                }
            }

            populateYearDropdowns();

            // Validate fields on input
            const requiredFields = [
                'title', 'first-name', 'last-name',
                'dob-day', 'dob-month', 'dob-year',
                'id-method', 'id-number',
                'id-expire-day', 'id-expire-month', 'id-expire-year',
                'country-issue', 'country-birth', 'phone-number', 'city',
                'zip-code', 'street', 'house-no'
            ];

            for (let i = 0; i < <?php echo $passengers_count; ?>; i++) {
                requiredFields.forEach(function(field) {
                    const input = document.getElementById(field + '-' + i);
                    if (input) {
                        input.addEventListener('input', function() {
                            validateField(input);
                        });
                    }
                });
            }

            function validateField(input) {
                const errorElement = document.getElementById(input.id + '-error');
                if (input.value === '' || input.value === null) {
                    showError(input, errorElement, 'This field is required.');
                } else if ((input.id.includes('first-name') || input.id.includes('last-name') || input.id.includes('city') || input.id.includes('street')) && /\d/.test(input.value)) {
                    showError(input, errorElement, 'This field should not contain numbers.');
                } else if ((input.id.includes('id-number') || input.id.includes('zip-code') || input.id.includes('house-no') || input.id.includes('phone-number') || input.id.includes('emergency_phone-number')) && /\D/.test(input.value)) {
                    showError(input, errorElement, 'This field should only contain numbers.');
                } else {
                    hideError(input, errorElement);
                }
            }

            function showError(input, errorElement, message) {
                input.style.border = 'red 2px solid';
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }

            function hideError(input, errorElement) {
                input.style.border = '';
                errorElement.style.display = 'none';
            }

            function toggleRequiredAttributes(index, shouldShare) {
                const emergencyFields = [
                    'emergency_country', 'emergency_phone-number', 'emergency_email-address'
                ];

                emergencyFields.forEach(function(field) {
                    const input = document.getElementById(field + '-' + index);
                    if (input) {
                        if (shouldShare) {
                            input.setAttribute('required', 'required');
                        } else {
                            input.removeAttribute('required');
                        }
                    }
                });
            }

            // Validate form on submit
            document.getElementById('passenger-form').addEventListener('submit', function(event) {
                let valid = true;

                for (let i = 0; i < <?php echo $passengers_count; ?>; i++) {
                    requiredFields.forEach(function(field) {
                        const input = document.getElementById(field + '-' + i);
                        const errorElement = document.getElementById(field + '-' + i + '-error');

                        if (input && (input.value === '' || input.value === null)) {
                            showError(input, errorElement, 'This field is required.');
                            valid = false;
                        } else if (input && (input.id.includes('first-name') || input.id.includes('last-name') || input.id.includes('city') || input.id.includes('street')) && /\d/.test(input.value)) {
                            showError(input, errorElement, 'This field should not contain numbers.');
                            valid = false;
                        } else if (input && (input.id.includes('id-number') || input.id.includes('zip-code') || input.id.includes('house-no') || input.id.includes('phone-number') || input.id.includes('emergency_phone-number')) && /\D/.test(input.value)) {
                            showError(input, errorElement, 'This field should only contain numbers.');
                            valid = false;
                        } else if (input) {
                            hideError(input, errorElement);
                        }
                    });
                }

                if (!valid) {
                    event.preventDefault(); // Prevent form submission if not valid
                }
            });

            function toggleDropdown(index) {
                const shouldShare = $('#share-' + index).is(':checked');
                if (shouldShare) {
                    $('#contact-details-' + index).removeClass('hidden');
                } else {
                    $('#contact-details-' + index).addClass('hidden');
                }
                toggleRequiredAttributes(index, shouldShare);
            }

            $(document).ready(function() {
                for (let i = 0; i < <?php echo $passengers_count; ?>; i++) {
                    toggleDropdown(i);
                    $('input[name="emergency_contact_' + i + '"]').on('change', function() {
                        toggleDropdown(i);
                    });
                }
            });
        });
    </script>
</body>

</html>
