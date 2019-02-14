@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Profile @stop
@section('page-header')  Payroll @stop

@section('content')

    <div class="d-md-flex flex-md-wrap">
        <div class="col-md-7 col-lg-offset-7">
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title"> Latest Payroll</h6>
                    <div class="header-elements">
                        <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save
                        </button>
                        <button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-md-flex flex-md-wrap">
                        <div class="col-md-6">
                            <div>
                                <ul class="list list-unstyled mb-0">
                                    <li>MEWA HOSPITAL</li>
                                    <li>P.O Box 98591</li>
                                    <li>020088533, 0788921477</li>
                                    <li>020088533, 0788921477</li>
                                    <li>mewahospital@mewa.or.ke</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 offset-3 ">
                            <div>
                                <img src="{{ asset('img/logo_35.jpg') }}" class="mb-3 mt-2" alt="" style="width: 150px">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-md-flex flex-md-wrap">
                        <div class="col-md-6">
                            <div >
                                <ul class="list list-unstyled mb-0">
                                    <li>NAME: NAJMA SAID</li>
                                    <li>STAFF NO: D146</li>
                                    <li>MONTH: OCTOBER 2017</li>
                                    <li>BANK: NATIONAL BANK OF KENYA</li>
                                    <li>BRANCH: NKURUMAH ROAD 12020</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div >
                                <ul class="list list-unstyled mb-0">
                                    <li>PIN: A005219477G</li>
                                    <li>NSSF: 21573582X</li>
                                    <li>NHIF: R3508179</li>
                                    <li>ACCOUNT: 0124510416200</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-border-dashed text-nowrap table-customers">
                            <thead>
                            <tr>
                                <th>EARNINGS</th>
                                <th>AMOUNT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Basic pay</td>
                                <td>25,299</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-6">

                        <table class="table table-border-dashed text-nowrap table-customers">
                            <thead>
                            <tr>
                                <th>DEDUCTIONS</th>
                                <th>amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Basic pay</td>
                                <td>25,299</td>
                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>

                <hr class="divider">

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-border-dashed text-nowrap table-customers">

                            <tbody>
                            <tr>
                                <td>Total EARNINGS</td>
                                @foreach($p as $t)
                                <td>{{ number_format($t->GrossPay) }}</td>
                                    @endforeach
                            </tr>
                            <tr>
                                <td>NET  PAY</td>
                                @foreach($p as $t)
                                    <td>{{ number_format($t->Netpay) }}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-md-6">

                        <table class="table table-border-dashed text-nowrap table-customers">
                            <tbody>
                            <tr>
                                <td>Total DEDUCTIONS</td>
                                @foreach($p as $t)
                                    <td>{{ number_format($t->TotalDeductions) }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>RELIEF</td>
                                @foreach($p as $t)
                                    <td>{{ number_format($t->TaxRelief) }}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@stop
