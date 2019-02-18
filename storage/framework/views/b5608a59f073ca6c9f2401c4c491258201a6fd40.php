<?php $__env->startSection('content'); ?>

<div class="card-body">
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <form class="login form" method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
            <div class="col-md-12">
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12 offset-md-4">
                <button type="submit" class="btn btn-login">
                    Enviar link de recuperação de senha
                </button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>