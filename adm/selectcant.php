<form action="canceletur.php" method="POST" enctype="multipart/form-data">

     <div class="col-md-3 mb-3" style="margin: 5px;">

   <div class="input-group mb-3">
      <h5 style="margin: 5px;border:3px;">Search From :&nbsp;&nbsp;</h5>

      <select name="colomn"  class="custom-select" id="inputGroupSelect01">
      <option value="oid" >Order ID</option >
      <option value="costid" >Customer_ID</option >
      <option value="size" >Size</option >
      <option value="color" >Color</option >
      <option value="price" >Price</option >
      <option value="link" >Link</option >
      <option value="conf" >Purchased</option >
      </select>
   </div>
  </div>


  <div class="col-md-3 mb-3" style="margin-top: 5px;">
<div class="input-group mb-3">
   <div class="input-group-prepend">
       <label class="input-group-text" for="inputGroupSelect01">Value</label>
   </div>
<input type="text" class="form-control datetimepicker" placeholder="Value" name="data">
</div>
</div>


 <button type="submit"  name="filterB" class="btn btn-info textfont" style="background-color:#b03060;margin: 5px;border-radius:5px;">Show</button>
</form>
