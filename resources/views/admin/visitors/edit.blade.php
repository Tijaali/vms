@extends('admin.common.layout')
@section('content')
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit visitor</h4>
                            <form class="form-sample" action="{{route('visitor.update',[$visitor->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <p class="card-description">
                                    Personal info
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fname" placeholder="First Name"  class="form-control" value="{{old('fname',$visitor->fname)}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Last Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="lname" placeholder="Last Name" class="form-control" value="{{old('lname',$visitor->lname)}}"/>
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
                                                <input type="radio" class="form-check-input" name="gender" value="Male" {{ $visitor->gender == 'Male' ? 'checked' : '' }}>
                                                Male
                                              </label>
                                            </div>
                                          </div>
                                          <div class="col-sm-5">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" value="Female" {{ $visitor->gender == 'Female' ? 'checked' : '' }}>
                                                Female
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="true" value="{{old('mobilenumber',$visitor->mobilenumber)}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CNIC </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="cnic_number" placeholder="XXXXX-XXXXXXX-X" class="form-control" value="{{old('cnic_number',$visitor->cnic_number)}}" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address1" placeholder="Address" class="form-control" value="{{old('address1',$visitor->address1)}}" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address2" placeholder="Address" class="form-control" value="{{old('address2',$visitor->address2)}}" />
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
                                                    <option value="{{$category->id}}" @if ($category->id==$visitor->category->id)
                                                        selected
                                                    @endif>{{$category->name}}</option>
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
                                                    <option value="{{$depart->id}}" @if ($visitor->depart && $depart->id == $visitor->depart->id)
                                                        selected
                                                    @endif>{{$depart->name}}</option>
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
                                                <input type="datetime-local" class="form-control" name="from"  value="{{old('from',$visitor->from)}}"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">To </label>
                                            <div class="col-sm-9">
                                                <input type="datetime-local" class="form-control" name="to" value="{{old('to',$visitor->to)}}" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Visitee</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='visitee' class="form-control" value="{{old('visitee',$visitor->visitee)}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Purpose</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="purpose" class="form-control" value="{{old('purpose',$visitor->purpose)}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="image" class="form-control file-upload-info">
                                        <img src="/storage/{{ $visitor->image }}" width="300px" height="300px">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
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
