<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>
  <body>
    <?php if(session()->has('message')): ?>
      <div class="alert alert-success">
        <?php echo e(session()->get('message')); ?>

      </div>
    <?php endif; ?>
    <form id="multistep-form" action="/captcha-vThree-submit" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
      <button class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.key')); ?>" data-callback='onSubmit' data-action='submit'>Verify Captcha</button>
      <span class="text-danger mt-4">
        <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <?php echo e($message); ?>

        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </span>
      <input type="submit" class="mt-4">
    </form>
  </body>
</html>


<script>
   function onSubmit(token) {
     document.getElementById("multistep-form").submit();
   }
 </script><?php /**PATH /home/rahulatal/Documents/generate_invoice/resources/views/captcha_v3.blade.php ENDPATH**/ ?>