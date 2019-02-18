<?php $__env->startSection('content'); ?>
	<div class="container">
		<h1 class="title">
			Listagem de posts
		</h1>

		<table class="table table-hover">
		<tr>
			<th>Titulo</th>
			<th>Resumo</th>
			<th width="100px">Ações</th>
		</tr>
			<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts', $post)): ?>
					<tr>
						<td><?php echo e($post->title); ?></td>
						<td><?php echo e($post->body); ?></td>
						<td>
							<a href="<?php echo e(url('/post/edit', $post->id)); ?>" class="edit">
								<i class="fa fa-pencil-square-o"></i>
							</a>
							<a href="<?php echo e(url('/post/edit', $post->id)); ?>" class="delete">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<tr>
						<td colspan="90">
							<p>Nenhum Post Cadastrado</p>
						</td>
					</tr>
			<?php endif; ?>
		</table>
	<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('painel.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>