<?php $__env->startSection('mainview'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<div class='col-4 mx-4'>

    <form action ="<?php echo e(url('empregado/edit/'.$id)); ?>" method="post">
        <?php echo csrf_field(); ?>

    <div class="row mb-3">
            <label for="FormControlInputTitle" class="form-label">Nome</label>
            <input type="text" class="formInsert-control" name="nome" id="nome" value="<?=$nome?>" placeholder="<?=$nome?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Cargo</label>
            <input type="number" min="1" max="3" class="form-control" name="cargo" id="cargo" value="<?=$cargo?>" placeholder="<?=$cargo?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Endereço</label>
            <textarea  type ="text" class="form-control" name="endereco" id="endereco" value="<?=$endereco?>" placeholder="<?=$endereco?>"></textarea>
        </div>

        <div class="row mb-3">
            <label for="FormControlInputPrice" class="form-label">Salario (U$)</label>
            <input type="text" class="form-control" name="salario" id="salario" value="<?=$salario?>" placeholder="<?=$salario?>">
        </div>


        <button type="submit" class="btn btn-primary">Update person</button>




    </form>



</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pedro/example-app/resources/views/pages/formedit.blade.php ENDPATH**/ ?>