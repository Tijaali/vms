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
                        <h4 class="card-title">Add new visitor</h4>
                        <form class="form-sample" action="{{ route('visitor.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <p class="card-description">
                                Personal info
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" placeholder="Name"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" placeholder="Last Name"
                                                class="form-control" />
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
                                                        value="Male" checked>
                                                    Male
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender"
                                                        value="Female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" placeholder="Password"
                                                class="form-control" maxlength="10" required="true" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">CNIC </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cnic_number" placeholder="XXXXX-XXXXXXX-X"
                                                class="form-control" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobilenumber" placeholder="Mobile Number"
                                                class="form-control" maxlength="10" required="true" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address2 </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address2" placeholder="Address"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address1 </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address1" placeholder="Address"
                                                class="form-control" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <p class="card-description">
                                Appointment info
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="category_id">
                                                @foreach (App\Models\VisitorCategory::allCategories() as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Depart</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="department_id">
                                                @foreach (App\Models\Department::allDepartments() as $depart)
                                                    <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">From </label>
                                        <div class="col-sm-9">
                                            <input type="datetime-local" class="form-control" name="from" />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">To </label>
                                        <div class="col-sm-9">
                                            <input type="datetime-local" class="form-control" name="to" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Visitee</label>
                                        <div class="col-sm-9">
                                            <input type="text" name='visitee' class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Purpose</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="purpose" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" >Photo</label>
                                        <div class="input-group col-sm-9">
                                            <input type="file" name="image" class="form-control file-upload-info" />
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
