

<?php $__env->startSection('contenido'); ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm" style="width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Iniciar sesión</h3>

            
            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login.acceder')); ?>">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <hr class="my-4">

            <p class="text-center text-muted mb-0" style="font-size: 0.9rem;">
                © <?php echo e(date('Y')); ?> Tu Empresa. Todos los derechos reservados.
            </p>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('tareas.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\proyecto_tareas\resources\views/tareas/login.blade.php ENDPATH**/ ?>