<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>


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
    @foreach($med_histories as $med)
    <div class="page_break">
        <p><img src="{{public_path('images/logo.png')}}" style="width:100px; height:100px; margin-right:15px; text-align:center;">
            <br>
        <p style="margin-left:31%">Covid-19 Hospital Appointment System
        <p style="margin-left:38%">Hulo, Mandaluyong City</p>
        </p>
        <div class="px-4">
            <div class="rounded block bg-transparent text-black text-xl font-bold mb-2 px-4 pt-4">
                <br><br>
                <h2 style="text-align:center;">Patient Medical History</h2><br>
            </div>

            <div class="grid-container">
                <div class="grid-item">
                    <h4>&nbsp; &nbsp; History ID: <input class="bg-transparent text-sm font-bold " disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $med->id }}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Patient Name: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $med->name }}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Patient ID: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $med->user_id }}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Medical History: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; 
                        {{ $med->med_history}}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Surgical History: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp;
                        {{ $med->surg_history}}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4> &nbsp; &nbsp; Medications: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $med->medications}}
                    </h4>
                </div>

                <div class="grid-item">
                    <h4> &nbsp; &nbsp; Allergies: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        {{ $med->allergies}}</h4>
                </div>

                <div class="grid-item">
                    <h4>&nbsp; &nbsp; Date: <input class="bg-transparent text-sm font-bold mb-2" disabled>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                        {{ $med->date}}</h4>
                </div>

                
                @endforeach
            </div>
        </div>
    </div>


</body>

</html>