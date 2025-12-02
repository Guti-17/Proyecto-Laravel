

<?php $__env->startSection('contenido'); ?>

<h2 class="mb-3">Completar Tarea</h2>

<form method="POST" action="<?php echo e(route('tareas.completar.guardar', $tarea['id'])); ?>">
    <?php echo csrf_field(); ?>

    <!-- Campos solo lectura -->
    <div class="mb-2">
        <label>NIF/CIF</label>
        <input class="form-control" value="<?php echo e($tarea['nif_cif']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Persona de contacto</label>
        <input class="form-control" value="<?php echo e($tarea['persona_contacto']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Descripción</label>
        <textarea class="form-control" readonly><?php echo e($tarea['descripcion']); ?></textarea>
    </div>

    <div class="mb-2">
        <label>Teléfono</label>
        <input class="form-control" value="<?php echo e($tarea['telefono']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Correo</label>
        <input class="form-control" value="<?php echo e($tarea['correo']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Dirección</label>
        <input class="form-control" value="<?php echo e($tarea['direccion']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Población</label>
        <input class="form-control" value="<?php echo e($tarea['poblacion']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Código postal</label>
        <input class="form-control" value="<?php echo e($tarea['codigo_postal']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Provincia</label>
        <input class="form-control" value="<?php echo e($tarea['provincia']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Operario</label>
        <input class="form-control" value="<?php echo e($tarea['operario']); ?>" readonly>
    </div>

    <div class="mb-2">
        <label>Fecha realización</label>
        <input type="date" class="form-control" value="<?php echo e($tarea['fecha_realizacion']); ?>" readonly>
    </div>

    <!-- Estado -->
    <div class="mb-3">
        <label>Estado</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="estado" value="completada" checked>
            <label class="form-check-label">Completada</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="estado" value="cancelada" <?php echo e($tarea['estado'] === 'cancelada' ? 'checked' : ''); ?>>
            <label class="form-check-label">Cancelada</label>
        </div>
    </div>

    <!-- Anotaciones posteriores -->
    <div class="mb-3">
        <label>Anotaciones posteriores</label>
        <textarea class="form-control" name="anotaciones_despues"><?php echo e($tarea['anotaciones_despues']); ?></textarea>
    </div>

    <button class="btn btn-success">Guardar</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('tareas.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\proyecto_tareas\resources\views/tareas/completar.blade.php ENDPATH**/ ?>