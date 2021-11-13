@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Domov</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Registrácia</strong></div>
            </div>
        </div>
    </div>
    <!--- -------------------------------------------------------------------- -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-3 col-sm-2 col-12">
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-8 col-12 bg-light p-5 my-sm-5">
                <h2 class="mb-5">Registrácia</h2>
                <form>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-3">Email</label>
                        <input type="email" class="form-control col-9" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com">
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-3">Heslo</label>
                        <input type="password" class="form-control col-9" id="exampleInputPassword1" placeholder="********">
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-3">Heslo znovu</label>
                        <input type="password" class="form-control col-9" id="exampleInputPassword1" placeholder="********">
                    </div>
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="form-group form-check col-9">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Prečítal som si zmluvné podmienky eshopu HrajMi.sk a súhlasím s nimi <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="form-group form-check col-9">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Súhlasím so zasielaním newslettera od eshopu HrajMi.sk</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <button type="submit" class="btn btn-primary">Registrovať</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-4 col-lg-3 col-sm-2 col-12">
            </div>
        </div>
    </section>
@endsection
