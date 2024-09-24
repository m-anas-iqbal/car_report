@extends('layout.master')

@section('content')
    <div class="termsBx">
        <div class="pageBanner">
            <h1 style="text-align: center">Sample Report</h1>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="/">Home</a>
                </li>
                <li class="list-inline-item">
                    /
                </li>
                <li class="list-inline-item active">
                    Sample Report
                </li>
            </ul>
        </div>
        <div class="container ">
            <div class="py-5">
                <div class="sampleReport">
                    <object data="{{asset('images/sample-report.pdf')}}" width="100%" height="100%">
                    </object>
                </div>
            </div>
        </div>
    </div>
@endsection