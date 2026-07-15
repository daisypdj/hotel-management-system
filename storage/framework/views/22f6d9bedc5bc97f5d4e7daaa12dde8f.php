<?php $__env->startSection('title'); ?>
Liste of clients
<?php $__env->stopSection(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/choices/css/choices.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/dropzone/css/dropzone.css')); ?>">
<?php $__env->startSection('content'); ?>

<main>
<?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

<?php $__sessionArgs = ['danger'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
    <div class="alert alert-danger">
        <?php echo e(session('danger')); ?>

    </div>
<?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
    <!-- Widget START -->
    <div class="row g-4">



        <div class="card shadow mt-5">
            <!-- Card header START -->
            <div class="card-header border-bottom">
                <h5 class="card-header-title">Reservations</h5>
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body">
                <!-- Search and select START -->

                <!-- Search and select END -->

                <!-- Table head -->
                <div class="bg-light rounded p-3 d-none d-lg-block">
                    <div class="row row-cols-7 g-4">
                        <div class="col"><h6 class="mb-0">Name</h6></div>
                        <div class="col"><h6 class="mb-0">Email</h6></div>
                        <div class="col"><h6 class="mb-0">Telephone</h6></div>
                        <div class="col"><h6 class="mb-0">Action</h6></div>
                    </div>
                </div>

                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4">
                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Name:</small>
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->

                            <!-- Info -->
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light"><?php echo e($customer->name); ?></h6>
                            </div>
                        </div>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Email:</small>
                        <h6 class="mb-0 fw-normal"><?php echo e($customer->email); ?></h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Telephone:</small>
                        <h6 class="mb-0 fw-normal"><?php echo e($customer->phone); ?></h6>
                    </div>



                    <!-- Data item -->


                    <!-- Data item -->


                    <!-- Data item -->
                    <div class="col">
                        <form method="POST" action="<?php echo e(route('admin.customers.destroy',$customer->id)); ?>" onsubmit="return confirm('Etes vous sur?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-sm btn-danger mb-0"><i class="bi bi-trash"></i>Delete</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Table data -->






            </div>
            <!-- Card body END -->

            <!-- Card footer START -->

            <!-- Card footer END -->
        </div>
        <!-- Rooms END -->

        <!-- Upcoming Arrival START -->

        <!-- Reviews END -->
    </div>
    <!-- Widget END -->
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.backoffice.admin.main-admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\hotel-management-system\resources\views/admin/customer/index.blade.php ENDPATH**/ ?>