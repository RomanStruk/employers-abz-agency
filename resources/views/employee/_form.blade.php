<div class="form-group">
    <label class="col-form-label" for="photoFile">
        @error('photo')<i class="far fa-times-circle"></i>@enderror Photo
    </label>
    @isset($employee->photo)

        <img class="img-bordered d-block mb-2" src="{{asset('storage/image/employee/origin/'.$employee->photo)}}" alt="..." height="150" width="150">
    @endisset
    <div class="custom-file">
        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photoFile" name="photo">
        <label class="custom-file-label" for="photoFile">Choose photo</label>
    </div>
    @error('photo')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted float-right">
        File format jpg, png up to 5MB, the minimum size of 300x300px
    </small>
</div>

{{--Name--}}
<div class="form-group">
    <label class="col-form-label" for="inputName">@error('name')<i class="far fa-times-circle"></i>@enderror
        Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Enter ..."
           name="name" value="{{ $employee->name ?? old('name') }}">
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted  float-right">
        Must be 2-256 characters long.
    </small>
</div>

{{--Phone--}}
<div class="form-group">
    <label class="col-form-label" for="inputPhone">
        @error('phone')<i class="far fa-times-circle"></i>@enderror Phone
    </label>
    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Enter ..."
           name="phone" value="{{ $employee->phone ?? old('phone') }}">
    @error('phone')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        {{--        Invalid phone number--}}
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted float-right">
        Required format +380(xx)XXX XX XXX
    </small>
</div>

{{--Email--}}
<div class="form-group">
    <label class="col-form-label" for="inputEmail">
        @error('email')<i class="far fa-times-circle"></i>@enderror Email
    </label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Enter ..."
           name="email" value="{{ $employee->email ?? old('email') }}">
    @error('email')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

{{--Position--}}
<div class="form-group">
    <label class="col-form-label" for="inputPosition">
        @error('position_id')<i class="far fa-times-circle"></i>@enderror Position
    </label>
    <select class="form-control select2 @error('position_id') is-invalid @enderror" style="width: 100%;" name="position_id" id="inputPosition">
        @isset($employee->position)
            <option selected="selected" value="{{$employee->position->id}}">{{$employee->position->name}}</option>
        @endisset
    </select>
    @error('position_id')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        {{--        Invalid Position--}}
    </div>
    @enderror
</div>

{{--Salary--}}
<div class="form-group">
    <label class="col-form-label" for="inputSalary">
        @error('salary')<i class="far fa-times-circle"></i>@enderror Salary, $
    </label>
    <input type="text" class="form-control @error('salary') is-invalid @enderror" id="inputSalary"
           placeholder="Enter ..."
           name="salary" value="{{ $employee->salary ?? old('salary') }}">
    @error('salary')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        {{--        Maximum 500,000--}}
    </div>
    @enderror
    <small class="text-muted float-right">
        Must be 0-500,000 characters long.
    </small>
</div>

{{--Head--}}
<div class="form-group">
    <label class="col-form-label" for="inputHead">
        @error('parent_id')<i class="far fa-times-circle"></i>@enderror Head
    </label>
    <select class="form-control select2 @error('parent_id') is-invalid @enderror" style="width: 100%;" name="parent_id"
            id="inputHead">
        @isset($employee->parent)
        <option selected="selected" value="{{$employee->parent->id}}">{{$employee->parent->name}}</option>
        @endisset
    </select>
    @error('parent_id')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
{{--        There is no such person in the database--}}
    </div>
    @enderror
</div>


{{--Date of employment--}}
<div class="form-group">
    <label class="col-form-label" for="date_of_employment">
        @error('date_of_employment')<i class="far fa-times-circle"></i>@enderror Date of employment
    </label>
    <input type="text" class="form-control datetimepicker-input @error('date_of_employment') is-invalid @enderror"
           id="date_of_employment"
           data-toggle="datetimepicker" data-target="#date_of_employment" name="date_of_employment"
           value="{{ isset($employee->date_of_employment) ? $employee->date_of_employment->format(config('setting.date_format')) : old('date_of_employment') }}"/>
    @error('date_of_employment')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted float-right">
        Must be valid date.
    </small>
</div>
<div class="clearfix"></div>
@isset($employee->created_at)
    <div class="row">
        <div class="col-6"><b>Created at:</b>&nbsp;{{$employee->created_at->format(config('setting.date_format'))}}</div>
        <div class="col-6"><b>Admin created ID:</b>&nbsp;{{$employee->admin_updated_id}}</div>
    </div>
@endisset
@isset($employee->updated_at)
    <div class="row">
        <div class="col-6"><b>Updated at:</b>&nbsp;{{$employee->updated_at->format(config('setting.date_format'))}}</div>
        <div class="col-6"><b>Admin updated ID:</b>&nbsp;{{$employee->admin_updated_id}}</div>
    </div>
@endisset

<div class="form-group form-inline float-right">
    <a href="{{route('employees.index')}}" class="btn btn-outline-dark m-2">Cancel</a>
    <button type="submit" class="btn btn-primary m-2">Save</button>
</div>

@push('script')
    <script type="application/javascript">


        $('#inputPhone').inputmask("+380(99)9999999")

        //Initialize Select2 Elements
        let select2PositionOptions = {
            ajax: {
                url: "{{route('positions.index')}}",
                dataType: 'json',
                delay: 1000,
                data: function (params) {
                    return {
                        columns:[{data:'id', name:'id'}, {data:'name', name:'name', search:{value:params.term}}],
                    };
                },
                processResults: function (data) {
                    let res = $.map(data.data, function (obj) {
                        obj.text = obj.name; // replace name with the property used for the text
                        return obj;
                    });
                    return {results: res};
                },
                cache: true
            },
            placeholder: 'Enter position',
            minimumInputLength: 1,
            allowClear: false
        };
        let select2HeadOptions = {
            ajax: {
                url: "{{route('employees.index')}}",
                dataType: 'json',
                delay: 1000,
                data: function (params) {
                    return {
                        columns:[{data:'id', name:'id'}, {data:'name', name:'name', search:{value:params.term}}],
                    };
                },
                processResults: function (data) {
                    let res = $.map(data.data, function (obj) {
                        obj.text = obj.name; // replace name with the property used for the text
                        return obj;
                    });
                    return {results: res};
                },
                cache: true
            },
            placeholder: 'Enter Head',
            minimumInputLength: 1,
            allowClear: false
        };
        $('#inputPosition').select2(select2PositionOptions);
        $('#inputHead').select2(select2HeadOptions);


        bsCustomFileInput.init();

        //Date range picker
        $('#date_of_employment').datetimepicker({
            format: 'DD.MM.YYYY'
        });

    </script>
@endpush
