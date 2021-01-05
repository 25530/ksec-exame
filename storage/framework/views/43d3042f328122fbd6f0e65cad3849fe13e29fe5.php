<?php $__env->startSection('main'); ?>
            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div align="right">
                <a href="<?php echo e(route('crud.index')); ?>" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="<?php echo e(route('crud.update', $data->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
      <div class="form-group">
       <label class="col-md-4 text-right">Enter title</label>
       <div class="col-md-8">
        <input type="text" name="title" value="<?php echo e($data->title); ?>" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Enter description</label>
       <div class="col-md-8">
        <input type="text" name="description" value="<?php echo e($data->description); ?>" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Select Video</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($data->image); ?>" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="<?php echo e($data->image); ?>" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/sexamen/resources/views/edit.blade.php ENDPATH**/ ?>