@extends('layouts.app')

@section('title' , 'Update wish list')
    

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Wish List Update
                </div>
                <div class="card-body">


                    <form action="{{route('wish.update.store' , $wish->id)}}" method="post" autocomplete="off">

                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                @if (session()->has('success'))
                                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                @if ($errors->any())
                                    
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger">{{$error}}</p>
                                        @endforeach                                    
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-4 wish_text">
                                Enter Item
                            </div>

                            <div class="col-md-6">
                                <input type="text" name="item" value="{{ $wish->item }}" class="form-control"
                                    required>
                            </div>

                            <div class="col-md-2"></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 wish_text">
                                Enter Price
                            </div>

                            <div class="col-md-6">
                                <input type="number" name="price" value="{{ $wish->price }}" class="form-control"
                                    required>
                            </div>

                            <div class="col-md-2"></div>
                        </div>

                        <div class="row mt-4 mb-3">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    Update
                                </button>
                            </div>

                            <div class="col-md-2"></div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection