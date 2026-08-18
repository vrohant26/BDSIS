document.addEventListener("DOMContentLoaded", () => {
  // Register GSAP Plugins
  if (typeof gsap !== "undefined") {
    if (typeof ScrollTrigger !== "undefined")
      gsap.registerPlugin(ScrollTrigger);
    if (typeof DrawSVGPlugin !== "undefined")
      gsap.registerPlugin(DrawSVGPlugin);
  }

  // 1. Initialize Lenis Smooth Scroll
  let lenis;
  if (typeof Lenis !== "undefined") {
    lenis = new Lenis({
      duration: 1.2,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      smoothWheel: true,
    });

    // Synchronize Lenis with GSAP ScrollTrigger if available, otherwise use native rAF
    if (typeof ScrollTrigger !== "undefined" && typeof gsap !== "undefined") {
      lenis.on("scroll", ScrollTrigger.update);
      gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
      });
      gsap.ticker.lagSmoothing(0);
    } else {
      function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
      }
      requestAnimationFrame(raf);
    }
  }

  // Native Word & Line Splitter for 100% Reliable Overflow-Hidden Reveal
  function splitTextForReveal(element) {
    if (!element || element.dataset.splitDone === "true") return;
    element.dataset.splitDone = "true";

    const childNodes = Array.from(element.childNodes);
    let newHTML = "";

    childNodes.forEach((node) => {
      if (node.nodeType === Node.TEXT_NODE) {
        const text = node.textContent;
        const words = text.split(/(\s+)/);
        words.forEach((chunk) => {
          if (chunk.trim().length > 0) {
            newHTML += `<span class="split-word-parent"><span class="split-word-child">${chunk}</span></span>`;
          } else if (chunk.length > 0) {
            newHTML += " ";
          }
        });
      } else if (node.nodeName === "BR") {
        newHTML += "<br>";
      } else if (node.nodeType === Node.ELEMENT_NODE) {
        newHTML += node.outerHTML;
      }
    });

    element.innerHTML = newHTML;
  }

  // ---------------------------------------------------------------------------
  // Shared Guard Utility: DRY helper to avoid repeating GSAP availability checks
  // ---------------------------------------------------------------------------
  const hasGsap = () =>
    typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined";

  // Universal Section 2-Style Stagger Word Reveal for All Headings & Text Across Website
  function initGlobalTextReveal() {
    if (!hasGsap()) return;

    // Selector targeting all section titles, subtitles, headings, hero titles, and custom reveal elements across the site
    const revealSelectors = [
      ".section-title:not(.philosophy-section .section-title)",
      ".section-subtitle:not(.philosophy-section .section-subtitle)",
      ".hero-title",
      ".hero-subtitle",
      ".values-main-title",
      ".values-bottom-subtitle",
      ".curriculums-header-title",
      ".curriculums-header-desc",
      ".milestones-header .section-title",
      ".milestones-header .section-subtitle",
      ".admissions-title",
      ".admissions-subtitle",
      ".gallery-title",
      ".gallery-subtitle",
      ".faq-header-title",
      ".faq-category-header",
      ".reveal-text",
      ".text-reveal",
      ".split-word-title",
      "h1:not(.no-reveal)",
      "h2:not(.no-reveal)",
      ".about-hero-desc",
      ".about-approach-lead",
      ".about-approach-footer-text",
      ".experiential-desc",
      ".cta-subtitle",
      ".about-leadership-lead",
      ".about-potential-title",
      ".about-potential-lead",
      ".about-purpose-title",
      ".about-purpose-subtitle",
      ".about-purpose-body",
      ".academics-hero-subtitle",
      ".programme-tagline",
      ".programme-desc",
      ".academics-approach-p",
      ".academics-exp-sub-desc",
    ].join(", ");

    const textElements = document.querySelectorAll(revealSelectors);

    textElements.forEach((el) => {
      // Avoid re-revealing if already processed or inside philosophy section (which has its own timeline)
      if (el.dataset.globalRevealDone === "true") return;
      el.dataset.globalRevealDone = "true";

      // Split text into words wrapped in overflow:hidden parent and transformable child
      splitTextForReveal(el);

      const words = el.querySelectorAll(".split-word-child");
      if (!words || words.length === 0) return;

      const isTitle =
        el.tagName === "H1" ||
        el.tagName === "H2" ||
        el.classList.contains("section-title") ||
        el.classList.contains("hero-title") ||
        el.classList.contains("values-main-title") ||
        el.classList.contains("faq-header-title");

      gsap.fromTo(
        words,
        {
          yPercent: 125,
          rotate: isTitle ? 6 : 0,
          opacity: 0,
        },
        {
          yPercent: 0,
          rotate: 0,
          opacity: 1,
          duration: isTitle ? 0.7 : 0.75,
          stagger: isTitle ? 0.03 : 0.018,
          ease: "power3.out",
          scrollTrigger: {
            trigger: el,
            start: "top 88%",
            toggleActions: "play none none none",
          },
        },
      );
    });
  }

  initGlobalTextReveal();

  // 2. Section 2 Unified ScrollTrigger Timeline (Stagger Reveal Text + Bouncy Scale-In Cards)
  function initPhilosophySectionAnimation() {
    if (!hasGsap()) return;

    const section = document.querySelector(".philosophy-section");
    if (!section) return;

    const title = section.querySelector(".section-title");
    const subtitle = section.querySelector(".section-subtitle");
    const cards = section.querySelectorAll(".coverflow-card");
    const copy = section.querySelector(".philosophy-copy");
    const cta = section.querySelector(".philosophy-cta-wrapper");

    // Perform native word splitting for overflow-hidden reveals
    if (title) splitTextForReveal(title);
    if (subtitle) splitTextForReveal(subtitle);
    if (copy) splitTextForReveal(copy);

    // Master ScrollTrigger timeline for Section 2
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top 75%",
        toggleActions: "play none none none",
      },
    });

    // 1. Heading Stagger Word Reveal
    if (title) {
      const titleWords = title.querySelectorAll(".split-word-child");
      if (titleWords.length > 0) {
        tl.fromTo(
          titleWords,
          { yPercent: 125, rotate: 15 },
          {
            yPercent: 0,
            rotate: 0,
            duration: 0.5,
            ease: "power3.out",
          },
        );
      }
    }

    // 2. Subtitle Paragraph Stagger Word Reveal
    if (subtitle) {
      const subWords = subtitle.querySelectorAll(".split-word-child");
      if (subWords.length > 0) {
        tl.fromTo(
          subWords,
          { yPercent: 125 },
          {
            yPercent: 0,
            duration: 0.65,
            ease: "power3.out",
          },
          "-=0.4",
        );
      }
    }

    // 3. Coverflow Cards Bouncy Scale-In Animation (Targets .coverflow-card to preserve Swiper transforms on .swiper-slide)
    if (cards.length > 0) {
      tl.fromTo(
        cards,
        { scale: 0, y: 70 },
        {
          scale: 1,
          y: 0,
          duration: 1.1,
          stagger: 0.12,
          ease: "back.out(1.8)",
        },
        "-=0.4",
      );
    }

    // 4. Bottom Philosophy Copy Stagger Word Reveal
    if (copy) {
      const copyWords = copy.querySelectorAll(".split-word-child");
      if (copyWords.length > 0) {
        tl.fromTo(
          copyWords,
          { yPercent: 125 },
          {
            yPercent: 0,
            duration: 0.65,
            ease: "power3.out",
          },
          "-=0.4",
        );
      }
    }

    // 5. CTA Button Bouncy Entrance
    if (cta) {
      tl.fromTo(
        cta,
        { scale: 0.8, opacity: 0, y: 20 },
        { scale: 1, opacity: 1, y: 0, duration: 0.7, ease: "back.out(1.6)" },
        "-=0.4",
      );
    }
  }

  // Run Section 2 Animation
  initPhilosophySectionAnimation();

  // 3. Section 3 ScrollTrigger Timeline (Preparing India's Next Generation Video Section)
  function initGlobalFutureAnimation() {
    if (!hasGsap()) return;

    const section = document.querySelector(".global-future-section");
    if (!section) return;

    const wavyPath = section.querySelector(".bg-wavy-line-svg path");
    const title = section.querySelector(".global-future-title");
    const subtitle = section.querySelector(".global-future-subtitle");
    const videoCard = section.querySelector(".video-card-container");
    const cta = section.querySelector(".global-future-cta");

    if (title) splitTextForReveal(title);
    if (subtitle) splitTextForReveal(subtitle);

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top 75%",
        toggleActions: "play none none none",
      },
    });

    // Animate Wavy Line SVG from top down using DrawSVGPlugin (with native SVG fallback)
    if (wavyPath) {
      if (typeof DrawSVGPlugin !== "undefined") {
        tl.fromTo(
          wavyPath,
          { drawSVG: "100% 100%" },
          { drawSVG: "0% 100%", duration: 2.2, ease: "power2.inOut" },
          0,
        );
      } else {
        const pathLength = wavyPath.getTotalLength
          ? wavyPath.getTotalLength()
          : 1500;
        gsap.set(wavyPath, {
          strokeDasharray: pathLength,
          strokeDashoffset: -pathLength,
        });
        tl.to(
          wavyPath,
          { strokeDashoffset: 0, duration: 2.2, ease: "power2.inOut" },
          0,
        );
      }
    }

    // All animations trigger simultaneously at offset 0
    if (title) {
      const titleWords = title.querySelectorAll(".split-word-child");
      if (titleWords.length > 0) {
        tl.fromTo(
          titleWords,
          { yPercent: 125, rotate: 10 },
          {
            yPercent: 0,
            rotate: 0,
            duration: 0.6,
            ease: "power3.out",
          },
          0,
        );
      }
    }

    if (subtitle) {
      const subWords = subtitle.querySelectorAll(".split-word-child");
      if (subWords.length > 0) {
        tl.fromTo(
          subWords,
          { yPercent: 125 },
          {
            yPercent: 0,
            duration: 0.65,
            ease: "power3.out",
          },
          0,
        );
      }
    }

    if (videoCard) {
      tl.fromTo(
        videoCard,
        { scale: 0.85, opacity: 0, y: 50 },
        {
          scale: 1,
          opacity: 1,
          y: 0,
          duration: 1.0,
          ease: "back.out(1.5)",
        },
        0,
      );
    }

    if (cta) {
      tl.fromTo(
        cta,
        { scale: 0.85, opacity: 0, y: 20 },
        { scale: 1, opacity: 1, y: 0, duration: 0.7, ease: "back.out(1.6)" },
        0,
      );
    }
  }

  // Run Section 3 Animation
  initGlobalFutureAnimation();

  // 3. Hero Carousel Controller & Interactive Progress Indicators
  const slides = document.querySelectorAll(".hero-slide");
  const progressItems = document.querySelectorAll(".hero-progress-item");
  const SLIDE_DURATION = 6000; // 6 seconds per slide
  let currentSlide = 0;

  function animateSlideContent(slideElement) {
    if (typeof gsap === "undefined") return;

    const title = slideElement.querySelector(".hero-title");
    const subtitle = slideElement.querySelector(".hero-subtitle");
    const actions = slideElement.querySelector(".hero-actions");

    if (title) splitTextForReveal(title);
    if (subtitle) splitTextForReveal(subtitle);

    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

    if (title) {
      const titleWords = title.querySelectorAll(".split-word-child");
      if (titleWords.length > 0) {
        tl.fromTo(
          titleWords,
          { yPercent: 125, opacity: 0 },
          { yPercent: 0, opacity: 1, duration: 0.8, stagger: 0.06 },
        );
      }
    }

    if (subtitle) {
      const subWords = subtitle.querySelectorAll(".split-word-child");
      if (subWords.length > 0) {
        tl.fromTo(
          subWords,
          { yPercent: 125, opacity: 0 },
          { yPercent: 0, opacity: 1, duration: 0.65, stagger: 0.025 },
          "-=0.5",
        );
      }
    }

    if (actions) {
      tl.fromTo(
        actions,
        { y: 20, opacity: 0, scale: 0.96 },
        { y: 0, opacity: 1, scale: 1, duration: 0.6 },
        "-=0.4",
      );
    }
  }

  function goToSlide(index) {
    if (index < 0 || index >= slides.length) return;

    currentSlide = index;

    slides.forEach((s, idx) => {
      if (idx === currentSlide) {
        s.classList.add("active");
        animateSlideContent(s);
      } else {
        s.classList.remove("active");
      }
    });

    progressItems.forEach((p, idx) => {
      const fill = p.querySelector(".progress-bar-fill");
      if (typeof gsap !== "undefined" && fill) {
        gsap.killTweensOf(fill);
      }

      if (idx < currentSlide) {
        p.classList.remove("active");
        if (fill) fill.style.width = "100%";
      } else if (idx === currentSlide) {
        p.classList.add("active");
        if (fill) {
          fill.style.width = "0%";
          if (typeof gsap !== "undefined") {
            gsap.to(fill, {
              width: "100%",
              duration: SLIDE_DURATION / 1000,
              ease: "none",
              onComplete: () => {
                const nextIndex = (currentSlide + 1) % slides.length;
                goToSlide(nextIndex);
              },
            });
          }
        }
      } else {
        p.classList.remove("active");
        if (fill) fill.style.width = "0%";
      }
    });
  }

  if (slides.length > 0) {
    progressItems.forEach((item, idx) => {
      item.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        goToSlide(idx);
      });
    });
    goToSlide(0);
  }

  // 4. 3D Coverflow Carousel (Swiper.js)
  if (
    typeof Swiper !== "undefined" &&
    document.querySelector(".coverflow-swiper")
  ) {
    const coverflowSwiper = new Swiper(".coverflow-swiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      initialSlide: 2, // Centered on main campus building (slide 3)
      coverflowEffect: {
        rotate: 0, // Facing front straight without 3D rotation/skewing
        stretch: 100,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      breakpoints: {
        320: {
          coverflowEffect: {
            rotate: 0,
            depth: 70,
          },
        },
        768: {
          coverflowEffect: {
            rotate: 0,
            depth: 100,
          },
        },
      },
    });

    // Force Swiper to update coverflow transforms immediately
    requestAnimationFrame(() => {
      coverflowSwiper.update();
    });
  }

  // 5. Mobile Navigation Slide-Down Card Toggle with GSAP Smooth Height Animation & Reversibility
  const mobileToggle = document.querySelector(".mobile-toggle");
  const mobileNavWrapper = document.querySelector(".mobile-nav-wrapper");
  const mobileNavCard = document.querySelector(".mobile-nav-card");

  let isMobileNavOpen = false;

  if (mobileToggle && mobileNavWrapper) {
    function openMobileMenu() {
      isMobileNavOpen = true;
      mobileNavWrapper.classList.add("is-open");
      mobileToggle.classList.add("is-active", "is-open");
      mobileToggle.setAttribute("aria-expanded", "true");

      gsap.killTweensOf(mobileNavWrapper);
      const targetHeight = Math.min(
        mobileNavCard ? mobileNavCard.scrollHeight + 40 : 550,
        window.innerHeight - 75,
      );

      gsap.fromTo(
        mobileNavWrapper,
        { height: 0 },
        {
          height: targetHeight,
          duration: 0.45,
          ease: "power3.out",
          onComplete: () => {
            if (isMobileNavOpen) {
              mobileNavWrapper.style.height = "auto";
            }
          },
        },
      );
    }

    function closeMobileMenu() {
      if (!isMobileNavOpen && !mobileNavWrapper.classList.contains("is-open"))
        return;
      isMobileNavOpen = false;
      mobileToggle.classList.remove("is-active", "is-open");
      mobileToggle.setAttribute("aria-expanded", "false");

      gsap.killTweensOf(mobileNavWrapper);
      const currentHeight = mobileNavWrapper.offsetHeight;

      gsap.fromTo(
        mobileNavWrapper,
        { height: currentHeight },
        {
          height: 0,
          duration: 0.35,
          ease: "power3.inOut",
          onComplete: () => {
            mobileNavWrapper.classList.remove("is-open");
          },
        },
      );
    }

    mobileToggle.addEventListener("click", (e) => {
      e.stopPropagation();
      if (isMobileNavOpen) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });

    // Toggle Mobile Submenu for Academics (pure inner accordion toggle)
    const mobileDropdownToggle = document.querySelector(
      ".mobile-dropdown-toggle",
    );
    const mobileDropdownItem = document.querySelector(".mobile-dropdown-item");
    if (mobileDropdownToggle && mobileDropdownItem) {
      mobileDropdownToggle.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        mobileDropdownItem.classList.toggle("is-expanded");
      });
    }

    // Auto-close menu when clicking links inside card
    const mobileNavLinks = mobileNavWrapper.querySelectorAll("a");
    mobileNavLinks.forEach((link) => {
      link.addEventListener("click", () => {
        closeMobileMenu();
      });
    });

    // Close when clicking outside header
    document.addEventListener("click", (e) => {
      if (!e.target.closest(".site-header-fixed")) {
        closeMobileMenu();
      }
    });
  }

  // 6. Section 5 Curriculum Stage Timeline Carousel
  function initCurriculumCarousel() {
    const swiperEl = document.querySelector(".curriculum-swiper");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("timelineProgressBar");
    const stepBtns = document.querySelectorAll(".timeline-step-btn");
    const stepperWrapper = document.querySelector(".timeline-stepper-wrapper");

    function updateTimeline(index) {
      const totalSteps = stepBtns.length > 1 ? stepBtns.length - 1 : 3;
      if (progressBar) {
        const pct = (index / totalSteps) * 100;
        progressBar.style.width = pct + "%";
      }

      stepBtns.forEach((btn, idx) => {
        if (idx === index) {
          btn.classList.add("active");
          if (stepperWrapper && btn.offsetLeft !== undefined) {
            const containerWidth = stepperWrapper.clientWidth;
            const btnLeft = btn.offsetLeft;
            const btnWidth = btn.clientWidth;
            const scrollTarget = btnLeft - (containerWidth / 2) + (btnWidth / 2);
            stepperWrapper.scrollTo({ left: Math.max(0, scrollTarget), behavior: "smooth" });
          }
        } else {
          btn.classList.remove("active");
        }
      });
    }

    const curriculumSwiper = new Swiper(".curriculum-swiper", {
      slidesPerView: "auto",
      spaceBetween: 200,
      speed: 800,
      parallax: false,
      grabCursor: true,
      loop: true,
      navigation: {
        nextEl: "#curriculumNextBtn",
        prevEl: "#curriculumPrevBtn",
      },
      breakpoints: {
        320: {
          spaceBetween: 40,
        },
        768: {
          spaceBetween: 100,
        },
        1024: {
          spaceBetween: 200,
        },
      },
      on: {
        init: function () {
          updateTimeline(this.realIndex !== undefined ? this.realIndex : this.activeIndex);
        },
        slideChange: function () {
          updateTimeline(this.realIndex !== undefined ? this.realIndex : this.activeIndex);
        },
      },
    });

    stepBtns.forEach((btn) => {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        const stepIndex = parseInt(this.getAttribute("data-step"), 10);
        if (!isNaN(stepIndex)) {
          if (curriculumSwiper.params.loop) {
            curriculumSwiper.slideToLoop(stepIndex);
          } else {
            curriculumSwiper.slideTo(stepIndex);
          }
        }
      });
    });
  }

  initCurriculumCarousel();

  // 6. Section 8 Parents Testimonial Swiper Carousel
  function initParentsCarousel() {
    const swiperEl = document.querySelector(".parents-swiper");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("parentsProgressBar");

    function updateParentsProgressBar(swiper) {
      if (!progressBar) return;
      const maxIndex = swiper.snapGrid ? swiper.snapGrid.length - 1 : (swiper.slides ? swiper.slides.length - 1 : 1);
      const activeIdx = swiper.activeIndex || 0;
      const pct = maxIndex > 0 ? (activeIdx / maxIndex) * 100 : 100;
      const fillPct = Math.min(100, Math.max(16.6, pct));
      progressBar.style.width = fillPct + "%";
    }

    const parentsSwiper = new Swiper(".parents-swiper", {
      slidesPerView: 1.35,
      spaceBetween: 24,
      speed: 700,
      grabCursor: true,
      loop: false,
      bounds: true,
      watchOverflow: true,
      navigation: {
        nextEl: "#parentsNextBtn",
        prevEl: "#parentsPrevBtn",
      },
      breakpoints: {
        320: {
          slidesPerView: 1.05,
          spaceBetween: 14,
        },
        768: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 1.35,
          spaceBetween: 24,
        },
      },
      on: {
        init: function () {
          updateParentsProgressBar(this);
        },
        slideChange: function () {
          updateParentsProgressBar(this);
        },
      },
    });
  }

  initParentsCarousel();

  // 7. Teacher Testimonials Swiper Carousel
  function initTeachersCarousel() {
    const swiperEl = document.querySelector(".teachers-swiper");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("teachersProgressBar");

    function updateTeachersProgressBar(swiper) {
      if (!progressBar) return;
      const maxIndex = swiper.snapGrid ? swiper.snapGrid.length - 1 : (swiper.slides ? swiper.slides.length - 1 : 1);
      const activeIdx = swiper.activeIndex || 0;
      const pct = maxIndex > 0 ? (activeIdx / maxIndex) * 100 : 100;
      const fillPct = Math.min(100, Math.max(20, pct));
      progressBar.style.width = fillPct + "%";
    }

    new Swiper(".teachers-swiper", {
      slidesPerView: 1.35,
      spaceBetween: 24,
      speed: 700,
      grabCursor: true,
      loop: false,
      bounds: true,
      watchOverflow: true,
      navigation: {
        nextEl: "#teachersNextBtn",
        prevEl: "#teachersPrevBtn",
      },
      breakpoints: {
        320: {
          slidesPerView: 1.05,
          spaceBetween: 14,
        },
        768: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 1.35,
          spaceBetween: 24,
        },
      },
      on: {
        init: function () {
          updateTeachersProgressBar(this);
        },
        slideChange: function () {
          updateTeachersProgressBar(this);
        },
      },
    });
  }

  initTeachersCarousel();

  /* ==========================================================================
     Smooth Background & Text Color Switch to Purple Mode on Scroll
     ========================================================================== */
  if (hasGsap()) {
    const purpleSection = document.querySelector(".purple-full-section");
    if (purpleSection) {
      ScrollTrigger.create({
        trigger: ".purple-full-section",
        start: "top 65%",
        end: "bottom 35%",
        onEnter: () => {
          document.body.classList.add("theme-purple-mode");
          gsap.to("body, .site-wrapper", {
            backgroundColor: "#49274A",
            duration: 0.4,
            ease: "power2.out",
          });
        },
        onLeaveBack: () => {
          document.body.classList.remove("theme-purple-mode");
          gsap.to("body, .site-wrapper", {
            backgroundColor: "#FFFFFF",
            duration: 0.4,
            ease: "power2.out",
          });
        },
      });
    }

    /* GSAP ScrollTrigger Path Draw Animation for Wavy Ribbon SVG (Top to Bottom Flow) */
    const ribbonPath = document.querySelector(".experiential-ribbon-path");
    if (ribbonPath) {
      const pathLength = ribbonPath.getTotalLength();
      gsap.set(ribbonPath, {
        strokeDasharray: pathLength,
        strokeDashoffset: pathLength,
      });

      gsap.to(ribbonPath, {
        strokeDashoffset: 0,
        ease: "none",
        scrollTrigger: {
          trigger: ".purple-full-section",
          start: "top 80%",
          end: "bottom 20%",
          scrub: 1.2,
        },
      });
    }
  }

  /* ==========================================================================
     Experiential Learning Section Autoplay, Scaling Tabs & Image Crossfade
     (Plays ONLY when section is visible in viewport)
     ========================================================================== */
  function initExperientialCarousel() {
    const tabBtns = document.querySelectorAll(".experiential-tab-item");
    const imgSlides = document.querySelectorAll(".experiential-img-slide");
    const experientialSection = document.querySelector(".purple-full-section");
    let currentIndex = 0;
    let autoplayTimer = null;
    let isHovered = false;

    if (!tabBtns.length || !imgSlides.length || !experientialSection) return;

    function goToTab(index) {
      currentIndex = index;
      tabBtns.forEach((btn, i) => {
        if (i === index) {
          btn.classList.add("active");
        } else {
          btn.classList.remove("active");
        }
      });

      imgSlides.forEach((img, i) => {
        if (i === index) {
          img.classList.add("active");
        } else {
          img.classList.remove("active");
        }
      });
    }

    let initialDelayTimeout = null;

    function startAutoplay() {
      stopAutoplay();

      // Immediately trigger first slide transition after 1.2s on scroll reach, then cycle every 2.5s
      initialDelayTimeout = setTimeout(() => {
        const nextIndex = (currentIndex + 1) % tabBtns.length;
        goToTab(nextIndex);

        autoplayTimer = setInterval(() => {
          const stepIndex = (currentIndex + 1) % tabBtns.length;
          goToTab(stepIndex);
        }, 2500);
      }, 1200);
    }

    function stopAutoplay() {
      if (initialDelayTimeout) {
        clearTimeout(initialDelayTimeout);
        initialDelayTimeout = null;
      }
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    tabBtns.forEach((btn) => {
      btn.addEventListener("click", function () {
        const tabIndex = parseInt(this.getAttribute("data-tab-index"), 10);
        if (!isNaN(tabIndex)) {
          goToTab(tabIndex);
          startAutoplay();
        }
      });
    });

    /* Viewport-based Autoplay Activation via ScrollTrigger */
    if (hasGsap()) {
      ScrollTrigger.create({
        trigger: ".purple-full-section",
        start: "top 70%",
        end: "bottom top",
        onEnter: startAutoplay,
        onEnterBack: startAutoplay,
        onLeave: stopAutoplay,
        onLeaveBack: stopAutoplay,
      });
    }
  }

  initExperientialCarousel();

  /* ==========================================================================
     Section 7: The Values We Nurture Pinned Scroll Animation
     ========================================================================== */
  function initValuesPinnedSection() {
    const valuesSection = document.querySelector(".values-pinned-section");
    if (!valuesSection || !hasGsap()) return;

    const graphicCurious = document.getElementById("graphicCurious");
    const graphicCollaborative = document.getElementById(
      "graphicCollaborative",
    );
    const graphicCourage = document.getElementById("graphicCourage");

    const cardCuriosity = document.getElementById("valueCardCuriosity");
    const cardCollaboration = document.getElementById("valueCardCollaboration");
    const cardCourage = document.getElementById("valueCardCourage");

    const isMobile = window.innerWidth <= 1024;

    const timeline = gsap.timeline({
      scrollTrigger: {
        trigger: ".values-pinned-section",
        start: "top top",
        end: "+=220%",
        pin: true,
        scrub: 0.8,
        anticipatePin: 1,
      },
    });

    // Step 1: Curiosity SVG & Curiosity Card slide up
    timeline.to(
      graphicCurious,
      {
        y: 0,
        scale: 1,
        duration: 0.8,
        ease: "power2.out",
      },
      0.1,
    );

    timeline.to(
      cardCuriosity,
      {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: "power2.out",
        onStart: () => cardCuriosity && cardCuriosity.classList.add("active"),
        onReverseComplete: () =>
          cardCuriosity && cardCuriosity.classList.remove("active"),
      },
      0.2,
    );

    // On Mobile ONLY: Curiosity Card fades out before Collaboration Card enters
    if (isMobile) {
      timeline.to(
        cardCuriosity,
        {
          opacity: 0,
          y: -20,
          duration: 0.45,
          ease: "power2.in",
          onComplete: () =>
            cardCuriosity && cardCuriosity.classList.remove("active"),
        },
        0.95,
      );
    }

    // Step 2: Collaborative SVG & Collaboration Card slide up
    timeline.to(
      graphicCollaborative,
      {
        y: 0,
        scale: 1,
        duration: 0.8,
        ease: "power2.out",
      },
      1.2,
    );

    timeline.to(
      cardCollaboration,
      {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: "power2.out",
        onStart: () =>
          cardCollaboration && cardCollaboration.classList.add("active"),
        onReverseComplete: () =>
          cardCollaboration && cardCollaboration.classList.remove("active"),
      },
      1.3,
    );

    // On Mobile ONLY: Collaboration Card fades out before Courage Card enters
    if (isMobile) {
      timeline.to(
        cardCollaboration,
        {
          opacity: 0,
          y: -20,
          duration: 0.45,
          ease: "power2.in",
          onComplete: () =>
            cardCollaboration && cardCollaboration.classList.remove("active"),
        },
        1.95,
      );
    }

    // Step 3: Courage SVG & Courage Card slide up
    timeline.to(
      graphicCourage,
      {
        y: 0,
        scale: 1.15,
        duration: 0.8,
        ease: "power2.out",
      },
      2.2,
    );

    timeline.to(
      cardCourage,
      {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: "power2.out",
        onStart: () => cardCourage && cardCourage.classList.add("active"),
        onReverseComplete: () =>
          cardCourage && cardCourage.classList.remove("active"),
      },
      2.3,
    );
  }

  initValuesPinnedSection();

  // --------------------------------------------------------------------------
  // Custom FAQ Page Functionality: Plum Cards Accordions & Category Scroll Navigation
  // --------------------------------------------------------------------------
  function initFAQPageInteractive() {
    const faqContainer = document.querySelector(".faq-page-custom");
    if (!faqContainer) return;

    const accordionButtons = faqContainer.querySelectorAll(".faq-card-header");
    const categoryTabs = faqContainer.querySelectorAll(".faq-tab-link");
    const sections = faqContainer.querySelectorAll(".faq-group-section");

    // 1. Accordion Card Open / Close Toggle
    accordionButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const isExpanded = btn.getAttribute("aria-expanded") === "true";
        const targetId = btn.getAttribute("aria-controls");
        const bodyEl = document.getElementById(targetId);
        const iconMinus = btn.querySelector(".icon-minus");
        const iconPlus = btn.querySelector(".icon-plus");

        if (!bodyEl) return;

        if (isExpanded) {
          btn.setAttribute("aria-expanded", "false");
          bodyEl.style.maxHeight = null;
          bodyEl.classList.remove("is-open");
          if (iconMinus) iconMinus.style.display = "none";
          if (iconPlus) iconPlus.style.display = "block";
        } else {
          btn.setAttribute("aria-expanded", "true");
          bodyEl.classList.add("is-open");
          bodyEl.style.maxHeight = bodyEl.scrollHeight + "px";
          if (iconMinus) iconMinus.style.display = "block";
          if (iconPlus) iconPlus.style.display = "none";
        }
      });
    });

    // Recalculate max-height on window resize for open accordion cards with debounce
    let resizeTimer;
    window.addEventListener(
      "resize",
      () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
          accordionButtons.forEach((btn) => {
            if (btn.getAttribute("aria-expanded") === "true") {
              const targetId = btn.getAttribute("aria-controls");
              const bodyEl = document.getElementById(targetId);
              if (bodyEl) bodyEl.style.maxHeight = bodyEl.scrollHeight + "px";
            }
          });
        }, 100);
      },
      { passive: true },
    );

    // 2. Smooth Scroll on Tab Clicks
    categoryTabs.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = tab.getAttribute("data-target");
        const targetSection = document.getElementById(targetId);

        if (!targetSection) return;

        categoryTabs.forEach((t) => {
          t.classList.remove("active");
          t.setAttribute("aria-selected", "false");
        });
        tab.classList.add("active");
        tab.setAttribute("aria-selected", "true");

        const offsetTop =
          targetSection.getBoundingClientRect().top + window.scrollY - 220;
        if (typeof lenis !== "undefined" && lenis) {
          lenis.scrollTo(offsetTop, { duration: 1.2 });
        } else {
          window.scrollTo({ top: offsetTop, behavior: "smooth" });
        }
      });
    });

    // 3. ScrollSpy: Highlight active tab as user scrolls down with rAF throttle
    let isScrollTicking = false;
    window.addEventListener(
      "scroll",
      () => {
        if (!isScrollTicking) {
          window.requestAnimationFrame(() => {
            let currentSectionId = "";
            sections.forEach((sec) => {
              const secTop = sec.offsetTop - 230;
              if (window.scrollY >= secTop) {
                currentSectionId = sec.getAttribute("id");
              }
            });

            if (currentSectionId) {
              categoryTabs.forEach((tab) => {
                const matches =
                  tab.getAttribute("data-target") === currentSectionId;
                tab.classList.toggle("active", matches);
                tab.setAttribute("aria-selected", matches ? "true" : "false");
              });
            }
            isScrollTicking = false;
          });
          isScrollTicking = true;
        }
      },
      { passive: true },
    );
  }

  initFAQPageInteractive();

  // --------------------------------------------------------------------------
  // Custom Gallery Page Functionality: Category Filtering & Lightbox Modal
  // --------------------------------------------------------------------------
  function initGalleryPageInteractive() {
    const galleryContainer = document.querySelector(".gallery-page-custom");
    if (!galleryContainer) return;

    const categoryTabs = galleryContainer.querySelectorAll(".gallery-tab-link");
    const galleryCards =
      galleryContainer.querySelectorAll(".gallery-card-item");
    const lightboxModal = document.getElementById("galleryLightbox");
    const lightboxImg = document.getElementById("lightboxActiveImg");
    const lightboxCaption = document.getElementById("lightboxCaption");
    const lightboxCloseBtn = galleryContainer.querySelector(
      ".lightbox-close-btn",
    );
    const lightboxBackdrop =
      galleryContainer.querySelector(".lightbox-backdrop");
    const prevBtn = document.getElementById("lightboxPrevBtn");
    const nextBtn = document.getElementById("lightboxNextBtn");

    let currentVisibleCards = Array.from(galleryCards);
    let activeIndex = 0;

    // 1. Category Filtering
    categoryTabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        const selectedCategory = tab.getAttribute("data-category");

        categoryTabs.forEach((t) => {
          t.classList.remove("active");
          t.setAttribute("aria-selected", "false");
        });
        tab.classList.add("active");
        tab.setAttribute("aria-selected", "true");

        currentVisibleCards = [];

        galleryCards.forEach((card) => {
          const cardCategories = card.getAttribute("data-category") || "";
          const categoryArray = cardCategories.split(" ");

          if (
            selectedCategory === "all" ||
            categoryArray.includes(selectedCategory)
          ) {
            card.classList.remove("hide");
            currentVisibleCards.push(card);
          } else {
            card.classList.add("hide");
          }
        });
      });
    });

    // 2. Lightbox Modal Preview
    function openLightbox(index) {
      if (!lightboxModal || !currentVisibleCards[index]) return;

      activeIndex = index;
      const targetCard = currentVisibleCards[index];
      const imgEl = targetCard.querySelector(".gallery-img");
      const titleEl = targetCard.querySelector(".gallery-card-title");

      if (imgEl && lightboxImg) {
        lightboxImg.src = imgEl.src;
        lightboxImg.alt = imgEl.alt || "Gallery Image";
      }

      if (titleEl && lightboxCaption) {
        lightboxCaption.textContent = titleEl.textContent;
      }

      lightboxModal.classList.add("is-open");
      lightboxModal.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
    }

    function closeLightbox() {
      if (!lightboxModal) return;
      lightboxModal.classList.remove("is-open");
      lightboxModal.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";
    }

    galleryCards.forEach((card) => {
      card.addEventListener("click", () => {
        const idx = currentVisibleCards.indexOf(card);
        if (idx !== -1) {
          openLightbox(idx);
        }
      });
    });

    if (lightboxCloseBtn)
      lightboxCloseBtn.addEventListener("click", closeLightbox);
    if (lightboxBackdrop)
      lightboxBackdrop.addEventListener("click", closeLightbox);

    if (prevBtn) {
      prevBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        if (currentVisibleCards.length === 0) return;
        const newIndex =
          (activeIndex - 1 + currentVisibleCards.length) %
          currentVisibleCards.length;
        openLightbox(newIndex);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        if (currentVisibleCards.length === 0) return;
        const newIndex = (activeIndex + 1) % currentVisibleCards.length;
        openLightbox(newIndex);
      });
    }

    // Keyboard Shortcuts (ESC to close, Left/Right arrows to navigate)
    window.addEventListener("keydown", (e) => {
      if (!lightboxModal || !lightboxModal.classList.contains("is-open"))
        return;

      if (e.key === "Escape") {
        closeLightbox();
      } else if (e.key === "ArrowLeft" && prevBtn) {
        prevBtn.click();
      } else if (e.key === "ArrowRight" && nextBtn) {
        nextBtn.click();
      }
    });
  }

  initGalleryPageInteractive();

  // Bouncy Scale-In Animation for About Page Merits Cards
  function initAboutMeritsAnimation() {
    if (!hasGsap()) return;
    const cards = document.querySelectorAll(".about-merit-card");
    if (cards.length === 0) return;

    gsap.fromTo(
      cards,
      { scale: 0, y: 70 },
      {
        scale: 1,
        y: 0,
        duration: 1.1,
        stagger: 0.12,
        ease: "back.out(1.8)",
        scrollTrigger: {
          trigger: ".about-merits-grid",
          start: "top 85%",
          toggleActions: "play none none none",
        },
      },
    );
  }

  initAboutMeritsAnimation();

  // DrawSVG drawing animation for About Page Wavy SVGs
  function initAboutWavyAnimation() {
    if (!hasGsap()) return;
    const topPath = document.querySelector(
      ".about-approach-bg-doodle-top svg path",
    );
    const bottomPath = document.querySelector(
      ".about-approach-bg-doodle-bottom svg path",
    );

    if (!topPath && !bottomPath) return;

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: ".about-approach-section",
        start: "top 80%",
        toggleActions: "play none none none",
      },
    });

    const paths = [topPath, bottomPath].filter(Boolean);

    paths.forEach((path) => {
      if (typeof DrawSVGPlugin !== "undefined") {
        tl.fromTo(
          path,
          { drawSVG: "100% 100%" },
          { drawSVG: "0% 100%", duration: 2.2, ease: "power2.inOut" },
          0,
        );
      } else {
        const pathLength = path.getTotalLength ? path.getTotalLength() : 1500;
        gsap.set(path, {
          strokeDasharray: pathLength,
          strokeDashoffset: pathLength,
        });
        tl.to(
          path,
          { strokeDashoffset: 0, duration: 2.2, ease: "power2.inOut" },
          0,
        );
      }
    });
  }

  initAboutWavyAnimation();

  // Bouncy Scale-In / Fade-In Animation for About Page Leader Cards & Arrow Drawing
  function initAboutLeadershipAnimation() {
    if (!hasGsap()) return;
    const section = document.querySelector(".about-leadership-section");
    if (!section) return;

    const cards = section.querySelectorAll(".about-leader-card-wrapper");
    const dashedPath = section.querySelector(
      ".about-leadership-annotation svg #maskPath",
    );
    const arrowHead = section.querySelector(
      ".about-leadership-annotation svg g[clip-path] path",
    );

    // Pre-set initial hidden state to prevent FOUC / visual jump on load
    if (arrowHead) {
      gsap.set(arrowHead, {
        opacity: 0,
        scale: 0.5,
        transformOrigin: "center center",
      });
    }

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top 80%",
        toggleActions: "play none none none",
      },
    });

    // 1. Draw dashed arrow line using DrawSVG/fallback
    if (dashedPath) {
      if (typeof DrawSVGPlugin !== "undefined") {
        tl.fromTo(
          dashedPath,
          { drawSVG: "100% 100%" },
          { drawSVG: "0% 100%", duration: 1.6, ease: "power2.out" },
          0,
        );
      } else {
        const pathLength = dashedPath.getTotalLength
          ? dashedPath.getTotalLength()
          : 500;
        gsap.set(dashedPath, {
          strokeDasharray: pathLength,
          strokeDashoffset: pathLength,
        });
        tl.to(
          dashedPath,
          { strokeDashoffset: 0, duration: 1.6, ease: "power2.out" },
          0,
        );
      }
    }

    // 2. Fade in arrowhead
    if (arrowHead) {
      tl.fromTo(
        arrowHead,
        { opacity: 0, scale: 0.5, transformOrigin: "center center" },
        { opacity: 1, scale: 1, duration: 0.4, ease: "back.out(2)" },
        "-=0.4",
      );
    }

    // 3. Stagger reveal leadership cards
    if (cards.length > 0) {
      tl.fromTo(
        cards,
        { opacity: 0, y: 55 },
        {
          opacity: 1,
          y: 0,
          duration: 0.95,
          stagger: 0.18,
          ease: "power2.out",
        },
        "-=1.0",
      );
    }
  }

  initAboutLeadershipAnimation();

  // 3D Card Flipping interactive control for Leadership Cards
  function initLeadershipCardFlip() {
    const wrappers = document.querySelectorAll(".about-leader-card-wrapper");
    wrappers.forEach((wrapper) => {
      const btn = wrapper.querySelector(".about-leader-link-btn");
      const card = wrapper.querySelector(".about-leader-card");
      if (!btn || !card) return;

      btn.addEventListener("click", (e) => {
        e.preventDefault();
        const isFlipped = card.classList.contains("is-flipped");

        // Toggle flip class
        card.classList.toggle("is-flipped");

        // Toggle button label
        if (isFlipped) {
          btn.textContent = "Read Their Message";
        } else {
          btn.textContent = "Show Photo";
        }
      });
    });
  }

  initLeadershipCardFlip();

  // Swiper Carousel for merits cards on mobile only
  function initMeritsSwiper() {
    const swiperEl = document.querySelector(".about-merits-grid");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("meritsProgressBar");

    function updateMeritsProgressBar(swiper) {
      if (!progressBar) return;
      const totalSlides = swiper.slides.length || 5;
      const progress = ((swiper.activeIndex + 1) / totalSlides) * 100;
      progressBar.style.width = progress + "%";
    }

    const meritsSwiper = new Swiper(".about-merits-grid", {
      slidesPerView: 1.35,
      spaceBetween: 16,
      grabCursor: true,
      breakpoints: {
        // Disable swiper on viewport widths >= 769px
        769: {
          enabled: false,
        },
      },
      on: {
        init: function () {
          updateMeritsProgressBar(this);
        },
        slideChange: function () {
          updateMeritsProgressBar(this);
        },
      },
    });
  }

  initMeritsSwiper();

  // ScrollTrigger Animation for the Extraordinary Potential Video Section
  function initAboutPotentialAnimation() {
    if (!hasGsap()) return;
    const section = document.querySelector(".about-potential-section");
    if (!section) return;

    const videoWrap = section.querySelector(".about-potential-video-wrap");

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: "top 80%",
        toggleActions: "play none none none",
      },
    });

    // Scale/Fade in yellow-bordered video wrapper
    if (videoWrap) {
      tl.fromTo(
        videoWrap,
        { scale: 0.5, opacity: 0 },
        { scale: 1, opacity: 1, duration: 1.2, ease: "back.out(1.5)" },
        0,
      );
    }
  }

  initAboutPotentialAnimation();

  // ScrollTrigger Animations for Purpose Section rows
  function initAboutPurposeAnimation() {
    if (!hasGsap()) return;
    const rows = document.querySelectorAll(".about-purpose-row");
    if (!rows.length) return;

    rows.forEach((row, i) => {
      const imgWrap = row.querySelector(".about-purpose-img-wrap");
      const textCol = row.querySelector(".about-purpose-text");
      const isReverse = row.classList.contains("about-purpose-row--reverse");

      const imgFrom = { x: isReverse ? 60 : -60, opacity: 0 };
      const textFrom = { x: isReverse ? -60 : 60, opacity: 0 };

      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: row,
          start: "top 80%",
          toggleActions: "play none none none",
        },
      });

      if (imgWrap) {
        tl.fromTo(
          imgWrap,
          imgFrom,
          { x: 0, opacity: 1, duration: 0.9, ease: "power3.out" },
          0,
        );
      }
      if (textCol) {
        tl.fromTo(
          textCol,
          textFrom,
          { x: 0, opacity: 1, duration: 0.9, ease: "power3.out" },
          0.15,
        );
      }
    });
  }

  initAboutPurposeAnimation();

  // ---------------------------------------------------------------------------
  // Our Approach Page Dropdown / Accordion Interactivity
  // Subtle Scroll Parallax for Programme Section Floating Images
  function initAcademicsProgrammeParallax() {
    if (!hasGsap()) return;

    const section = document.querySelector(".academics-programme-section");
    if (!section) return;

    const leftCard = section.querySelector(".programme-left-card");
    const rightCard = section.querySelector(".programme-right-card");

    if (leftCard) {
      gsap.fromTo(
        leftCard,
        { y: 110 },
        {
          y: -110,
          ease: "none",
          scrollTrigger: {
            trigger: section,
            start: "top bottom",
            end: "bottom top",
            scrub: 1,
          },
        },
      );
    }

    if (rightCard) {
      gsap.fromTo(
        rightCard,
        { y: 140 },
        {
          y: -130,
          ease: "none",
          scrollTrigger: {
            trigger: section,
            start: "top bottom",
            end: "bottom top",
            scrub: 1.2,
          },
        },
      );
    }
  }

  initAcademicsProgrammeParallax();

  // GSAP ScrollTrigger Pinning for Academics Approach Left Column
  function initAcademicsApproachPinning() {
    if (!hasGsap()) return;

    const section = document.querySelector(".academics-approach-section");
    const stickyCol = document.querySelector(".academics-approach-left-sticky");
    const cardsCol = document.querySelector(".academics-approach-cards-col");

    if (!section || !stickyCol || !cardsCol) return;

    ScrollTrigger.matchMedia({
      "(min-width: 901px)": function () {
        ScrollTrigger.create({
          trigger: section,
          pin: stickyCol,
          start: "top 105px",
          end: "bottom bottom",
          pinSpacing: false,
          invalidateOnRefresh: true,
        });
      },
    });
  }

  initAcademicsApproachPinning();

  // ---------------------------------------------------------------------------
  function initApproachAccordions() {
    const accordionCards = document.querySelectorAll(".approach-card");
    if (!accordionCards.length) return;

    accordionCards.forEach((card) => {
      const header = card.querySelector(".approach-card-header");
      const body = card.querySelector(".approach-card-body");
      if (!header || !body) return;

      header.addEventListener("click", () => {
        const isExpanded = header.getAttribute("aria-expanded") === "true";

        // Close other cards for a clean single-open overlay experience
        accordionCards.forEach((otherCard) => {
          if (otherCard !== card) {
            const otherHeader = otherCard.querySelector(
              ".approach-card-header",
            );
            const otherBody = otherCard.querySelector(".approach-card-body");
            if (otherHeader && otherBody) {
              otherHeader.setAttribute("aria-expanded", "false");
              otherBody.removeAttribute("data-open");
              otherCard.removeAttribute("data-active");
            }
          }
        });

        // Toggle current card
        if (isExpanded) {
          header.setAttribute("aria-expanded", "false");
          body.removeAttribute("data-open");
          card.removeAttribute("data-active");
        } else {
          header.setAttribute("aria-expanded", "true");
          body.setAttribute("data-open", "true");
          card.setAttribute("data-active", "true");
        }
      });
    });
  }

  initApproachAccordions();

  // Swiper Carousel for Academics Experiences Section (Single Carousel with Progress Bar)
  function initExperiencesSwiper() {
    const swiperEl = document.querySelector(".experiences-swiper");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("experiencesProgressBar");

    function updateExperiencesProgressBar(swiper) {
      if (!progressBar) return;
      const maxIndex = swiper.snapGrid ? swiper.snapGrid.length - 1 : (swiper.slides ? swiper.slides.length - 1 : 1);
      const activeIdx = swiper.activeIndex || 0;
      const pct = maxIndex > 0 ? (activeIdx / maxIndex) * 100 : 100;
      const fillPct = Math.min(100, Math.max(20, pct));
      progressBar.style.width = fillPct + "%";
    }

    new Swiper(swiperEl, {
      slidesPerView: "auto",
      spaceBetween: 28,
      grabCursor: true,
      navigation: {
        nextEl: ".experiences-next-btn",
        prevEl: ".experiences-prev-btn",
      },
      on: {
        init: function () {
          updateExperiencesProgressBar(this);
        },
        slideChange: function () {
          updateExperiencesProgressBar(this);
        },
      },
    });
  }

  initExperiencesSwiper();

  // Swiper Carousel for Admissions Process Section
  function initAdmissionsProcessSwiper() {
    const swiperEl = document.querySelector(".admissions-process-swiper");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("admissionsProcessProgressBar");

    function updateProcessProgressBar(swiper) {
      if (!progressBar) return;
      const maxIndex = swiper.snapGrid ? swiper.snapGrid.length - 1 : (swiper.slides ? swiper.slides.length - 1 : 1);
      const activeIdx = swiper.activeIndex || 0;
      const pct = maxIndex > 0 ? (activeIdx / maxIndex) * 100 : 100;
      const fillPct = Math.min(100, Math.max(20, pct));
      progressBar.style.width = fillPct + "%";
    }

    new Swiper(swiperEl, {
      slidesPerView: 4,
      spaceBetween: 20,
      grabCursor: true,
      breakpoints: {
        320: {
          slidesPerView: 1.15,
          spaceBetween: 16,
        },
        640: {
          slidesPerView: 2.1,
          spaceBetween: 18,
        },
        992: {
          slidesPerView: 3.1,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
      navigation: {
        nextEl: ".process-next-btn",
        prevEl: ".process-prev-btn",
      },
      on: {
        init: function () {
          updateProcessProgressBar(this);
        },
        slideChange: function () {
          updateProcessProgressBar(this);
        },
      },
    });
  }

  initAdmissionsProcessSwiper();

  // Swiper Carousel for Safety & Well-Being Section (Campus Life)
  function initSafetySwiper() {
    const swiperEl = document.querySelector(".safety-swiper");
    if (!swiperEl || typeof Swiper === "undefined") return;

    const progressBar = document.getElementById("safetyProgressBar");

    function updateSafetyProgressBar(swiper) {
      if (!progressBar) return;
      const maxIndex = swiper.snapGrid ? swiper.snapGrid.length - 1 : (swiper.slides ? swiper.slides.length - 1 : 1);
      const activeIdx = swiper.activeIndex || 0;
      const pct = maxIndex > 0 ? (activeIdx / maxIndex) * 100 : 100;
      const fillPct = Math.min(100, Math.max(25, pct));
      progressBar.style.width = fillPct + "%";
    }

    new Swiper(swiperEl, {
      slidesPerView: 3,
      spaceBetween: 28,
      grabCursor: true,
      navigation: {
        nextEl: ".safety-next-btn",
        prevEl: ".safety-prev-btn",
      },
      breakpoints: {
        320: {
          slidesPerView: 1.15,
          spaceBetween: 16,
        },
        640: {
          slidesPerView: 2.1,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 28,
        },
      },
      on: {
        init: function () {
          updateSafetyProgressBar(this);
        },
        slideChange: function () {
          updateSafetyProgressBar(this);
        },
      },
    });
  }

  initSafetySwiper();

  // Academics Cornerstones Interactive Accordion & Image Crossfade with Auto-Loop on Scroll
  function initCornerstonesTabs() {
    const section = document.querySelector(".academics-cornerstones-section");
    if (!section) return;

    const tabItems = section.querySelectorAll(".cornerstones-tab-item");
    const imgSlides = section.querySelectorAll(".cornerstones-img-slide");
    const progressBar = section.querySelector("#cornerstonesProgressBar");
    const dotBtns = section.querySelectorAll(".cornerstones-dot-btn");
    if (!tabItems.length) return;

    let currentIndex = 0;
    let autoPlayInterval = null;

    function activateTab(index) {
      currentIndex = index;
      tabItems.forEach((t, i) => {
        if (i === index) {
          t.classList.add("active");
        } else {
          t.classList.remove("active");
        }
      });

      imgSlides.forEach((img) => {
        if (parseInt(img.getAttribute("data-index"), 10) === index) {
          img.classList.add("active");
        } else {
          img.classList.remove("active");
        }
      });

      if (progressBar) {
        const percent = ((index + 1) / tabItems.length) * 100;
        progressBar.style.width = percent + "%";
      }

      dotBtns.forEach((dot, i) => {
        if (i === index) {
          dot.classList.add("active");
        } else {
          dot.classList.remove("active");
        }
      });
    }

    function startAutoPlay() {
      if (autoPlayInterval) return;
      autoPlayInterval = setInterval(() => {
        const nextIndex = (currentIndex + 1) % tabItems.length;
        activateTab(nextIndex);
      }, 4000);
    }

    function stopAutoPlay() {
      if (autoPlayInterval) {
        clearInterval(autoPlayInterval);
        autoPlayInterval = null;
      }
    }

    tabItems.forEach((item, idx) => {
      item.addEventListener("click", () => {
        activateTab(idx);
        stopAutoPlay();
        startAutoPlay();
      });
    });

    dotBtns.forEach((dot, idx) => {
      dot.addEventListener("click", () => {
        activateTab(idx);
        stopAutoPlay();
        startAutoPlay();
      });
    });

    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              startAutoPlay();
            } else {
              stopAutoPlay();
            }
          });
        },
        { threshold: 0.3 }
      );
      observer.observe(section);
    } else {
      startAutoPlay();
    }
  }

  initCornerstonesTabs();

  // Campus Life: Section 4 Tab Navigation ("A Learning Space Designed for Every Learner")
  function initCampusSpacesTabs() {
    const tabBtns = document.querySelectorAll(".spaces-tab-btn");
    const tabPanes = document.querySelectorAll(".spaces-tab-pane");

    if (!tabBtns.length || !tabPanes.length) return;

    tabBtns.forEach((btn) => {
      btn.addEventListener("click", function () {
        const targetTab = this.getAttribute("data-tab");

        tabBtns.forEach((b) => {
          b.classList.remove("active");
          b.setAttribute("aria-selected", "false");
        });
        tabPanes.forEach((p) => p.classList.remove("active"));

        this.classList.add("active");
        this.setAttribute("aria-selected", "true");

        const activePane = document.getElementById(targetTab);
        if (activePane) {
          activePane.classList.add("active");
        }
      });
    });
  }

  initCampusSpacesTabs();

  // Academics Sub-Page: After-School Co-Curricular Accordions ("Taking Every Interest Further")
  function initAcademicsInterestAccordions() {
    const cards = document.querySelectorAll(".academics-interest-card");
    if (!cards.length) return;

    // Set initial height for open card
    cards.forEach((card) => {
      const body = card.querySelector(".interest-accordion-body");
      if (!body) return;
      if (card.classList.contains("open")) {
        body.style.maxHeight = body.scrollHeight + "px";
      } else {
        body.style.maxHeight = "0px";
      }
    });

    cards.forEach((card) => {
      const header = card.querySelector(".interest-accordion-header");
      const body = card.querySelector(".interest-accordion-body");
      if (!header || !body) return;

      header.addEventListener("click", function (e) {
        e.preventDefault();
        const isOpen = card.classList.contains("open");

        // Close other cards smoothly
        cards.forEach((c) => {
          if (c !== card && c.classList.contains("open")) {
            c.classList.remove("open");
            const cBody = c.querySelector(".interest-accordion-body");
            if (cBody) cBody.style.maxHeight = "0px";
            const btn = c.querySelector(".interest-accordion-header");
            if (btn) btn.setAttribute("aria-expanded", "false");
          }
        });

        // Toggle current card
        if (isOpen) {
          card.classList.remove("open");
          body.style.maxHeight = "0px";
          header.setAttribute("aria-expanded", "false");
        } else {
          card.classList.add("open");
          body.style.maxHeight = body.scrollHeight + "px";
          header.setAttribute("aria-expanded", "true");
        }
      });
    });

    // Recalculate heights on window resize
    window.addEventListener("resize", function () {
      cards.forEach((card) => {
        if (card.classList.contains("open")) {
          const body = card.querySelector(".interest-accordion-body");
          if (body) body.style.maxHeight = body.scrollHeight + "px";
        }
      });
    });
  }

  initAcademicsInterestAccordions();
});
