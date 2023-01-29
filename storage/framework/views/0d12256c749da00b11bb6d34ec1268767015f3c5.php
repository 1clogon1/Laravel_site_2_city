<!--Наследование-->




<?php $__env->startSection('title'); ?>
    Авторизация
<?php $__env->stopSection(); ?>



<?php $__env->startSection('main_content'); ?>

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-7">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Авторизоваться</h2>

                    <form action="<?php echo e(route('login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example1cg">Логин</label>
                            <input type="text" name="login" id="login" class="form-control form-control-lg" required placeholder="Введите логин"/><br>
                            <?php $__errorArgs = ['fio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" required placeholder="Введите пароль"/><br>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div><br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-dark">Авторизоваться</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/Maksim/web/trifonov-m4.сделай.site/public_html/resources/views/login.blade.php ENDPATH**/ ?>