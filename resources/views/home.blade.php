@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="alert alert-primary" role="alert">
                Welcome <span class="text-success">{{Auth::user()->name}}</span>
                
            </div>

            <p>
                <a class="btn btn-warning" data-bs-toggle="collapse" href="#waiting" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Waiting
                </a>
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#completed" aria-expanded="false" aria-controls="collapseExample">
                    Completed
                </button>
            </p>
            <div class="collapse" id="waiting">
                <div class="card card-body">
                   Waiting
                </div>
            </div>
            <div class="collapse" id="completed">
                <div class="card card-body">
                   Completed
                </div>
            </div>
    </div>
</div>
@endsection
