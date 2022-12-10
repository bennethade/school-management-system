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
                <h3 class="box-title">Employee Salary Detail</h3>
                <h5><strong>Employee name : {{ $details->name }} </strong></h5>
                <h5><strong>Employee name : {{ $details->id_no }} </strong></h5>
              </div>
              
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">S/N</th>
                              <th>Previous Salary</th>
                              <th>Increment Salary</th>
                              <th>Present Salary</th>
                              <th>Effected Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($salary_log as $key => $value)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $value->previous_salary }}</td>
                              <td>{{ $value->increment_salary }}</td>
                              <td>{{ $value->present_salary }}</td>
                              <td>{{ $value->effected_salary }}</td>
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