<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>COVID-19 Hospital Admission System</title>
    <link rel="shortcut icon" type="image/png" href="images/android-chrome-512x512.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            list-style: none;
            text-decoration: none;
            font-family: 'Nunito';
        }

        p {
            margin-bottom: 15px;
            font-size: 23px;
            line-height: 30px;
            color: #034f84;
            word-spacing: 5px;
        }

        .main_container {
            position: relative;
        }

        header {
            height: 80px;
            background: #1E3A8A;
            width: 100%;
            z-index: 12;
            position: fixed;

        }

        .navbar {
            width: 100%;
            height: 65px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: fixed;
            width: 100%;
            overflow: hidden;
            margin-top: 10px;

        }

        .logo a {
            margin-top: 10px;
            font-family: 'Sofia';
            font-size: 45px;
            font-weight: 900;
            color: #000000;
        }

        .navbar .navbar_items ul {
            display: flex;
        }

        .navbar .navbar_items ul li {
            text-transform: uppercase;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0 10px;

        }

        .banner_image {
            background: url(images/header1.jpg);
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .banner_content {
            margin-top: 125px;
            text-align: right;
            color: #fff;
        }

        .banner_content h1 {
            text-transform: uppercase;
            line-height: 38px;
            margin-bottom: 15px;
            color: #3e4444
        }

        .banner_content h1 span {
            color: #3e4444
        }

        .banner_content a {
            font-family: 'Nunito';
            font-size: 25px;
            font-weight: bold;
            color: #36486b;
            word-spacing: 55px;
        }

        /* about us */
        .about,
        .services,
        .contactus,
        .ourteam {
            padding: 5% 10%;
            text-align: center;
        }

        h1.title {
            margin-bottom: : 20px;
            color: #444444;
            font-family: 'Allura';
            text-transform: uppercase;
            font-size: 38px;
            word-spacing: 25px;
            letter-spacing: 5px;

        }

        .btn a {
            display: block;
            width: 180px;
            height: 35px;
            border: 2px solid #3e4444;
            line-height: 35px;
            margin: 25px auto 0;
            color: #3e4444;
            text-align: center;
            float: right;
        }

        .button a {
            display: block;
            width: 180px;
            height: 35px;
            border: 2px solid #3e4444;
            line-height: 35px;
            margin: 0 auto;
        }

        /* Services */
        .services {
            background: #60A5FA;
        }

        .diff_services {
            display: flex;
            margin-top: 35px;
            justify-content: space-between;
        }

        .diff_service_item {
            width: 30%;
        }

        .diff_service_item img {
            width: 100%;
            margin-bottom: 25px;
            height: 40%;
            transition: all 0.5 ease;
        }

        .diff_service_item:hover img{
            transform: scale(1.1);
        }

        .diff_service_item {
            color: #3e4444;
            margin-bottom: 15px;
        }

        /* Contact us */
        .form_input {
            margin-bottom: 15px;
        }

        .form_input input[type="text"] {
            width: 250px;
            padding: 12px 20px;
            border: 1px solid #ccc;
        }

        .form_input textarea {
            width: 250px;
            padding: 12px 20px;
            height: 80px;
            resize: none;
            border: 1px solid #ccc;
        }

        /* Our Team */
        .ourteam {
            background: #fff;
        }

        .ourteam_wrapper .team {
            display: flex;
            justify-content: space-between;

        }

        .ourteam_wrapper .team-1.team {
            margin-bottom: 25px;
        }

        .ourteam_wrapper .team_member {
            width: 35%;
            height: auto;
            cursor: pointer;
            overflow: hidden;
        }

        .ourteam_wrapper .team_member img {

            width: 100%;
            margin-bottom: 25px;
            display: block;
            height: 80%;
            transition: all 0.5s ease;
        }

        .ourteam_wrapper .team_member:hover img {
            transform: scale(1.1);
        }

        /* Footer */
        .footer {
            width: 100%;
            text-align: center;
            background: #444444;
            padding: 20px 0;
        }

        .footer a {
            color: #fff;
        }

        .btn a {
            border: 2px solid transparent;
            outline: none;
            padding: 14px 0;
            background-color: #7e87cf;
            color: #fff;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.5s all;
            height: auto;
        }

        .btn:hover a {
            background-color: transparent;
            border: 2px solid #7e87cf;
            letter-spacing: 4px;
        }

        @media (max-width:720px) {
            .navbar {
                height: auto;
                flex-direction: column;
            }

            .navbar ul {
                flex-direction: column;
                text-align: center;

            }

            .logo {
                margin-bottom: 25px;
            }

            .navbar ul li {
                margin-bottom: 5px;

            }

            .banner_content {
                margin-top: 35px;
            }
        }

        h2{
                margin-bottom: 10px;
                font-size: 25px;
                line-height: 30px;
                font-family: 'Allura';
                text-transform: uppercase;
            }
    </style>
</head>

<body class="antialiased">
    <div class="main_container" id="home">
        <header>
            <div class="navbar">
                <div class="logo">
                    <a href="#" style="color: #fff;"> COVID-19 Hospital Admission</a>
                </div>

                <div class="navbar_items">
                    <ul>

                        <li><a href="#" style="color: #fff;">Home</a></li>
                        <li><a href="#about" style="color: #fff;">About</a></li>
                        <li><a href="#services" style="color: #fff;">Services</a></li>
                        
                        <li><a href="#ourteam" style="color: #fff;">Our Team</a></li>

                    </ul>
                </div>
        </header>
    </div>

    <div class="banner_image">
        <div class="banner_content">
            <h1>Prevention from Coronavirus (COVID - 19)<br />
                <span>Stay home, Stay safe</span>
            </h1>
            <p> Save people from Coronavirus </p>

            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-xl text-gray-700 underline">Dashboard</a>
                    @else
                    <div class="btn"><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></div>

                    @if (Route::has('register'))
                    <div class="btn"><a href="{{ route('register') }}" class="ml-4 text-xl text-gray-700 underline">Register</a></div>
                    @endif
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="about" id="about">
        <h1 class="title"> About Us </h1>
        <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.
            Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and
            recover without requiring special treatment. Older people, and those with underlying medical problems
            like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop
            serious illness.</p>
        <div class="button">
            <a href="#">Learn More</a>
        </div>

    </div>

    <div class="services" id="services">
        <h1 class="title">Our services</h1>
        <p>This system is a web-based application that offers health professionals a more efficient and convinient way for patients to reserve appointments in the hospitals.
            This will help us to find hospitals that are accepting COVID-19 patients.</p>

        <div class="diff_services">
            <div class="diff_service_item">
                <img src="images/patients.jpg" alt="Service_image">
                <h2>Patients</h2>
                <p>The decision as to whether to isolate and care for an infected person at home depends on the following three factors: clinical evaluation of the COVID-19 patient,
                    evaluation of the home setting and the ability to monitor the clinical evolution of a person with COVID-19 at home.</p>
            </div>
            <div class="diff_service_item">
                <img src="images/pgh.jpg" alt="Service_image">
                <h2>Hospitals</h2>
                <p>Over 1/4 of suspected COVID-19 patients admitted to an ED observation unit ultimately required admission to the hospital. Risk factors associated with admission include hypoxia,
                    bilateral infiltrates on chest radiography, or the combination of these two factors plus either age > 48 years or Hispanic race.</p>
            </div>
            <div class="diff_service_item">
                <img src="images/doc.jpg" alt="Service_image">
                <h2>Doctors</h2>
                <p>Doctors form an essential part of an effective response to the COVID-19 pandemic. We argue they have a duty to participate in pandemic response due to their special skills,
                    but these skills vary between different doctors, and their duties are constrained by other competing rights. Apply appointments if you have COVID-19, notify the doctor or healthcare
                    provider before your visit and follow their instructions.</p>
            </div>
        </div>
    </div>



    <div class="ourteam" id="ourteam">
        <h1 class="title">Our Team</h1>
        <div class="ourteam_wrapper">
            <div class="team-1 team">
                <div class="team_member">
                    <img src="images/mhar.jpg" alt="Team_image">
                    <h2>Mhar Vincent M. Enriquez</h2>
                </div>
                <div class="team_member">
                    <img src="images/siti.jpg" alt="Team_image">
                    <h2>Sittie Asmah M. Manali</h2>
                </div>
            </div>
            <div class="team-2 team">
                <div class="team_member">
                    <img src="images/poy.jpg" alt="Team_image">
                    <h2>Froilan Jesus F. Zaguirre</h2>
                </div>
                <div class="team_member">
                    <img src="images/bengbeng.jpg" alt="Team_image">
                    <h2>April Mae A. Estoesta</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <a href="#">@ 2021 Hospital Appointment</a>
    </div>
    </div>
</body>

</html>