<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/inc/config.php');

$title = "Delectable | For Restaurants";
require_once(INCLUDE_PATH . 'header.php');

if(!$_SESSION['active']):
?>


<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->

    <link href="~/css/style.css" rel="stylesheet" />
    <link href="~/css/simple-sidebar.css" rel="stylesheet" />
    <link href="~/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!--Links for the forum-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="alternate" type="application/json+oembed" href="https://www.jotform.com/oembed/?format=json&amp;url=https%3A%2F%2Fform.jotform.com%2F200335513023135" title="oEmbed Form">
    <link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=https%3A%2F%2Fform.jotform.com%2F200335513023135" title="oEmbed Form">
    <meta property="og:title" content="Restaurant Reservation Form 2">
    <meta property="og:url" content="https://form.jotform.com/200335513023135">
    <meta property="og:description" content="Please click the link to complete this form.">
    <meta name="slack-app-id" content="AHNMASS8M">
    <link rel="shortcut icon" href="https://cdn.jotfor.ms/favicon.ico">
    <link rel="canonical" href="https://form.jotform.com/200335513023135" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
    <meta name="HandheldFriendly" content="true" />
    <title>Restaurant Reservation Form 2</title>
    <link href="https://cdn.jotfor.ms/static/formCss.css?3.3.15210" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.15210" />
    <link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.15210" />

    <style>
        /* NavBar design*/
        #TopNavBar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        #TopHome, #TopMenu, #TopContact, #TopAbout {
            float: left;
        }

        #TopA {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

            #TopA:hover:not(.active) {
                background-color: #111;
            }

        .active {
            background-color: #4CAF50;
        }

        #logout {
            float: right;
        }


        /*Tabel forum*/

        .form-label-left {
            width: 150px;
        }

        .form-line {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .form-label-right {
            width: 150px;
        }

        body, html {
            margin: 0;
            padding: 0;
            background: none
        }

        .form-all {
            margin: 0px auto;
            padding-top: 20px;
            width: 690px;
            color: #555 !important;
            font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
            font-size: 14px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.min.js"></script>
    <script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
    <script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.15210" type="text/javascript"></script>
    <script type="text/javascript">
        JotForm.init(function () {
            setTimeout(function () {
                $('input_21').hint('ex: myname@example.com');
            }, 20);
            if (window.JotForm && JotForm.accessible) $('input_6').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_17').setAttribute('tabindex', 0);

            JotForm.calendarMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            JotForm.calendarDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            JotForm.calendarOther = { "today": "Today" };
            var languageOptions = document.querySelectorAll('#langList li');
            for (var langIndex = 0; langIndex < languageOptions.length; langIndex++) {
                languageOptions[langIndex].on('click', function (e) { setTimeout(function () { JotForm.setCalendar("5", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": true, "custom": false, "ranges": false, "start": "", "end": "" }); }, 0); });
            }
            JotForm.setCalendar("5", false, { "days": { "monday": true, "tuesday": true, "wednesday": true, "thursday": true, "friday": true, "saturday": true, "sunday": true }, "future": true, "past": true, "custom": false, "ranges": false, "start": "", "end": "" });
            JotForm.formatDate({ date: (new Date()), dateField: $("id_" + 5) });
            JotForm.displayLocalTime("hour_5", "min_5", "ampm_5");
            if (window.JotForm && JotForm.accessible) $('input_22').setAttribute('tabindex', 0);
            if (window.JotForm && JotForm.accessible) $('input_7').setAttribute('tabindex', 0);
            /*INIT-END*/
        });

        JotForm.prepareCalculationsOnTheFly([null, { "name": "1", "qid": "1", "text": "Submit Form", "type": "control_button" }, null, null, null, { "name": "date", "qid": "5", "text": "Date:", "type": "control_datetime" }, { "name": "phone", "qid": "6", "text": "Phone:", "type": "control_textbox" }, { "name": "anySpecial", "qid": "7", "text": "Any Special Request?", "type": "control_textarea" }, null, null, null, null, { "name": "time", "qid": "12", "text": "Time:", "type": "control_dropdown" }, null, null, null, { "name": "reservationType", "qid": "16", "text": "Reservation Type:", "type": "control_dropdown" }, { "name": "numberOf", "qid": "17", "text": "Number of Guests:", "type": "control_textbox" }, null, null, { "name": "fullName", "qid": "20", "text": "Full Name:", "type": "control_fullname" }, { "name": "email", "qid": "21", "text": "E-mail:", "type": "control_email" }, { "name": "ifOther", "qid": "22", "text": "If Other above, please specify?", "type": "control_textbox" }]);
        setTimeout(function () {
            JotForm.paymentExtrasOnTheFly([null, { "name": "1", "qid": "1", "text": "Submit Form", "type": "control_button" }, null, null, null, { "name": "date", "qid": "5", "text": "Date:", "type": "control_datetime" }, { "name": "phone", "qid": "6", "text": "Phone:", "type": "control_textbox" }, { "name": "anySpecial", "qid": "7", "text": "Any Special Request?", "type": "control_textarea" }, null, null, null, null, { "name": "time", "qid": "12", "text": "Time:", "type": "control_dropdown" }, null, null, null, { "name": "reservationType", "qid": "16", "text": "Reservation Type:", "type": "control_dropdown" }, { "name": "numberOf", "qid": "17", "text": "Number of Guests:", "type": "control_textbox" }, null, null, { "name": "fullName", "qid": "20", "text": "Full Name:", "type": "control_fullname" }, { "name": "email", "qid": "21", "text": "E-mail:", "type": "control_email" }, { "name": "ifOther", "qid": "22", "text": "If Other above, please specify?", "type": "control_textbox" }]);
        }, 20);
    </script>

</head>
<body>

    <!--NavBar Here-->
    <ul id="TopNavBar">
        <li id="TopHome"><a id="TopA" class="active" href="@Url.Action("EmployeeDashboard")"><i class="fa fa-home"></i> Home</a></li>
        <li id="TopMenu"><a id="TopA" href="#news">Menu</a></li>
        <li id="TopContact"><a id="TopA" href="#contact">Contact</a></li>
        <li id="TopAbout"><a id="TopA" href="#about">About</a></li>
        <li id="logout"><a id="TopA" href="@Url.Action("Login")">Logout</a></li>
    </ul>


    <!--SideBar Wrapper-->
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">DashBoard</div>
            <div class="list-group list-group-flush">
                <a href="@Url.Action("TableView")" class="list-group-item list-group-item-action bg-light">Tables</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Register</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Employees</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profiles</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Table-Status</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Dashboard Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Tables Page</h1>
                <form class="jotform-form" action="https://submit.jotform.com/submit/200335513023135/" method="post" name="form_200335513023135" id="200335513023135" accept-charset="utf-8" autocomplete="on">
                    <input type="hidden" name="formID" value="200335513023135" />
                    <input type="hidden" id="JWTContainer" value="" />
                    <input type="hidden" id="cardinalOrderNumber" value="" />
                    <div role="main" class="form-all">
                        <ul class="form-section page-section">
                            <li class="form-line jf-required" data-type="control_fullname" id="id_20">
                                <label class="form-label form-label-left form-label-auto" id="label_20" for="first_20">
                                    Full Name:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_20" class="form-input jf-required">
                                    <div data-wrapper-react="true">
                                        <span class="form-sub-label-container " style="vertical-align:top">
                                            <input type="text" id="first_20" name="q20_fullName[first]" class="form-textbox validate[required]" size="10" value="" data-component="first" aria-labelledby="label_20 sublabel_20_first" required="" />
                                            <label class="form-sub-label" for="first_20" id="sublabel_20_first" style="min-height:13px"> First Name </label>
                                        </span>
                                        <span class="form-sub-label-container " style="vertical-align:top">
                                            <input type="text" id="last_20" name="q20_fullName[last]" class="form-textbox validate[required]" size="15" value="" data-component="last" aria-labelledby="label_20 sublabel_20_last" required="" />
                                            <label class="form-sub-label" for="last_20" id="sublabel_20_last" style="min-height:13px"> Last Name </label>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="form-line jf-required" data-type="control_email" id="id_21">
                                <label class="form-label form-label-left form-label-auto" id="label_21" for="input_21">
                                    E-mail:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_21" class="form-input jf-required">
                                    <input type="email" id="input_21" name="q21_email" class="form-textbox validate[required, Email]" size="30" value="" placeholder="ex: myname@example.com" data-component="email" aria-labelledby="label_21" required="" />
                                </div>
                            </li>
                            <li class="form-line jf-required" data-type="control_textbox" id="id_6">
                                <label class="form-label form-label-left form-label-auto" id="label_6" for="input_6">
                                    Phone:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_6" class="form-input jf-required">
                                    <input type="text" id="input_6" name="q6_phone" data-type="input-textbox" class="form-textbox validate[required]" size="20" value="" maxLength="100" placeholder=" " data-component="textbox" aria-labelledby="label_6" required="" />
                                </div>
                            </li>
                            <li class="form-line jf-required" data-type="control_textbox" id="id_17">
                                <label class="form-label form-label-left form-label-auto" id="label_17" for="input_17">
                                    Number of Guests:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_17" class="form-input jf-required">
                                    <input type="text" id="input_17" name="q17_numberOf" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="3" value="" maxLength="100" placeholder=" " data-component="textbox" aria-labelledby="label_17" required="" />
                                </div>
                            </li>
                            <li class="form-line jf-required" data-type="control_datetime" id="id_5">
                                <label class="form-label form-label-left form-label-auto" id="label_5" for="day_5">
                                    Date:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_5" class="form-input jf-required">
                                    <div data-wrapper-react="true">
                                        <span class="form-sub-label-container " style="vertical-align:top">
                                            <input type="tel" class="currentDate form-textbox validate[required, limitDate]" id="day_5" name="q5_date[day]" size="2" data-maxlength="2" value="03" required="" aria-labelledby="label_5 sublabel_5_day" />
                                            <span class="date-separate" aria-hidden="true">
                                                -
                                            </span>
                                            <label class="form-sub-label" for="day_5" id="sublabel_5_day" style="min-height:13px"> Day </label>
                                        </span>
                                        <span class="form-sub-label-container " style="vertical-align:top">
                                            <input type="tel" class="form-textbox validate[required, limitDate]" id="month_5" name="q5_date[month]" size="2" data-maxlength="2" value="02" required="" aria-labelledby="label_5 sublabel_5_month" />
                                            <span class="date-separate" aria-hidden="true">
                                                -
                                            </span>
                                            <label class="form-sub-label" for="month_5" id="sublabel_5_month" style="min-height:13px"> Month </label>
                                        </span>
                                        <span class="form-sub-label-container " style="vertical-align:top">
                                            <input type="tel" class="form-textbox validate[required, limitDate]" id="year_5" name="q5_date[year]" size="4" data-maxlength="4" value="2020" required="" aria-labelledby="label_5 sublabel_5_year" />
                                            <label class="form-sub-label" for="year_5" id="sublabel_5_year" style="min-height:13px"> Year </label>
                                        </span>
                                        <span class="form-sub-label-container " style="vertical-align:top">
                                            <img class="showAutoCalendar" alt="Pick a Date" id="input_5_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle;margin-left:5px" data-component="datetime" aria-hidden="true" />
                                            <label class="form-sub-label" for="input_5_pick" style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px;white-space:nowrap"> Date Picker Icon </label>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li class="form-line jf-required" data-type="control_dropdown" id="id_12">
                                <label class="form-label form-label-left" id="label_12" for="input_12">
                                    Time:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_12" class="form-input jf-required">
                                    <select class="form-dropdown validate[required]" id="input_12" name="q12_time" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_12">
                                        <option value="">  </option>
                                        <option value="11 pm"> 11 pm </option>
                                        <option value="11:30 pm"> 11:30 pm </option>
                                        <option value="12 pm"> 12 pm </option>
                                        <option value="12:30 pm"> 12:30 pm </option>
                                        <option value="1 pm"> 1 pm </option>
                                        <option value="1:30 pm"> 1:30 pm </option>
                                        <option value="2 pm"> 2 pm </option>
                                        <option value="2:30 pm"> 2:30 pm </option>
                                        <option value="3 pm"> 3 pm </option>
                                        <option value="3:30 pm"> 3:30 pm </option>
                                        <option value="4 pm"> 4 pm </option>
                                        <option value="4:30 pm"> 4:30 pm </option>
                                        <option value="5 pm"> 5 pm </option>
                                        <option value="5.30pm"> 5.30pm </option>
                                        <option value="6 pm"> 6 pm </option>
                                        <option value="6.30pm"> 6.30pm </option>
                                        <option value="7 pm"> 7 pm </option>
                                        <option value="7.30pm"> 7.30pm </option>
                                        <option value="8 pm"> 8 pm </option>
                                        <option value="8.30pm"> 8.30pm </option>
                                        <option value="">  </option>
                                    </select>
                                </div>
                            </li>
                            <li class="form-line jf-required" data-type="control_dropdown" id="id_16">
                                <label class="form-label form-label-left form-label-auto" id="label_16" for="input_16">
                                    Reservation Type:
                                    <span class="form-required">
                                        *
                                    </span>
                                </label>
                                <div id="cid_16" class="form-input jf-required">
                                    <select class="form-dropdown validate[required]" id="input_16" name="q16_reservationType" style="width:150px" data-component="dropdown" required="" aria-labelledby="label_16">
                                        <option value="">  </option>
                                        <option value="Dinner"> Dinner </option>
                                        <option value="Birthday/ Anniversary"> Birthday/ Anniversary </option>
                                        <option value="Wedding"> Wedding </option>
                                        <option value="Corporate"> Corporate </option>
                                        <option value="Holiday"> Holiday </option>
                                        <option value="Other"> Other </option>
                                    </select>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_textbox" id="id_22">
                                <label class="form-label form-label-left form-label-auto" id="label_22" for="input_22"> If Other above, please specify? </label>
                                <div id="cid_22" class="form-input">
                                    <input type="text" id="input_22" name="q22_ifOther" data-type="input-textbox" class="form-textbox" size="20" value="" placeholder=" " data-component="textbox" aria-labelledby="label_22" />
                                </div>
                            </li>
                            <li class="form-line" data-type="control_textarea" id="id_7">
                                <label class="form-label form-label-left form-label-auto" id="label_7" for="input_7"> Any Special Request? </label>
                                <div id="cid_7" class="form-input">
                                    <textarea id="input_7" class="form-textarea" name="q7_anySpecial" cols="40" rows="5" data-component="textarea" aria-labelledby="label_7"></textarea>
                                </div>
                            </li>
                            <li class="form-line" data-type="control_button" id="id_1">
                                <div id="cid_1" class="form-input-wide">
                                    <div style="margin-left:156px" class="form-buttons-wrapper ">
                                        <button id="input_1" type="submit" class="form-submit-button" data-component="button" data-content="">
                                            Submit Form
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li style="display:none">
                                Should be Empty:
                                <input type="text" name="website" value="" />
                            </li>
                        </ul>
                    </div>
                    <script>
                        JotForm.showJotFormPowered = "new_footer";
                    </script>
                    <input type="hidden" id="simple_spc" name="simple_spc" value="200335513023135" />
                    <script type="text/javascript">
                        document.getElementById("si" + "mple" + "_spc").value = "200335513023135-200335513023135";
                    </script>
                    <div class="formFooter-heightMask">
                    </div>

                </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->

    <script src="~/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="~/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    
</body>
</html>
<script type="text/javascript">JotForm.ownerView = true;</script>

<?php
endif;

// Unset sticky form input and errors


require_once(INCLUDE_PATH . 'footer.php');
?>