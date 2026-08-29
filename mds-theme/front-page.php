<?php
/**
 * Template: Front Page (Homepage)
 *
 * WordPress uses this file automatically when:
 *   Settings → Reading → "A static page" is selected as front page
 *   AND this theme is active.
 *
 * If you're not using a static front page, rename this to index.php.
 */
get_header();
?>

<!-- ============================================================
     HERO
     ============================================================ -->
<header class="hero wrap" id="top">

  <div class="eyebrow reveal">
    <span class="pip" aria-hidden="true"></span>
    <span class="label">Digital marketing agency &nbsp;&middot;&nbsp; Nagpur, Maharashtra</span>
  </div>

  <h1 class="display reveal">
    Marketing that pays<br>for itself in
    <span class="rotor" id="rotor">
      <button
        type="button"
        id="rotorBtn"
        aria-label="Show hospitality work &mdash; click to filter"
      >
        <span class="base" id="rotorBase">hospitality<span class="crimson">.</span></span>
        <span class="fill" id="rotorFill" aria-hidden="true">
          <span id="rotorTop">hospitality<span class="crimson">.</span></span>
        </span>
      </button>
    </span>
  </h1>

  <div class="hero-foot reveal">
    <p class="hero-sub">
      We run <b>Meta Ads</b>, build the site the ads land on, and write the content
      that keeps people coming back &mdash; for hotels, coaching academies, jewellers and
      builders across Maharashtra. One team, one thread, no handoffs.
    </p>
    <div class="btns">
      <a href="#contact" class="btn solid">Book a free audit</a>
      <a href="#work" class="btn ghost">See the work</a>
    </div>
  </div>

</header>

<!-- ============================================================
     CLIENT MARQUEE
     ============================================================ -->
<div class="strip" aria-label="Some of our clients" role="marquee">
  <div class="track" id="track" aria-hidden="true"></div>
</div>

<!-- ============================================================
     SERVICES
     ============================================================ -->
<section class="wrap" id="services" aria-labelledby="svc-heading">

  <div class="head reveal">
    <h2 id="svc-heading">What we do</h2>
    <span class="label">Four things, done properly</span>
  </div>

  <div class="svc">

    <div class="svc-row reveal">
      <h3>Meta Ads<br>management</h3>
      <div>
        <p>Campaigns built around one number that matters to you &mdash; bookings, enrolments, qualified leads. We handle creative, targeting, budget pacing and the weekly read on what to kill and what to scale.</p>
        <div class="tags">
          <b>Creative testing</b><b>Pixel &amp; events</b><b>Lead forms</b><b>Retargeting</b>
        </div>
      </div>
    </div>

    <div class="svc-row reveal">
      <h3>Websites that<br>convert</h3>
      <div>
        <p>WordPress and Elementor builds that load fast on a mid-range phone on 4G, because that&rsquo;s what your customer is actually holding. Tracking wired in from day one, not bolted on later.</p>
        <div class="tags">
          <b>WordPress</b><b>Elementor</b><b>Landing pages</b><b>Speed &amp; tracking</b>
        </div>
      </div>
    </div>

    <div class="svc-row reveal">
      <h3>Content<br>strategy</h3>
      <div>
        <p>Scripts, reels, carousels and captions on a calendar you can actually keep. We write in the language your audience uses &mdash; Hindi, Hinglish or English &mdash; and match the format to the platform.</p>
        <div class="tags">
          <b>Reels &amp; scripts</b><b>Calendars</b><b>SEO pages</b><b>Copywriting</b>
        </div>
      </div>
    </div>

    <div class="svc-row reveal">
      <h3>Branding &amp;<br>identity</h3>
      <div>
        <p>Logo, palette, type and the templates your team uses every week. Built as a small system so your posts still look like you six months after we hand it over.</p>
        <div class="tags">
          <b>Identity</b><b>Brand kit</b><b>Packaging</b><b>Social templates</b>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ============================================================
     WORK
     ============================================================ -->
