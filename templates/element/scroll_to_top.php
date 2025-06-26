<a href="javascript:void(0);" id="scrollTopBtn" class="btn btn-primary btn-lg-square rounded-circle">
    <i class="fa fa-arrow-up"></i>
</a>

<style>
    #scrollTopBtn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        display: none;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 16px;
        font-size: 18px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 999;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background 0.3s ease;
    }

    #scrollTopBtn:hover {
        background-color: #0056b3;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const scrollBtn = document.getElementById('scrollTopBtn');

        // Show the button near the bottom of the page
        window.addEventListener('scroll', function () {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                scrollBtn.style.display = 'block';
            } else {
                scrollBtn.style.display = 'none';
            }
        });

        // Custom smooth scroll function
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
            slowScrollToTop(2500); //change this for different scroll speeds
        });
    });
</script>
