<?php $__env->startSection('main'); ?>

<div class="jumbotron text-center">
 <div align="right">
  <a href="<?php echo e(route('crud.index')); ?>" class="btn btn-default">Back</a>
 </div>
 <br />
 <img src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($data->image); ?>" class="img-thumbnail" />
 <h3><?php echo e($data->title); ?> </h3>
 <p><?php echo e($data->description); ?></p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sexamen/resources/views/view.blade.php ENDPATH**/ ?>