<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>


    <!-- CSS -->
    <style>
        img {
            float: left;
            margin-right: 15px;
        }

        .grid-container {

            grid-row-gap: 5px;
            grid-template-columns: 30% 30%;
            padding: 5px;
        }

        .grid-item {
            border: 1px solid rgba(0, 0, 0, 0.8);
            font-size: 20px;
            text-align: left;
            margin-left: 10px;
            padding: 2px;
        }

        div.page_break+div.page_break {
            page-break-before: always;
            
        }
    </style>
</head>

<body>
    @foreach($personal_infos as $info)
    <div class="page_break">
        <p><img src="{{public_path('images/logo.png')}}" style="width:100px; height:100px; margin-right:15px; text-align:center;">
            <br>
        <p style="margin-left:31%">Covid-19 Hospital Appointment System
        <p style="margin-left:38%">Hulo, Mandaluyong City</p>
        </p>
        <div class="px-4">
            <div class="rounded block bg-transparent text-black text-xl font-bold mb-2 px-4 pt-4">
                <br><br>
                <h2 style="text-align:center;">Personal Information</h2><br>
            </div>

            <div class="grid-container">
                <div class="grid-item">
                    <h4>&nbsp; &nbsp; User ID: <input class="bg-transparent text-sm font-bold " disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        {{ $info->user_id }}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Name: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $info->name }}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Email: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $info->email}}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Sex: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $info->sex}}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4> &nbsp; &nbsp; Age: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $info->age}}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4> &nbsp; &nbsp; Address: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $info->address}}</h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Contact Number: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp;  &nbsp; &nbsp;
                        {{ $info->contactnum}}</h4>
                </div>

                <br><br><br><br>
                @endforeach
            </div>
        </div>
    </div>


</body>

</html>