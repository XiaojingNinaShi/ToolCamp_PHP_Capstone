<!-- SOME BACKUP CODES IN CASE NEEDED -->

<!-- Modal Components Start-->
<div id="ModalComponents">

    <!-- Add New Product Modal Starts-->
    <div class="modal fade" tabindex="-1" role="dialog" id="addNewProductModal">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

          <div class="modal-header" style="color: #fff; background-color: var(--primary);">
            <h5 class="modal-title" >Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: #fff;">&times;</span>
            </button>
          </div>

            <div style="margin-top: 20px">
              FORM HERE
            </div>

          <div class="modal-footer"><!--modal footer starts-->
            <button type="button" class="btn btn-primary" id="addNewProductConfirmBtn">Confirm</button>
            <button type="button" class="btn btn-light"  data-dismiss="modal">Cancel</button>
          </div><!--modal footer ends-->
        </div>
      </div>
    </div>
    <!--Add New Producg Modal End -->


    <!--View Product Modal start-->
    <div class="modal fade" tabindex="-1" role="dialog" id="viewProductModal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div class="modal-header" style="color: #fff; background-color: var(--success);">
                    <h5 class="modal-title">View Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="display: flex; justify-content: space-around;">
                    <div style="margin-top: 20px; overflow-x:auto;" >
                        <table class="table table-sm table-hover" id="table-vote-list">
                            <thead>
                                <tr class="table-light">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Weight</th>
                                    <th>Type</th>
                                    <th>Caffeine</th>
                                    <th>Origin</th>
                                    <th>Exp Date</th>
                                    <th>Organic</th>
                                    <th>Ingredients</th>
                                    <th>Description</th>
                                    <th>SKU</th>
                                    <th>Create Date</th>
                                    <th>Last Update</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><?=e($tea['id'])?></td>
                                <td><img src="images/<?=e($tea['image'])?>" alt="<?=e($tea['name'])?>" style="width:50px;height:50px;"></td>
                                <td><?=e($tea['name'])?></td>
                                <td><?=e($tea['price'])?></td>
                                <td><?=e($tea['weight'])?></td>
                                <td><?=e($tea['type'])?></td>
                                <td><?=e($tea['caffeine'])?></td>
                                <td><?=e($tea['origin'])?></td>
                                <td><?=e($tea['expire_date'])?></td>
                                <td><?=e($tea['organic'])?></td>
                                <td style="min-width:200px"><?=e($tea['ingredients'])?></td>
                                <td style="min-width:300px"><?=e($tea['description'])?></td>
                                <td><?=e($tea['SKU'])?></td>
                                <td><?=e($tea['created_at'])?></td>
                                <td><?=e($tea['updated_at'] ? : '-')?></td>
                                <td><a href="/?page=remove_from_admin_list&tea=<?=e($tea['id'])?>" class="btn btn-sm btn-warning">Edit</a></td>
                                <td><a href="/?page=remove_from_admin_list&tea=<?=e($tea['id'])?>" class="btn btn-sm btn-danger">Remove</a></td>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end of modal-body -->
                <div class="modal-footer"><!--modal footer starts-->
                    <button type="button" class="btn btn-primary" id="viewProductConfirmBtn"  data-dismiss="modal">确定</button>
                    <button type="button" class="btn btn-light"  data-dismiss="modal">取消</button>
                </div><!--modal footer end-->
            </div><!-- modal content end -->
        </div><!-- modal dialog end -->
    </div>
    <!--View Product Modal End-->

</div>
<!-- Modal Components End-->


<!-- save_wish_list.php -->
<?php
require __DIR__ . '/../models/teas_model.php';
require __DIR__ . '/../models/customers_model.php';

if('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    // header('HTTP/1.0 405 Method Not Allowed');
    header('Allow: POST');
    die('Method not allowed');
}

// Make sure user has provided a list name, and
// added some users
if(empty($_POST['name']) || empty($_SESSION['wish_list'])) {
    die('Please provide a name and products to your list');
}
$user = getUserByEmail($_SESSION['user']);
$customer_id = $user['id'];
$name = $_POST['name'];
$list = $_SESSION['wish_list'];

try {
    saveWishList($dbh, $customer_id, $name, $list);
} catch(Exception $e) {
    echo $e->getMessage();
}

$_SESSION['wish_list'] = [];
$_SESSION['flash']['success'] = 'Your wish list was successfully saved!';
header('Location: users.php');
?>
<!-- save_wish_list.php -->



