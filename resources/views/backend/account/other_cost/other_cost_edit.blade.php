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
                 <h4 class="box-title">Edit Other Cost</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.other.cost',$editData->id) }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">						

                        
                            <div class="row"><!--First Row-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Amount<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="text" name="amount"  class="form-control" value="{{ $editData->amount }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-3-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Date<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="date" name="date"  class="form-control" value="{{ $editData->date }}">
                                         </div>
                                    </div>
                                </div><!--End Col-md-3-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Profile Image<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                            <input type="file" name="image" class="form-control" id="image">
                                         </div>
                                    </div>  
                                </div><!--End Col-md-3-->

                                <div class="form-group">
                                    <div class="controls">
                                    <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/cost_images/'.$editData->image) : url('upload/no_image.jpg') }}" style="width: 100px; height:100px;">
                                    </div>
                                </div> 

                            </div><!--End First Row-->


                            <div class="col-md-12"> <!--Second Row--->
                                <div class="form-group">
                                    <h5>Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description" id="description" class="form-control" required="" placeholder="Enter Text Here" aria-invalid="false">{{ $editData->description }}</textarea>
                                    <div class="help-block"></div></div>
                                </div>
                            
                            </div>  <!--End Second Row-->
        
                               
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


{{-- JQUERY TO DISPLAY UPLOADED IMAGE ON THE PAGE --}}
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