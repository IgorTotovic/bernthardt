<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bernhardt_theme
 */

get_header();

?>
	
	<main id="primary" class="site-main">
		<div class="blog-post-container">
		<p id="category-p">
            <?php 
            $categories = get_the_category_list(', '); 
            echo strip_tags($categories); 
            ?>
        </p>
		<h1 id="post-title"><?php the_title(); ?></h1> 
		<span class="post-date"><?php echo get_the_date();?><span>&nbsp<?php  echo get_the_time('g:i'); ?></span>
		<p id="summary-p">
		<?php
			$content = get_the_content();
			preg_match('/<p>(.*?)<\/p>/', $content, $matches);

			if (isset($matches[1])) {
    		echo '<div class="first-paragraph">' . $matches[1] . '</div>';
			}
		?>
		</p>
		
		<hr id="blog-post-hr">
		<?php
			
			
			global $post;
			$author_id = $post->post_author;  
			$user_name = get_the_author_meta( 'display_name',$author_id );
			

			$linkedin = get_the_author_meta('linkedin', $author_id);
			$summary = get_the_author_meta('summary', $author_id);
			$about=get_the_author_meta('description', $author_id);
			

			
			
			$author_avatar = get_avatar($author_id, 150,); 
			
			
			?>
			<div class="author-avatar">
				<?php echo $author_avatar; ?>
				<?php echo $user_email;?>
				<h3><?php echo $linkedin;?></h3>
				<?php echo $summary;?>
				<?php echo $about;?>

			</div>
		<div class="author-card">

		
        
    </div>
		
		</div>
		<div class="custom-sidebar-meny">
			<div class="sidebar-meny-img"><a href="http://google.com"><img src="<?php echo get_template_directory_uri(); ?>/images/email.png" alt="email icon"></a></div>
			<div class="sidebar-meny-img"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Description of the image"></div>
			<div class="sidebar-meny-img"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Description of the image"></div>
			<div class="sidebar-meny-img"><img src="<?php echo get_template_directory_uri(); ?>/images/pinterest.png" alt="email icon"></div>
			


		</div>
		
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
