<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Booking - Multipurpose Online Booking Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})

	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet" href="css2-1?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/font-awesome/css/all.min-1.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons-1.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/aos/aos.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/flatpickr/css/flatpickr.min-1.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/choices/css/choices.min.css')); ?>">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">

</head>

<body class="dashboard">

<!-- Header START -->
<?php echo $__env->make('layouts.backoffice.customer.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<?php echo $__env->yieldContent('content'); ?>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="bg-dark p-3">
	<div class="container">
		<div class="row align-items-center">

			<!-- Widget -->
			<div class="col-md-4">
				<div class="text-center text-md-start mb-3 mb-md-0">
					<a href="index.html-1.htm"> <img class="h-30px" src="assets/images/logo-light.svg" alt="logo"> </a>
				</div>
			</div>

			<!-- Widget -->
			<div class="col-md-4">
				<div class="text-muted text-primary-hover">Made By Denise Pegha ©2025 </div>
			</div>

			<!-- Widget -->
			<div class="col-md-4">
				<ul class="list-inline mb-0 text-center text-md-end">
					<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-facebook"></i></a></li>
					<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-instagram"></i></a></li>
					<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-linkedin-in"></i></a></li>
					<li class="list-inline-item ms-2"><a href="#"><i class="text-white fab fa-twitter"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="<?php echo e(asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Vendors -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="<?php echo e(asset('assets/vendor/flatpickr/js/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/choices/js/choices.min.js')); ?>"></script>

<!-- ThemeFunctions -->
<script src="<?php echo e(asset('assets/js/functions.js')); ?>"></script>

</body>
</html><?php /**PATH C:\laragon\www\hotel-management-system\resources\views/layouts/backoffice/customer/main.blade.php ENDPATH**/ ?>