<section class="wrap" id="work" aria-labelledby="work-heading">

  <div class="head reveal">
    <h2 id="work-heading">Selected work</h2>
    <span class="label">Filter by industry</span>
  </div>

  <div class="chips reveal" id="chips" role="group" aria-label="Filter work by industry">
    <button class="chip" data-f="all" aria-pressed="true">All</button>
    <button class="chip" data-f="hospitality" aria-pressed="false">Hospitality</button>
    <button class="chip" data-f="education" aria-pressed="false">Education</button>
    <button class="chip" data-f="trading" aria-pressed="false">Trading</button>
    <button class="chip" data-f="retail" aria-pressed="false">Retail &amp; jewellery</button>
    <button class="chip" data-f="real estate" aria-pressed="false">Real estate</button>
  </div>

  <div id="cases">

    <!-- FEATURED: Hotel Sunrise — strongest portfolio piece, gets extra visual weight -->
    <article class="case featured reveal" data-cat="hospitality">
      <div>
        <h4>Hotel Sunrise</h4>
        <div class="cat label">Hospitality &middot; Nagpur</div>
      </div>
      <p>Direct-booking push: room creatives, offer campaigns and a landing page built so a third-party portal isn&rsquo;t skimming the margin.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <!-- FEATURED: Garbha Sanskar Academy — strongest portfolio piece, gets extra visual weight -->
    <article class="case featured reveal" data-cat="education">
      <div>
        <h4>Garbha Sanskar Academy</h4>
        <div class="cat label">Education &middot; Wellness</div>
      </div>
      <p>Full content and platform system for an Ayurveda-rooted prenatal program &mdash; course structure, social engine, and the trust-building a sensitive audience needs.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="hospitality">
      <div>
        <h4>Farm Villa 007</h4>
        <div class="cat label">Hospitality &middot; Weekend stays</div>
      </div>
      <p>Weekend and event-booking campaigns built around property visuals, with enquiry routing straight to WhatsApp.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="education">
      <div>
        <h4>Vidyadoot Career Institute</h4>
        <div class="cat label">Education &middot; Coaching</div>
      </div>
      <p>Website build plus admissions-season campaigns aimed at parents, not just students.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="education">
      <div>
        <h4>1 to 1 Home Tutors</h4>
        <div class="cat label">Education &middot; Tutoring</div>
      </div>
      <p>Website and locality-level lead campaigns matching tutors to parents by subject and area.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="trading">
      <div>
        <h4>House of Trader Academy</h4>
        <div class="cat label">Trading &middot; Education</div>
      </div>
      <p>Ad account management and script writing for a trading education brand &mdash; webinar sign-ups and cohort fills.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="trading">
      <div>
        <h4>Tejaswi Trades</h4>
        <div class="cat label">Trading &middot; Creator</div>
      </div>
      <p>Persona and script system for a Hinglish trading channel, written to be spoken rather than read.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="retail">
      <div>
        <h4>Aura Jewels</h4>
        <div class="cat label">Jewellery &middot; Retail</div>
      </div>
      <p>Catalogue-led creative and festive campaign calendars built around collection drops.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="retail">
      <div>
        <h4>Sansa &mdash; The Fabric Store</h4>
        <div class="cat label">Fashion &middot; Retail</div>
      </div>
      <p>Store-footfall and catalogue campaigns for a fabric retailer, seasonally themed.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="retail">
      <div>
        <h4>The Plan C</h4>
        <div class="cat label">Fashion &middot; D2C</div>
      </div>
      <p>Ongoing Meta Ads management with creative refreshed against fatigue, not on a fixed schedule.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

    <article class="case reveal" data-cat="real estate">
      <div>
        <h4>Archi Builders</h4>
        <div class="cat label">Real estate &middot; Nagpur</div>
      </div>
      <p>Project website and site-visit lead campaigns, with enquiries qualified before they reach the sales team.</p>
      <i class="arrow" aria-hidden="true">&rarr;</i>
    </article>

  </div>
</section>

