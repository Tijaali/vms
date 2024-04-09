@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">Add new roles</h4>
                        <form class="form-sample" action="{{route('role.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Role</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" placeholder="Role"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Permissions</label>
                                            <div class="col-sm-9">
                                                <select select class="form-control js-example-basic-multiple" name="permission_id[]" multiple="multiple">
                                                    @foreach ($permissions  as $permission)
                                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 float-sm-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection