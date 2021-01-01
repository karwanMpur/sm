

<div class="modal fade" id="edit<?php echo $row['oid']; ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-8" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Custmar Modify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="profiles/acc_code.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="nid" value="<?php echo $row['id'];?>">
     <div class="card-body card-block">

             <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Full Name</div>
                     <input type="text" id="username3" name="name" value="<?php echo $row['name'];?>" class="form-control">

                 </div>
             </div>
             <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Instagram</div>
                     <input type="text" id="email3" value="<?php echo $row['insta'];?>" name="insta" class="form-control">

                 </div>
             </div>
             <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Facebook</div>
                     <input type="text" id="username3" value="<?php echo $row['facebook'];?>" name="facebook" class="form-control">

                 </div>
             </div>
             <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">City</div>
                     <input type="text" id="email3" value="<?php echo $row['city'];?>" name="city" class="form-control">

                 </div>
             </div><div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Address</div>
                     <input type="text" id="username3" value="<?php echo $row['address'];?>" name="address" class="form-control">

                 </div>
             </div>
             <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Phone No.1</div>
                     <input type="phone" id="email3" value="<?php echo $row['phone1'];?>" name="phon1" class="form-control">

                 </div>
             </div>
             <div class="form-group">
                 <div class="input-group">
                     <div class="input-group-addon">Phone No.2</div>
                     <input type="phone" id="password3" value="<?php echo $row['phone2'];?>" name="phone2" class="form-control">

                 </div>
             </div>

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary textfont" data-dismiss="modal">Cancel</button>
        <button type="submit" name="updatebtn" class="btn btn-info textfont">Save</button>
      </div>
    </form>

    </div>
  </div>
</div>
