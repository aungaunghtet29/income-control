@extends('layouts.app')
@section('title', 'Income')




@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Save Income</div>

                    <div class="card-body">

                        <form action="{{ route('income') }}" method="post" autocomplete="off">

                            @csrf

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    @if (session()->has('fail'))
                                        <p class="alert alert-warning">{{ session()->get('fail') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-6">
                                    @if (session()->has('success'))
                                        <p class="alert alert-success">{{ session()->get('success') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label>
                                        Enter Monthly Income Amount
                                    </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" name="income" class="form-control" required>
                                </div>

                                <div class="col-md-2">
                                    <select name="month" class="form-control" id="" required>

                                        <option disabled selected value>Select month</option>
                                        @php
                                            $months = ['january', 'febuary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
                                        @endphp

                                            @for ($i = 0; $i <= 11; $i++)
                                                <option value="{{ $months[$i] }}" @foreach ($incomes as $income)
                                                    @disabled($income->month == $months[$i])
                                                @endforeach>
                                                    {{ $months[$i]}}</option>
                                            @endfor


                                    </select>
                                </div>


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
                        <th>Month</th>
                        <th>Income</th>
                        <th>Saving</th>
                        <th>Tax</th>
                        <th>General Expenses</th>
                        <th>Extra Money</th>
                        <th>Total Extra</th>
                    </thead>

                    <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>
                                    {{ $income->month }}
                                </td>
                                <td>
                                    {{ $income->income }}
                                </td>
                                <td>
                                    {{ $income->save }}
                                </td>
                                <td>
                                    {{ $income->tax }}
                                </td>
                                <td>
                                    {{ $income->general }}
                                </td>
                                <td>
                                    {{ $income->extra }}
                                </td>
                                <td>
                                    {{$income->total_extra}}
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
                {!! $incomes->links('pagination::bootstrap-4') !!}

            </div>
        </div>
    </div>

@endsection
