@extends ('main')

@section('titulu')
    Login
@endsection

@section ('konteudu')
<section class="vh-100" style="background-color: #2B6224;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-4 col-xl-3">
            <form action="" method="POST" class="row g-8">
                @csrf
              <div class="card shadow-1-strong" style="border-radius: 1rem;">
           
                <div class="mt-2 image text-center">
                    <img src="dist/img/sdsdsdsdsds.png" class="img-fluid" alt="User Image" style="width: 100px; height: 60px; display: inline-block;">
                </div>

                <div class="card-body p-5 text-center">
                    
                <h3 class="mb-3">Login</h3>
    
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label small">Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Username">
                </div>
    
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label small">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
    
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
    
                <hr class="my-2">
    
                </div>
            </form>    
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection