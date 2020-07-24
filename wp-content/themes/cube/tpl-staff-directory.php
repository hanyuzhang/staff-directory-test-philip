<?php 
/**
 * Template Name: Staff Directory Page
 *
 */

	get_header(); 
?>
	<div class="staff-search">
		<div class="page-container">
			<form class="directory-search"> 
				<div class="directory-search-left">
					<input type="text" name="keyword" id="key-word" placeholder="Key Words" value="">
					<i class="fas fa-search"></i>
				</div>
				<div class="directory-search-right">
					<select id="dept" class="dept" name="department">
						<?php $terms = get_terms('department', array('hide_empty' => false)); ?>
						<?php if($terms && !is_wp_error( $terms )): ?>
							<option value="">Select Department</option>
							<?php foreach ( $terms as $term ): ?>
								<option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>
			</form>
			<div class="staff-lists-outter">
				<div class="staff-lists">
				</div>
				<div id="loaderDiv"></div>
			</div>
		</div>
	</div>

<?php
get_footer();