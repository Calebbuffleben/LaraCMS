<?php $__env->startSection('content'); ?>
<div class="container">
	<h1 class="title">
		Adicionar Usuário	
	</h1>

	<form class="form" method="POST" action="<?php echo e(url('/user/store')); ?>">
		<?php echo csrf_field(); ?>
		<div class="form-group">
			<input type="text" name="name" placeholder="Insira o Nome" class="form-control" required autofocus>
		</div>
		<div class="form-group">
			<input type="text" name="email" placeholder="Insira o email" class="form-control" required>
		</div>
		<div class="form-group">
			<select class="form-control" type="" name="role">
				<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div class="form-group">
			<input type="password" name="password" placeholder="Insira a senha" class="form-control" required>
		</div>
		<div class="form-group">
			<input type="password" name="mine" placeholder="Teste" class="form-control" required>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Registrar</button>
		</div>
	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>