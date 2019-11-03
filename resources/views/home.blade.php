@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Your  Are {{$userRole[0]->role_name}}
                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label text-md-right">  Set Current User Role</label>
                       <ul>
                            <li>
                                @if(Entrust::can('viewpost'))  
                                    view Post link
                                @endif
                            </li>
                            <li>
                                @if(Entrust::can('deletepost'))  
                                    delete Post
                                @endif
                            </li>
                            <li>
                                @if(Entrust::can('check'))  
                                    check
                                @endif
                            </li>
                            <li>
                                @if(Entrust::can('test'))  
                                    test 
                                @endif
                            </li>
                            <li>
                                @if(Entrust::can('addpost'))  
                                   add post
                                @endif
                            </li>
                            <li>
                                @if(Entrust::can('updatepost'))  
                                    update
                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
                <form action="{{route('user_role')}}" method="post">
                        @csrf
                        <div class="col-md-3">
                            <select class="form-control" name="id">
                            @foreach($role  as $rol)
                                <option value="{{$rol->id}}">{{$rol->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary"> save</button>
                        </div>
                    </form>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <main class="my-form">
                            <div class="cotainer">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                            <div class="card">
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div>{{$error}}</div>
                                                @endforeach
                                            @endif
                                            {{$userRole}}
                                                <div class="card-header">Add Permission</div>
                                                <div class="card-body">
                                                    <form name="my-form" action="{{route('add_permission')}}" method="post">
                                                    @csrf
                                                        <div class="form-group row">
                                                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="full_name" class="form-control" name="name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Display Name</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="email_address" class="form-control" name="Display_Name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="user_name" class="col-md-4 col-form-label text-md-right">Description</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="user_name" class="form-control" name="Details">
                                                            </div>
                                                        </div>
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <ul>
                                                        @foreach($permission as $per)
                                                            <li> {{$per->name}} </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                    </div>
                                    <br/>
                                    <div class="card">
                                                <div class="card-header">Add Roles</div>
                                                <div class="card-body">
                                                    <form name="my-form" action="{{route('add_role')}}" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="full_name" class="form-control" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Display Name</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="email_address" class="form-control" name="Display_Name">
                                                            </div>
                                                        </div>
                                                        @foreach($permission as $per)
                                                        <div class="form-group row">
                                                          <label for="email_address" class="col-md-4 col-form-label text-md-right"> {{$per->name}}</label>
                                                            <div class="col-md-6">
                                                                <input type="checkbox" id="email_address" value={{$per->id}} class="form-control" name="permission[]">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="form-group row">
                                                            <label for="user_name" class="col-md-4 col-form-label text-md-right">Description</label>
                                                            <div class="col-md-6">
                                                                <input type="text" id="user_name" class="form-control" name="Details">
                                                            </div>
                                                        </div>
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                </div>
                            </div>

                        </main>
                        
                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                                            You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
