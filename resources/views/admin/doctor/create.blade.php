@extends('layouts.admin')

@section('stylesheet')
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <section class="panel">
            <header class="panel-heading">
              <h2 class="panel-title">Create Doctor</h2>
            </header>
            <div class="panel-body">
              @if(\App\Helper\CustomHelper::canView('List Of Division', 'Super Admin'))
              <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                  <a href="{{ route('doctor.list') }}" class="brn btn-success btn-sm">List of Doctor</a>
                </div>
              </div>
              @endif
              @if(session()->has('status'))
                {!! session()->get('status') !!}
              @endif

              <form action="{{ route('doctor.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">Department<span class="text-danger">*</span></label>
                            <select name="department_id" required class="form-control @error('department_id') is-invalid @enderror">
                                <option value="">Choose a Department</option>
                                @foreach($datas2 as $statys)
                                <option value="{{ $statys->name }}"
                                        @if(old('department_id') == $statys->name) selected @endif>{{ ucfirst($statys->name) }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <strong class="text-danger">{{ $errors->first('department_id') }}</strong>
                            @enderror
                        </div>
                    </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" placeholder="Name" autocomplete="off" required
                             value="{{ old('name') }}"
                             class="form-control @error('name') is-invalid @enderror">
                      @error('name')
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Phone</label>
                      <input type="text" name="phone" placeholder="Phone" autocomplete="off"
                             value="{{ old('phone') }}"
                             class="form-control @error('phone') is-invalid @enderror">
                      @error('phone')
                      <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Fee</label>
                      <input type="number" name="fee" placeholder="Fee" autocomplete="off"
                             value="{{ old('fee') }}"
                             class="form-control @error('fee') is-invalid @enderror">
                      @error('fee')
                      <strong class="text-danger">{{ $errors->first('fee') }}</strong>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-right">
                    <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection
