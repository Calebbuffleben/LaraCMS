<?php $__env->startSection('content'); ?>
<div class="container">
	<h1 class="title">
		Editar Usuário	
	</h1>
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
	<?php endif; ?>;

	<form class="form" method="POST" action="<?php echo e(url('user/update', $user->id)); ?>">
		<?php echo csrf_field(); ?>
		<div class="form-group">
			<input type="text" name="name" placeholder="Insira o Nome" class="form-control" value="<?php echo e($user->name); ?>" autofocus>
		</div>
		<div class="form-group">
			<input type="text" name="email" placeholder="Insira o email" class="form-control" value="<?php echo e($user->email); ?>">
		</div>
		<div class="form-group">
			<select class="form-control" type="" name="role">
				<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div class="form-group">
			<input type="password" name="password" placeholder="Insira a senha" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" name="mine" placeholder="Confirme a senha" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Registrar</button>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>