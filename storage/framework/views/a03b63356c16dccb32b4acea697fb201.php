<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        
        <a class="navbar-brand" href="<?php echo e(session('usuario') ? route('tareas.lista') : route('login')); ?>">
            Proyecto Tareas
        </a>

        <div class="d-flex align-items-center">
            <?php if(session('usuario')): ?>
                
                <span class="text-light me-3">
                    <?php if(session('rol') === 'administrativo'): ?>
                        <i class="bi bi-shield-lock-fill"></i> Administrador
                    <?php else: ?>
                        <i class="bi bi-person-fill"></i> Operario
                    <?php endif; ?>
                </span>

                
                <a class="btn btn-outline-light me-2" href="<?php echo e(route('tareas.lista')); ?>">Inicio</a>

                <?php if(session('rol') === 'administrativo'): ?>
                    <a class="btn btn-success me-2" href="<?php echo e(route('tareas.crear')); ?>">Crear tarea</a>
                <?php endif; ?>

                <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>">Cerrar sesión</a>
            <?php else: ?>
                <a class="btn btn-primary" href="<?php echo e(route('login')); ?>">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container">
    <?php echo $__env->yieldContent('contenido'); ?>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\proyecto_tareas\resources\views/tareas/layout.blade.php ENDPATH**/ ?>