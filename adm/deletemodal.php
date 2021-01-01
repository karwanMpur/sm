

            <div id="del<?php echo $row['acc_id']; ?>"  class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Are you sure you want to delete this account?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      
                        <div class="modal-footer">
                          <a href="#" class="btn btn-white" data-dismiss="modal">No</a>
                           <a href="acc_code.php?id=<?php echo $row['acc_id']; ?>"><button name="deletebtn" type="submit" class="btn btn-danger">Yes</button></a>
                        </div>
                    </div>
                </div>
            </div>
