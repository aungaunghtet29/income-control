@extends('layouts.app')

@section('title', 'Manage income')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Manage Income
                    </div>
                    <div class="card-body">

                        @foreach ($incomes as $income)
                            <div class="row ">
                                <div class="col-md-6 text-center">
                                    {{ $income->month }}
                                </div>
                                @foreach ($wishs as $wish)
                                    @if ($income->total_extra > $wish->price)
                                        {{ $wish->item}}
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
