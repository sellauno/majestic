@extends('layouts.layout')
@section('register', 'active')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">

                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <!-- <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">Role</label>
                              <div class="col-md-6">
                                <div class="dropdown">
                                    <select id="" name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <option value="client">Client</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Posisi</label>
                              <div class="col-md-6">
                              <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn">Dropdown</button> 
                                <div id="myDropdown" class="dropdown-content">
                                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                    <a href="#about">Admin</a>
                                    <a href="#base">User</a>
                                    <a href="#blog">C</a>
                                 </div>
                               </div>
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div> -->
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">Role</label>
                              <div class="col-md-6">
                                <div class="dropdown">
                                    <select id="role-regist" name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Posisi</label>
                                <div class="col-md-5">
                                    <div class="dropdown">
                                        <select id="posisi" name="posisi[]" class="form-control select2" multiple required>
                                            @foreach($posisi as $p)
                                            <option value="{{$p->posisi}}">{{$p->posisi}}</option>
                                            @endforeach
                                            <!-- <option>
                                                <form action="{{route('createPosisi')}}" method="POST">
                                                    <input type="text" name="posisi" onfocus="focused(this)" onfocusout="defocused(this)">
                                                </form>
                                                <div class="text-xxs" onclick="document.getElementById('form').click()">+ Tambah Posisi </div>
                                                <button id="btn-form" type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Form</button>
                                            </option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button id="btn-form" type="button" class="btn btn-link btn-default" data-bs-toggle="modal" data-bs-target="#modal-form"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h6 class="font-weight-bolder text-info text-gradient">Tambah Posisi</h6>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" action="{{route('createPosisi')}}" method="POST">
                                @csrf
                                <label>Posisi</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Posisi" name="posisi" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>
@endsection