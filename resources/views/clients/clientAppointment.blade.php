@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="alert alert-info" role="alert">
            Add Appointment
            <span style="float:right">
                <a href="{{route('all.client')}}" class="nav-link">Back</a>
            </span>
        </div>
       
    </div>
    <div class="row mt-1">
        <!-- Add Appointments Clients -->

        <div class="col-sm-6 offset-sm-3">
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Appointment To client</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('add.appoints')}}" method="post">
                      
                        @csrf
                    
                        <div class="mb-3">
                            <label for="names" class="form-label">Client Names</label>
                            <input type="text" class="form-control form-control-sm" name="cname" value="{{$client->cname}}"  readonly>
                            @error('cname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">Client Email</label>
                            <input type="text" class="form-control form-control-sm" name="cemail" value="{{$client->cemail}}"  readonly>
                            @error('cemail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">from Date</label>
                            <input type="date" class="form-control form-control-sm" name="up_date"  placeholder="Enter Address">
                            @error('up_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">to Date</label>
                            <input type="date" class="form-control form-control-sm" name="appdate"  placeholder="Enter Address">
                            @error('appdate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="cid" value="{{$client->id}}">
                        
                        <div class="mb-3">
                          <button class="btn btn-sm btn-success"><i class="fa fa-clock-o"></i> Add Appointment</button>
                        </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
