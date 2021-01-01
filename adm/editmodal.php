<?php
  $upload_dir = 'upload/';
?>
<!-- Add New -->
<div class="modal fade" id="edit<?php echo $row['acc_id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg-8" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="acc_code.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="nid" value="<?php echo $row['acc_id'];?>">
      <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01"> Email</label>
                            <input type="text" class="form-control"  value="<?php echo $row['username'];?>" name="username">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">password</label>
                            <input type="password" class="form-control"  value="<?php echo $row['password'];?>" name="password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 mb-4">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                            </div>
                            <select  name="acc_state" class="selectpicker"  data-size="3" data-style="btn btn-info btn-round">
                                <?php if ($row ['acc_state']=="1") {?>
                                    <option selected>1</option>
                                    <option>0</option>
                                <?php }else{ ?>
                                    <option>1</option>
                                    <option selected>0</option>
                                <?php }?>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Type</label>
                            </div>
                            <select  name="acc_type" class="selectpicker"  data-size="3" data-style="btn btn-info btn-round">
                            <?php if ($row['acc_type'] == "admin") {?>
                                              <option selected>admin</option>
                                              <option >data entry</option>
                                              <option >turkey staff</option>
                                          <?php
                                        } elseif ($row['acc_type'] == "data entry") {?>
                                              <option >admin</option>
                                              <option selected>data entry</option>
                                              <option >turkey staff</option>
                                      <?php
                                  } else {?>
                                             <option >admin</option>
                                              <option >data entry</option>
                                              <option selected>turkey staff</option>
                                  <?php }?>
                            </select>
                        </div>
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
