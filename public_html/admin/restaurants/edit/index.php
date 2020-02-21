<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(!$_SESSION['active']):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Edit Restaurant";
require_once(INCLUDE_PATH . 'header.php');

require_once(INCLUDE_PATH . '/admin/dashboard.php');

require_once(INCLUDE_PATH . 'functions.php');

$id = $_GET['lid'];
$res = restaurant_info($conn, $id);
// var_dump($res);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 py-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Restaurant</h1>
    </div>

    <div class="">
        <div class="row">

            <!-- Restaurant Info & Location Form -->
            <div class="col-12 col-lg-6 restaurant-edit-form-wrap">
                <h1 class="h3">Info</h1>
                <form>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h6>Name</h6>
                            <p><?php echo $res['res_name']; ?></p>
                            <h6>Slogan</h6>
                            <p><?php echo $res['res_slogan']; ?></p>
                            <h6>Description</h6>
                            <p><?php echo $res['res_description']; ?></p>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary px-4">Storefront</button>
                                <button type="button" class="btn btn-alt px-4">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <h1 class="h3 mt-3">Location</h1>
                <form>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h6>Address 1</h6>
                            <input class="form-control" type="text" name="loc-address-1" value="<?php echo $res['loc_address_1']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-6">
                            <h6>Address 2</h6>
                            <input class="form-control" type="text" name="loc-address-2" value="<?php echo $res['loc_address_2']; ?>">
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <h6>Phone</h6>
                            <input class="form-control" type="text" name="loc-phone" value="<?php echo $res['loc_phone']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-md-5">
                            <h6>City</h6>
                            <input class="form-control" type="text" name="loc-city" value="<?php echo $res['loc_city']; ?>">
                        </div>
                        <div class="col-12 col-md-4 mt-3 mt-md-0">
                            <h6>State</h6>
                            <input class="form-control" type="text" name="loc-state" value="<?php echo $res['loc_state']; ?>">
                        </div>
                        <div class="col-12 col-md-3 mt-3 mt-md-0">
                            <h6>Zip</h6>
                            <input class="form-control" type="text" name="loc-postal-code" value="<?php echo $res['loc_postal_code']; ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <input class="btn btn-primary btn-block" type="submit" name="loc-info" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./Left-Col -->

            <!-- Restaurant Manager/Employee Forms -->
            <div class="col-12 col-lg-6 restaurant-edit-form-wrap mt-3 mt-lg-0">
                <h1 class="h3">Managing Staff</h1>
                <form>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm add-manager-btn">Add</button>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Info</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>Esteban Rodriguez</span></td>
                                        <td><a class="btn btn-primary btn-sm" href="#">Info</a></td>
                                        <td><a class="btn btn-primary btn-sm" href="#">X</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

                <h1 class="h3">Employees</h1>
                <form>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm add-manager-btn">Add</button>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Info</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>Esteban Rodriguez</span></td>
                                        <td><a class="btn btn-primary btn-sm" href="#">Info</a></td>
                                        <td><a class="btn btn-primary btn-sm" href="#">X</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div> 
            <!-- ./Right-Col -->
        </div>
    </div>
</main>

<?php
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>