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
            <p><b>Monthly and Yearly Profit</b></p>
        </td>
    </tr>    
  </table>

  @php
        $student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $other_cost = App\Models\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');
        $employee_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

        $total_cost = $other_cost + $employee_salary;
        $profit = $student_fee - $total_cost;

  @endphp


<table id="user">
  <tr>
    <td colspan="2" style="text-align: center;">
        <h4>Reporting Date: {{ date('d-m-Y',strtotime($sdate)) }} -- {{ date('d-m-Y',strtotime($edate)) }}</h4>
    </td>
  </tr>
  
  <tr>
    <td width="50%"><h4>Purpose</h4></td>
    <td width="50%"><h4>Amount: </h4></td>
  </tr>
  <tr>
    <td>Student Fee</td>
    <td>{{ $student_fee }}</td>
  </tr>
  <tr>
    <tr>
    <td>Employee Salary</td>
    <td>{{ $employee_salary }}</td>
  </tr> 
    <td>Other Cost</td>
    <td>{{ $other_cost }}</td>
  </tr>
  <tr>
    <td>Total Cost</td>
    <td>{{ $total_cost }}</td>
  </tr>
  <tr>
    <td>Profit</td>
    <td>{{ $profit }}</td>
  </tr>
    
</table>

<br>
<i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
<br>

<hr style="border: dashed 2px; width: 95%; color:#000; margin-bottom: 50px;">



</body>
</html>


