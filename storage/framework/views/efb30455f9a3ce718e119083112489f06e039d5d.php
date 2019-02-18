<?php $__env->startSection('content'); ?>

<h1>Cadastrar posts</h1>

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
<form action="<?php echo e(url('post/store')); ?>" method="POST" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	<div class="form-group">
		<input class="form-control" type="text" name="title" placeholder="Título">
	</div>
	<div class="form-group">
		<input class="form-control" type="file" name="image">
	</div>
	<div class="form-group">
		<textarea class="form-control" name="body" cols="30" rows="5" placeholder="Conteúdo"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>