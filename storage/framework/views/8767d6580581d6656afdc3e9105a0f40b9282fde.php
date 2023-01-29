<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>

    <header>
    <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a  class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      </a>

        <?php if(auth()->guard()->guest()): ?>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?php echo e(route('welcome')); ?>" class="nav-link px-2 link-secondary">Главная</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a class="nav-link px-2 link-dark" href="<?php echo e(route('login')); ?>">Login</a></li>
        <li><a  class="nav-link px-2 link-dark" href="<?php echo e(route('register')); ?>">Register</a></li>
      </ul>

      </div>
       <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a  class="nav-link px-2 link-secondary" >Главная</a></li>
        <li><a  class="nav-link px-2 link-dark" href="<?php echo e(route('profile')); ?>">Профиль</a></li>

        <li><a  class="nav-link px-2 link-dark" href="<?php echo e(route('admin')); ?>">Админ панель</a></li>

      </ul>

      <div class="col-md-3 text-end">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                  <li><a class="nav-link px-2 link-dark" href="<?php echo e(route('login')); ?>">Login</a></li>
        <li><a  class="nav-link px-2 link-dark" href="<?php echo e(route('register')); ?>">Register</a></li>
          <li><a  class="nav-link px-2 link-dark" href="<?php echo e(route('logout')); ?>">Выйти</a></li>
        </ul>
      </div>
         <?php endif; ?>

    </header>
  </div>
</header>


    <div class="container py-3">
        <?php echo $__env->yieldContent('main_content'); ?>
    </div>
      <div class="container py-3">
        <?php echo $__env->yieldContent('slider_4'); ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH /home/Maksim/web/trifonov-m4.сделай.site/public_html/resources/views/view.blade.php ENDPATH**/ ?>