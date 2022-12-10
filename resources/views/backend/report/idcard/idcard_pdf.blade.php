<!DOCTYPE html>
<html>
<head>
<style>
    #user, {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #user td, #user th {
    border: 1px solid #ddd;
    padding: 5px;
    }

    #user tr:nth-child(even){background-color: #f2f2f2;}

    #user tr:hover {background-color: #ddd;}

    #user th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0704aa;
    color: white;
    }
</style>

</head>
<body>

{{-- <h1>A Fancy Table</h1> --}}

<table id="user">
    <tr>
        <td><h2>
          <?php $image_path = '/upload/logo.jpg'; ?>
          <img src="{{ public_path() . $image_path}}" width="200" height="100" alt="">
          
        </h2></td>

        <td>
            <h2>School Management System</h2>
            <p>Company Address: DBM Plaza, Wuse </p>
            <p>Phone: 08161361060</p>
            <p>Email: bennethade21@gmail.com</p>
            <p><b>Student ID Card</b></p>
        </td>
    </tr>    
  </table>

@foreach ($allData as $value)
    

    <table id="user">

    <tr>
        <td>IMAGE</td>
        <td>ANC SCHOOL</td>
        <td>Student ID Card</td>
    </tr>

    <tr>
        <td>Name : {{ $value['student']['name'] }}</td>
        <td>Session : {{ $value['student_year']['name'] }}</td>
        <td>Class : {{ $value['student_class']['name'] }}</td>
    </tr>
    <tr>
        <td>Roll : {{ $value->roll }}</td>
        <td>ID No.: {{ $value['student']['id_no'] }}</td>
        <td>Mobile : {{ $value['student']['mobile'] }}</td>
    </tr>
        
    </table>

@endforeach

<br>
<i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
<br>

<hr style="border: dashed 2px; width: 95%; color:#000; margin-bottom: 50px;">




</body>
</html>


