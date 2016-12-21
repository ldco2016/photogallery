@extends('layouts.main')

@section('content')
	 <div class="callout primary">
            <div class="row column">
              <h1>Upload Photo</h1>
              <p class="lead">Upload a photo to the gallery</p>
            </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
          	<div class="main">
          		{!! Form::open(array('action' => 'PhotoController@store', 'enctype' => 'multipart/form-data')) !!}
					{!! Form::label('title', 'Title') !!}
					{!! Form::text('name', $value = null, $attributes = ['placeholder' => 'Gallery name', 'name' => 'name']) !!}

					{!! Form::label('description', 'Description') !!}
					{!! Form::text('description', $value = null, $attributes = ['placeholder' => 'Gallery Description', 'name' => 'description']) !!}

          {!! Form::label('location', 'Location') !!}
          {!! Form::text('location', $value = null, $attributes = ['placeholder' => 'Gallery Description', 'name' => 'description']) !!}

					{!! Form::label('cover_image', 'Cover Image') !!}
					{!! Form::file('cover_image') !!}
					{!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}
          		{!! Form::close() !!}
          	</div>
          </div>
@stop