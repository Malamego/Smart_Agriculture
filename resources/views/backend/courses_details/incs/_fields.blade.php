<div class="form-body">
    <!-- Add Course_details's Course -->
    <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.course') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control" id="course_id" name="course_id">
                <option value="">{{ trans('main.select course') }}</option>
                @foreach ($cor as $c)
                    <option value="{{ $c->id }}" {{ getData($data, 'course_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('course_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('course_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Add Course_details's Class -->
    <div class="form-group{{ $errors->has('class_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.class') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control" id="class_id" name="class_id">
                <option value="">{{ trans('main.select class') }}</option>
                @foreach ($cls as $c)
                    <option value="{{ $c->id }}" {{ getData($data, 'class_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('class_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('class_id') }}</strong>
                </span>
            @endif
        </div>
    </div>



    <div class="form-group{{ $errors->has('showdate') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.showdate') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="showdate" value="{{ getData($data, 'showdate') }}" class="form-control" placeholder="{{ trans('main.showdate') }}" required>
            @if ($errors->has('showdate'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('showdate') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.status') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control" id="status" name="status">
                <option value=""></option>
                <option value="active" {{ getData($data, 'status') == 'active' ? ' selected' : '' }}>{{trans('main.active')}}</option>
                <option value="inactive" {{ getData($data, 'status') == 'inactive' ? ' selected' : '' }}>{{trans('main.inactive')}}</option>
            </select>
            @if ($errors->has('status'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
