 <?php $__env->startSection('title','Product Edit'); ?> <?php $__env->startSection('css'); ?>
<style>
  .increment_btn,
  .remove_btn,
  .btn-warning {
    margin-top: -17px;
    margin-bottom: 10px;
  }
</style>
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/backEnd')); ?>/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary rounded-pill">Manage</a>
        </div>
        <h4 class="page-title">Product Edit</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="<?php echo e(route('products.update')); ?>" method="POST" class="row" data-parsley-validate="" enctype="multipart/form-data" name="editForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="<?php echo e($edit_data->id); ?>" name="id" />
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="name" class="form-label">Product Name *</label>
                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($edit_data->name); ?>" id="name" required="" />
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="category_id" class="form-label">Categories *</label>
                <select class="form-control form-select select2 <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category_id" value="<?php echo e(old('category_id')); ?>" required>
                  <optgroup>
                    <option value="">Select..</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if($edit_data->category_id==$category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                    <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($childCategory->id); ?>" <?php if($edit_data->category_id==$childCategory->id): ?> selected <?php endif; ?>>- <?php echo e($childCategory->name); ?></option>
                    } <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </optgroup>
                </select>
                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="subcategory_id" class="form-label">SubCategories (Optional)</label>
                <select class="form-control form-select select2-multiple <?php $__errorArgs = ['subcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="subcategory_id" name="subcategory_id" data-placeholder="Choose ...">
                  <optgroup>
                    <option value="">Select..</option>
                    <?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->subcategoryName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </optgroup>
                </select>
                <?php $__errorArgs = ['subcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
             <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="childcategory_id" class="form-label">Child Categories (Optional)</label>
                <select class="form-control form-select select2-multiple <?php $__errorArgs = ['childcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="childcategory_id" name="childcategory_id" data-placeholder="Choose ...">
                  <optgroup>
                    <option value="">Select..</option>
                    <?php $__currentLoopData = $childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->childcategoryName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </optgroup>
                </select>
                <?php $__errorArgs = ['childcategory_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="brand_id" class="form-label">Brands</label>
                <select class="form-control select2 <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('brand_id')); ?>" name="brand_id">
                  <option value="">Select..</option>
                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php if($edit_data->brand_id==$value->id): ?> selected <?php endif; ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="purchase_price" class="form-label">Purchase Price *</label>
                <input type="text" class="form-control <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="purchase_price" value="<?php echo e($edit_data->purchase_price); ?>" id="purchase_price" required />
                <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="old_price" class="form-label">Old Price *</label>
                <input type="text" class="form-control <?php $__errorArgs = ['old_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="old_price" value="<?php echo e($edit_data->old_price); ?>" id="old_price" />
                <?php $__errorArgs = ['old_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="new_price" class="form-label">New Price *</label>
                <input type="text" class="form-control <?php $__errorArgs = ['new_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_price" value="<?php echo e($edit_data->new_price); ?>" id="new_price" required />
                <?php $__errorArgs = ['new_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock *</label>
                <input type="text" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="stock" value="<?php echo e($edit_data->stock); ?>" id="stock" />
                <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col-end -->

            
              
              
                
                
                  
                
                
                
                  
                
                
              

              
                
                  
                  
                    
                  
                
              
              
                
                
                
                
              
            
            <!-- col end -->

            
            <div class="col-sm-12 mb-3">
              <label for="image">Add New Image <small class="text-muted">(Sort Order 0 = মূল ছবি)</small></label>

              <div class="clone hide" style="display: none;">
                <div class="control-group mb-2">
                  <div class="row">
                    <div class="col-sm-4"><input type="file" name="image[]" class="form-control" /></div>
                    <div class="col-sm-3"><input type="text" name="alt_text[]" class="form-control" placeholder="Alt text" /></div>
                    <div class="col-sm-3"><input type="text" name="image_title[]" class="form-control" placeholder="Image title" /></div>
                    <div class="col-sm-1"><input type="number" name="sort_order[]" class="form-control" value="<?php echo e($edit_data->images->count()); ?>" min="0" /></div>
                    <div class="col-sm-1"><button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button></div>
                  </div>
                </div>
              </div>

              <div class="control-group increment mb-2">
                <div class="row">
                  <div class="col-sm-4">
                    <input type="file" name="image[]" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-sm-3"><input type="text" name="alt_text[]" class="form-control" placeholder="Alt text" /></div>
                  <div class="col-sm-3"><input type="text" name="image_title[]" class="form-control" placeholder="Image title" /></div>
                  <div class="col-sm-1"><input type="number" name="sort_order[]" class="form-control" value="<?php echo e($edit_data->images->count()); ?>" min="0" /></div>
                  <div class="col-sm-1"><button class="btn btn-success btn-increment" type="button"><i class="fa fa-plus"></i></button></div>
                </div>
              </div>

              <?php if($edit_data->images->count()): ?>
                <hr>
                <label>Existing Images</label>
                <?php $__currentLoopData = $edit_data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row align-items-center mb-2 existing-image-row">
                    <div class="col-sm-2">
                      <img src="<?php echo e(asset($image->image)); ?>" class="edit-image border" alt="" />
                    </div>
                    <div class="col-sm-3">
                      <input type="text" name="existing_alt[<?php echo e($image->id); ?>]" class="form-control" value="<?php echo e($image->alt_text); ?>" placeholder="Alt text" />
                    </div>
                    <div class="col-sm-3">
                      <input type="text" name="existing_title[<?php echo e($image->id); ?>]" class="form-control" value="<?php echo e($image->title); ?>" placeholder="Image title" />
                    </div>
                    <div class="col-sm-2">
                      <input type="number" name="existing_sort[<?php echo e($image->id); ?>]" class="form-control" value="<?php echo e($image->sort_order); ?>" min="0" />
                    </div>
                    <div class="col-sm-2">
                      <a href="<?php echo e(route('products.image.destroy',['id'=>$image->id])); ?>" class="btn btn-xs btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></a>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
            <!-- col end -->
            

            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="pro_unit" class="form-label">Product Unit (Optional)</label>
                <input type="text" class="form-control <?php $__errorArgs = ['pro_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pro_unit" value="<?php echo e($edit_data->pro_unit); ?>" id="pro_unit" />
                <?php $__errorArgs = ['pro_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="pro_video" class="form-label">Product Video (Optional)</label>
                <input type="text" class="form-control <?php $__errorArgs = ['pro_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pro_video" value="<?php echo e($edit_data->pro_video); ?>" id="pro_video" />
                <?php $__errorArgs = ['pro_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="roles" class="form-label">Size (Optional)</label>
                <select class="form-control select2" name="proSize[]" multiple="multiple">
                  <option value="">Select</option>
                  <?php $__currentLoopData = $totalsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalsize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($totalsize->id); ?>" <?php $__currentLoopData = $selectsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectsize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($totalsize->id == $selectsize->size_id): ?>selected="selected"<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($totalsize->sizeName); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php $__errorArgs = ['sizes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="color" class="form-label">Color (Optional)</label>
                <select class="form-control select2" name="proColor[]" multiple="multiple">
                  <option value="">Select..</option>
                  <?php $__currentLoopData = $totalcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalcolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($totalcolor->id); ?>" <?php $__currentLoopData = $selectcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectcolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($totalcolor->id == $selectcolor->color_id): ?> selected="selected" <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($totalcolor->colorName); ?> </option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['colors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
             <!--col end -->

            
            <div class="col-sm-6">
              <div class="form-group mb-3">
                <label for="h1_title" class="form-label">H1 Title (Optional)</label>
                <input type="text" class="form-control <?php $__errorArgs = ['h1_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="h1_title" value="<?php echo e(old('h1_title', $edit_data->h1_title)); ?>" id="h1_title" />
                <?php $__errorArgs = ['h1_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="model_no" class="form-label">Model No</label>
                <input type="text" class="form-control <?php $__errorArgs = ['model_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="model_no" value="<?php echo e(old('model_no', $edit_data->model_no)); ?>" id="model_no" />
                <?php $__errorArgs = ['model_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="mpn" class="form-label">MPN</label>
                <input type="text" class="form-control <?php $__errorArgs = ['mpn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mpn" value="<?php echo e(old('mpn', $edit_data->mpn)); ?>" id="mpn" />
                <?php $__errorArgs = ['mpn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="gtin" class="form-label">GTIN / Barcode</label>
                <input type="text" class="form-control <?php $__errorArgs = ['gtin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gtin" value="<?php echo e(old('gtin', $edit_data->gtin)); ?>" id="gtin" />
                <?php $__errorArgs = ['gtin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="warranty" class="form-label">Warranty</label>
                <input type="text" class="form-control <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="warranty" value="<?php echo e(old('warranty', $edit_data->warranty)); ?>" id="warranty" placeholder="1 Year Service Warranty" />
                <?php $__errorArgs = ['warranty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3">
              <div class="form-group mb-3">
                <label for="availability_status" class="form-label">Availability</label>
                <select class="form-control <?php $__errorArgs = ['availability_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="availability_status" id="availability_status">
                  <option value="in_stock" <?php if(old('availability_status', $edit_data->availability_status)=='in_stock'): ?> selected <?php endif; ?>>In Stock</option>
                  <option value="out_of_stock" <?php if(old('availability_status', $edit_data->availability_status)=='out_of_stock'): ?> selected <?php endif; ?>>Out of Stock</option>
                  <option value="pre_order" <?php if(old('availability_status', $edit_data->availability_status)=='pre_order'): ?> selected <?php endif; ?>>Pre Order</option>
                  <option value="on_request" <?php if(old('availability_status', $edit_data->availability_status)=='on_request'): ?> selected <?php endif; ?>>On Request</option>
                </select>
                <?php $__errorArgs = ['availability_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="call_for_price" class="d-block">Call for Price</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="call_for_price" <?php if($edit_data->call_for_price==1): ?> checked <?php endif; ?>>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="delivery_info" class="form-label">Delivery Info</label>
                <input type="text" class="form-control <?php $__errorArgs = ['delivery_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="delivery_info" value="<?php echo e(old('delivery_info', $edit_data->delivery_info)); ?>" id="delivery_info" />
                <?php $__errorArgs = ['delivery_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="installation_info" class="form-label">Installation Info</label>
                <input type="text" class="form-control <?php $__errorArgs = ['installation_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="installation_info" value="<?php echo e(old('installation_info', $edit_data->installation_info)); ?>" id="installation_info" />
                <?php $__errorArgs = ['installation_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="service_info" class="form-label">Service Info</label>
                <input type="text" class="form-control <?php $__errorArgs = ['service_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="service_info" value="<?php echo e(old('service_info', $edit_data->service_info)); ?>" id="service_info" />
                <?php $__errorArgs = ['service_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="short_description" class="form-label">Short Description (২-৩ লাইন)</label>
                <textarea name="short_description" id="short_description" rows="3" class="form-control <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('short_description', $edit_data->short_description)); ?></textarea>
                <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->

            <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" rows="6" class="summernote form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($edit_data->description); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            
              <div class="col-sm-6 mb-3">
                  <div class="form-group">
                      <label for="features" class="form-label">Features (প্রতি লাইনে একটা)</label>
                      <textarea name="features" id="features" rows="5" class="form-control"><?php echo e(old('features', implode("\n", $edit_data->features ?? []))); ?></textarea>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-6 mb-3">
                  <div class="form-group">
                      <label for="benefits" class="form-label">Benefits (প্রতি লাইনে একটা)</label>
                      <textarea name="benefits" id="benefits" rows="5" class="form-control"><?php echo e(old('benefits', implode("\n", $edit_data->benefits ?? []))); ?></textarea>
                  </div>
              </div>
              <!-- col end -->

              <div class="col-sm-12 mb-3">
                  <label class="form-label">Specifications</label>
                  <div class="clone-spec" style="display: none;">
                      <div class="row spec-row mb-2">
                          <div class="col-sm-3"><input type="text" name="spec_group[]" class="form-control" placeholder="Group (Display)" /></div>
                          <div class="col-sm-4"><input type="text" name="spec_name[]" class="form-control" placeholder="Name (Size)" /></div>
                          <div class="col-sm-4"><input type="text" name="spec_value[]" class="form-control" placeholder="Value (15.6 inch)" /></div>
                          <div class="col-sm-1"><button class="btn btn-danger btn-spec-remove" type="button"><i class="fa fa-trash"></i></button></div>
                      </div>
                  </div>
                  <div class="row spec-row mb-2 spec-increment">
                      <div class="col-sm-3"><input type="text" name="spec_group[]" class="form-control" placeholder="Group (Display)" /></div>
                      <div class="col-sm-4"><input type="text" name="spec_name[]" class="form-control" placeholder="Name (Size)" /></div>
                      <div class="col-sm-4"><input type="text" name="spec_value[]" class="form-control" placeholder="Value (15.6 inch)" /></div>
                      <div class="col-sm-1"><button class="btn btn-success btn-spec-add" type="button"><i class="fa fa-plus"></i></button></div>
                  </div>
                  <?php $__currentLoopData = ($edit_data->specifications ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="row spec-row mb-2">
                          <div class="col-sm-3"><input type="text" name="spec_group[]" class="form-control" value="<?php echo e($spec['group'] ?? ''); ?>" /></div>
                          <div class="col-sm-4"><input type="text" name="spec_name[]" class="form-control" value="<?php echo e($spec['name'] ?? ''); ?>" /></div>
                          <div class="col-sm-4"><input type="text" name="spec_value[]" class="form-control" value="<?php echo e($spec['value'] ?? ''); ?>" /></div>
                          <div class="col-sm-1"><button class="btn btn-danger btn-spec-remove" type="button"><i class="fa fa-trash"></i></button></div>
                      </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <!-- col end -->


           <div class="col-sm-12 mb-3">
              <div class="form-group">
                <label for="note" class="form-label">Note</label>
                <textarea name="note" rows="6" class=" form-control <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($edit_data->note); ?></textarea>
                <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->

              <div class="col-sm-12"><hr><h5>SEO Settings</h5></div>
              <div class="col-sm-6">
                  <div class="form-group mb-3">
                      <label for="meta_title" class="form-label">Meta Title</label>
                      <input type="text" maxlength="191" class="form-control <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="meta_title" value="<?php echo e(old('meta_title', $edit_data->meta_title)); ?>" id="meta_title" />
                      <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-6">
                  <div class="form-group mb-3">
                      <label for="focus_keyword" class="form-label">Focus Keyword</label>
                      <input type="text" maxlength="150" class="form-control <?php $__errorArgs = ['focus_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="focus_keyword" value="<?php echo e(old('focus_keyword', $edit_data->focus_keyword)); ?>" id="focus_keyword" />
                      <?php $__errorArgs = ['focus_keyword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-12 mb-3">
                  <div class="form-group">
                      <label for="meta_description" class="form-label">Meta Description (১৫০-১৬০ অক্ষর)</label>
                      <textarea name="meta_description" id="meta_description" rows="3" class="form-control <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('meta_description', $edit_data->meta_description)); ?></textarea>
                      <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-6 mb-3">
                  <div class="form-group">
                      <label for="meta_keyword" class="form-label">Meta Keyword (Optional)</label>
                      <textarea name="meta_keyword" id="meta_keyword" rows="3" class="form-control"><?php echo e(old('meta_keyword', $edit_data->meta_keyword)); ?></textarea>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-6 mb-3">
                  <div class="form-group">
                      <label for="secondary_keywords" class="form-label">Secondary Keywords</label>
                      <textarea name="secondary_keywords" id="secondary_keywords" rows="3" class="form-control"><?php echo e(old('secondary_keywords', $edit_data->secondary_keywords)); ?></textarea>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-4">
                  <div class="form-group mb-3">
                      <label for="meta_robots" class="form-label">Meta Robots</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['meta_robots'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="meta_robots" value="<?php echo e(old('meta_robots', $edit_data->meta_robots ?: 'index,follow')); ?>" id="meta_robots" />
                      <?php $__errorArgs = ['meta_robots'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-4">
                  <div class="form-group mb-3">
                      <label for="canonical_url" class="form-label">Canonical URL (সাধারণত ফাঁকা)</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['canonical_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="canonical_url" value="<?php echo e(old('canonical_url', $edit_data->canonical_url)); ?>" id="canonical_url" />
                      <?php $__errorArgs = ['canonical_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              <!-- col end -->
              <div class="col-sm-4">
                  <div class="form-group mb-3">
                      <label for="og_image" class="form-label">OG Image (ফাঁকা থাকলে প্রথম ছবি)</label>
                      <input type="text" class="form-control <?php $__errorArgs = ['og_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="og_image" value="<?php echo e(old('og_image', $edit_data->og_image)); ?>" id="og_image" />
                      <?php $__errorArgs = ['og_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
              </div>
              <!-- col end -->

             <div class="col-sm-3 mb-3">
              <div class="form-group mb-3">
                <label for="sold" class="form-label">Sold</label>
                <input type="text" class="form-control <?php $__errorArgs = ['sold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sold" value="<?php echo e($edit_data->sold); ?>" id="sold" />
                <?php $__errorArgs = ['sold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="status" <?php if($edit_data->status==1): ?>checked <?php endif; ?>>
                  <span class="slider round"></span>
                </label>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="topsale" class="d-block">Hot Deals</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="topsale" <?php if($edit_data->topsale==1): ?>checked <?php endif; ?>>
                  <span class="slider round"></span>
                </label>
                <?php $__errorArgs = ['topsale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            
            <!-- col end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="flashsale" class="d-block">Flash Sales</label>
                <label class="switch">
                  <input type="checkbox" value="1" name="flashsale" <?php if($edit_data->flashsale==1): ?>checked <?php endif; ?>>
                  <span class="slider round"></span>
                </label>
                <?php $__errorArgs = ['flashsale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <!-- col end -->
            
            <div>
              <input type="submit" class="btn btn-success" value="Submit" />
            </div>
          </form>
        </div>
        <!-- end card-body-->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->
  </div>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-validation.init.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs/select2/js/select2.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/pages/form-advanced.init.js"></script>
<!-- Plugins js -->
<script src="<?php echo e(asset('public/backEnd/')); ?>/assets/libs//summernote/summernote-lite.min.js"></script>
<script>
  $(".summernote").summernote({
    placeholder: "Enter Your Text Here",
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $(".btn-spec-add").click(function () {
      var html = $(".clone-spec").html();
      $(".spec-increment").after(html);
    });
    $("body").on("click", ".btn-spec-remove", function () {
      $(this).parents(".spec-row").remove();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $(".btn-increment").click(function () {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function () {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".increment_btn").click(function () {
      var html = $(".clone_price").html();
      $(".increment_price").after(html);
    });
    $("body").on("click", ".remove_btn", function () {
      $(this).parents(".increment_control").remove();
    });
    $(".select2").select2();
  });

  // category to sub
  $("#category_id").on("change", function () {
    var ajaxId = $(this).val();
    if (ajaxId) {
      $.ajax({
        type: "GET",
        url: "<?php echo e(url('ajax-product-subcategory')); ?>?category_id=" + ajaxId,
        success: function (res) {
          if (res) {
            $("#subcategory_id").empty();
            $("#subcategory_id").append('<option value="0">Choose...</option>');
            $.each(res, function (key, value) {
              $("#subcategory_id").append('<option value="' + key + '">' + value + "</option>");
            });
          } else {
            $("#subcategory_id").empty();
          }
        },
      });
    } else {
      $("#subcategory_id").empty();
    }
  });

  // subcategory to childcategory
  $("#subcategory_id").on("change", function () {
    var ajaxId = $(this).val();
    if (ajaxId) {
      $.ajax({
        type: "GET",
        url: "<?php echo e(url('ajax-product-childcategory')); ?>?subcategory_id=" + ajaxId,
        success: function (res) {
          if (res) {
            $("#childcategory_id").empty();
            $("#childcategory_id").append('<option value="0">Choose...</option>');
            $.each(res, function (key, value) {
              $("#childcategory_id").append('<option value="' + key + '">' + value + "</option>");
            });
          } else {
            $("#childcategory_id").empty();
          }
        },
      });
    } else {
      $("#childcategory_id").empty();
    }
  });
</script>
<script type="text/javascript">
  document.forms["editForm"].elements["category_id"].value = "<?php echo e($edit_data->category_id); ?>";
  document.forms["editForm"].elements["subcategory_id"].value = "<?php echo e($edit_data->subcategory_id); ?>";
  document.forms["editForm"].elements["childcategory_id"].value = "<?php echo e($edit_data->childcategory_id); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\poslogic\resources\views/backEnd/product/edit.blade.php ENDPATH**/ ?>