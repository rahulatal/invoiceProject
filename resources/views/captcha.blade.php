<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    @if(session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif
    <form id="multistep-form" action="/captcha-submit" method="POST" enctype="multipart/form-data">
    @csrf
      @if(config('services.recaptcha.key'))
        <div class="g-recaptcha"
            data-sitekey="{{config('services.recaptcha.key')}}">
        </div>
        <span class="text-danger mt-4">
          @error('g-recaptcha-response')
              {{$message}}
          @enderror
        </span>
      @endif
      <div>
        <input type="submit" class="mt-4">
        </div>
    </form>
  </body>
</html>