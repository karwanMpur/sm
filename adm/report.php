
<div class="input-group col-lg-6">

   <div class="input-group-prepend">
       <label class="input-group-text" for="inputGroupSelect01">From :</label>
   </div>
   <form action="index1.php" method="POST" enctype="multipart/form-data">
<input type="text" class="form-control datetimepicker" value="<?php echo @$from; ?>"  placeholder="YYYY-MM-DD" name="from">

</div>
<div class="input-group col-lg-6">
     <div class="input-group-prepend">
         <label class="input-group-text" for="inputGroupSelect01">To :</label>
     </div>
  <input type="text" class="form-control datetimepicker" value="<?php echo @$to; ?>"  placeholder="YYYY-MM-DD" name="to">

  </div>

  					 <div class="col-md-6 mb-6" style="margin-top: 15px;margin-left:0%;">

  				 <div class="input-group mb-6" style="">
  						<div class="input-group-prepend">
  						<label class="input-group-text" for="inputGroupSelect01">Ordered From</label>
  						</div>
  						<select name="colomn"  class="custom-select" id="inputGroupSelect01">
              <option value="name" >Customer-name</option >
  						<option value="costid" >Customer-ID</option >



  						</select>
  				 </div>

  				 </div>


           					 <div class="col-md-6 mb-6" style="margin-top: 15px;">
           				 <div class="input-group mb-3">
           						<div class="input-group-prepend">
           								<label class="input-group-text" for="inputGroupSelect01">Value</label>
           						</div>
           				 <input type="text" class="form-control datetimepicker" placeholder="Value" value="<?php echo @$data_filter; ?>" name="data">

           				 </div>

           				 </div>

           				 <div class="" style="margin-top: 10%;margin-left:0%;margin-bottom:2.5%;">
           				<button type="submit" name="filterB" class="btn btn-block btn-info textfont" style="background-color:#b03060;margin: 0px;border-radius:5px;border-style: none;"> Search </button>
           </div>
</form>
