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
    <small id="nameHelpInline" class="text-muted  float-right ">
        Must be 2-256 characters long.
    </small>
</div>
<div class="clearfix"></div>

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

<div class="row">
    <div class="col-12 text-right">
        <a href="{{route('positions.index')}}" class="btn btn-outline-dark m-2">Cancel</a>
        <button type="submit" class="btn btn-primary m-2">Save</button>
    </div>
</div>
