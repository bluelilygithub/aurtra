 <?php
 
   if (!is_user_logged_in()) {
    wp_redirect(esc_url(site_url('/')));
    exit;
  }

global $current_user;
$theUser=wp_get_current_user();
$useremail = $current_user->user_email;
$username = $current_user->user_login;
$firstname = $current_user->user_firstname;
$lastname = $current_user->user_lastname;
$customerID = $current_user->customerID;
$companyPost = get_post( $customerID ); 


echo "<div style='margin: 20px 0'><h2>".$companyPost->post_title." Devices</h2></div>";


$args = array(
    'post_type' => 'device',
    'posts_per_page'=>-1,
    'post_status'=>'publish',
    'orderby'=>'ID',
	'order'=>'DESC',
	'meta_query' => array(
            array(
            'key' => 'customerID',
            'compare' => '=',
            'value' => $customerID
            )
          )
	 );
$loop = new WP_Query( $args );
?>  

<div id="no-more-tables">
<table class="table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Location</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>

<?php	
while ( $loop->have_posts() ) : $loop->the_post();
?>
	
		<tr>
			
			
			<td data-title="1"><?php echo esc_html__(the_title())?></td>
			<td data-title="2"><?php echo esc_html__(ucwords(strtolower(get_post_field('deviceLocation'))))?></td>
			<td data-title="3"><?php echo esc_html__(ucwords(strtolower(get_post_field('deviceDescription'))))?>
			<a href="/aurtra/device-report/<?php echo esc_html__(get_post_field('deviceID')) ?>"><button class="btn btn-primary d-none d-lg-block pull-right"><?php echo esc_html__(get_post_field('deviceID')) ?></button></a></td>
          	<td class="d-lg-none">
  			<a href="/aurtra/device-report/<?php echo esc_html__(get_post_field('deviceID')) ?>"><button class="btn btn-primary"><?php echo esc_html__(get_post_field('deviceID')) ?></button></a>
        	</td>
			

   
		</tr>
<?php

endwhile;
wp_reset_query();
?>
	</tbody>
</table>
</div>