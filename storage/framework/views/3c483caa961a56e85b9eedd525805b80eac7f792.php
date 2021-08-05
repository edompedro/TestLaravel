<?php $__env->startSection('mainview'); ?>

<?php if(session()->has('success')): ?>
  <div class="alert alert-info" role="alert">
    <strong> <?php echo e(session('success')); ?> </strong>
  </div>
<?php endif; ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">
      <a href="/sorting"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
        <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zm-8.46-.5a.5.5 0 0 1-1 0V3.707L2.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L4.5 3.707V13.5z"/>
      </svg></a>
      Nome

      </th>

      <th scope="col">cargo</th>
      <th scope="col">endereço</th>
      <th scope="col">salario</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>

  <?php $__currentLoopData = $empregadoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <th scope="row"> <?php echo e($item->id); ?></th>
    <td> <?php echo e($item->nome); ?> </td>
    <td> <?php echo e($item->cargo); ?> </td>
    <td> <?php echo e($item->endereco); ?> </td>
    <td> <?php echo e($item->salario); ?> </td>
    <td><a href="<?php echo e(url('/empregado/edit/'.$item->id)); ?>" class="btn btn-info">Edit</a></td>
    <td><a href="<?php echo e(url('/empregado/delete/'.$item->id)); ?>" class="btn btn-danger" onClick="return confirmDialog();" >Delete</a></td>

    <script>
    function confirmDialog() {
        return confirm("Are you sure you want to delete this empoyler?")
    }
    </script>


  </tr>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  </tbody>

</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/pedro/example-app/resources/views/pages/formview.blade.php ENDPATH**/ ?>