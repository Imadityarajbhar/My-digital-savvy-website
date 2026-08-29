/**
 * My Digital Savvy — main.js
 *
 * Handles:
 *   - Hero word rotor (paint, width reservation, cycle, click-to-filter)
 *   - Live --accent CSS custom property cascade
 *   - Client marquee build
 *   - Work section filter (chips + rotor click)
 *   - Nav stuck state on scroll
 *   - Scroll reveal (IntersectionObserver)
 *   - Review count-up animation
 *   - Reduced-motion respect throughout
 *
 * No dependencies. Runs after DOM is ready (loaded in footer via functions.php).
 */

(function () {
  'use strict';

  /* ============================================================
     CONFIGURATION
     ============================================================ */

  /** Word list — each entry maps the rotor word to an accent colour and work filter */
  var WORDS = [
    { w: 'hospitality', c: '#43FF4C', f: 'hospitality' },
    { w: 'education',   c: '#4D9FFF', f: 'education'   },
    { w: 'trading',     c: '#D82DF5', f: 'trading'     },
    { w: 'jewellery',   c: '#EB1C52', f: 'retail'      },
    { w: 'real estate', c: '#43FF4C', f: 'real estate' }
  ];

  /** Clients shown in the marquee strip — order is display order */
  var CLIENTS = [
    'Hotel Sunrise',
    'Garbha Sanskar Academy',
    'House of Trader Academy',
    'Farm Villa 007',
    'Aura Jewels',
    'The Plan C',
    'Sansa',
    'Vidyadoot Career Institute',
    'Archi Builders',
    '1 to 1 Home Tutors',
    'Tejaswi Trades'
  ];

  /* ============================================================
     SETUP
     ============================================================ */

  var idx    = 0;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var root   = document.documentElement;

  /* DOM refs */
  var rotor    = document.getElementById('rotor');
  var rotorBtn = document.getElementById('rotorBtn');
  var base     = document.getElementById('rotorBase');
  var top_     = document.getElementById('rotorTop');
  var srLive   = document.getElementById('srLive');

  if (!rotor) { return; } /* bail if template doesn't include the hero */

  /* ============================================================
     ROTOR — PAINT
     Writes word text, sets coloured-copy colour, updates --accent,
     and updates aria-label + screen-reader live region.
     ============================================================ */
  function paint(n) {
    var d = WORDS[n];

    /* Write the word into both layers */
    base.innerHTML = d.w + '<span class="crimson">.</span>';
    top_.innerHTML = d.w + '<span class="crimson">.</span>';
    top_.style.color = d.c;

    /* Push the accent colour to the entire page via the CSS cascade */
    root.style.setProperty('--accent', d.c);

    /* Store current filter on the rotor element for the click handler */
    rotor.dataset.filter = d.f;

    /* Update button label for keyboard/AT users */
    rotorBtn.setAttribute('aria-label', 'Show ' + d.w + ' work \u2014 click to filter');

    /* Announce to screen readers via live region.
       Clear first so repeat words still trigger a change event. */
    if (srLive) {
      srLive.textContent = '';
      srLive.textContent = d.w;
    }
  }

  /* ============================================================
     ROTOR — RESERVE WIDTH
     Measures every word at display size and sets a min-width on the
     button so the headline never reflows when words change length.
     ============================================================ */
  function reserveWidth() {
    var maxW = 0;
    WORDS.forEach(function (d) {
      base.innerHTML = d.w + '<span class="crimson">.</span>';
      top_.innerHTML = d.w + '<span class="crimson">.</span>';
      /* offsetWidth reads after layout; works because script runs in footer */
      maxW = Math.max(maxW, rotorBtn.offsetWidth);
    });
    rotorBtn.style.minWidth = maxW + 'px';
    paint(0); /* restore to first word */
  }

  /* ============================================================
     ROTOR — CYCLE
     Removes .go to reset the clip-height to 0, paints the new word,
     forces a reflow, then adds .go to trigger the upward wipe.
     ============================================================ */
  function cycle() {
    rotor.classList.remove('go');
    paint(idx);
    void rotor.offsetWidth; /* force reflow — critical for the transition to re-fire */
    setTimeout(function () { rotor.classList.add('go'); }, 260);
    idx = (idx + 1) % WORDS.length;
  }

  /* ---- Boot the rotor ---- */
  reserveWidth();

  if (!reduce) {
    cycle();
    setInterval(cycle, 2600); /* 620ms wipe + ~2s hold */
  } else {
    /* Reduced motion: land on the first word's coloured state, stop cycling */
    rotor.classList.add('go');
    idx = 1;
  }

  /* ============================================================
     ROTOR — CLICK TO FILTER
     Clicking the rotating word scrolls to the work section and
     activates the matching filter chip.
     ============================================================ */
  rotorBtn.addEventListener('click', function () {
    var f = rotor.dataset.filter;
    applyFilter(f);

    document.querySelectorAll('.chip').forEach(function (c) {
      c.setAttribute('aria-pressed', String(c.dataset.f === f));
    });

    var workSection = document.getElementById('work');
    if (workSection) {
      workSection.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth' });
    }
  });

  /* ============================================================
     CLIENT MARQUEE
     Builds the scrolling strip from the CLIENTS array.
     Doubling the HTML creates the seamless infinite loop.
     CSS animation-play-state is paused on hover via stylesheet.
     ============================================================ */
  var track = document.getElementById('track');
  if (track) {
    var marqueeHTML = CLIENTS.map(function (name) {
      return '<span>' + name + ' <i>\u2022</i></span>';
    }).join('');
    track.innerHTML = marqueeHTML + marqueeHTML;
  }

  /* ============================================================
     WORK FILTER
     Toggling .dim to 24% opacity (not display:none) so the layout
     doesn't jump and the non-matching rows are still perceivable.
     ============================================================ */
  function applyFilter(f) {
    document.querySelectorAll('.case').forEach(function (c) {
      var matches = (f === 'all') || (c.dataset.cat === f);
      c.classList.toggle('dim', !matches);
    });
  }

  var chips = document.getElementById('chips');
  if (chips) {
    chips.addEventListener('click', function (e) {
      var btn = e.target.closest('.chip');
      if (!btn) { return; }

      document.querySelectorAll('.chip').forEach(function (c) {
        c.setAttribute('aria-pressed', 'false');
      });
      btn.setAttribute('aria-pressed', 'true');
      applyFilter(btn.dataset.f);
    });
  }

  /* ============================================================
     NAV STUCK STATE
     Adds a hairline border when user has scrolled past the hero.
     ============================================================ */
  var nav = document.getElementById('nav');
  if (nav) {
    window.addEventListener('scroll', function () {
      nav.classList.toggle('stuck', window.scrollY > 20);
    }, { passive: true });
  }

  /* ============================================================
     SCROLL REVEAL
     Elements with .reveal animate in (opacity + translateY)
     when they enter the viewport. Each fires once then unobserves.
     ============================================================ */
  var revealObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.reveal').forEach(function (el) {
    revealObserver.observe(el);
  });

  /* ============================================================
     REVIEW COUNT-UP ANIMATION
     Counts from 0 to 320 (the review total) on an ease-out curve
     when the proof section enters the viewport. Fires once only.
     Respects reduced-motion — just snaps to final value.
     ============================================================ */
  var counted   = false;
  var proofEl   = document.getElementById('proof');
  var countEl   = document.getElementById('reviewCount');

  if (proofEl && countEl) {
    var countObserver = new IntersectionObserver(function (entries) {
      if (entries[0].isIntersecting && !counted) {
        counted = true;
        animateCount(countEl, 0, 320, 1400);
      }
    }, { threshold: 0.5 });

    countObserver.observe(proofEl);
  }

  /**
   * Animate an element's text content from `from` to `to` over `duration` ms.
   * Uses an ease-out cubic curve for a natural deceleration.
   *
   * @param {Element} el
   * @param {number}  from
   * @param {number}  to
   * @param {number}  duration  milliseconds
   */
  function animateCount(el, from, to, duration) {
    if (reduce) {
      el.textContent = to;
      return;
    }
    var start = null;
    function step(ts) {
      if (!start) { start = ts; }
      var progress = Math.min((ts - start) / duration, 1);
      var ease     = 1 - Math.pow(1 - progress, 3); /* ease-out cubic */
      el.textContent = Math.round(from + (to - from) * ease);
      if (progress < 1) { requestAnimationFrame(step); }
    }
    requestAnimationFrame(step);
  }

  /*
   * Meta Pixel — Lead event on enquiry CTA click.
   * Fires when the user clicks "Book a free audit" or "Start a project".
   * Only runs if fbq() is available (i.e. Pixel loaded via GTM or direct).
   */
  document.querySelectorAll('a[href="#contact"], a[href*="contact"]').forEach(function (el) {
    el.addEventListener('click', function () {
      if (typeof fbq === 'function') {
        fbq('track', 'Lead');
      }
    });
  });

})();
