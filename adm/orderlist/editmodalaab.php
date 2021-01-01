<?php
  $upload_dir = 'upload/';
?>

<div class="modal fade" id="edit<?php echo $row['oid']; ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-8" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Order Modify</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
   <form action="orderlist/acc_code.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="nid" value="<?php echo $row['oid'];?>">
   <div class="card-body card-block">
     <div class="form-group">
     <div class="input-group">
     <div class="input-group-addon">Web Link</div>
     <input type="text"  name="link" value="<?php echo $row['link'];?>" class="form-control">

     </div>
     </div>
     <div class="form-group">
     <div class="input-group">
     <div class="input-group-addon">&nbsp;&nbsp;Color &nbsp; &nbsp;</div>
     <input type="text"  value="<?php echo $row['color'];?>" name="color" class="form-control">

     </div>
     </div>
     <div class="form-group">
     <div class="input-group">
     <div class="input-group-addon">&nbsp; &nbsp;&nbsp;Size&nbsp; &nbsp; &nbsp;</div>
     <input type="text"  value="<?php echo $row['size'];?>" name="size" class="form-control">

     </div>
     </div>
     <div class="form-group">
     <div class="input-group">
     <div class="input-group-addon">&nbsp;&nbsp;Price&nbsp; &nbsp; &nbsp;</div>
     <input type="text"  value="<?php echo $row['price'];?>" name="price" class="form-control">

     </div>
     </div>
     <div class="form-group">
     <div class="input-group">
     <div class="input-group-addon">&nbsp; &nbsp;Image&nbsp;&nbsp;</div>
     <input type="file"   name="img" class="form-control">

     </div>
     </div>





<input type="hidden"  value="<?php echo $row['bagid'];?>" name="bagid" class="form-control">

</div>
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary textfont" data-dismiss="modal">Cancel</button>
  <button type="submit" name="updatebtnordab" class="btn btn-info textfont">Save</button>
  </div>
  </form>

  </div>
  </div>
</div>
