@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="alert alert-info" role="alert">
            All Clients
        </div>
       
    </div>
    <div class="row mt-1">
        <!-- All Clients -->
        <div class="col-sm-9">
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
                <table id="clients" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>TIN/Tel</th>
                            <th>Email/Address</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- @if ($clients != '') -->
                    <tbody>
                        @foreach ($clients as $client )
                            
                        <tr>
                            <td>1</td>
                            <td>{{$client->cname}}</td>
                            <td>{{$client->ctin}} / {{$client->ctel}}</td>
                            <td>{{$client->cemail}} <br> {{$client->caddress}}</td>
                            <td>{{$client->created_at}}</td>
                            <td>
                                <a href="" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{ url('clients/clientAppointment/'.$client->id)}}" class="btn btn-warning" ><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!-- @endif -->
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>TIN/Tel</th>
                            <th>Email/Address</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Client</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('add.client')}}" method="post">
                      
                        @csrf
                        <div class="mb-3">
                            <label for="names" class="form-label">Client Names</label>
                            <input type="text" class="form-control form-control-sm" name="cname"  placeholder="Enter Names">
                            @error('cname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">Client TIN</label>
                            <input type="text" class="form-control form-control-sm" name="ctin"  placeholder="Enter TIN">
                            @error('ctin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">Client Email</label>
                            <input type="email" class="form-control form-control-sm" name="cemail"  placeholder="Enter Email">
                            @error('cemail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">Client Tel</label>
                            <input type="text" class="form-control form-control-sm" name="ctel"  placeholder="Enter Phone">
                            @error('ctel')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="names" class="form-label">Client Address</label>
                            <input type="text" class="form-control form-control-sm" name="caddress"  placeholder="Enter Address">
                            @error('caddress')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Client</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
