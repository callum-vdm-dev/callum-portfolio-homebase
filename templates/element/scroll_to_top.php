<a href="javascript:void(0);" id="scrollTopBtn" class="scroll-top-btn">
    <i class="fa fa-arrow-up"></i>
</a>

<style>
    .scroll-top-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 16px;
        font-size: 18px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 999;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.4s ease, opacity 0.4s ease;
        opacity: 0;
        transform: translateX(150%);
        pointer-events: none;
    }

    .scroll-top-btn.visible {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
    }

    .scroll-top-btn:hover {
        background-color: #0056b3;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollBtn = document.getElementById('scrollTopBtn');

        // Toggle visibility on scroll
        window.addEventListener('scroll', function () {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 500) {
                scrollBtn.classList.add('visible');
            } else {
                scrollBtn.classList.remove('visible');
            }
        });

        // Slow scroll to top
        function slowScrollToTop(duration = 1000) {
            const start = window.scrollY;
            const startTime = performance.now();

            function scrollStep(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const ease = 1 - Math.pow(1 - progress, 3);

                window.scrollTo(0, start * (1 - ease));

                if (progress < 1) {
                    requestAnimationFrame(scrollStep);
                }
            }

            requestAnimationFrame(scrollStep);
        }

        scrollBtn.addEventListener('click', function (e) {
            e.preventDefault();
            slowScrollToTop(2500); //change this for scroll amount of time
        });
    });
</script>
