@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Maap... </div>

                <div class="card-body">
                    <h3>Maap.....  anjeun te gaduh akses... sok nyuhun keun akses na ka mimin....</h3>
                </div>
                <div class="card-footer">
                    {{ $exception->getMessage();}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

