<div class="form-body">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.title') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="title" value="{{ getData($data, 'title') }}" class="form-control" placeholder="{{ trans('main.title') }}" required>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{-- Add lesson's Course --}}
    <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.course') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="course_id" name="course_id">
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

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="control-label col-md-2">{{ trans('main.image') }}</label>
        <div class="col-md-6">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    @if (checkValue(getData($data, 'image')))
                        <img src="{{ ShowImage(getData($data, 'image')) }}" alt="" />
                    @endif
                </div>
                <div>
                    <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> {{ trans('main.select_image') }} </span>
                        <span class="fileinput-exists"> {{ trans('main.change') }} </span>
                        <input type="file" name="image">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('main.remove') }} </a>
                </div>
            </div>
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.type') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="type" name="type">
                <option value="">{{ trans('main.type') }}</option>
                <option value="video" {{ getData($data, 'type') == 'video' ? ' selected' : '' }}>{{trans('main.video')}}</option>
                <option value="image" {{ getData($data, 'type') == 'image' ? ' selected' : '' }}>{{trans('main.image')}}</option>
                <option value="text" {{ getData($data, 'type') == 'text' ?   ' selected' : '' }}>{{trans('main.text')}}</option>
                <option value="game" {{ getData($data, 'type') == 'game' ?   ' selected' : '' }}>{{trans('main.game')}}</option>
            </select>
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.status') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="status" name="status">
                <option value="">{{ trans('main.status') }}</option>
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

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.content') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <textarea name="content" class="form-control" placeholder="{{ trans('main.content') }}">{{ getData($data, 'content') }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('myorder') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.myorder') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="myorder"  value="{{ getData($data, 'myorder') }}" class="form-control" placeholder="{{ trans('main.myorder') }}" required>
            @if ($errors->has('myorder'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('myorder') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