<!-- ============================================================
     PROCESS
     ============================================================ -->
<section class="wrap" id="process" aria-labelledby="process-heading">

  <div class="head reveal">
    <h2 id="process-heading">How a project runs</h2>
    <span class="label">First 30 days</span>
  </div>

  <div class="steps reveal">
    <div class="step">
      <div class="n" aria-hidden="true">01</div>
      <h5>Audit</h5>
      <p>We open your ad account, site and analytics and tell you what&rsquo;s leaking. Free, and yours to keep either way.</p>
    </div>
    <div class="step">
      <div class="n" aria-hidden="true">02</div>
      <h5>Plan</h5>
      <p>One goal, one budget, one set of creatives to test first. Written down so we&rsquo;re both looking at the same page.</p>
    </div>
    <div class="step">
      <div class="n" aria-hidden="true">03</div>
      <h5>Build</h5>
      <p>Site, tracking and creative go live together. Nothing runs until we can measure what it did.</p>
    </div>
    <div class="step">
      <div class="n" aria-hidden="true">04</div>
      <h5>Report</h5>
      <p>A weekly note in plain language: what we spent, what came back, what changes next week.</p>
    </div>
  </div>

</section>

<!-- ============================================================
     PROOF
     ============================================================ -->
<section class="wrap" id="proof" aria-labelledby="proof-heading">

  <div class="head reveal">
    <h2 id="proof-heading">What clients say</h2>
    <span class="label">Google reviews</span>
  </div>

  <div class="proof reveal">
    <div>
      <?php
      /*
       * PLACEHOLDER: Replace the quote and attribution below with a real
       * Google review. Pick one that names a specific outcome, not just
       * "great service". Avoid invented testimonials.
       */
      ?>
      <p class="quote">&ldquo;They didn&rsquo;t just run our ads &mdash; they <em>fixed the page</em> the ads were sending people to.&rdquo;</p>
      <p class="who">&mdash; [Client name &amp; business] &middot; Google review</p>
    </div>

    <div>
      <?php
      /*
       * CONFIRM before launch:
       *  1. Verify exact rating + review count from both GBP listings.
       *  2. Replace href below with your actual Google Maps review link.
       *  3. If a Google Places API key is available, fetch this live
       *     via wp_remote_get() and cache with set_transient() instead.
       * Current known total: 320 five-star reviews across two listings.
       */
      ?>
      <a
        href="https://g.page/r/REPLACE_WITH_YOUR_GBP_REVIEW_LINK"
        target="_blank"
        rel="noopener noreferrer"
        class="rating"
        aria-label="320 five-star Google reviews &mdash; view on Google Maps"
      >
        <div class="big" id="ratingNum">4.9</div>
        <div class="stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p><strong id="reviewCount">320</strong> five-star reviews across two Google Business listings.</p>
      </a>
    </div>
  </div>

</section>

<!-- ============================================================
     CONTACT
     ============================================================ -->
<section class="wrap contact" id="contact" aria-labelledby="contact-heading">

  <div class="reveal">
    <span class="label">Next step</span>
    <h2 id="contact-heading" class="display">
      Tell us what&rsquo;s<br>not working<span class="crimson">.</span>
    </h2>
  </div>

  <div class="cgrid reveal">
    <div>
      <span class="label">Email</span>
      <a href="mailto:hello@mydigitalsavvy.com">hello@mydigitalsavvy.com</a>
    </div>
    <div>
      <span class="label">WhatsApp</span>
      <?php
      /*
       * CONFIRM: Replace XXXXXXXXXX with the WhatsApp number for new enquiries.
       * Format: 91 followed by 10-digit mobile number, no spaces or dashes.
       */
      ?>
      <a href="https://wa.me/91XXXXXXXXXX" target="_blank" rel="noopener">+91 [number]</a>
    </div>
    <div>
      <span class="label">Where we are</span>
      <p>Nagpur, Maharashtra<br>Working with clients across India</p>
    </div>
  </div>

</section>

<?php get_footer(); ?>
