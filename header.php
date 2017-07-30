<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <?php var_dump(AccessControl::getCookie()) ?>  -->
	<!-- Required meta tags always come first -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="navbar-header d-flex flex-row justify-content-end align-items-center">

		<div class="mr-auto">
			<a class="navbar-brand" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>"><?php bloginfo('name') ?></a>
		</div>

			<?php # Beta?
			$beta_id = get_field('beta_page','option');
			if ( !empty( $beta_id)): ?>
			<a class="beta-link" href="<?php echo get_the_permalink( $beta_id) ?>" title="<?php echo get_the_title( $beta_id) ?>"><?php echo get_the_title( $beta_id) ?></a>
		<?php endif ?>

		<ul class="navbar-desktop-links hidden-xs-down">
			<li>
				<?php if (is_user_logged_in()) { ?>
				<a class="signin-toggler" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
				<?php } else { ?>
				<a class="wiaw-toggler signin-toggler" data-target="#nav-login" href="#">Login</a>
				<?php } ?>
				<!-- <a class="wiaw-toggler signin-toggler" data-target="#nav-login" href="#"><?php _e('Log In', 'whoisandywhite') ?></a>-->
			</li> 
			<li><a class="wiaw-toggler themes-toggler" data-target="#themes-nav" href="#"><?php _e('Themes', 'whoisandywhite') ?></a></li>
		</ul>

		<div class="navbar-icons">
			<button class="wiaw-toggler search-toggler" data-target="#search-nav">
				<i class="fal fa-search"></i>
			</button>
			<button class="wiaw-toggler navbar-toggler" data-target="#main-nav" type="button">
				<i class="fal fa-bars"></i>
				<i class="fal fa-times"></i>
			</button>
		</div>

	</div>



	<div id="nav-login" class="collapse">
		<div class="nav-login">
			<div class="container">

					<?php # Is there a login var?
					if( isset( $_GET['login'])){
						$login = sanitize_text_field( $_GET['login']);
					}
					# Do the right thing!
					switch ( $login) {
						case 'empty': ?>
						<div class="alert alert-warning small" role="alert">
							<strong>Empty Fields!</strong> Please enter a your username and password.
						</div>
						<?php break;

						case 'failed': ?>
						<div class="alert alert-danger small" role="alert">
							<strong>Login Failed!</strong> Your username or password is incorrect.
						</div>
						<?php break;

						case 'false': ?>
						<div class="alert alert-success small" role="alert">
							<strong>Logged out!</strong> You are logged out.
						</div>
						<?php break;
					} ?>

					<a href="#" data-target="#nav-login__mobile-form" class="nav-login__mobile-trigger">
						<h4 class="nav-login__title"><?php the_field('login_title','option') ?></h4>
						<button class="nav-login__icon hidden-sm-up"><i class="fal fa-chevron-right"></i></button>
					</a>
					<div id="nav-login__mobile-form" class="hidden-xs-down">
						<div class="nav-login__description">
								<?php # Login Description
								$login_description = get_field('login_description', 'option');
								if ( !empty( $login_description)) {
									echo wpautop( $login_description);
								} ?>
							</div>

							<form class="loginform row no-gutters " name="loginform" id="loginform" action="<?php bloginfo('url') ?>/wp-login.php" method="post">
								
								<div class="col-xs-12 col-md-6">
									<label for="user_login"><span>Email Address</span>
										<input placeholder="Email Address" type="text" name="log" id="user_login" class="input" value="" size="20">
									</label>
								</div>
								<div class="col-xs-12 col-md-6">
									<div class="d-flex flex-row align-items-start">
										<label for="user_pass"><span>Password</span>
											<input placeholder="Password" type="password" name="pwd" id="user_pass" class="input" value="" size="20">
										</label>
										<button type="submit" name="wp-submit" id="wp-submit" class="button button-primary">
											<i class="fal fa-arrow-right"></i>
										</button>
									</div>
								</div>

								<input type="hidden" name="redirect_to" value="<?php echo get_permalink() ?>">
								<input name="rememberme" type="checkbox" id="rememberme" value="forever" checked="checked">					
							</form>

							<div class="row no-gutters">
								<div class="col-xs-12 col-md-6">
									<p class="nav-login__text">Don't have an account? <a href="<?php echo get_the_permalink( get_field('user_registration_page', 'option')) ?>" title="Sign up">Sign up</a></p>
								</div>
								<div class="col-xs-12 col-md-6">
									<p class="nav-login__text">I forgot my <a href="<?php echo home_url('/lost-password/') ?>">password</a></p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>


			<nav id="main-nav" class="collapse">
				<div class="container-fluid">
					<div class="row">
					<?php # Include Widget Areas
					if (function_exists('dynamic_sidebar')) {
						dynamic_sidebar("navbar-1");
						dynamic_sidebar("navbar-2");
						dynamic_sidebar("navbar-3");
						// dynamic_sidebar("navbar-4");
					} ?>
					<div class="col-xs-12 col-md-3">
						<?php echo do_shortcode('[unherd_social_icons/]') ?>
					</div>
				</div>
			</div>
		</nav>

		
		<nav id="themes-nav" class="collapse">
			<ul class="navbar-themes">	
			<?php # Themes
			$themes = get_terms( 'theme', array(
				'hide_empty' => false,
				));

			if ( !empty( $themes)) {
				foreach ($themes as $theme): 
					$background_image = get_field('background_image', 'term_' . $theme->term_id);	
				?>


				<li>
					<a class="theme-link" style="background-image: url(<?php echo $background_image ?>);" href="<?php echo get_term_link($theme) ?>"><span><?php echo $theme->name ?></span></a>	
				</li>
			<?php endforeach;
		} ?>
	</ul>
</nav>

<nav id="search-nav" class="collapse">
	<div class="row search-nav-wrapper">
		<div class="search-wrapper aligncenter"><?php include( $include_path . 'searchform.php'); ?></div>
	</div>
</nav>



<div class="clearfix"></div>






