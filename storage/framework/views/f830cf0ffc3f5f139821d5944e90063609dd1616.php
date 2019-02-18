<?php $__env->startSection('content'); ?>
	<div class="container">
		<h1 class="title">
			Listagem <b><?php echo e($permissions->name); ?></b>
		</h1>

		<table class="table table-hover">
		<tr>
			<th>Nome</th>
			<th>Label</th>
			<th width="100px">Ações</th>
		</tr>
			<?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts', $role)): ?>
					<tr>
						<td><?php echo e($role->name); ?></td>
						<td><?php echo e($role->label); ?></td>
						<td>
							
							<form action="<?php echo e(url('/permission/detach', $role->id)); ?>" method="POST" style= "width: 32px; height: 32px; display: inline-block;" method="post" class="delete">
								<input type="hidden" name="_method" value="DELETE">
                				<?php echo e(csrf_field()); ?>

								<button style="background: transparent; border: none;" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-trash"></i></button>
							</form>
						</td>
					</tr>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<tr>
						<td colspan="90">
							<p>Nenhuma Função Cadastrada</p>
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
<?php echo $__env->make('dashboard.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>