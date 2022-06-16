@extends('layouts.layoutnomenu')
@section('content')
<main class="login-form">
  <div class="cotainer">
  <section class="vh-100" style="background-color: #F2D1D1; high:100%">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" />
              @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" />
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>  

  </div>
</main>
@endsection