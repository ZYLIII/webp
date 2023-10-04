<?php
$errors = [];
$data = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Patient ID
    if (empty($_POST['pid']) || !preg_match("/[A-Z]{2}\d+[A-Z]/", $_POST['pid'])) {
        $errors['pid'] = 'Invalid Patient ID';
    } else {
        $data['pid'] = filter_input(INPUT_POST, 'pid', FILTER_SANITIZE_STRING);
    }
    
    // Validate Date
    if (empty($_POST['date']) || strtotime($_POST['date']) < time()) {
        $errors['date'] = 'Invalid Date';
    } else {
        $data['date'] = $_POST['date'];
    }
    
    // Validate Time
    if (empty($_POST['time']) || !is_array($_POST['time']) || count($_POST['time']) == 0) {
        $errors['time'] = 'Please select at least one time slot';
    } else {
        $data['time'] = implode(', ', $_POST['time']);
    }
    
    // Validate Appointment Reason
    if (empty($_POST['reason'])) {
        $errors['reason'] = 'Please select a reason for your appointment';
    } else {
        $data['reason'] = $_POST['reason'];
    }
    
    // Save Data if there are no errors
    session_start();
    if (empty($errors)) {
        $data['timestamp'] = date('Y-m-d H:i:s');
        $fp = fopen('appointments.txt', 'a');
        if($fp) {
            fputcsv($fp, $data);
            fclose($fp);
            // Set a session flag for successful booking
            $_SESSION['booking_success'] = true;
        } else {
            $errors['file'] = 'Unable to save your booking. Please try again later.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://titan.csit.rmit.edu.au/~s3958095/wp/a2/styles.css" />
    <script src="https://titan.csit.rmit.edu.au/~s3958095/wp/a2/scripts.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Russel Street Medical</title>
</head>

<body>

    <body>
        <!-- Header (Logo and Navigation bar) -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="#">
                    <img src="./imgs/logo.png" alt="Russel Street Medical Logo" width="170">
                </a>
                <a class="navbar-brand" href="index.html">Russel Street Medical</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#aboutUs">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#whoWeAre">Who We Are</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#serviceArea">Service Area</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking.php">Book Online</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="booking-header">
                <h2>Online Booking</h2>
                <p>Fill in the details below to book an appointment.</p>
            </div>

            <form action="#" method="post" id="bookingForm">
                <div class="input-group">
                    <label for="pid">Patient ID:</label>
                    <input type="text" name="pid" id="pid" required pattern="[A-Z]{2}\d+[A-Z]"
                        oninput="convertToUpper(this);"
                        value="<?php echo isset($_POST['pid']) ? htmlspecialchars($_POST['pid']) : ''; ?>" />
                    <?php if (isset($errors['pid'])): ?>
                    <span class="error"><?php echo $errors['pid']; ?></span>
                    <?php endif; ?>
                </div>


                <div class="input-group" id="dateWrapper">
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" required min="" onchange="validateDate(this);" />
                </div>

                <div class="input-group">
                    <label>Time:</label>
                    <div class="pill-group">
                        <input type="checkbox" name="time[]" id="time1" value="9am-12pm" 
                        <?php echo (isset($_POST['time']) && in_array('9am-12pm', $_POST['time'])) ? 'checked' : ''; ?>/>
                        <label for="time1">9am – 12pm</label>

                        <input type="checkbox" name="time[]" id="time2" value="12pm-3pm"
                        <?php echo (isset($_POST['time']) && in_array('12pm-3pm', $_POST['time'])) ? 'checked' : ''; ?>/>
                        <label for="time2">12pm – 3pm</label>

                        <input type="checkbox" name="time[]" id="time3" value="3pm-6pm" 
                        <?php echo (isset($_POST['time']) && in_array('3pm-6pm', $_POST['time'])) ? 'checked' : ''; ?>/>
                        <label for="time3">3pm – 6pm</label>
                    </div>
                </div>

                <div class="input-group">
                    <label for="reason">Appointment Reason:</label>
                    <select name="reason" id="reason" required onchange="showAdvice(this);">
                        <option value="" disabled selected>Please Select</option>
                        <option value="childhood" <?php echo (isset($_POST['reason']) && $_POST['reason'] == 'childhood') ? 'selected' : ''; ?>>Childhood Vaccination Shots</option>
                        <option value="influenza" <?php echo (isset($_POST['reason']) && $_POST['reason'] == 'influenza') ? 'selected' : ''; ?>>Influenza Shot</option>
                        <option value="covid" <?php echo (isset($_POST['reason']) && $_POST['reason'] == 'covid') ? 'selected' : ''; ?>>Covid Booster Shot</option>
                        <option value="bloodtest" <?php echo (isset($_POST['reason']) && $_POST['reason'] == 'bloodtest') ? 'selected' : ''; ?>>Blood Test</option>

                    </select>
                </div>

                <div id="advice"></div>

                <div class="input-group">
                    <input type="submit" value="Book" />
                </div>
            </form>
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-address">
                    <address>
                        427 Swanston Street Melbourne, 3000 <br />
                        Contact: 61 (0) 1234 5678
                    </address>
                    <p>Zeyi Li - S3958095</p>
                </div>
                <div class="footer-navigation">
                    <img class="footer-logo" src="./imgs/logo.png" alt="Logo" />
                    <ul class="footer-links">
                        <li><a href="#Aboutus">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#ContactUs">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </footer>



    <script type="text/javascript">
    <?php if(isset($_SESSION['booking_success']) && $_SESSION['booking_success']) : ?>
        alert('Your appointment has been successfully booked!');
        <?php unset($_SESSION['booking_success']); // clear the session flag ?>
    <?php endif; ?>
    </script>
    </body>

</html>