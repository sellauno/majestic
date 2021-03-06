@extends('layouts.layout')
@section('account', 'active')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Account</div>
                    <div class="card-body">

                        <form action="{{ route('updateAccount', ['id' => $user->id]) }}" method="POST">
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
                                    <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Role</label>
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <select id="role-regist" name="role" class="form-control">
                                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                            <option value="user" @if($user->role == 'user') selected @endif>User</option>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Posisi</label>
                                <div class="col-md-6">
                                    <div class="dropdown">
                                        <select id="posisi" name="posisi" class="form-control select2" multiple required>
                                            @foreach($posisi as $p)
                                            <option value="{{$p->posisi}}" @if(str_contains($user->posisi, $p->posisi)) selected @endif>{{$p->posisi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" value="{{$user->email}}" name="email" required autofocus>
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
                                    Simpan
                                </button>
                            </div>
                        </form>

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