<!-- teas_model.php -->
function saveWishList(PDO $dbh, $customer_id, $name, $items)
{
    try{
        $dbh->beginTransaction();
        //insert wishlist name into wishlists
        $query = "INSERT INTO wishlists (name, customer_id) VALUES (:name, :customer_id)"
        $stmt = $dbh->prepare($query);
        $params = array(
            ':name' => $name,
            ':customer_id' => $customer_id,
        );
        $stmt->execute($params);
        $wishlist_id = $dbh->lastInsertId();
        if(!$wishlist_id) throw new Exception('Could not insert wish list');
    
        //create query to insert individual tea_wishlist item
        $query = "INSERT INTO tea_wishlist (tea_id, wishlist_id) VALUES (:tea_id, :wishlist_id)";
        $stmt = $dbh->prepare($query);
    
        //loop through $list, insert into tea_wishlist table
        foreach($items as $item){
            $params = array(
                ':tea_id' => $item['id'],
                ':wishlist_id' => $wishlist_id
            );
            $stmt->execute($params);
        }
    
        $dbh->commit();
    }catch(Exception $e){
        $dhb->rollBack();
        echo $e->getMessage();
    }
}
<!-- teas_model.php -->


<!-- teas.php -->
<a href="/?page=add_to_bag&tea=<?=e($tea['id'])?>"><i class="bi bi-bag-plus-fill"></i></a>
<a href="/?page=add_to_wish_list&tea=<?=e($tea['id'])?>"><i class="bi bi-suit-heart-fill"></i></a>


<form action="/?page=add_to_bag" method="post" novalidate autocomplete="off">
    <input type="hidden" name="tea_id" value="<?=e($tea['id'])?>">
    <button type="submit" class="btn btn-sm"><i class="bi bi-bag-plus-fill"></i></button>
</form>

<form action="/?page=add_to_wish_list" method="post" novalidate autocomplete="off">
    <input type="hidden" name="tea_id" value="<?=e($tea['id'])?>">
    <button type="submit" class="btn btn-sm"><i class="bi bi-suit-heart-fill"></i></button>
</form>


<!-- admin_view_products.php -->
    <!-- Add New Product Modal Starts-->
    <div class="modal fade" tabindex="-1" role="dialog" id="addNewProductModal">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

          <div class="modal-header" style="color: #fff; background-color: var(--primary);">
            <h5 class="modal-title" >Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: #fff;">&times;</span>
            </button>
          </div>

            <div style="margin-top: 20px">
              FORM HERE
            </div>

          <div class="modal-footer"><!--modal footer starts-->
            <button type="button" class="btn btn-primary" id="addNewProductConfirmBtn">Confirm</button>
            <button type="button" class="btn btn-light"  data-dismiss="modal">Cancel</button>
          </div><!--modal footer ends-->
        </div>
      </div>
    </div>
    <!--Add New Producg Modal End -->


    <!--View Product Modal start-->
    <div class="modal fade" tabindex="-1" role="dialog" id="viewProductModal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div class="modal-header" style="color: #fff; background-color: var(--success);">
                    <h5 class="modal-title">View Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>

                <div class="modal-body" style="display: flex; justify-content: space-around;">
                    <div style="margin-top: 20px; overflow-x:auto;" >
                        <table class="table table-sm table-hover" id="table-vote-list">
                            <thead>
                                <tr class="table-light">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Weight</th>
                                    <th>Type</th>
                                    <th>Caffeine</th>
                                    <th>Origin</th>
                                    <th>Exp Date</th>
                                    <th>Organic</th>
                                    <th>Ingredients</th>
                                    <th>Description</th>
                                    <th>SKU</th>
                                    <th>Create Date</th>
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tbody>


                            <!-- ERROR HERE: HOW TO GET ONE TEA INFO THROUGH PHP MODEL? -->
                            <!-- ERROR HERE: HOW TO GET ONE TEA INFO THROUGH PHP MODEL? -->
                            <!-- ERROR HERE: HOW TO GET ONE TEA INFO THROUGH PHP MODEL? -->
                            <!-- ERROR HERE: HOW TO GET ONE TEA INFO THROUGH PHP MODEL? -->


                            </tbody>
                        </table>
                    </div>
                </div><!-- end of modal-body -->
                <div class="modal-footer"><!--modal footer starts-->
                    <button type="button" class="btn btn-primary" id="viewProductConfirmBtn"  data-dismiss="modal">确定</button>
                    <button type="button" class="btn btn-light"  data-dismiss="modal">取消</button>
                </div><!--modal footer end-->
            </div><!-- modal content end -->
        </div><!-- modal dialog end -->
    </div>
    <!--View Product Modal End-->
    