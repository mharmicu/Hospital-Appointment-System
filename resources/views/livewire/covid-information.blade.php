<x-slot name="header">
<h2 id="header"> COVID-19 Basic Guidelines</h2>

    <head>
    
    <style>
        #header {
            color: #FFFFFF;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 23px;
            text-transform: none;
            
        }
            body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            }

            .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
            
            }

            .topnav a {
            float: right;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            }

            .topnav a:hover {
            background-color: #ddd;
            color: black;
            }

            .topnav a.active {
            background-color: #2196F3;
            color: white;
            }

            .topnav .search-container {
            float: right;
            }

            .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            }

            .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
            }

            .topnav .search-container button:hover {
            background: #ccc;
            }

            @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
            .topnav input[type=text] {
                border: 1px solid #ccc;  
            }
            } 

            /* About */

            .banner_image {
            background-image: url(images/covid-header.jpg);
            background-position:center;
            background-size: cover;
            width: 100%;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            float:right;
            margin-bottom:10px;
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

            h2 {
                margin-bottom: 10px;
                font-size: 25px;
                line-height: 30px;
                font-family: 'Allura';
                text-transform: uppercase;
            }
            .video{
                align:center;
                margin:50px 30%;
            }
           
            h1.title {
            margin-bottom: 20px;
            color: #444444;
            font-family: 'Allura';
            text-transform: uppercase;
            font-size: 38px;
            word-spacing: 25px;
            letter-spacing: 5px;

        }
            /* Safety Protocol */

   
        .safety-protocol {
            background: #fff;
            padding: 5% 10%;
            text-align: center;
        }

        .safety_wrapper .team {
            display: flex;
            justify-content: space-between;

        }

        .safety_wrapper .team_member {
            width: 35%;
            height: auto;
            cursor: pointer;
            overflow: hidden;
        }

        .safety_wrapper .team_member img {

            width: 100%;
            display: block;
            height: 80%;
            transition: all 0.5s ease;
        }

        .safety_wrapper .team_member:hover img {
            transform: scale(1.1);
        }

       
    </style>

   </head>
</x-slot>

<body class="antialiased">
    <div class="topnav">
    
        <a href="#statistics">Covid - 19 Statistics</a>
        <a href="#safety-protocol">Safety Protocols</a>
        <a class="active" href="#about">Covid - 19 FAQs</a>
  </div>

    <div class="about" id="about">
    <div class="banner_image">
        </div>
        <h1 class="title">Coronavirus(COVID-19) FAQs</h1>
       
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-fb8e0eb6-5d7b-4713-8c74-2ce4c3c1febe"></div>
    </div>

    <div class="safety-protocol" id="safety-protocol">
        <h1 class="title">Safety Protocols</h1>
        <div class="safety_wrapper">
            <div class="team-1 team">
                <div class="team_member">
                    <img src="images/mask.jpg" alt="Team_image">
                </div>
                <div class="team_member">
                    <img src="images/doctor-screening.jpg" alt="Team_image">
                </div>
                <div class="team_member">
                    <img src="images/social-distancing.jpg" alt="Team_image">
                </div>
            </div>
            <div class="team-2 team">
                <div class="team_member">
                    <img src="images/cov1.jpg" alt="Team_image">
                </div>
                <div class="team_member">
                    <img src="images/cov2.jpg" alt="Team_image">
                </div>
                <div class="team_member">
                    <img src="images/cov3.jpg" alt="Team_image">
                </div>
            </div>
            <div class="team-3 team">
                <div class="team_member">
                        <img src="images/fight-virus.jpg" alt="Team_image">
                    </div>
                    <div class="team_member">
                        <img src="images/mask-bg.jpg" alt="Team_image">
                    </div>
                    <div class="team_member">
                        <img src="images/doctors.jpg" alt="Team_image">
                    </div>
                </div>
        </div>

        <h1 class="title">Coronavirus Safety Protocols</h1>
        <div class="video">
            <p style="text-align: center;"><span><iframe src="https://www.youtube.com/embed/eg1ixwE6XBw"
            width="560" height="314" allowfullscreen="allowfullscreen"></iframe></span></p>
        </div>
    </div>

    
    
    <div class="statistics" id="statistics">
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-b63303f8-106a-446a-ada2-dbacd8bc1010"></div>
    </div>


          <div class="footer">
            <a href="#">@ 2021 Hospital Appointment</a>
        </div>

    </body>

    </html>
