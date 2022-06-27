@extends('layouts.app')

@section('title', 'Wish List')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Wish List
                    </div>
                    <div class="card-body">


                        <form action="{{ route('wish.list.store') }}" method="post" autocomplete="off">

                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    @if (session()->has('fail'))
                                        <p class="alert alert-warning">{{ session()->get('fail') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-2"></div>
                            </div>

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
                                    <input type="text" name="item" value="{{ old('item') }}" class="form-control"
                                        required>
                                </div>

                                <div class="col-md-2"></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4 wish_text">
                                    Enter Price
                                </div>

                                <div class="col-md-6">
                                    <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                                        required>
                                </div>

                                <div class="col-md-2"></div>
                            </div>

                            <div class="row mt-4 mb-3">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100">
                                        Save
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



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped table-responsive">
                    <thead>
                        <th>NO</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($wishs as $wish)
                           <tr>
                            <td>
                                {{$wish->id}}
                            </td>
                            <td>
                                {{$wish->item}}
                            </td>

                            <td>
                                {{$wish->price}}
                            </td>

                            <td>
                                <span >
                                    <a href="{{ route('wish.update' , $wish->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                                </span>

                                <span >
                                    <a href="{{route('wish.delete' , $wish->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </span>
                            </td>
                           </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-2">
                {!! $wishs->links('pagination::bootstrap-4') !!}
    
            </div>
        </div>
    </div>
    
@endsection
