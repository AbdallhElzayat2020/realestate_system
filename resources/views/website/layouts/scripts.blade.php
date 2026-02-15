<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    (function () {
        var scrollTopBtn = document.querySelector(".scroll-top-btn");
        var productCards = document.querySelectorAll(".product-card");

        document.addEventListener("DOMContentLoaded", function () {
            handleScroll();
            updateScrollProgress();
            updateNavbarScroll();
        });

        window.addEventListener("scroll", function () {
            handleScroll();
            updateScrollProgress();
            updateNavbarScroll();
        });

        function updateNavbarScroll() {
            var nav = document.getElementById("mainNav");
            if (!nav) return;
            if (window.scrollY > 60) {
                nav.classList.add("navbar-scrolled");
            } else {
                nav.classList.remove("navbar-scrolled");
            }
        }

        function updateScrollProgress() {
            var wrap = document.getElementById("scrollProgressWrap");
            var bar = document.getElementById("scrollProgressBar");
            if (!wrap || !bar) return;
            var docHeight = document.documentElement.scrollHeight - window.innerHeight;
            var scrolled = docHeight > 0 ? (window.scrollY / docHeight) * 100 : 0;
            bar.style.width = scrolled + "%";
        }

        if (scrollTopBtn) {
            scrollTopBtn.addEventListener("click", function () {
                window.scrollTo({ top: 0, behavior: "smooth" });
            });
        }

        function handleScroll() {
            if (!scrollTopBtn) return;
            if (window.scrollY > 400) {
                scrollTopBtn.classList.add("show");
            } else {
                scrollTopBtn.classList.remove("show");
            }
        }

        if ("IntersectionObserver" in window) {
            var cardObserver = new IntersectionObserver(
                function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("in-view");
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.2 }
            );

            productCards.forEach(function (card) {
                cardObserver.observe(card);
            });
        } else {
            productCards.forEach(function (card) {
                card.classList.add("in-view");
            });
        }

        // أرقامنا تتحدث – عد تصاعدي عند الظهور
        var statsSection = document.getElementById("stats");
        var statsCounters = document.querySelectorAll(".stats-counter");
        if (statsSection && statsCounters.length && "IntersectionObserver" in window) {
            var statsAnimated = false;
            function animateCounter(el) {
                var count = parseInt(el.getAttribute("data-count"), 10);
                var suffix = el.getAttribute("data-suffix") || "";
                var duration = parseInt(el.getAttribute("data-duration"), 10) || 2000;
                var start = 0;
                var startTime = null;
                function step(timestamp) {
                    if (!startTime) startTime = timestamp;
                    var elapsed = timestamp - startTime;
                    var progress = Math.min(elapsed / duration, 1);
                    var easeOut = 1 - Math.pow(1 - progress, 2);
                    var current = Math.round(start + (count - start) * easeOut);
                    el.textContent = current + suffix;
                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        el.textContent = count + suffix;
                    }
                }
                requestAnimationFrame(step);
            }
            var statsObserver = new IntersectionObserver(
                function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting && !statsAnimated) {
                            statsAnimated = true;
                            statsCounters.forEach(function (counter) {
                                animateCounter(counter);
                            });
                        }
                    });
                },
                { threshold: 0.25 }
            );
            statsObserver.observe(statsSection);
        }

        // Smooth scroll for anchor links
        document
            .querySelectorAll('a[href^="#"]:not(.dropdown-item)')
            .forEach(function (anchor) {
                anchor.addEventListener("click", function (e) {
                    var href = this.getAttribute("href");
                    if (href.length > 1) {
                        e.preventDefault();
                        var el = document.querySelector(href);
                        if (el)
                            el.scrollIntoView({
                                behavior: "smooth",
                                block: "start",
                            });
                    }
                });
            });

    })();


    // Image Modal Handler with Navigation
    var imageModal = document.getElementById('imageModal');
    var currentImageIndex = 0;
    var galleryImages = [];

    // Collect all gallery images
    function initGalleryImages() {
        var galleryItems = document.querySelectorAll('.media-gallery-item');
        galleryImages = Array.from(galleryItems).map(function (item) {
            return {
                src: item.getAttribute('data-image'),
                title: item.getAttribute('data-title'),
                index: parseInt(item.getAttribute('data-index'))
            };
        });
    }

    if (imageModal) {
        initGalleryImages();

        imageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            if (button) {
                var imageSrc = button.getAttribute('data-image');
                var imageTitle = button.getAttribute('data-title');
                var imageIndex = parseInt(button.getAttribute('data-index'));

                currentImageIndex = imageIndex;

                var modalImage = imageModal.querySelector('#modalImage');
                var modalTitle = imageModal.querySelector('.modal-title');
                var prevBtn = imageModal.querySelector('#prevImage');
                var nextBtn = imageModal.querySelector('#nextImage');

                if (modalImage) {
                    modalImage.src = imageSrc;
                }
                if (modalTitle) {
                    modalTitle.textContent = imageTitle;
                }

                // Update navigation buttons visibility
                updateNavButtons(prevBtn, nextBtn);
            }
        });

        // Previous image button
        var prevBtn = imageModal.querySelector('#prevImage');
        if (prevBtn) {
            prevBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                navigateImage(-1);
            });
        }

        // Next image button
        var nextBtn = imageModal.querySelector('#nextImage');
        if (nextBtn) {
            nextBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                navigateImage(1);
            });
        }

        // Keyboard navigation
        imageModal.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
                e.preventDefault();
                if (e.key === 'ArrowRight') {
                    navigateImage(-1); // RTL: right arrow goes to previous
                } else {
                    navigateImage(1); // RTL: left arrow goes to next
                }
            }
        });
    }

    function navigateImage(direction) {
        if (galleryImages.length === 0) return;

        currentImageIndex += direction;

        // Loop around
        if (currentImageIndex < 0) {
            currentImageIndex = galleryImages.length - 1;
        } else if (currentImageIndex >= galleryImages.length) {
            currentImageIndex = 0;
        }

        var image = galleryImages[currentImageIndex];
        var modalImage = imageModal.querySelector('#modalImage');
        var modalTitle = imageModal.querySelector('.modal-title');
        var prevBtn = imageModal.querySelector('#prevImage');
        var nextBtn = imageModal.querySelector('#nextImage');

        if (modalImage) {
            modalImage.src = image.src;
        }
        if (modalTitle) {
            modalTitle.textContent = image.title;
        }

        updateNavButtons(prevBtn, nextBtn);
    }

    function updateNavButtons(prevBtn, nextBtn) {
        // Always show buttons (we loop around)
        if (prevBtn) prevBtn.style.display = 'flex';
        if (nextBtn) nextBtn.style.display = 'flex';
    }
    AOS.init({
        duration: 700,
        easing: "ease-out-cubic",
        once: true,
        offset: 40,
    });

    // عند تغيير اللغة: البقاء في نفس الصفحة + نفس القسم (hash) إن وُجد
    document.querySelectorAll('a.lang-switch').forEach(function (link) {
        link.addEventListener('click', function (e) {
            if (window.location.hash) {
                var href = link.getAttribute('href');
                if (href && href.indexOf('#') === -1) {
                    link.setAttribute('href', href + window.location.hash);
                }
            }
        });
    });
</script>
@stack('scripts')
