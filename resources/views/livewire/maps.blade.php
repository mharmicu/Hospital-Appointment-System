<x-slot name="header">
    <h2> Google Map </h2>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        h2 {
            color: #FFFFFF;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 23px;
        }
        .gulugulu {
            position: center;
            width: 70%;
            margin: 5% 15%;
        }
    </style>

</x-slot>



<div class=gulugulu>        
    <div class="rounded block px-10 py-10 bg-white">
        <iframe src="https://maps.google.com/maps?q=nearby%20hospital%20from%20TIP&t=&z=13&ie=UTF8&iwloc=&output=embed" 
        width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
