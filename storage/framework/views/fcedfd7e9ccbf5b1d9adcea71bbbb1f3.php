

<?php $__env->startSection('contenido'); ?>

<h2 class="mb-3">Listado de Tareas</h2>

<?php if(session('ok')): ?>
    <div class="alert alert-success"><?php echo e(session('ok')); ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Contacto</th>
            <th>Provincia</th>
            <th>Fecha creación</th>
            <th>Fecha realización</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($t['id']); ?></td>
            <td><?php echo e($t['descripcion']); ?></td>
            <td><?php echo e($t['persona_contacto']); ?></td>
            <td><?php echo e($t['provincia']); ?></td>
            <td><?php echo e($t['fecha_creacion']); ?></td>
            <td><?php echo e($t['fecha_realizacion']); ?></td>

            <td class="text-center">
                <?php if(session('rol') === 'administrativo'): ?>
                    <a href="<?php echo e(route('tareas.editar', $t['id'])); ?>" class="btn btn-primary btn-sm">Modificar</a>

                    <form action="<?php echo e(route('tareas.eliminar', $t['id'])); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Seguro que deseas eliminar esta tarea?')">
                            Eliminar
                        </button>
                    </form>
                <?php elseif(session('rol') === 'operario'): ?>
                    <a href="<?php echo e(route('tareas.completar', $t['id'])); ?>" class="btn btn-success btn-sm">Completar</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('tareas.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\proyecto_tareas\resources\views/tareas/lista.blade.php ENDPATH**/ ?>