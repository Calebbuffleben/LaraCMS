<?php $__env->startSection('content'); ?>

<div class="relatorios">
	<div class="container">
		<ul class="relatorios">
			<li class="col-md-6 text-center">
				<a href="<?php echo e(url('/painel/posts')); ?>">
					<img src="<?php echo e(url('assets/painel/imgs/noticias-acl.png')); ?>" alt="Estilos" class="img-menu">
					<h1><?php echo e($posts); ?></h1>
				</a>
			</li>
			<li class="col-md-6 text-center">
				<a href="<?php echo e(url('/painel/roles')); ?>">
					<img src="<?php echo e(url('assets/painel/imgs/funcao-acl.png')); ?>" alt="Albuns" class="img-menu">
					<h1><?php echo e($roles); ?></h1>
				</a>
			</li>
			<li class="col-md-6 text-center">
				<a href="<?php echo e(url('/painel/permissions')); ?>">
					<img src="<?php echo e(url('assets/painel/imgs/permissao-acl.png')); ?>" alt="Musicas" class="img-menu">
					<h1><?php echo e($permissions); ?></h1>
				</a>
			</li>
			<li class="col-md-6 text-center">
				<a href="<?php echo e(url('/painel/users')); ?>">
					<img src="<?php echo e(url('assets/painel/imgs/perfil-acl.png')); ?>" alt="Meu Perfil" class="img-menu">
					<h1><?php echo e($users); ?></h1>
				</a>
			</li>
		</ul>
	</div>
</div><!--Relatorios-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>