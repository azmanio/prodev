<!-- Vendor JS Files -->
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Ikon Hide
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.innerHTML = '<i class="fa fa-eye"></i>'; // Ikon Show
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const passwordConfirmInput = document.getElementById('password-confirm');
        const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirm');

        togglePasswordConfirmButton.addEventListener('click', function() {
            if (passwordConfirmInput.type === 'password') {
                passwordConfirmInput.type = 'text';
                togglePasswordConfirmButton.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Ikon Hide
            } else {
                passwordConfirmInput.type = 'password';
                togglePasswordConfirmButton.innerHTML = '<i class="fa fa-eye"></i>'; // Ikon Show
            }
        });
    });
</script>
