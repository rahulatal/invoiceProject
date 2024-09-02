<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>
  <body>
    @if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif
    <form id="multistep-form" action="/captcha-vThree-submit" method="POST" enctype="multipart/form-data">
    @csrf
      <button class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}" data-callback='onSubmit' data-action='submit'>Verify Captcha</button>
      <span class="text-danger mt-4">
        @error('captcha')
            {{$message}}
        @enderror
      </span>
      <input type="submit" class="mt-4">
    </form>
  </body>
</html>


<script>
   function onSubmit(token) {
     document.getElementById("multistep-form").submit();
   }
 </script>