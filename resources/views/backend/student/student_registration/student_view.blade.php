@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      
      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

            <div class="box bb-3 border-warning">
                <div class="box-header">
                  <h4 class="box-title">Student <strong>Search</strong></h4>
                </div>

                <div class="box-body">


                    <form method="GET" action="{{ route("student.year.class.wise") }}">

                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Year<span class="text-danger"></span></h5>
                                     <div class="controls">
                                        <select name="year_id" required="" class="form-control">
                                            <option value="" selected="" disabled="" >Select Year</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}"{{ (@$year_id == $year->id)? "selected":"" }}>{{ $year->name }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                            </div><!--End Col-md-4-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Class<span class="text-danger"></span></h5>
                                     <div class="controls">
                                        <select name="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled="" >Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                            </div><!--End Col-md-4-->
                            <div class="col-md-4" style="padding-top: 25px;">

                                <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="search">

                            </div><!--End Col-md-4-->



                        </div> <!--End Row-->

                    </form>

                </div>
              </div>
        </div>


          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">



                    @if(!@$search)   <!--IF IS SET NOT SEARCH-->
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">S/N</th>
                                <th>Name</th>
                                <th>ID No.</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Image</th>
                                @if (Auth::user()->role == "Admin")
                                  <th>Code</th>                                
                                @endif
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value['student']['name'] }}</td>
                                <td>{{ $value['student']['id_no'] }}</td>
                                <td>{{ $value->roll }}</td>
                                <td>{{ $value['student_year']['name'] }}</td>
                                <td>{{ $value['student_class']['name'] }}</td>
                                <td>
                                  <img src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 60px; height:60px;">
                                </td>
                                <td>{{ $value->class_id }}</td>
                                <td>
                                  <a href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info fa fa-edit"></a>
                                  <a href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-danger fa fa-check"></a>
                                  <a target="_blank" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger fa fa-eye"></a>
                                </td>
                            </tr>
                          @endforeach
                        
                        </tbody>
                        <tfoot>
                            {{-- <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr> --}}
                        </tfoot>
                      </table>

                    @else

                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">S/N</th>
                                <th>Name</th>
                                <th>ID No.</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Image</th>
                                @if (Auth::user()->role == "Admin")
                                  <th>Code</th>                                
                                @endif
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($allData as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value['student']['name'] }}</td>
                                <td>{{ $value['student']['id_no'] }}</td>
                                <td>{{ $value->roll }}</td>
                                <td>{{ $value['student_year']['name'] }}</td>
                                <td>{{ $value['student_class']['name'] }}</td>
                                <td>
                                  <img src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 60px; height:60px;">
                                </td>
                                <td>{{ $value->class_id }}</td>
                                <td>
                                  <a href="{{ route('student.registration.edit',$value->student_id) }}" class="btn btn-info">Edit</a>
                                  <a href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-danger">Promote</a>
                                  <a target="_blank" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger">details</a>
                                </td>
                            </tr>
                          @endforeach
                        
                        </tbody>
                        <tfoot>
                            {{-- <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr> --}}
                        </tfoot>
                      </table>

                    @endif


                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>





@endsection