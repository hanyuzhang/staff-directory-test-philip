<?php
/**

 * Plugin Name: Staff Ajax

 * Description: Loading staff by using ajax

 * Author:      Hanyu Zhang

 */

//load ajax for mad and non-admin user
add_action('wp_ajax_load_staff', 'load_staff');
add_action('wp_ajax_nopriv_load_staff', 'load_staff');

function load_staff() {
       
    global $wpdb;
   
    $staffHTML = '';
   
   	//check page value is set
   	if( isset( $_POST['data']['page'] ) ){
        $cur_page = $_POST['data']['page']; 

        //per page
        $per_page = 15; 

        //current page start index
        $startIndex = ($cur_page - 1) * $per_page;
         
        $staff = $wpdb->prefix . "posts";
		$termRelationTable = $wpdb->prefix . "term_relationships";
       
        $where_search = '';
       
        if( !empty( $_POST['data']['search']) ){
        	//make search upcase as '%s', '%d' case issue
            $where_search .= ' AND (post_title LIKE "%' . strtoupper($_POST['data']['search']) . '%" OR post_content LIKE "%' . strtoupper($_POST['data']['search']) . '%") ';
        }
		
		if( !empty( $_POST['data']['department']) ){
			//get staff in this department
			$staffIDArr = [];
			$staffIDInThisTerm = $wpdb->get_results($wpdb->prepare("SELECT * FROM $termRelationTable WHERE term_taxonomy_id = " . $_POST['data']['department']));
			foreach($staffIDInThisTerm as $staffID){
				$staffIDArr[] = $staffID->object_id;
			}
            $where_search .= ' AND ID IN (' . implode(",",$staffIDArr) . ')';
        }
       
       	//get all staff data base on query
        $allStaff = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM $staff WHERE post_type = 'staff' AND post_status = 'publish' $where_search
            ORDER BY post_title ASC LIMIT %d, %d", $startIndex, $per_page));

		$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM $staff WHERE post_type = 'staff' AND post_status = 'publish' $where_search"));
		//get max page number
		$maxPageNum = ceil($count / $per_page);
			
        if($allStaff){
			foreach( $allStaff as $staffData ){
				$featured_img_url = get_the_post_thumbnail_url($staffData->ID, 'full');
				$department = '';
				$terms = get_the_terms($staffData->ID, 'department');
				if($terms){
					foreach ($terms as $dept){
						$department .=  $dept->name;
					}
				}
				
				$staffHTML .= '
				<div class="staff">
					<div class="staff-inner"> 
						<div class="staff-img" style="background-image: url(' . $featured_img_url . ');"></div>
						<div class="staff-info">
							<h2>' . $staffData->post_title . '</h2>
							<h4>' . $department . '</h4>' . 
							$staffData->post_content . '
						</div>
						<div style="clear:left"></div>
					</div>
				</div>';
			}
			$staffHTML .= '<div class="staff-pagination">';
			if($cur_page == 1 && $cur_page < $maxPageNum){
				$staffHTML .= '<a class="nextButton" data-page="' . ($cur_page + 1) . '">Next</a>';
			}
			if($cur_page > 1 && $cur_page < $maxPageNum){
				$staffHTML .= '<a class="prevButton" data-page="' . ($cur_page - 1) . '">Prev</a>' . '<a class="nextButton" data-page="' . ($cur_page + 1) . '">Next</a>';
			}
			if($cur_page > 1 && $cur_page == $maxPageNum){
				$staffHTML .= '<a class="prevButton" data-page="' . ($cur_page - 1) . '">Prev</a>';
			}
			$staffHTML .= '</div>';
		}
        else{
			$staffHTML = '<p>No Staff Found Here.</p>';
		}
		echo $staffHTML;
	}
	exit();
}

add_action( 'init', 'my_script_enqueuer' );

//add ajax file
function my_script_enqueuer() {
   wp_register_script( "staff_ajax_script", WP_PLUGIN_URL.'/staff-ajax/staff_ajax_script.js', array('jquery') );
   wp_localize_script( 'staff_ajax_script', 'staffAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'staff_ajax_script' );

}
