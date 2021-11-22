@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Registrácia</strong></div>
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
                <form method="POST" action="/registration">
                    @csrf
                    <div class="form-group row justify-content-end">
                        <label for="email" class="col-3">Email</label>
                        <input type="email" name="email" class="form-control col-9" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="example@gmail.com">
                        @error('email')
                        <small class="text-danger text-xs mt-1 text-align-left">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row justify-content-end">
                        <label for="password" class="col-3">Heslo</label>
                        <input type="password" name="password" class="form-control col-9" id="password" placeholder="********">
                        @error('password')
                        <small class="text-danger text-xs mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row justify-content-end">
                        <label for="password_again" class="col-3">Heslo znovu</label>
                        <input type="password" name="password_again" class="form-control col-9" id="password_again" placeholder="********">
                        @error('password_again')
                        <small class="text-danger text-xs mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="form-group form-check col-9">
                            <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                            <label class="form-check-label" for="checkbox">Prečítal som si zmluvné podmienky eshopu HrajMi.sk a súhlasím s nimi <span class="text-danger">*</span></label>
                            @error('checkbox')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="form-group form-check col-9">
                            <input type="checkbox" class="form-check-input" id="checkbox1">
                            <label class="form-check-label" for="checkbox1">Súhlasím so zasielaním newslettera od eshopu HrajMi.sk</label>
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
