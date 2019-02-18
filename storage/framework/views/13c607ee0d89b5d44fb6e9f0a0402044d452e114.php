<?php $__env->startSection('content'); ?>


<?php if($errors->any()): ?>
	<div class="alert alert-danger">
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
<?php endif; ?>

<?php if(session('success')): ?>
	<div class="alert alert-success">
		<?php echo e(session('success')); ?>

	</div>
<?php endif; ?>
<div class="container">
	<h1>Editar Funções</h1>
	<form class="form" action="<?php echo e(url('role/update', $roles->id)); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<div class="form-group">
			<input value="<?php echo e($roles->name); ?>" class="form-control" type="text" name="name">
		<!--	<input class="form-control" type="hidden" name="id" value=""> -->
		</div>
		<div class="form-group">
			<select class="form-control" type="" name="permission">
				<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="label" value="<?php echo e($roles->label); ?>">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Editar Função</button>
		</div>
	</form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>