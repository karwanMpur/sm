

<div class="modal fade" id="edit<?php echo $row['oid']; ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-8" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order  Modify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="onebag/acc_code.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="nid" value="<?php echo $row['oid'];?>">
      <input type="hidden" name="vbag" value="<?php echo $row['bagid'];?>">
     <div class="card-body card-block">

             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Web Link : </label></div>
                 <div class="col-12 col-md-9"><input type="text" name="link" value="<?php echo $row['link'];?>" placeholder="Text" class="form"></div>
             </div>
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Color : </label></div>
                 <div class="col-12 col-md-9"><h2><input type="text" name="color" value="<?php echo $row['color'];?>" placeholder="Text" class="form"></h2></div>
             </div>
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Size : </label></div>
                 <div class="col-12 col-md-9"><input type="text" name="size" value="<?php echo $row['size'];?>" placeholder="Text" class="form"></div>
             </div>
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price : </label></div>
                 <div class="col-12 col-md-9"><input type="text" name="price" value="<?php echo $row['price'];?>" placeholder="Text" class="form"></div>
             </div>
             <div class="row form-group">
                 <div class="col col-md-3"><label for="text-input" class=" form-control-label">Color : </label></div>
                 <div class="col-12 col-md-9"><input type="file" name="img" value="<?php echo $row['img'];?>" placeholder="Text" class="form"></div>
             </div>




     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary textfont" data-dismiss="modal">Cancel</button>
        <button type="submit" name="updatebtnon" class="btn btn-info textfont">Save</button>
      </div>
    </form>

    </div>
  </div>
</div>
