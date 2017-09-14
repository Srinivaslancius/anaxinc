<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['uid'];
if (!isset($_POST['submit']))  {
            echo "fail";
} else  {
    //echo "<pre>"; print_r($_POST); die;
    //Save data into database
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $isbn = $_POST['isbn'];
    $publish_year = $_POST['publish_year'];
    $language = $_POST['language'];
    $generate_type = $_POST['generate_type'];
    $no_of_pages = $_POST['no_of_pages'];
    $contact_no = $_POST['contact_no'];
    $price = $_POST['price'];
    /*$user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];*/
    $book_info = $_POST['book_info'];
    /*$avail_id = $_POST['availability_id'];*
    $created_by = $_POST['created_by'];
    $created_at = $_POST['created_at'];*/
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['admin_user_id'];
    //save product images into product_images table    

    $product_images1 = $_FILES['product_images']['name'];
    if($product_images1 !='') {
        $target_dir = "../uploads/book_images/";
        $target_file = $target_dir . basename($_FILES["product_images"]["name"]);
        $getImgUnlink = getImageUnlink('book_image','products','id',$id,$target_dir);
        if(move_uploaded_file($_FILES["product_images"]["tmp_name"], $target_file)){
        
        $sql1 = "UPDATE products SET book_name ='$book_name', author ='$author', publisher ='$publisher', isbn ='$isbn', publish_year ='$publish_year', status = '$status', language = '$language', generate_type ='$generate_type', no_of_pages='$no_of_pages', contact_no = '$contact_no', price = '$price',  book_info = '$book_info', book_image='$product_images1' WHERE id = '$id'";
        
            if ($conn->query($sql1) === TRUE) {
                echo "<script type='text/javascript'>window.location='products.php?msg=success'</script>";
            } else {
                echo "<script type='text/javascript'>window.location='products.php?msg=fail'</script>";
            }
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
     $sql1 = "UPDATE products SET book_name ='$book_name', author ='$author', publisher ='$publisher', isbn ='$isbn', publish_year ='$publish_year', status = '$status', language = '$language', generate_type ='$generate_type', no_of_pages='$no_of_pages', contact_no = '$contact_no', price = '$price', book_info = '$book_info', book_image='$product_images1' WHERE id = '$id'";
     if ($conn->query($sql1) === TRUE) {
        echo "<script type='text/javascript'>window.location='products.php?msg=success'</script>";
    } else {
        echo "<script type='text/javascript'>window.location='products.php?msg=fail'</script>";
    }
}
}
?>

<?php $getProductsData = getDataFromTables('products',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL); 
$getProducts = $getProductsData->fetch_assoc();
 ?>
<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Books</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Book Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="book_name" required value="<?php echo $getProducts['book_name']; ?>" data-error="Please enter Book Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Author</label>
                    <input type="text" class="form-control" id="form-control-2" name="author" required value="<?php echo $getProducts['author']; ?>" data-error="Please enter Author Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Publisher</label>
                    <input type="text" class="form-control" id="form-control-2" name="publisher" required value="<?php echo $getProducts['publisher']; ?>" data-error="Please enter Publisher Name." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Isbn</label>
                    <input type="text" class="form-control" id="form-control-2" name="isbn" required value="<?php echo $getProducts['isbn']; ?>" data-error="Please enter Isbn." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Publishe Year</label>
                    <input type="text" class="form-control" id="form-control-2" name="publish_year" required value="<?php echo $getProducts['publish_year']; ?>" data-error="Please enter Publish year." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Language</label>
                    <input type="text" class="form-control" id="form-control-2" name="language" required value="<?php echo $getProducts['language']; ?>" data-error="Please enter Language." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Generate Type</label>
                    <input type="text" class="form-control" id="form-control-2" name="generate_type" required value="<?php echo $getProducts['generate_type']; ?>" data-error="Generate Type." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Number Of Pages</label>
                    <input type="text" class="form-control" id="form-control-2" name="no_of_pages" required value="<?php echo $getProducts['no_of_pages']; ?>" data-error="Please enter Number of Pages." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Contact Number</label>
                    <input type="text" class="form-control" id="form-control-2" name="contact_no" required value="<?php echo $getProducts['contact_no']; ?>" data-error="Please enter Contact Number." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Price</label>
                    <input type="text" class="form-control" id="form-control-2" name="price" required value="<?php echo $getProducts['price']; ?>" data-error="Please enter Price." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">User Id</label>
                    <input type="text" class="form-control" id="form-control-2" name="user_id" required value="<?php echo $getProducts['user_id']; ?>" data-error="Please enter User Id." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">User Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="user_name" required value="<?php echo $getProducts['user_name']; ?>" data-error="Please enter User Name." required>
                    <div class="help-block with-errors"></div>
                  </div> -->
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Book Information</label>
                    <input type="text" class="form-control" id="form-control-2" name="book_info" required value="<?php echo $getProducts['book_info']; ?>" data-error="Please enter Book Information." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Book Image</label>
                    <img src="<?php echo $base_url . 'uploads/book_images/'.$getProducts['book_image'] ?>"  id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="product_images" id="product_image"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
                  </div>
                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Availability Id</label>
                    <input type="text" class="form-control" id="form-control-2" name="availability_id" required value="<?php echo $getProducts['availability_id']; ?>" data-error="Please enter Availability Id." required>
                    <div class="help-block with-errors"></div>
                  </div> -->
                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getProducts['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="form-control-2" class="control-label">Created By</label>
                    <input type="text" class="form-control" id="form-control-2" name="created_by" required value="<?php echo $getProducts['created_by']; ?>" data-error="Please enter Created By." required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Created At</label>
                    <input type="text" class="form-control" id="form-control-2" name="created_at" required value="<?php echo $getProducts['created_at']; ?>" data-error="Please enter Created At." required>
                    <div class="help-block with-errors"></div>
                  </div> -->
                  <button type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr> 
          </div>
        </div>
      </div>
      <?php include_once 'admin_includes/footer.php'; ?>
      <script src="js/tables-datatables.min.js"></script>













                  




                      

                  
