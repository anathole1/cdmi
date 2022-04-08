@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="alert alert-info" role="alert">
            All Appointments
        </div>
       
    </div>
    <div class="row mt-1">
        <div class="col-md-10 offset-1">
            <p>
                <a class="btn btn-sm btn-warning" data-bs-toggle="collapse" href="#wait" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-pause" aria-hidden="true"></i> Waiting Approval
                </a>
                <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#completed" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-list-alt" aria-hidden="true"></i> Completed
                </button>
                <button class="btn btn-sm btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#allAppoints" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-bars" aria-hidden="true"></i> All Declaration
                </button>
            </p>
            <div class="collapse" id="wait">
                <div class="card card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                     @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                    <div class="table-responsive">
                        <table id="waiting" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Tin</th>
                                    <th>From date</th>
                                    <th>To Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach ($waiting as $appointment )
                                    
                                <tr>
                                    <td>{{$appointment->id}}</td>
                                    <td>{{$appointment->client->cname}}</td>
                                    <td>{{$appointment->client->ctin}}</td>
                                    <td>{{$appointment->up_date}}</td>
                                    <td>{{$appointment->appoint_date}}</td>
                                    <td>{{$appointment->status}}</td>
                                    <td >
                                        <a href="" class="btn btn-sm btn-success " ><i class="fa fa-check-circle-o" aria-hidden="true"></i> Declare</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                
                        </table>
                    </div>
                </div>
            </div>
            <div class="collapse" id="completed">
                <div class="card card-body">
                    <div class="table-responsive">
                        <table id="complete" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Tin</th>
                                    <th>From date</th>
                                    <th>To Date</th>
                                    <th>Declaration Date</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($completed as $appointment )
                                    
                                <tr>
                                    <td>{{$appointment->id}}</td>
                                    <td>{{$appointment->client->cname}}</td>
                                    <td>{{$appointment->client->ctin}}</td>
                                    <td>{{$appointment->up_date}}</td>
                                    <td>{{$appointment->appoint_date}}</td>
                                    <td>{{$appointment->updated_at}}</td>
                                    <td class="bg-success text-center text-white">{{$appointment->status}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
            <div class="collapse" id="allAppoints">
                <div class="card card-body">
                    <div class="table-responsive">
                        <table id="AllAppoint" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Tin</th>
                                    <th>From date</th>
                                    <th>To Date</th>
                                    <th>Declaration Date</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($AllAppoints as $appointment )
                                    
                                <tr>
                                    <td>{{$appointment->id}}</td>
                                    <td>{{$appointment->client->cname}}</td>
                                    <td>{{$appointment->client->ctin}}</td>
                                    <td>{{$appointment->up_date}}</td>
                                    <td>{{$appointment->appoint_date}}</td>
                                    <td>{{$appointment->updated_at}}</td>
                                    <td class="text-center text-white {{($appointment->status == 'Initialized')? 'bg-warning':'bg-success'}}">{{$appointment->status}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
