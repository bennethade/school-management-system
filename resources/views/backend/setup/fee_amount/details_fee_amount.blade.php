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
                <h3 class="box-title">Fee Amount Details</h3>
                <a href="{{ route('fee.amount.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <h4><strong>Fee Category : </strong>{{ $detailsData[0]['fee_category']['name'] }}</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th>S/N</th>
                              <th>Class Name</th>
                              <th width="25%">Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($detailsData as $key => $detail)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <!--DISPLAYING NAME FIELD IN FEE CATEGORIES TABLE FROM THE FEE_CATEGORY_AMOUNTS MODEL-->
                              <td>{{ $detail['student_class']['name'] }}</td> 
                              <td>{{ $detail->amount }}</td> 
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