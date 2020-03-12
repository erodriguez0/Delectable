<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(!$_SESSION['admin_id']):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Restauraunts";
require_once(INCLUDE_PATH . 'header.php');

require_once(INCLUDE_PATH . '/admin/dashboard.php');

require_once(INCLUDE_PATH . 'functions.php');

$res = restaurant_list($conn);
// var_dump($res);
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Restaurants</h1>
    </div>

    <div class="">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <input type="text" id="res-table-search" name="res-table-search" class="form-control" placeholder="Search restaurants">
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($res as $res): 
                    $name = $res['res_name'];
                    $address = $res['loc_address_1'] . ' ' . $res['loc_address_2'] . ', ' . $res['loc_city'] . ' ' . $res['loc_postal_code']; 
                    $lid = $res['loc_id'];
                    $url = "./edit/index.php?lid=" . $lid;
                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $address; ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="<?php echo $url; ?>">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>