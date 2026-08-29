<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Screen-reader live region: announces rotor word changes -->
<span class="sr-only" aria-live="polite" aria-atomic="true" id="srLive"></span>

<!-- ============================================================
     NAVIGATION
     ============================================================ -->
<nav class="nav" id="nav" aria-label="Main navigation">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>#top" class="mark" aria-label="My Digital Savvy — back to top">
    My Digital Savvy<i aria-hidden="true"></i>
  </a>
  <div class="nav-links">
    <a href="#services">Services</a>
    <a href="#work">Work</a>
    <a href="#process">Process</a>
    <a href="#contact" class="nav-cta">Start a project</a>
  </div>
</nav>
