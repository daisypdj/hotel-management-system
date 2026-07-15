<?php $__env->startSection('title'); ?>
My Reservations
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(Session::get("cancel")): ?>
<div class="alert alert-primary" role="alert">
	<?php echo e(Session::get("cancel")); ?>

</div>
<?php endif; ?>

<main>

    <!-- =======================
    Content START -->
    <section class="pt-3">
        <div class="container">
            <div class="row">

                <!-- Sidebar START -->
                <div class="col-lg-4 col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="offcanvasSidebar">
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header justify-content-end pb-2">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>

                        <!-- Offcanvas body -->
                        <div class="offcanvas-body p-3 p-lg-0">
                            <div class="card bg-light w-100">

                                <!-- Edit profile button -->
                                <div class="position-absolute top-0 end-0 p-3">
                                    <a href="#" class="text-primary-hover" data-bs-toggle="tooltip" data-bs-title="Edit profile">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>

                                <!-- Card body START -->
                                <div class="card-body p-3">
                                    <!-- Avatar and content -->
                                    <div class="text-center mb-3">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-xl mb-2">
                                            <img class="avatar-img rounded-circle border border-2 border-white" src="<?php echo e(asset('assets/images/avatar/06.jpg')); ?>" alt="">
                                        </div>
                                        <h6 class="mb-0"><?php echo e(auth()->user()->name); ?></h6>
                                        <a href="#" class="text-reset text-primary-hover small"><?php echo e(auth()->user()->email); ?></a>
                                        <hr>
                                    </div>

                                    <!-- Sidebar menu item START -->
                                    <!-- Sidebar menu item START -->
                                    <?php echo $__env->make('layouts.backoffice.customer.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <!-- Sidebar menu item END -->
                                    <!-- Sidebar menu item END -->
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <!-- Sidebar END -->

                <!-- Main content START -->
                <div class="col-lg-8 col-xl-9">

                    <!-- Offcanvas menu button -->
                    <div class="d-grid mb-0 d-lg-none w-100">
                        <button class="btn btn-primary mb-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i> Menu
                        </button>
                    </div>

                    <!-- Wishlist START -->
                    <div class="card border bg-transparent">
                        <!-- Card header -->
                        <div class="card-header bg-transparent border-bottom">
                            <h4 class="card-header-title">My Reservations</h4>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body vstack gap-4">
                            <!-- Select and button -->


                            <!-- Wishlist item START -->
                            <?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card shadow p-2">
                                <div class="row g-0">
                                    <!-- Card img -->
                                    <div class="col-md-3">
                                        <img src="<?php echo e(asset($reservation->Room_profile)); ?>" class="card-img rounded-2" alt="Card image">
                                    </div>

                                    <!-- Card body -->
                                    <div class="col-md-9">
                                        <div class="card-body py-md-2 d-flex flex-column h-100">

                                            <!-- Rating and buttons -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <ul class="list-inline small mb-0">
                                                    <li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
                                                    <li class="list-inline-item"><i class="fa-solid fa-star-half-alt text-warning"></i></li>
                                                </ul>


                                            </div>

                                            <!-- Title -->
                                            <h5 class="card-title mb-1"><?php echo e($reservation->hotel_name); ?>- Room Number <?php echo e($reservation->room_id); ?></h5>
                                            <small><i class="bi bi-geo-alt me-2"></i><?php echo e($reservation->hotel_town); ?></small>

                                            <!-- Price and Button -->
                                            <div class="d-sm-flex justify-content-sm-between align-items-center mt-3 mt-md-auto">
                                                <!-- Button -->
                                                <div class="d-flex align-items-center">
                                                    <h5 class="fw-bold mb-0 me-1"><?php echo e($reservation->total_price); ?> XAF</h5>

                                                </div>
                                                <!-- Price -->
                                                <div class="mt-3 mt-sm-0">
                                                    <form action="<?php echo e(route('customer.cancel',$reservation->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger w-100 mb-0">Cancel this reservation</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                No Reservation
                            <?php endif; ?>


                            <!-- Wishlist item END -->

                            <!-- Wishlist item START -->

                            <!-- Wishlist item END -->

                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Wishlist END -->

                </div>
                <!-- Main content END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Content END -->

    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice.customer.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\hotel-management-system\resources\views/customer/my-reservations.blade.php ENDPATH**/ ?>