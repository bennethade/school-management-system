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
    padding: 4px;
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
            <p><b>Student Exam Fee</b></p>
        </td>
    </tr>    
  </table>

  @php
        $registrationfee = App\Models\FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$details->class_id)->first();

        $originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;
  @endphp


<table id="user">
  <tr>
    <th width="10%">S/N</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>
  
  <tr>
    <td>1</td>
    <td><b>Student Name </b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr> 
  <tr>
    <td>2</td>
    <td><b>Student ID No: </b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td><b>Student Roll </b></td>
    <td>{{ $details->roll }}</td>
  </tr>
    <td>4</td>
    <td><b>Father's Name </b></td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td><b>Session</b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td><b>Class</b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td><b>Exam Fee </b></td>
    <td>#{{ $originalfee }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td><b>Discount Fee </b></td>
    <td>{{ $discount }} %</td>
  </tr>
  <tr>
    <td>9</td>
    <td><b>This Student's Fee for {{ $exam_type }} </b></td>
    <td>#{{ $finalfee }}</td>
  </tr>
    
</table>

<br>
<i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
<br>

<hr style="border: dashed 2px; width: 95%; color:#000; margin-bottom: 50px;">

<table id="user">
    <tr>
      <th width="10%">S/N</th>
      <th width="45%">Student Details</th>
      <th width="45%">Student Data</th>
    </tr>
    
    <tr>
      <td>1</td>
      <td><b>Student Name </b></td>
      <td>{{ $details['student']['name'] }}</td>
    </tr> 
    <tr>
      <td>2</td>
      <td><b>Student ID No: </b></td>
      <td>{{ $details['student']['id_no'] }}</td>
    </tr>
    <tr>
      <td>3</td>
      <td><b>Student Roll </b></td>
      <td>{{ $details->roll }}</td>
    </tr>
    <tr>
      <td>4</td>
      <td><b>Father's Name </b></td>
      <td>{{ $details['student']['fname'] }}</td>
    </tr>
    <tr>
      <td>5</td>
      <td><b>Session</b></td>
      <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
      <td>6</td>
      <td><b>Class</b></td>
      <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
      <td>7</td>
      <td><b>Exam Fee </b></td>
      <td>#{{ $originalfee }}</td>
    </tr>
    <tr>
      <td>8</td>
      <td><b>Discount Fee </b></td>
      <td>{{ $discount }} %</td>
    </tr>
    <tr>
      <td>9</td>
      <td><b>This Student's Fee for {{ $exam_type }} </b></td>
      <td>#{{ $finalfee }}</td>
    </tr>
      
  </table>
  
  <br>
  <i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>

</body>
</html>


