{{-- <!DOCTYPE html>
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

<h1>A Fancy Table</h1>

@foreach ($allData as $value)
    
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
              <p><b>Student Result Report</b></p>
          </td>
      </tr>    
    </table>


  <table id="user">
      <br>
    <b>Result of : {{ $value['exam_type']['name'] }}</b>
    <br><br>

    <tr>
      <td width="50%"><h4>Session : </h4>{{ $value['year']['name'] }}</td>
      <td width="50%"><h4>Class :</h4>{{ $value['student_class']['name'] }}</td>
    </tr>
      
  </table>
@endforeach


<br>
<i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>
<br>

<hr style="border: dashed 2px; width: 95%; color:#000; margin-bottom: 50px;">


</body>
</html>

 --}}



 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Result</title>
 </head>
 
 <body>

  @foreach ($allData as $value)
  


    <div class="container">

      <div class="row">
        <div class="column" style="float: left;">

          <?php $image_path = '/upload/cedarbuds.jpg'; ?>
          <img src="{{ public_path() . $image_path}}" width="150" height="150" alt="">

        </div>

        <div class="column" style="float: right;" >
          <h2> CEDAR BUDS SCHOOL </h2>
          <p> Address: Knowledge Court, AUST, Ring Road 2, Abuja.</p>
            <p>    Tel: 08186118597, 08146956648  </p>
            <p>      “We play and learn” </p>

        </div>
      </div>

      <div class="row" style="padding-top: 25%;">
        <b> Continuous Assessment For:</b> {{ $allData['0']['year']['name'] }} <b> Term:</b> ____{{ $allData['0']['exam_type']['name'] }}_____ <b> Class:</b> __{{ $allData['0']['student_class']['name'] }}__<b>Date:</b>___________</td>
        <p><strong>Full Name </strong>(Surname First) ___{{ $allData['0']['student']['name'] }}________________</p>
        <p><strong>Sex:</strong> {{ $allData['0']['student']['gender'] }}  <span style="float: right;">Pupil's Average __________</span> </p>
      </div>

      <div class="row">
        <div class="column" style="float: left;">
            <table border="1" class="">
              <tr>
                <th>Frequency</th>
                <th>School Attendance</th>
              </tr>
              <tr>
                <td>No of Times School Opened</td>
                <td></td>
              </tr>
              <tr>
                <td>No of Times Present</td>
                <td></td>
              </tr>
            </table>
        </div>

        <div class="column" style="float: right;">
          <table border="1" class="">
            <tr>
              <th>Number of Pupils in Class</th>
              <th></th>
            </tr>
            <tr>
              <td>Next Term Begins</td>
              <td>_____________________</td>
            </tr>
            <tr>
              <td>Class Average </td>
              <td>_____________________</td>
            </tr>
          </table>
        </div>

      </div>


      <div class="row" style="padding-top: 13%;">
        <table border="1">
          <thead>
            <tr>
              <th>Cognitive Domain</th>
              <th>C.A 1</th>
              <th>C.A 2</th>
              <th>Total C.A</th>
              <th>Exam</th>
              <th>Total <br><small>Exam & C.A</small> </th>
              <th>Average</th>
              <th>Grade</th>
              <th>Teacher's remark</th>
            </tr>
          </thead>

          <tbody>
              
            <tr>
              <td>{{ $allData['0']['school_subject']['name'] }}</td>
              <td>{{ $allData['0']['ca1'] }}</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            
          </tbody>
        </table>
      </div>

      <div class="row" style="margin-top: 10px;">
        <div class="column" style="float: left;">
          <table border="1">
            <thead>
              <tr>
                <th>PSYCHOMOTOR SKILLS</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Handwriting</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Verbal Fluency</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Games</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Sports</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Handling Tools</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Drawing & Painting</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Musical Skills</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="column" style="float: right;">
          <table border="1">
            <thead>
              <tr>
                <th>AFFECTIVE AREAS</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Punctuality</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Neatness</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Politeness</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Honesty</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Co-operation with Others</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Leadership</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Helping Others</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Attitude to School Work</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Attentiveness </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>



      <div class="row" style="padding-top: 250px;">
        <p>Class Teachers Comment ___________________________________________ Signature_______________</p>
        <p>Head Teacher’s Comment ___________________________________________ Signature ______________</p>
        <p>Parents/Guardian’s Comment _______________________________________ Signature _____________ </p>

      </div>





    </div>

  @endforeach


 </body>
 </html>