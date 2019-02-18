<?php $__env->startSection('content'); ?>

<h1>Editar posts</h1>

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
<form action="<?php echo e(url('posts/update', $post->id)); ?>" method="post">
	<?php echo csrf_field(); ?>

	<input type="hidden" name="_method" value="PUT">

	<div class="form-group">
		<input class="form-control" type="text" name="title" placeholder="Título" value="<?php echo e($post->title); ?>">
	</div>
	<div class="form-group">
		<textarea class="form-control" name="body" cols="30" rows="5" placeholder="Conteúdo" value="<?php echo e($post->body); ?>"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>