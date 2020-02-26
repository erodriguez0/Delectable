<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

if(!$_SESSION['active']):
	header('Location: /delectable/public_html');
else:

$title = "Delectable | Employees";
require_once(INCLUDE_PATH . 'header.php');

require_once(INCLUDE_PATH . '/admin/dashboard.php');
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Employees</h1>
    </div>

    <div class="">
    	<div class="row">
			<div class="col-12 col-md-6 col-lg-5 col-xl-4">
    			<input type="text" name="emp-table-search" class="form-control" placeholder="Search employees">
    		</div>
    	</div>
        <table class="table mt-3">
        	<thead>
        		<th scope="col">Name</th>
        		<th scope="col">Userame</th>
        		<th scope="col">Email</th>
        		<th scope="col">Status</th>
        		<th scope="col">Links</th>
        	</thead>
        	<tbody>
        		<tr>
        			<td>Esteban Rodriguez</td>
        			<td>example0</td>
        			<td>example@example.com</td>
        			<td><span class="text-success">Active</span></td>
        			<td>
        				<a href="" class="btn btn-primary btn-sm">Info</a>
        				<a href="" class="btn btn-alt btn-sm">Edit</a>
        			</td>
        		</tr>
        	</tbody>
        </table>
    </div>
</main>

<?php
require_once(INCLUDE_PATH . 'footer.php');
endif;
?>