/**
 * Store Frontend JavaScript Bundle
 * 
 * This file consolidates all JavaScript functionality for the store frontend.
 * Vendor libraries are loaded separately via script tags in blade templates.
 */

// Wait for DOM and all vendor libraries to be ready
document.addEventListener('DOMContentLoaded', function () {

    // ========================================
    // 1. SELECT2 INITIALIZATION
    // ========================================
    if (typeof $.fn.select2 !== 'undefined') {
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        });
    }

    // ========================================
    // 2. PARALLAX INITIALIZATION
    // ========================================
    if (typeof $.fn.parallax100 !== 'undefined') {
        $('.parallax100').parallax100();
    }

    // ========================================
    // 3. MAGNIFIC POPUP (GALLERY) INITIALIZATION
    // ========================================
    if (typeof $.fn.magnificPopup !== 'undefined') {
        $('.gallery-lb').each(function () {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    }

    // ========================================
    // 4. SWEETALERT - WISHLIST & CART
    // ========================================
    if (typeof swal !== 'undefined') {
        // Wishlist - Product Grid
        $('.js-addwish-b2').on('click', function (e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function () {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");
                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        // Wishlist - Product Detail
        $('.js-addwish-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').text();
            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");
                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        // Add to Cart - Product Detail
        $('.js-addcart-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').text();
            $(this).on('click', function () {
                swal(nameProduct, "تمت الاضافه", "success");
            });
        });
    }

    // ========================================
    // 5. PERFECT SCROLLBAR INITIALIZATION
    // ========================================
    if (typeof PerfectScrollbar !== 'undefined') {
        $('.js-pscroll').each(function () {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function () {
                ps.update();
            });
        });
    }

    // ========================================
    // 6. SLICK SLIDER - ACCESSIBILITY
    // ========================================
    if (typeof $.fn.slick !== 'undefined') {
        $('.slick1').on('init', function (event, slick) {
            $('.slick1-dots li').attr('role', 'tab');
            $('.slick1-dots li').each(function (index) {
                $(this).attr('id', 'tab-' + (index + 1));
                $(this).attr('aria-controls', 'panel-' + (index + 1));
                if (index === 0) $(this).attr('aria-selected', 'true');
                else $(this).attr('aria-selected', 'false');
            });
        });
    }

    // ========================================
    // 7. LAZY LOADING IMAGES
    // ========================================
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                const src = img.dataset.src;
                const srcset = img.dataset.srcset;

                if (src) {
                    img.src = src;
                    img.removeAttribute('data-src');
                }
                if (srcset) {
                    img.srcset = srcset;
                    img.removeAttribute('data-srcset');
                }

                img.onload = () => {
                    img.classList.remove('skeleton');
                    img.classList.add('loaded');

                    // Remove skeleton overlay
                    const placeholder = img.parentElement.querySelector('.skeleton-overlay');
                    if (placeholder) {
                        placeholder.remove();
                    }

                    // Trigger Isotope layout update if available
                    if (typeof $.fn.isotope !== 'undefined') {
                        $('.isotope-grid').isotope('layout');
                    }
                };

                observer.unobserve(img);
            }
        });
    });

    function observeImages(container = document) {
        const images = container.querySelectorAll('img.lazy-load');
        images.forEach(img => imageObserver.observe(img));
    }

    // Observe initial images
    observeImages();

    // ========================================
    // 8. INFINITE SCROLL WITH SKELETON
    // ========================================
    let loading = false;
    let productsWrapper = document.getElementById('products-wrapper');

    if (productsWrapper) {
        // Skeleton HTML Template
        function getSkeletonHTML(count = 4) {
            let html = '';
            for (let i = 0; i < count; i++) {
                html += `
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 skeleton-item isotope-item">
                    <div class="block2">
                        <div class="block2-pic hov-img0 skeleton skeleton-img" style="position: relative;"></div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l">
                                <div class="skeleton skeleton-text"></div>
                                <div class="skeleton skeleton-text short"></div>
                            </div>
                        </div>
                    </div>
                </div>`;
            }
            return html;
        }

        window.addEventListener('scroll', function () {
            if (loading) return;

            const cursorEl = document.getElementById('next-cursor');
            if (!cursorEl) return;

            if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 500) {
                let url = cursorEl.dataset.url;
                loading = true;

                const loadingIndicator = document.getElementById('loading');
                if (loadingIndicator) {
                    loadingIndicator.style.display = 'block';
                }

                // Add skeletons using Isotope if available
                const $grid = $('.isotope-grid');
                let skeletons;
                if (typeof $.fn.isotope !== 'undefined') {
                    skeletons = $(getSkeletonHTML(4));
                    $grid.append(skeletons).isotope('appended', skeletons);
                }

                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                    .then(res => res.text())
                    .then(html => {
                        cursorEl.remove();

                        // Remove skeletons
                        if (skeletons && typeof $.fn.isotope !== 'undefined') {
                            $grid.isotope('remove', skeletons).isotope('layout');
                        }

                        // Parse new content
                        let tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;

                        let newItems = [];
                        let nextCursor = null;

                        Array.from(tempDiv.children).forEach(child => {
                            if (child.classList.contains('col-sm-6')) {
                                newItems.push(child);
                            } else if (child.id === 'next-cursor') {
                                nextCursor = child;
                            }
                        });

                        // Append real items
                        if (newItems.length > 0) {
                            if (typeof $.fn.isotope !== 'undefined') {
                                let $newItems = $(newItems);
                                $grid.append($newItems).isotope('appended', $newItems);
                            } else {
                                newItems.forEach(item => productsWrapper.appendChild(item));
                            }

                            // Observe new images
                            observeImages(productsWrapper);
                        }

                        // Re-add cursor
                        if (nextCursor) {
                            productsWrapper.appendChild(nextCursor);
                        }

                        loading = false;
                        if (loadingIndicator) {
                            loadingIndicator.style.display = 'none';
                        }
                    })
                    .catch(err => {
                        console.error('Error loading products:', err);
                        if (skeletons && typeof $.fn.isotope !== 'undefined') {
                            $grid.isotope('remove', skeletons).isotope('layout');
                        }
                        loading = false;
                        if (loadingIndicator) {
                            loadingIndicator.style.display = 'none';
                        }
                    });
            }
        });
    }

    // ========================================
    // 9. FIXED HEADER ON SCROLL
    // ========================================
    (function ($) {
        "use strict";

        var headerDesktop = $('.container-menu-desktop');
        var wrapMenu = $('.wrap-menu-desktop');
        var posWrapHeader = $('.top-bar').length > 0 ? $('.top-bar').height() : 0;

        if ($(window).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top', 0);
        } else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top', posWrapHeader - $(window).scrollTop());
        }

        $(window).on('scroll', function () {
            if ($(this).scrollTop() > posWrapHeader) {
                $(headerDesktop).addClass('fix-menu-desktop');
                $(wrapMenu).css('top', 0);
            } else {
                $(headerDesktop).removeClass('fix-menu-desktop');
                $(wrapMenu).css('top', posWrapHeader - $(this).scrollTop());
            }
        });
    })(jQuery);

    // ========================================
    // 10. PRODUCT PAGE - QUANTITY CONTROLS
    // ========================================
    $('.btn-num-product-down').on('click', function () {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function () {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    // ========================================
    // 11. PRODUCT PAGE - SIZE/COLOR SELECTION
    // ========================================
    $('.size-option').on('click', function () {
        if ($(this).hasClass('disabled')) return;

        $('.size-option').removeClass('active');
        $(this).addClass('active');
        $('#selected-size').val($(this).data('value'));
    });

    $('.color-option').on('click', function () {
        if ($(this).hasClass('disabled')) return;

        $('.color-option').removeClass('active');
        $(this).addClass('active');
        $('#selected-color').val($(this).data('value'));
    });

    // ========================================
    // 12. PRODUCT PAGE - ADD TO CART (AJAX)
    // ========================================
    $('.js-addcart-detail').on('click', function (e) {
        e.preventDefault();
        var button = $(this);
        var productId = button.data('product-id');
        var qty = $('input[name="num-product"]').val();
        var size = $('#selected-size').val();
        var color = $('#selected-color').val();

        // Validation
        if ($('.size-option').length > 0 && !size) {
            if (typeof swal !== 'undefined') {
                swal("تنبيه", "يرجى اختيار المقاس أولاً", "warning");
            }
            return;
        }

        if ($('.color-option').length > 0 && !color) {
            if (typeof swal !== 'undefined') {
                swal("تنبيه", "يرجى اختيار اللون أولاً", "warning");
            }
            return;
        }

        // Check if route exists
        if (!window.App || !window.App.routes || !window.App.routes.cartAdd) {
            console.error('Cart add route not configured');
            return;
        }

        $.ajax({
            url: window.App.routes.cartAdd,
            type: "POST",
            data: {
                _token: window.App.csrfToken,
                product_id: productId,
                qty: qty,
                size: size,
                color: color
            },
            success: function (response) {
                if (response.success === false) {
                    if (typeof swal !== 'undefined') {
                        swal("تنبيه", response.message, "warning");
                    }
                } else {
                    if (typeof swal !== 'undefined') {
                        swal("تمت الاضافة", "تم اضافة المنتج للسلة بنجاح", "success");
                    }

                    // Update cart count
                    if (response.cart && response.cart.count !== undefined) {
                        $('.icon-header-noti').attr('data-notify', response.cart.count);
                    } else if (response.cart_count) {
                        $('.icon-header-noti').attr('data-notify', response.cart_count);
                    }

                    // Refresh Side Cart
                    if (typeof refreshSideCart === 'function') {
                        refreshSideCart();
                    }

                    // Open the cart panel
                    $('.js-panel-cart').addClass('show-header-cart');
                }
            },
            error: function (xhr) {
                if (typeof swal !== 'undefined') {
                    swal("خطأ", "حدث خطأ أثناء الإضافة للسلة", "error");
                }
            }
        });
    });

    // ========================================
    // 13. PRODUCT PAGE - REVIEW FORM (AJAX)
    // ========================================
    $('#review-form').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var submitBtn = form.find('button[type="submit"]');
        var originalBtnText = submitBtn.text();

        submitBtn.prop('disabled', true).text('جاري الإرسال...');

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    if (typeof swal !== 'undefined') {
                        swal("تم بنجاح", response.message, "success");
                    }
                    form[0].reset();
                    // Reset rating stars visual
                    $('.item-rating').removeClass('zmdi-star').addClass('zmdi-star-outline');

                    // Add new review to list
                    if (response.review) {
                        var review = response.review;
                        var parsedRating = parseInt(review.rating);
                        var starsHtml = '';

                        for (var i = 1; i <= 5; i++) {
                            if (i <= parsedRating) {
                                starsHtml += '<i class="zmdi zmdi-star"></i>';
                            } else {
                                starsHtml += '<i class="zmdi zmdi-star-outline"></i>';
                            }
                        }

                        // Generate initials
                        var name = review.name;
                        var initials = '';
                        if (name.length >= 1) initials += name.charAt(0).toUpperCase();
                        if (name.length >= 2) initials += ' ' + name.charAt(1).toUpperCase();

                        var reviewHtml = `
                        <div class="flex-w flex-t p-b-68">
                            <div class="size-207">
                                <div class="flex-w flex-sb-m p-b-17">
                                    <div class="flex-w flex-m">
                                        <div class="avatar-initials">
                                            ${initials}
                                        </div>
                                        <span class="mtext-107 cl2 p-r-20">
                                            ${review.name}
                                        </span>
                                    </div>
                                    <span class="fs-18 cl11">
                                        ${starsHtml}
                                    </span>
                                </div>
                                <p class="stext-102 cl6">
                                    ${review.comment}
                                </p>
                            </div>
                        </div>`;

                        $('#reviews-list-container').prepend(reviewHtml);
                    }
                }
            },
            error: function (xhr) {
                var errors = xhr.responseJSON && xhr.responseJSON.errors;
                var errorMessage = '';
                if (errors) {
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '\n';
                    });
                } else {
                    errorMessage = 'حدث خطأ ما';
                }
                if (typeof swal !== 'undefined') {
                    swal("خطأ", errorMessage, "error");
                }
            },
            complete: function () {
                submitBtn.prop('disabled', false).text(originalBtnText);
            }
        });
    });

    // ========================================
    // 14. PRODUCT PAGE - FIXED HEADER
    // ========================================
    if ($('body').hasClass('product-detail-page') || window.location.pathname.includes('/product/')) {
        var headerDesktop = $('.container-menu-desktop');
        $(headerDesktop).addClass('fix-menu-desktop');
    }

    // ========================================
    // 15. VISITOR ACTIVITY TRACKING
    // ========================================
    (function () {
        // Skip tracking for admin pages
        if (window.location.pathname.startsWith('/admin')) {
            return;
        }

        // Check if tracking route is available
        if (!window.App || !window.App.routes || !window.App.routes.storeVisitorActivity) {
            console.warn('Visitor tracking: route not configured');
            return;
        }

        let startTime = Date.now();
        let durationSeconds = 0;
        let isPageVisible = true;

        // Function to send activity to server
        function sendActivity() {
            const duration = Math.floor((Date.now() - startTime) / 1000);

            if (duration < 1) {
                return; // Don't send if less than 1 second
            }

            const formData = new FormData();
            formData.append('_token', window.App.csrfToken);
            formData.append('url', window.location.href);
            formData.append('duration_seconds', duration);
            formData.append('page_title', document.title);
            formData.append('started_at', new Date(startTime).toISOString());

            // Try sendBeacon first (better for page unload)
            if (navigator.sendBeacon) {
                const blob = new Blob([new URLSearchParams(formData).toString()], {
                    type: 'application/x-www-form-urlencoded'
                });
                navigator.sendBeacon(window.App.routes.storeVisitorActivity, blob);
            } else {
                // Fallback to fetch
                fetch(window.App.routes.storeVisitorActivity, {
                    method: 'POST',
                    body: formData,
                    keepalive: true
                }).catch(err => console.error('Activity tracking error:', err));
            }
        }

        // Track page visibility
        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                durationSeconds += Math.floor((Date.now() - startTime) / 1000);
                isPageVisible = false;
            } else {
                startTime = Date.now();
                isPageVisible = true;
            }
        });

        // Send activity when user leaves
        window.addEventListener('beforeunload', function () {
            if (isPageVisible) {
                durationSeconds += Math.floor((Date.now() - startTime) / 1000);
            }

            const totalDuration = durationSeconds || Math.floor((Date.now() - startTime) / 1000);

            if (totalDuration >= 1) {
                const formData = new FormData();
                formData.append('_token', window.App.csrfToken);
                formData.append('url', window.location.href);
                formData.append('duration_seconds', totalDuration);
                formData.append('page_title', document.title);
                formData.append('started_at', new Date(startTime).toISOString());

                if (navigator.sendBeacon) {
                    const blob = new Blob([new URLSearchParams(formData).toString()], {
                        type: 'application/x-www-form-urlencoded'
                    });
                    navigator.sendBeacon(window.App.routes.storeVisitorActivity, blob);
                }
            }
        });

        // Send periodically (every 30 seconds)
        setInterval(function () {
            if (isPageVisible) {
                const currentDuration = Math.floor((Date.now() - startTime) / 1000);
                if (currentDuration >= 30) {
                    sendActivity();
                    startTime = Date.now();
                    durationSeconds = 0;
                }
            }
        }, 30000);

        // Also handle pagehide event
        document.addEventListener('pagehide', function () {
            if (isPageVisible) {
                durationSeconds += Math.floor((Date.now() - startTime) / 1000);
            }

            const totalDuration = durationSeconds || Math.floor((Date.now() - startTime) / 1000);

            if (totalDuration >= 1) {
                const formData = new FormData();
                formData.append('_token', window.App.csrfToken);
                formData.append('url', window.location.href);
                formData.append('duration_seconds', totalDuration);
                formData.append('page_title', document.title);
                formData.append('started_at', new Date(startTime).toISOString());

                if (navigator.sendBeacon) {
                    const blob = new Blob([new URLSearchParams(formData).toString()], {
                        type: 'application/x-www-form-urlencoded'
                    });
                    navigator.sendBeacon(window.App.routes.storeVisitorActivity, blob);
                }
            }
        });
    })();
});
