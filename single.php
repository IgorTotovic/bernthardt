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
			$facebook = get_the_author_meta('facebook', $author_id);
			$twitter = get_the_author_meta('twitter', $author_id);
			$pinterest = get_the_author_meta('pinterest', $author_id);
			$summary = get_the_author_meta('summary', $author_id);
			$about=get_the_author_meta('description', $author_id);				
			$author_avatar = get_avatar($author_id, 150,);
			$email= get_the_author_meta('email', $author_id);
				
			?>
			
		<div class="author-card-blog">
			
				<div class="author-card-avatar">
					<?php echo $author_avatar; ?>

				</div>
				<p id="call-to-action-p">Stay in touch:</p>			
				<img  id="card-email"src="<?php echo get_template_directory_uri(); ?>/images/email20.png" alt="email icon">
				<img  id="card-linkdin"src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="linkedin icon">
				

			</div>

			
				<h3 id="author-card-h3"><?php echo $user_name;?> </h3>
				<p id="summary-p"><?php echo $summary;?></p>
				<hr id="hr-author-card">
				<p id="author-info-p"><?php echo $about;?></p>

			

		
		</div>
		<div class="blog-share">
			<h3>Share this article:</h3>
			<div class="link-area">
				<p id="share-link"><?php echo esc_url( get_permalink() ); ?><p>
					<img id="copy-img" src="<?php echo get_template_directory_uri(); ?>/images/Icon awesome-copy.png" onclick="copyToClipboard()" alt="copy url image">
			</div>

			


		</div>
		<hr id="bot-hr">
		<div class="custom-sidebar-meny">
			<p>share:</p>
			<div class="sidebar-meny-img"><a href="mailto:<?php echo esc_url($email); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/email.png" alt="email icon"></a></div>
			<div class="sidebar-meny-img"><a href="<?php echo esc_url($facebook); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Description of the image"></a></div>
			<div class="sidebar-meny-img"><a href="<?php echo esc_url($twitter); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Description of the image"></a></div>
			<div class="sidebar-meny-img"><a href="<?php echo esc_url($pinterest); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/pinterest.png" alt="email icon"></a></div>
			


		</div>
		
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
<script>
function copyToClipboard() {
    
    var inputc = document.body.appendChild(document.createElement("input"));
    
    inputc.value = window.location.href;

    inputc.focus();
    inputc.select();

    document.execCommand('copy');

    inputc.parentNode.removeChild(inputc);

    
}

</script>