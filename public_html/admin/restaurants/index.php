<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(!$_SESSION['active']):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Restauraunts";
require_once(INCLUDE_PATH . 'header.php');

require_once(INCLUDE_PATH . '/admin/dashboard.php');

require_once(INCLUDE_PATH . 'functions.php');

$res = restaurant_list($conn);
// var_dump($res);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Restaurants</h1>
    <!--     <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
            </button>
        </div> -->
    </div>

    <div class="">
        <table class="table">
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
                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $address; ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="./edit/index.php?lid=<?php echo $lid; ?>">Edit</a>
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