<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
        	<span	span class="align-middle">ABC Company</span>
      	</a>
		<ul class="sidebar-nav">
			<li class="sidebar-item <?php echo $pagina == 'inicio' ? 'active' : 'true';?>">
				<a class="sidebar-link" href="?p=inicio">
            		<i class="align-middle" data-feather="disc"></i> <span class="align-middle">Inicio</span>
          		</a>
			</li>
			<li class="sidebar-header">
				Herramientas
			</li>
			<li class="sidebar-item <?php echo $pagina == 'usuarios' ? 'active' : 'true';?>">
				<a class="sidebar-link" href="?p=usuarios">
            		<i class="align-middle" data-feather="user"></i> <span class="align-middle">Gestión de usuarios</span>
          		</a>
			</li>
			<li class="sidebar-item <?php echo $pagina == 'productos' ? 'active' : 'true';?>">
				<a class="sidebar-link" href="?p=productos">
            		<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Gestión de productos</span>
          		</a>
			</li>
			<li class="sidebar-item <?php echo $pagina == 'contenedores' ? 'active' : 'true';?>">
				<a class="sidebar-link" href="?p=contenedores">
            		<i class="align-middle" data-feather="package"></i> <span class="align-middle">Gestión de contenedores</span>
          		</a>
			</li>
		</ul>
	</div>
</nav>