
<div class="input-group col-lg-6">

   <div class="input-group-prepend">
       <label class="input-group-text" for="inputGroupSelect01">From :</label>
   </div>
   <form action="home.php" method="POST" enctype="multipart/form-data">
<input type="text" class="form-control datetimepicker" value="<?php echo @$from; ?>"  placeholder="YYYY-MM-DD" name="from">

</div>
<div class="input-group col-lg-6">
     <div class="input-group-prepend">
         <label class="input-group-text" for="inputGroupSelect01">To :</label>
     </div>
  <input type="text" class="form-control datetimepicker" value="<?php echo @$to; ?>"  placeholder="YYYY-MM-DD" name="to">

  </div>

         <div class="" style="margin-top:5%;margin-left:0%;margin-bottom:2.5%;">
           				<button type="submit" name="filterB" class="btn btn-block btn-info textfont" style="background-color:#b03060;margin: 0px;border-radius:5px;border-style: none;"> Search </button>
           </div>
</form>
