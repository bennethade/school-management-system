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
                 <h4 class="box-title">Edit Employee</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.employee.registration',$editData->id) }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">						

                        
                            <div class="row"><!--First Row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Full Name<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="name"  class="form-control" required="" value="{{ $editData->name }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="fname"  class="form-control" value="{{ $editData->fname }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Email<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="email" name="email"  class="form-control" value="{{ $editData->email }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                            </div><!--End First Row-->



                            <div class="row"><!--Second Row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mobile No.<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="mobile"  class="form-control" value="{{ $editData->mobile }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="address"  class="form-control" value="{{ $editData->address }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <select name="gender" id="gender" required="" class="form-control">
                                                <option value="" selected="" disabled="" >Select Gender</option>
                                                <option value="Male" {{ ($editData->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ ($editData->gender == 'Female') ? 'selected' : '' }}>Female</option>
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
                                                <option value="Christian" {{ ($editData->religion == 'Christian') ? 'selected' : '' }}>Christian</option>
                                                <option value="Muslim" {{ ($editData->religion == 'Muslim') ? 'selected' : '' }}>Muslim</option>
                                                <option value="Hindu" {{ ($editData->religion == 'Hindu') ? 'selected' : '' }}>Hindu</option>
                                            </select>
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>D.O.B<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="date" name="dob"  class="form-control" value="{{ $editData->dob }}">
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
                                                    <option value="{{ $desig->id }}" {{ ($editData->designation_id == $desig->id) ? 'selected' : '' }}>{{ $desig->name }}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->

                            </div><!--End Third Row-->


                            <div class="row"><!--Fourth Row-->

                                
                                {{-- @if (!@editData)
                                    THE WAY MY TUTOR DID HIS OWN ISSET.
                                    THE CODE OR FIELD TO HIDE COMES INBETWEEN HERE
                                @endif --}}

                                @isset($usersType) {{-- How to hide a particular field --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Salary<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="salary"  class="form-control" value="{{ $editData->salary }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->
                                @endisset
                                
                                @isset($usersType) {{-- How to hide a particular field --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Join Date<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="date" name="join_date"  class="form-control" value="{{ $editData->join_date }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-4-->
                                @endisset

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
                                        <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/employee_images/'.$editData->image) : url('upload/no_image.jpg') }}" style="width: 80px; height:80px;">
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    
                                </div><!--End Col-md-4-->

                            </div><!--End Fourth Row-->

        
                               
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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