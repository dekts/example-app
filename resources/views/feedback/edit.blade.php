@extends('layouts.app')

@section('title','Update Given Feedback')

@section('after-styles')
    {{-- custom style --}}
@endsection

@section('content')

    <a href="{{ route('feedback.index') }}" class="btn btn-success btn-md float-right mb-2" type="button">Back To Feedback List</a>

    {{ Form::open(['id' =>'edit_feedback_form','class' => 'edit-feedback-form', 'novalidate' => true, 'method' => 'post', 'route' => ['feedback.update', $feedback->id], 'enctype' => 'multipart/form-data']) }}
        @method('patch')
        <div class="card-body">
            <fieldset>
                <div class="row">
                    <legend class="col-form-label ml-2"><b>You can update your given feedback.</b></legend>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', $feedback->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter your name']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('age', 'Age') }}
                                {{ Form::number('age', $feedback->age, ['id' => 'age', 'class' => 'form-control', 'placeholder' => 'Enter your age']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('gender', 'Gender') }}
                                {{ Form::select('gender', array('m' => 'Male', 'f' => 'Female'), $feedback->gender == 'Male' ? 'm' : 'f', ['id' => 'gender', 'class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-6">
                        <div class="form-group">
                            <div class="controls">
                                {{ Form::label('willing_to_work', 'Willing to work?') }}
                                <div class="wrapper-class">
                                    {{ Form::radio('willing_to_work', 0, $feedback->willing_to_work == 'No' ?: false, ['id' => 'willing_to_work_one', 'class' => 'ml-1']) }}
                                    {{ Form::label('no', 'No') }}

                                    {{ Form::radio('willing_to_work', 1, $feedback->willing_to_work == 'Yes' ?: false, ['id' => 'willing_to_work_two', 'class' => 'ml-0']) }}
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
                                    {{ Form::checkbox('language[]', 1, in_array('English', $languages) ?: false, ['id' => 'language_one', 'class' => 'ml-0']) }}
                                    {{ Form::label('english', 'English') }}

                                    {{ Form::checkbox('language[]', 2, in_array('Hindi', $languages) ?: false, ['id' => 'language_two', 'class' => 'ml-1']) }}
                                    {{ Form::label('hindi', 'Hindi') }}

                                    {{ Form::checkbox('language[]', 3, in_array('Gujarati', $languages) ?: false, ['id' => 'language_three', 'class' => 'ml-1']) }}
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
