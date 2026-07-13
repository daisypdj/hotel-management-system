<?php $__env->startSection('title'); ?>
Liste des réceptionnistes
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
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-header-title mb-0">Réceptionnistes</h5>
                <a href="<?php echo e(route('admin.receptionnistes.create')); ?>" class="btn btn-sm btn-primary mb-0">
                    <i class="bi bi-plus-lg me-1"></i>Créer une réceptionniste
                </a>
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body">
                <!-- Table head -->
                <div class="bg-light rounded p-3 d-none d-lg-block">
                    <div class="row row-cols-4 g-4">
                        <div class="col"><h6 class="mb-0">Nom</h6></div>
                        <div class="col"><h6 class="mb-0">Email</h6></div>
                        <div class="col"><h6 class="mb-0">Téléphone</h6></div>
                        <div class="col"><h6 class="mb-0">Action</h6></div>
                    </div>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $receptionnistes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receptionniste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="row row-cols-xl-4 align-items-lg-center border-bottom g-4 px-2 py-4">
                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Nom:</small>
                        <div class="d-flex align-items-center">
                            <div class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle me-2">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <h6 class="mb-0 fw-light"><?php echo e($receptionniste->name); ?></h6>
                        </div>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Email:</small>
                        <h6 class="mb-0 fw-normal"><?php echo e($receptionniste->email); ?></h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Téléphone:</small>
                        <h6 class="mb-0 fw-normal"><?php echo e($receptionniste->phone); ?></h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <form method="POST" action="<?php echo e(route('admin.receptionnistes.destroy',$receptionniste->id)); ?>" onsubmit="return confirm('Êtes-vous sûr ?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-sm btn-danger mb-0"><i class="bi bi-trash"></i> Supprimer</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted mt-3">Aucune réceptionniste enregistrée pour le moment.</p>
                <?php endif; ?>
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Widget END -->
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.backoffice.admin.main-admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\hotel-management-system\resources\views/admin/receptionniste/index.blade.php ENDPATH**/ ?>