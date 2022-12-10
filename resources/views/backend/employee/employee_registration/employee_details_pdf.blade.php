<!DOCTYPE html>
<html>
<head>
<style>
    #user {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #user td, #user th {
    border: 1px solid #ddd;
    padding: 8px;
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
            <p>Company Address:</p>
            <p>Phone:08161361060</p>
            <p>Email:bennethade21@gmail.com</p>
            <p><b>Employee Registration Details</b></p>
        </td>
    </tr>    
  </table>


<table id="user">
  <tr>
    <th width="10%">S/N</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td><b>Employee Name </b></td>
    <td>{{ $details->name }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td><b>Employee ID No: </b></td>
    <td>{{ $details->id_no }}</td>
  </tr>
  
  <tr>
    <td>3</td>
    <td><b>Father's Name </b></td>
    <td>{{ $details->fname }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td><b>Mother's Name </b></td>
    <td>{{ $details->mname }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Mobile No</b></td>
    <td>{{ $details->mobile }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Address </b></td>
    <td>{{ $details->address }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Gender </b></td>
    <td>{{ $details->gender }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Religion </b></td>
    <td>{{ $details->religion }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>D.O.B </b></td>
    <td>{{ date('d-m-Y', strtotime($details->dob)) }}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><b>Employee Designation </b></td>
    <td>{{ $details['designation']['name'] }}</td>
  </tr>
  <tr>
    <td>11</td>
    <td><b>Join Date </b></td>
    <td>{{ date('d-m-Y', strtotime($details->join_date)) }}</td>
  </tr>
  <tr>
    <td>12</td>
    <td><b>Employee Salary </b></td>
    <td>{{ $details->salary }}</td>
  </tr>
  
  
</table>
<br><br>
<i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>

</body>
</html>


