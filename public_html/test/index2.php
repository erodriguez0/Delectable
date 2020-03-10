<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/config.php');

$title = "Delectable | Edit Restaurant";
require_once(INCLUDE_PATH . 'header.php');
require_once(INCLUDE_PATH . '/admin/dashboard.php');
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 py-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom pb-2 mb-3">
        <h1 class="h2">Edit Table Layout</h1>
        <a class="btn btn-alt" href="../">< Back</a>
    </div>

    <div class="">
    <div class="form-group admin-menu">
    	<div class="row">
 <!--            <div class="col-sm-2 col-sm-offset-3 form-group">
                <label>Width (px)</label>
                <input type="number" id="width" class="form-control" value="720" />
            </div>
            <div class="col-sm-2 form-group">
                <label>Height (px)</label>
                <input type="number" id="height" class="form-control" value="540" />
            </div> -->
            <div class="col-sm-2 form-group">
                <label>&nbsp;</label>
                <br />
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
        		<div class="btn-toolbar" role="toolbar">
    				<div class="btn-group mr-2" role="group">
                        <a href="#" role="button" class="btn btn-alt btn-sm btn-sm-text label-btn">Rectangle</a>
    					<button type="button" class="btn btn-alt btn-sm btn-sm-text rectangle-0">0&#xb0;</button>
    					<button type="button" class="btn btn-alt btn-sm btn-sm-text rectangle-45">45&#xb0;</button>
    					<button type="button" class="btn btn-alt btn-sm btn-sm-text rectangle-315">-45&#xb0;</button>
                    </div>
                    <div class="btn-group mr-2" role="group">
                        <a href="#" role="button" class="btn btn-alt btn-sm btn-sm-text label-btn w-100">Square</a>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text square-0 w-100">0&#xb0;</button>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text square-45 w-100">45&#xb0;</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="#" role="button" class="btn btn-alt btn-sm btn-sm-text label-btn">Round</a>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text round-0 w-100">0&#xb0;</button>
    				</div>
                </div>
                <div class="btn-toolbar mt-3">
                    <div class="btn-group mr-2" role="group">
                        <a href="#" role="button" class="btn btn-alt btn-sm btn-sm-text label-btn w-100">Objects</a>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text object-0 w-100">0&#xb0;</button>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text object-45 w-100">45&#xb0;</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="#" role="button" class="btn btn-alt btn-sm btn-sm-text label-btn w-100">Actions</a>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text remove w-100">Remove</button>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text export w-100">Export</button>
                        <button type="button" class="btn btn-alt btn-sm btn-sm-text mode w-100">Mode</button>
                    </div>
                </div>
            </div>
    	</div>
    </div>
    	<div class="row">
    		<div class="col-12">
			  	<div class="form-group customer-menu" style="display: none;">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group mr-2" role="group">
                            <a href="#" role="button" class="btn btn-alt btn-sm btn-sm-text label-btn">Actions</a>
                            <button type="button" class="btn btn-alt btn-sm btn-sm-text submit w-100">Submit</button>
                            <button type="button" class="btn btn-alt btn-sm btn-sm-text mode w-100">Mode</button>
                        </div>
                    </div>
				    <br />
				    <br />
				    <div id="slider"></div>
				    <div id="slider-value"></div>
			  	</div>

    			<!-- <div class="mt-3" style="overflow-x: scroll;"> -->
    			<div class="mt-3 overflow-x">
    				<canvas id="canvas" width="720" height="540"></canvas>
    			</div>
    		</div>
    	</div>
    </div>
	<div class="modal fade" id="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body text-center">
	        <p id="modal-table-id"></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
	      </div>
	    </div>
	  </div>
	</div>
</main>

<?php
require_once(INCLUDE_PATH . 'footer.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.11/fabric.min.js"></script>
<script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
<script type="text/javascript" src="./layout.js"></script>