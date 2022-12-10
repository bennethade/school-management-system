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
            <p><b>Employee Attendance report</b></p>
        </td>
    </tr>    
  </table>


<table id="user">
  
<div class="row">
  <strong>Employee Name : </strong><p> {{ $allData['0']['user']['name'] }}</p> <b> ID No.: </b> <p> {{ $allData['0']['user']['id_no'] }} </p> <b> Month : </b> <p> {{ $month }} </p>
</div>
  

  <tr>
    <td width="50%"><h4>Date</h4></td>
    <td width="50%"><h4>Attendance Status</h4></td>
  </tr>

@foreach ($allData as $value)
    <tr>
        <td width="50%">{{ date('d-m-Y',strtotime($value->date)) }}</td>
        <td width="50%">{{ $value->attend_status }}</td>
    </tr>
@endforeach

<tr>
    <td colspan="2">
        <strong>Total Absent : </strong> {{ $absents }} ,  <strong>Total Leave : </strong> {{ $leaves }}
    </td>
</tr>
    
</table>

<br>
<i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
<br>

<hr style="border: dashed 2px; width: 95%; color:#000; margin-bottom: 50px;">


</body>
</html>


