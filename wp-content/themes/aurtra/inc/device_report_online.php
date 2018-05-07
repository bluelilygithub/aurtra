 <?php
if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
}


$url = $_SERVER['REQUEST_URI'];
$urlParts = explode("/", $url);
$deviceID=$urlParts[2];

global $current_user;
global $user_ID;
$theUser=wp_get_current_user();
$customerID = $current_user->customerID;
$companyPost = get_post( $customerID ); 
$aurtraCompanyID = get_post_meta($customerID, 'customerID', true);

$args = array(
    'post_type' => 'device',
    'posts_per_page'=>-1,
    'post_status'=>'publish',
	'meta_query' => array(
            array(
            'key' => 'deviceID',
            'compare' => '=',
            'value' => $deviceID
            )
          )
	 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	$aurtraID=get_post_field('deviceID');
	$deviceCompanyID=get_post_field('customerID');
endwhile;

if($customerID!=$deviceCompanyID){
	$sessions = WP_Session_Tokens::get_instance($user_ID);
	$sessions->destroy_all();
	exit;
}	

?>  

<?php
	$ourCurrentUser = wp_get_current_user();
    if ((count($ourCurrentUser->roles)==1) AND ($ourCurrentUser->roles[0]=='company_user_role')){
?>	
<div style='margin: 20px 0'><h1><?php echo get_the_title(); ?> </h1></div>
<div class="row">
<div class="col-lg-2 dataLabel">Asset ID</div><div class="col-lg-10 dataLabel"><?php echo esc_html__( $companyPost->post_title)." Asset:  ".esc_html__(get_post_field('deviceID'));?></div>
</div>
<div class="row">
<div class="col-lg-2 dataLabel">Location</div><div class="col-lg-10"><?php echo get_post_field('deviceLocation'); ?></div>
</div>
<div class="row">
<div class="col-lg-2 dataLabel">Description</div><div class="col-lg-10"><?php echo get_post_field('deviceDescription')?></div>
</div>

	<?php }else{ ?>
	
<form id="user-post">
<div style='margin: 20px 0'><h1><?php echo get_the_title(); ?> </h1></div><div class="row">
<div class="col-lg-2 dataLabel">Asset ID</div><div class="col-lg-10 dataLabel"><?php echo esc_html__( $companyPost->post_title)." Asset:  ".esc_html__(get_post_field('deviceID'));?></div>
</div>
<div class="row">
<div class="col-lg-2 label">Location</div><div class="col-lg-10">
<input type='text' id='deviceLocation' name='deviceLocation' value='<?php echo get_post_field('deviceLocation'); ?>' /></div>
</div>
<div class="row">
<div class="col-lg-2 label">Description</div><div class="col-lg-10">
<input type='text' id='deviceDescription' name='deviceDescription' value='<?php echo get_post_field('deviceDescription')?>' /></div>
</div>
<div class="result_msg" id="result_msg"></div>

<?php wp_nonce_field( basename( __FILE__ ), 'user-submitted-question' ) ?>
<input type="text" id="xyq" name="<?php echo apply_filters( 'honeypot_name', 'date-submitted' ) ?>" value="" style="display: none">
<input type="text" id="devicePostID" name="devicePostID" value="<?php echo get_the_ID() ?>" style="display:none">
<input type="submit" id="user-submit-button" value="Update Asset">		
</form>	

	<?php } ?>

</div></div></section>
	
<?php
	   $dirPath="/aurtrauploads/";
       $startDir=$_SERVER['DOCUMENT_ROOT'].$dirPath; 
	   $reportDir=$startDir.$aurtraCompanyID.'/loggerNo'.$aurtraID;	
	   $pdfPath=$dirPath.$aurtraCompanyID.'/loggerNo'.$aurtraID;	
	   
	   	  // get txt file summary from client device directory
		$arrTXT=array_map('basename', glob($reportDir.'/*.txt'));	   
	   	  // get all pdf from client device directory
		$arrPDF=array_map('basename', glob($reportDir.'/*.jpg'));
		
       //  break list of pdfs into groups based on first charcter of pdf filename
		$groups=array();
		foreach ($arrPDF as $name) {
 		   $reportGroup[$name[0]][] = $name;
		}

//  work on groups of pdf reports , split into sets of three for presentation
		 $rowCtr=0; 
		 foreach(array_chunk($reportGroup, 3) as $reportSet) {			
		    foreach ($reportSet as $key => $value) {
				  $bgCol = (($rowCtr % 2) == 0) ? "#cccccc" : "#ffffff";
				  echo '<section class="standardsection" style=" background-color:'.$bgCol.'">';
				  echo '<div class="container">';
				  echo '<div class="row" style="margin-bottom: 20px; padding-bottom:20px;">';
      			 		for ($ii=0; $ii < count($value); $ii++) { 
							 $theTitle=substr($value[$ii], 1);  //remove the second unwanted character
							 $theTitle= substr(substr($theTitle, strrpos($theTitle, '/') + 1),0,-4);  // The Title
							 $theReport=$pdfPath."/".$value[$ii];
							 
							 echo  '<div class="col-lg-4 col-sm-12 col-md-12" style="margin-top:50px">';
							 echo "<span style='color:#cc1b1b; font-weight:bold'>".$theTitle."</span>";
							                             
							 echo "<img src='".$theReport."' height='250px' width='auto'>";
							 echo "<br/><a href='".$theReport."' target='_blank' />";
							 echo "<button class='btn btn-primary' style='margin-top:10px'>View in new page</button></a>";
                        
							 echo '</div>';
						}
        	 			unset($groups[$key]);
				 	 echo '</div>'; 
					 echo '</div>';
					 echo '</div>';
			$rowCtr++;		 
 			} 
		}		
wp_reset_query();

?>
</div>

