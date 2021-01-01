<form action="que.php" method="POST" enctype="multipart/form-data">

     <div class="col-md-3 mb-3" style="margin:20px;">
   <div class="input-group mb-3">
      <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Costmer</label>
      </div>
      <select name="doc_filter"  class="custom-select" id="inputGroupSelect01">
          <option selected>Choose...</option>
          <?php

        $sqls="SELECT * FROM cust";
          $results=mysqli_query($conn,$sqls);
          while($rows=mysqli_fetch_array($results)){
          ?>
              <option ><?php echo $rows['name'] ?></option>
          <?php
          }

          ?>
      </select>
   </div>
  </div>



<div class="col-md-3 mb-3" style="margin:20px;">

 <button type="submit" name="filterB" class="btn btn-info textfont">Show</button>
</form>
</div>
