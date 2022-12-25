<?php use Request as Input; ?>
<div class="form-body">

    <div class="form-group row">
        <label class="col-lg-2 col-form-label">Technology Name:<span class="required" aria-required="true">*</span></label>
        <div class="col-lg-4">
            {!! Form::text('name',Input::old('name'), ['class' => 'form-control','id'=>"name",'placeholder'=>"Technology Name"]) !!}
        </div>
    </div>
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green submitbutton">Submit</button>
            <a href="{{route('technology')}}"><button type="button" class="btn default cancel">Cancel</button></a>
        </div>
    </div>
</div>
