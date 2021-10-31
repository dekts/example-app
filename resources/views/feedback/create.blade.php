@extends('layouts.app')

@section('title','Give Feedback')

@section('after-styles')
    {{-- custom style --}}
@endsection

@section('content')

    <a href="{{ route('feedback.index') }}" class="btn btn-success btn-md float-right mb-2" type="button">Back To Feedback List</a>

    {{ Form::open(['id' =>'add_feedback_form','class' => 'add-feedback-form', 'novalidate' => true, 'method' => 'post', 'route' => 'feedback.store', 'enctype' => 'multipart/form-data']) }}

        <div class="card-body">
            <fieldset>
                <div class="row">
                    <legend class="col-form-label ml-2"><b>Please provide your feedback.</b></legend>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter your name']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('age', 'Age') }}
                                {{ Form::number('age', null, ['id' => 'age', 'class' => 'form-control', 'placeholder' => 'Enter your age']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('gender', 'Gender') }}
                                {{ Form::select('gender', array('m' => 'Male', 'f' => 'Female'), 'm', ['id' => 'gender', 'class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('willing_to_work', 'Willing to work?') }}
                                <div class="wrapper-class">
                                    {{ Form::radio('willing_to_work', 0, false, ['id' => 'willing_to_work_two', 'class' => 'ml-0']) }}
                                    {{ Form::label('no', 'No') }}

                                    {{ Form::radio('willing_to_work', 1, true, ['id' => 'willing_to_work_one', 'class' => 'ml-1']) }}
                                    {{ Form::label('yes', 'Yes') }}
                                </div>
                                <div class="wrapper-class">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('languages', 'Languages') }}
                                <div class="wrapper-class">
                                    {{ Form::checkbox('language[]', 1, true, ['id' => 'language_one', 'class' => 'ml-0']) }}
                                    {{ Form::label('english', 'English') }}

                                    {{ Form::checkbox('language[]', 2, false, ['id' => 'language_two', 'class' => 'ml-1']) }}
                                    {{ Form::label('hindi', 'Hindi') }}

                                    {{ Form::checkbox('language[]', 3, false, ['id' => 'language_three', 'class' => 'ml-1']) }}
                                    {{ Form::label('gujarati', 'Gujarati') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-12 col-md-3 col-lg-6">
            <div class="form-group">
                <div class="controls">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary waves-effect waves-light custom-btns']) }}
                </div>
            </div>
        </div>

    {{ Form::close() }}

@endsection

@section('after-scripts')
    {{-- custom scripts --}}
@endsection
