@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      
      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student Shift List</h3>
                <a href="{{ route('student.shift.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Shift</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Name</th>
                              <th width="25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $shift)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $shift->name }}</td>
                              <td>
                                <a href="{{ route('student.shift.edit',$shift->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('student.shift.delete',$shift->id) }}" class="btn btn-danger" id="delete">delete</a>
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