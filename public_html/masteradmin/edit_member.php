<?php include $_SERVER['DOCUMENT_ROOT']."/includes/php_header.php";
$msg='';
if($_GET['char_id'] !=''){
	if($_POST['Submit'] == "Publish"){
		$_POST['id']=$_GET['char_id'];
               
		if($u->updateAdmin($_POST)){
			$msg = "<span class=\"message\">User Updated Successfully.</span>";
		}else{
			$msg = "<span class=\"error\">Unable to Update User.</span>";
		}
	}
	$user = $u->getUserDetail($_GET['char_id']);
        
        
        
}
$user_types = $u->getUserTypes();
//$categories = $u->getActiveCategories();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Edit User</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<?php include('top.php');?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<?php include("header.php");?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include("sidebar.php");?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Edit User</h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			
			<?php
			if ($msg !='')
			{
			?>
			<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				
				<?php
					echo $msg;
				?>
				
			</div>
			<?php
			}
			?>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
			<form action="" method="post" id="editbannerform">
				<div class="col-md-12">
				
					<!-- BEGIN EXTRAS PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
                                                            <i class="icon-doc"></i> User Details
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<div class="form-horizontal form-bordered">	
								<div class="form-body">
								
								
								
									<div class="form-group">
										<label class="control-label col-md-2">Name <span class="require"> * </span></label>
										<div class="col-md-10">
                                                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $user['name']; ?>" required>
										</div>
									</div>

											<div class="form-group">
												<label class="control-label col-md-2">User Type <span class="require"> * </span> </label>
												<div class="col-md-10">
												<select class="form-control" id="usertype" name="usertype">

								<?php foreach($user_types as $u_type) { ?>
                                                                                        <option value="<?php echo $u_type['id'];?>" <?php if($user['type']==$u_type['id']){echo 'selected';}?> ><?php echo $u_type['type'];?></option>
								<?php } ?>

													</select>
												</div>
											</div>



									<div class="form-group">
										<label class="control-label col-md-2">Email <span class="require"> * </span> </label>
										<div class="col-md-10">
                                                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" required>
										</div>
									</div>										
																		

											
									<div class="form-group">
										<label class="control-label col-md-2">UserName <span class="require"> * </span></label>
										<div class="col-md-10">
                                                                                    <input type="text" id="username" name="username" class="form-control" placeholder="UserName" value="<?php echo $user['username']; ?>" required>
										</div>
									</div>									
								
									<div class="form-group">
										<label class="control-label col-md-2">Password <span class="require"> * </span></label>
										<div class="col-md-10">
											<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-2">Confirm Password <span class="require"> * </span></label>
										<div class="col-md-10">
											<input type="password" id="conpassword" name="conpassword" class="form-control" placeholder="Confirm Password" value="" >
										</div>
									</div>																	

								</div>

							</div>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END EXTRAS PORTLET-->
					
					
					
					
					<!-- BEGIN PAGE CONTENT-->
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN EXTRAS PORTLET-->
							<div class="portlet box yellow-crusta">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-doc"></i>Action
									</div>
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<div class="form-horizontal form-bordered">
										<div class="form-body">	
											<div class="form-group last">
												<label class="control-label col-md-2">Status</label>
												<div class="col-md-10">
													<select class="form-control" id="lstatus" name="lstatus">
														<option value="1" <?php if($user['status']=="1"){echo "Selected";}?>> Active </option>
														<option value="0" <?php if($user['status']=="0"){echo "Selected";}?>> Inactive </option>
													</select>
												</div>
											</div>
										</div>			
                                                                            
                                                                            
                                                                            <input type="hidden" id="uid" name="uid" class="form-control" value="<?php echo $_GET['char_id']; ?>" >
										<div class="form-actions">
											<div class="row">
												<div class="col-md-offset-2 col-md-10">
													<button type="submit" class="btn green"><i class="fa fa-check"></i> Publish</button>
													<input type="hidden" name="Submit"  value="Publish">
													<button type="button" id="back-btn" class="btn btn-default" onclick="window.location.href='all_charities.php'">Back</button> 
													
												</div>
											</div>
										</div>
									</div>
									<!-- END FORM-->
								</div>
							</div>
							<!-- END EXTRAS PORTLET-->
							
							
							
							
						</div>
					</div>
					<!-- END PAGE CONTENT-->
		</div>
		</form>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include("footer.php");?>
<script>
$(function () {
		   $('table').footable({ bookmarkable: { enabled: true }}).bind({
            'footable_filtering': function (e) {
                var selected = $('.filter-status').find(':selected').text();
                if (selected && selected.length > 0) {
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                }
            },
            'footable_filtered': function() {
                var count = $('table.demo tbody tr:not(.footable-filtered)').length;
                $('.row-count').html(count + ' rows found');
            }
        });

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
            $('.row-count').html('');
        });

        $('.filter-status').change(function (e) {
            e.preventDefault();
            $('table.demo').data('footable-filter').filter( $('#filter').val() );
        });
    });
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
   TableAdvanced.init(); // Advanced table
   ComponentsEditors.init(); // HTML5 editor
   jQuery("#editcourseform").validate({
		rules: {
			course_name: "required",
			course_description: "required",
			course_detail: "required",
		},
		messages: {
			course_name: "Required",
			course_description: "Required",
			course_detail: "Required",
		}
	});
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
