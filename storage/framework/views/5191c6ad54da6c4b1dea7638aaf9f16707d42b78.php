<?php $__env->startSection('content'); ?>
<div class="container">
	<h1>Posts</h1>
	<br/>
	<hr>
	<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts', $post)): ?>
			<p><?php echo e($post->title); ?> | <a href="<?php echo e(url('/post/edit', $post->id)); ?>">Editar</a></p>
			<p><?php echo e($post->description); ?></p>
			<form method="POST" action="<?php echo e(url('/post/delete', $post->id)); ?>">
			    <input type="hidden" name="_method" value="DELETE">
			    <?php echo e(csrf_field()); ?>

			    <button class="button button_small" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">
			    	Deletar
				</button>
			</form>
			<hr>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<p>Nenhum Post.</p>
	<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>