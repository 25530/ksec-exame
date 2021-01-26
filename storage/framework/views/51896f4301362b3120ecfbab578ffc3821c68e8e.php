<?php $__env->startSection('main'); ?>
<div align="right">
    <a href="<?php echo e(route('crud.create')); ?>" class="btn btn-success btn-sm">Upload</a>
</div>
<?php if($message = Session::get('succes')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>
<div class="col-md-4">
    <form action="/search" method="get">
    <div class="input-group">
    <input type="search" name="search" class="form-control">
    <span class="form-group-prepend">
        <button type="submit" class="btn btn-primary">Search</button>
        </span>
        </div>
        </form>
</div>
<table class="table table-bordered table-striped">

 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="videodiv">
  <video width="640" height="480" controls>
   <source src="<?php echo e(URL::to('/')); ?>/video/<?php echo e($row->video); ?>" >
    </video>
   <h1><?php echo e($row->title); ?></h1>
   <p><?php echo e($row->description); ?></p>
    <a href="<?php echo e(route('crud.show', $row->id)); ?>" class="btn btn-primary">Watch</a>
    <a href="<?php echo e(route('crud.edit', $row->id)); ?>" class="btn btn-warning">Edit</a>
    <form action="<?php echo e(route('crud.destroy', $row->id)); ?>" method="post"><?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
  </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php echo $data->links(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sexamen/resources/views/index.blade.php ENDPATH**/ ?>