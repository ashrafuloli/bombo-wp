<?php
$author_data =  get_the_author_meta('description',get_query_var('author') );
$facebook_url = get_the_author_meta( 'airvice_facebook');
$twitter_url = get_the_author_meta( 'airvice_twitter');
$linkedin_url = get_the_author_meta( 'airvice_linkedin');
$instagram_url = get_the_author_meta( 'airvice_instagram');
$airvice_url = get_the_author_meta( 'airvice_youtube');
$airvice_write_by = get_the_author_meta( 'airvice_write_by');
$author_bio_avatar_size = 180;
if($author_data !=''):
?>
    <div class="blog__author mb-95 d-sm-flex wow fadeInUp" data-wow-delay=".4s">
        <div class="blog__author-img mr-30">
            <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
                <?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?></a>
        </div>

        <div class="blog__author-content">
            <h5><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php print get_the_author(); ?></a></h5>
            <div class="author-icon">
                <?php if (!empty($facebook_url)) : ?>
                <a href="<?php print esc_url($facebook_url); ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if (!empty($twitter_url)) : ?>
                <a href="<?php print esc_url($twitter_url); ?>" target="_blank" ><i class="fab fa-twitter"></i></a>
                <?php endif; ?>
                <?php if (!empty($linkedin_url)) : ?>
                <a href="<?php print esc_url($linkedin_url); ?>" target="_blank" ><i class="fab fa-linkedin"></i></a>
                <?php endif; ?>
                <?php if (!empty($instagram_url)) : ?>
                <a href="<?php print esc_url($instagram_url); ?>" target="_blank" ><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if (!empty($airvice_url)) : ?>
                <a href="<?php print esc_url($airvice_url); ?>" target="_blank" ><i class="fab fa-youtube"></i></a>
                <?php endif; ?>
            </div>
            <p><?php the_author_meta( 'description' ); ?></p>
        </div>
    </div>

<?php endif; ?>
