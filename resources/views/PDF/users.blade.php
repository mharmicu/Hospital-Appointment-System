<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- CSS -->
    <style>
        #empTable {
            font-family: Serief;
            border-collapse: collapse;
            width: 100%;
        }

        #empTable td,
        #empTable th {
            border: 1px solid #BAD0EF;
            text-align: Center;
            font-family: Serief;
            padding: 8px;
            color: #011627;
            background-color: #fff;
        }

        #empTable tr:nth-child(even) {
            background-color: #C8C9D0;
        }

        #empTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #011627;
            color: #fff;
            text-align: Center;
            font-family: Serief;
            border-color: #CEDEF4;
        }

        h2 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
        img{
        float: left;
        margin-right:15px;
    }
    </style>
</head>

<body>
<p><img src="{{public_path('images/logo.png')}}" style="width:100px; height:100px; margin-right:15px; text-align:center;">
    <br><p style="margin-left:31%">Covid-19 Hospital Appointment System
    <p style="margin-left:38%">Hulo, Mandaluyong City</p></p>
    <br><h2>LIST OF USERS</h2>
    <table id="empTable">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->usertype}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>