<?php
/**
 * My Digital Savvy — Theme functions
 *
 * Handles:
 *   - Theme support declarations
 *   - Font + style + script enqueueing
 *   - Google Tag Manager (GTM-T9RK5XBX)
 *   - Meta Pixel (944128660618504)  ← best managed through GTM, but also added here as fallback
 *   - Basic SEO meta (title-tag)
 *   - JSON-LD structured data (LocalBusiness + reviews)
 */

defined( 'ABSPATH' ) || exit;

/* ============================================================
   THEME SETUP
   ============================================================ */
function mds_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', [
        'script', 'style', 'search-form',
        'comment-form', 'comment-list', 'gallery', 'caption',
    ] );
}
add_action( 'after_setup_theme', 'mds_setup' );


/* ============================================================
   ENQUEUE FONTS, STYLES & SCRIPTS
   ============================================================ */
function mds_enqueue_assets() {
    /*
     * PRODUCTION NOTE on fonts:
     * The Google Fonts URL below is fine for development.
     * For production, self-host the .woff2 files via @font-face in style.css
     * and remove this enqueue call. Self-hosting eliminates the extra DNS
     * lookup and the render-blocking round-trip to fonts.gstatic.com,
     * which is critical on a Jio 4G connection.
     *
     * Download tool: https://gwfh.mranftl.com/fonts
     * Fonts needed:  Anton 400, Archivo 400/500/600, Archivo Narrow 600
     */
    wp_enqueue_style(
        'mds-fonts',
        'https://fonts.googleapis.com/css2?family=Anton&family=Archivo:ital,wght@0,400;0,500;0,600&family=Archivo+Narrow:wght@600&display=swap',
        [],
        null   /* null = no version appended, lets browser cache the GF URL normally */
    );

    wp_enqueue_style(
        'mds-style',
        get_template_directory_uri() . '/style.css',
        [ 'mds-fonts' ],
        '1.0.0'
    );

    wp_enqueue_script(
        'mds-main',
        get_template_directory_uri() . '/js/main.js',
        [],        /* no jQuery dependency */
        '1.0.0',
        true       /* load in footer */
    );
}
add_action( 'wp_enqueue_scripts', 'mds_enqueue_assets' );


/* ============================================================
   GOOGLE TAG MANAGER — <head> snippet
   ============================================================ */
function mds_gtm_head() {
    ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T9RK5XBX');</script>
<!-- End Google Tag Manager -->
    <?php
}
add_action( 'wp_head', 'mds_gtm_head', 1 ); /* priority 1 = fires early in <head> */


/* ============================================================
   GOOGLE TAG MANAGER — <body> noscript fallback
   ============================================================ */
function mds_gtm_body() {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T9RK5XBX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action( 'wp_body_open', 'mds_gtm_body' );


/* ============================================================
   META PIXEL — base code
   NOTE: Recommended approach is to manage the Pixel through the
   GTM container (Events Manager → Partner Integration → GTM).
   This direct snippet is a fallback if you're not using GTM for Pixel.
   Comment out or remove if the Pixel is already in your GTM container.
   ============================================================ */
function mds_meta_pixel() {
    ?>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '944128660618504');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=944128660618504&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    <?php
}
add_action( 'wp_head', 'mds_meta_pixel', 99 ); /* late priority = non-blocking */


/* ============================================================
   JSON-LD STRUCTURED DATA
   LocalBusiness + Organization + AggregateRating
   ============================================================ */
function mds_json_ld() {
    /*
     * CONFIRM before launch:
     *  - Review count and ratingValue from actual GBP listings
     *  - WhatsApp number
     *  - Update sameAs URLs with real social/GBP profile URLs
     */
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => [ 'LocalBusiness', 'MarketingAgency' ],
        'name'        => 'My Digital Savvy',
        'url'         => 'https://mydigitalsavvy.com',
        'logo'        => 'https://mydigitalsavvy.com/logo.png',
        'image'       => 'https://mydigitalsavvy.com/og-image.jpg',
        'description' => 'My Digital Savvy runs Meta Ads, builds websites, and handles content and branding for businesses in Nagpur and across Maharashtra.',
        'telephone'   => '+91-XXXXXXXXXX',
        'email'       => 'hello@mydigitalsavvy.com',
        'address'     => [
            [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Ganeshpeth',
                'addressLocality' => 'Nagpur',
                'addressRegion'   => 'Maharashtra',
                'postalCode'      => '440018',
                'addressCountry'  => 'IN',
            ],
            [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Sadar',
                'addressLocality' => 'Nagpur',
                'addressRegion'   => 'Maharashtra',
                'postalCode'      => '440001',
                'addressCountry'  => 'IN',
            ],
        ],
        'areaServed'        => 'India',
        'foundingDate'      => '2018',
        'aggregateRating'   => [
            '@type'       => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '320',
            'bestRating'  => '5',
            'worstRating' => '1',
        ],
        'sameAs' => [
            'https://www.instagram.com/mydigitalsavvy/',
            'https://www.facebook.com/mydigitalsavvy/',
            /* Add GBP profile URL here */
        ],
    ];

    echo '<script type="application/ld+json">'
        . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT )
        . '</script>' . "\n";
}
add_action( 'wp_head', 'mds_json_ld', 5 );


/* ============================================================
   DISABLE UNNECESSARY WORDPRESS DEFAULTS
   (keeps the <head> lean for a single landing page)
   ============================================================ */
remove_action( 'wp_head', 'wp_generator' );            /* hide WP version */
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
add_filter( 'the_generator', '__return_empty_string' );
