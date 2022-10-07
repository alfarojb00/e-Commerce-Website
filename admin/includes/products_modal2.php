

<div class="modal fade" id="edit<?php echo $row['id']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>EDIT</b></h4>
            </div>
            <div class="modal-body">

              <form class="form-horizontal" method="POST" action="products_edit.php" enctype="multipart/form-data">
                <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $row['id']?>" >
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']?>" required>
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="category" name="category" value="<?php echo $row['category_id']?>"required>
                      <?php
                      
                        foreach ($category as $key => $value) {
                            
                      ?>

                            <option value="<?php echo $value['id'] ?>"  <?php echo $row['category_id']==$value['id']?"selected":""?>><?php echo $value['name']?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price']?>"required>
                  </div>

                  
                  <label for="quantity" class="col-sm-1 control-label">Quantity</label>

                  <div class="col-sm-5">
                    <input type="text"  name="quantity" value="<?php echo $row['productquantity']?>">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea  name="description" rows="10" cols="80">'<?php echo $row['description']?>'</textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>