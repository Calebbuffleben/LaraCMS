<?php $__env->startSection('content'); ?>

<form class="login form" method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>

    <div class="form-group row">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

            <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

            <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-12 offset-md-12">
            <button type="submit" class="btn btn-login">
                <?php echo e(__('Login')); ?>

            </button>

            <?php if(Route::has('password.request')): ?>
                <a class="recuperar" href="<?php echo e(route('password.request')); ?>">Recuperar senha?</a>
            <?php endif; ?>
            <div class="form-check" >
                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><label class="form-check-label recuperar" style="margin-left: -10px;" for="remember">Lembre-me</label>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>