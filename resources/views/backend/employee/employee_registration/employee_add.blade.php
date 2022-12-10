@extends('admin.admin_master')
@section('admin')
{{-- SCRIPT FOR JQUERY --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="content-wrapper">
    <div class="container-full">
        

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Employee</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('store.employee.registration') }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">						

                        
                            <div class="row"><!--First Row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Full Name<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="name"  class="form-control" required="">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="fname"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Email<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="email" name="email"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                            </div><!--End First Row-->



                            <div class="row"><!--Second Row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mobile No.<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="mobile"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="address"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <select name="gender" id="gender" required="" class="form-control">
                                                <option value="" selected="" disabled="" >Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                            </div><!--End Second Row-->


                            <div class="row"><!--Third Row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <select name="religion" id="religion" required="" class="form-control">
                                                <option value="" selected="" disabled="" >Select Religion</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Muslim">Muslim</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>D.O.B<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="date" name="dob"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Designation<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <select name="designation_id" required="" class="form-control">
                                                <option value="" selected="" disabled="" >Select Designation</option>
                                                @foreach ($designation as $desig)
                                                    <option value="{{ $desig->id }}">{{ $desig->name }}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                            </div><!--End Third Row-->


                            <div class="row"><!--Fourth Row-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Salary<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="salary"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Join Date<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="date" name="join_date"  class="form-control">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Profile Image<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="file" name="image" class="form-control" id="image">
                                         </div>
                                    </div>  
                                </div><!--End Col-md-4-->
                                <div class="form-group">
                                    <div class="controls">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height:100px; border:1px solid #000000;">
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    
                                </div><!--End Col-md-4-->

                            </div><!--End Fourth Row-->

        
                               
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                           </div>

                        </div>
                        
                        </div>

                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>


    
    </div>
</div>


{{-- JQUERY TO DISPLAY UPLOADED IMAGE ON EDIT PROFILE PAGE --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });
    });
</script>




@endsection