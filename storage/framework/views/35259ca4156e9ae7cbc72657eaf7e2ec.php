<?php $__env->startSection('title'); ?>
Nouvelle réceptionniste
<?php $__env->stopSection(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/choices/css/choices.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/dropzone/css/dropzone.css')); ?>">
<?php $__env->startSection('content'); ?>

<main>

    <!-- =======================
    Page Banner START -->
    <section class="pt-4 pt-md-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto text-center">
                    <h1 class="fs-2 mb-2">Nouvelle réceptionniste</h1>
                    <p class="text-muted">Ce compte pourra scanner les QR codes de paiement à la réception.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Main content START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form class="vstack gap-4" action="<?php echo e(route('admin.receptionnistes.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card shadow">
                            <div class="card-header border-bottom">
                                <h5 class="mb-0">Informations de la réceptionniste</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Nom</label>
                                        <input type="text" required name="name" value="<?php echo e(old('name')); ?>" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" type="email" required value="<?php echo e(old('email')); ?>" placeholder="Entrer l'email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Téléphone</label>
                                        <input class="form-control" name="phone" required type="number" value="<?php echo e(old('phone')); ?>" placeholder="Entrer le numéro de téléphone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mot de passe</label>
                                        <input class="form-control" name="password" type="password" required placeholder="Entrer le mot de passe">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mb-0"><i class="bi bi-plus-lg me-1"></i>Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main content END -->

</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.backoffice.admin.main-admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\hotel-management-system\resources\views/admin/receptionniste/create.blade.php ENDPATH**/ ?>