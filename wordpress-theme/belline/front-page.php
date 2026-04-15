<?php
/**
 * The front page template file
 */

get_header(); ?>

<main id="primary" class="site-main">

    <div class="navigation-grid" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin: 20px 0;">
        <a href="<?php echo esc_url( home_url( '/voyance-gratuite' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Gratuite.png" alt="Voyance Gratuite"></a>
        <a href="<?php echo esc_url( home_url( '/consultation-mail' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/02_mail.png" alt="Consultation par Mail"></a>
        <a href="<?php echo esc_url( home_url( '/consultation-tchat' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/03_tchat.png" alt="Consultation par Tchat"></a>
        <a href="<?php echo esc_url( home_url( '/magie-blanche' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Magie_blanche.png" alt="Magie Blanche"></a>
        <a href="<?php echo esc_url( home_url( '/coaching' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/05_coaching.png" alt="Coaching"></a>
        <a href="<?php echo esc_url( home_url( '/consultation-domicile' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/06_a_domicile.png" alt="Consultation à domicile"></a>
        <a href="<?php echo esc_url( home_url( '/dons' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/07_vos_dons.png" alt="Vos Dons"></a>
        <a href="<?php echo esc_url( home_url( '/32-cartes' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/08_32_cartes.png" alt="Jeu de 32 Cartes"></a>
        <a href="<?php echo esc_url( home_url( '/oracle-belline' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/09_oracle_belline.png" alt="Oracle Belline"></a>
        <a href="<?php echo esc_url( home_url( '/tarots' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/10_les_tarots.png" alt="Les Tarots"></a>
        <a href="<?php echo esc_url( home_url( '/methodes' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Methodes.png" alt="Méthodes"></a>
        <a href="<?php echo esc_url( home_url( '/planetes' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Planetes.png" alt="Planètes"></a>
    </div>

    <div class="content-area" style="padding: 20px; max-width: 800px; margin: 0 auto; color: #fff;">
        <!-- SEO Recommendation: Visible H1 -->
        <h1>Voyance gratuite et approfondie par tchat, en cabinet ou à votre domicile</h1>

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>

</main><!-- #main -->

<?php
get_footer();
