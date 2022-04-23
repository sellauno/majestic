@extends('layouts.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>New Client</h6>
                </div>
                <div class="card-body">
                    <form role="form text-left">
                    <div class="row form-group">
                        <div class="col col-md-2"><label>Nama client</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" placeholder="Name" aria-label="Name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-1"><label>Reels</label></div>
                        <div class="col-12 col-md-1">
                            <input type="number" class="form-control" placeholder="Name" aria-label="Name">
                        </div>
                        <div class="col col-md-1"><label>Tiktok</label></div>
                        <div class="col-12 col-md-1">
                            <input type="number" class="form-control" placeholder="Name" aria-label="Name">
                        </div>
                        <div class="col col-md-1"><label>Feeds</label></div>
                        <div class="col-12 col-md-1">
                            <input type="number" class="form-control" placeholder="Name" aria-label="Name">
                        </div>
                        <div class="col col-md-1"><label>Stories</label></div>
                        <div class="col-12 col-md-1">
                            <input type="text" class="form-control" placeholder="Name" aria-label="Name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label>Nama client</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control" placeholder="Name" aria-label="Name">
                        </div>
                    </div>
                        <div class="mb-3">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        </div>
                        <div class="form-check form-check-info text-left">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                        </div>
                        <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection