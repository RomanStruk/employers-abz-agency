<div class="form-group">
    <label class="col-form-label" for="photoFile">
        @error('photo')<i class="far fa-times-circle"></i>@enderror Photo
    </label>
    @isset($employer->photo)
        {{$employer->photo}}
    <img class="img-bordered d-block mb-2" src="https://placehold.it/150x100" alt="..." height="150" width="150">
    @endisset
    <div class="custom-file">
        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photoFile">
        <label class="custom-file-label" for="photoFile">Choose photo</label>
    </div>
    @error('photo')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        Invalid Image
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
           name="name" value="{{ $employer->name ?? old('name') }}">
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        The name has to contain at least 2 characters
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted  float-right">
        Must be 2-256 characters long.
    </small>
</div>

{{--Phone--}}
<div class="form-group">
    <label class="col-form-label" for="inputPhone">
        @error('name')<i class="far fa-times-circle"></i>@enderror Phone
    </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputPhone" placeholder="Enter ..."
           name="phone">
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        Invalid phone number
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted float-right">
        Required format +380(xx)XXX XX XXX
    </small>
</div>

{{--Position--}}
<div class="form-group">
    <label class="col-form-label" for="inputPosition">
        @error('name')<i class="far fa-times-circle"></i>@enderror Position
    </label>
    <select class="form-control select2 @error('name') is-invalid @enderror" style="width: 100%;" name="inputPosition">
        <option selected="selected">Alabama</option>
        <option>Alaska</option>
        <option>California</option>
        <option>Delaware</option>
        <option>Tennessee</option>
        <option>Texas</option>
        <option>Washington</option>
    </select>
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        Invalid Position
    </div>
    @enderror
</div>

{{--Salary--}}
<div class="form-group">
    <label class="col-form-label" for="inputSalary">
        @error('name')<i class="far fa-times-circle"></i>@enderror Salary, $
    </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputSalary" placeholder="Enter ..."
           name="salary">
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        Maximum 500,000
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted float-right">
        Must be 0-500,000 characters long.
    </small>
</div>

{{--Head--}}
<div class="form-group">
    <label class="col-form-label" for="inputHead">
        @error('name')<i class="far fa-times-circle"></i>@enderror Head
    </label>
    <select class="form-control select2 @error('name') is-invalid @enderror" style="width: 100%;" name="head"
            id="inputHead">
        <option selected="selected">Alabama</option>
        <option>Alaska</option>
        <option>California</option>
        <option>Delaware</option>
        <option>Tennessee</option>
        <option>Texas</option>
        <option>Washington</option>
    </select>
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        There is no such person in the database
    </div>
    @enderror
</div>

{{--Date of employment--}}
<div class="form-group">
    <label class="col-form-label" for="inputDateEmployment">
        @error('name')<i class="far fa-times-circle"></i>@enderror Date of employment
    </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputDateEmployment"
           placeholder="Enter ..." name="date_employment">
    @error('name')
    <div class="invalid-feedback d-inline">
        <strong>{{ $message }}</strong>
        Maximum 500,000
    </div>
    @enderror
    <small id="nameHelpInline" class="text-muted float-right">
        Must be 0-500,000 characters long.
    </small>
</div>

<!-- Date -->
<div class="form-group">
    <label class="col-form-label" for="inputDate">
        @error('name')<i class="far fa-times-circle"></i>@enderror Date added:
    </label>
    <input type="text" class="form-control datetimepicker-input @error('name') is-invalid @enderror" id="adddate"
           data-toggle="datetimepicker" data-target="#adddate"/>
    @error('name')
        <strong>{{ $message }}</strong>
    @enderror
</div>

@isset($employer->created_at)
<div class="form-group">
    <div class="row">
        <div class="col-6"><b>Created at:</b>&nbsp;02.04.19</div>
        <div class="col-6"><b>Admin created ID:</b>&nbsp;123456</div>
    </div>
    <div class="row">
        <div class="col-6"><b>Updated at:</b>&nbsp;02.04.19</div>
        <div class="col-6"><b>Admin updated ID:</b>&nbsp;123456</div>
    </div>
</div>
@endisset

<div class="form-group form-inline float-right">
    <a href="{{route('employers.index')}}" class="btn btn-outline-dark m-2">Cancel</a>
    <button type="submit" class="btn btn-primary m-2">Save</button>
</div>
