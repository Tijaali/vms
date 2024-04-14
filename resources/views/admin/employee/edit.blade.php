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
                        <h4 class="card-title">Add new securityOfficer</h4>
                        <form class="form-sample" action="{{route('empoylee.update',[$securityOfficer->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p class="card-description">
                                Personal info
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" placeholder="Name"
                                                class="form-control" value="{{old('fname',$securityOfficer->name)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" placeholder="Email"
                                                class="form-control" value="{{old('email',$securityOfficer->email)}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" placeholder="Password"
                                                class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender"
                                                        value="Male"  {{ $securityOfficer->gender == 'Male' ? 'checked' : '' }}>
                                                    Male
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender"
                                                        value="Female" {{ $securityOfficer->gender == 'Female' ? 'checked' : '' }}>
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="datetime-local" class="form-control" name="date_of_birth" value="{{old('date_of_birth',$securityOfficer->date_of_birth)}}"/>
                                            </div>
                                        </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobilenumber" placeholder="Mobile Number"
                                                class="form-control" maxlength="10" required="true" value="{{old('mobilenumber',$securityOfficer->mobilenumber)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">CNIC </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cnic_number" placeholder="XXXXX-XXXXXXX-X"
                                                class="form-control" value="{{old('cnic_number',$securityOfficer->cnic_number)}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address1 </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address1" placeholder="Address"
                                                class="form-control" value="{{old('address1',$securityOfficer->address1)}}"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address2 </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address2" placeholder="Address"
                                                class="form-control" value="{{old('address2',$securityOfficer->address2)}}"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <p class="card-description">
                                Employeement info
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Designation </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="designation" placeholder="Designation"
                                                class="form-control" value="{{old('designation',$securityOfficer->designation)}}"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Depart</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="department_id">
                                                @foreach (App\Models\Department::allDepartments() as $depart)
                                                    <option value="{{ $depart->id }}" @if ($depart->id==$securityOfficer->depart->id)
                                                        selected
                                                    @endif>{{ $depart->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Shift start timing </label>
                                        <div class="col-sm-9">
                                            <input type="datetime-local" class="form-control" name="shift_start" value="{{old('shift_start',$securityOfficer->shift_start)}}"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Shift end timing  </label>
                                        <div class="col-sm-9">
                                            <input type="datetime-local" class="form-control" name="shift_end" value="{{old('shift_end',$securityOfficer->shift_end)}}"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Joinig date</label>
                                        <div class="col-sm-9">
                                            <input type="datetime-local" class="form-control" name="joing_date" value="{{old('joing_date',$securityOfficer->joing_date)}}" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" >Photo</label>
                                        <div class="input-group col-sm-9">
                                            <input type="file" name="image" class="form-control file-upload-info" />
                                            <img src="/storage/{{ $securityOfficer->image }}" width="50px" height="45px">
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
