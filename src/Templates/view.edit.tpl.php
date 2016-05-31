@extends('app')
@section('content')
<h2 class="page-header">[[model_uc]]</h2>
<div class="panel panel-default">
    <div class="panel-heading">
        Edit [[model_uc]]
    </div>
    <div class="panel-body">
        {!! Form::model($[[model_uc]],['route'=>['[[view_folder]].update',$[[model_uc]]->id],'method'=>'PUT']) !!}
        [[foreach:columns]]
        [[if:i.type=='id']]        
        <div class="form-group">
            {!! Form::label('[[i.name]]','[[i.display]]') !!}
            <div class="col-sm-6">
                {!! Form::text('[[i.name]]',{{$model['[[i.name]]'] or ''}},['id'=>'[[i.name]]','class'=>'form-control','readonly'=>'readonly'])!!}            
            </div>
        </div>
        [[endif]]
        [[if:i.type=='text']]
        <div class="form-group">
            {!! Form::label('[[i.name]]','[[i.display]]') !!}
            <div class="col-sm-6">
                {!! Form::text('[[i.name]]',{{$model['[[i.name]]'] or ''}},['id'=>'[[i.name]]','class'=>'form-control','readonly'=>'readonly'])!!}            
            </div>
        </div>
        [[endif]]
        [[if:i.type=='number']]
        <div class="form-group">
            {!! Form::label('[[i.name]]','[[i.display]]') !!}
            <div class="col-sm-6">
                {!! Form::number('[[i.name]]',{{$model['[[i.name]]'] or ''}},['id'=>'[[i.name]]','class'=>'form-control','readonly'=>'readonly'])!!}            
            </div>
        </div>
        [[endif]]
        [[if:i.type=='date']]
        <div class="form-group">
            {!! Form::label('[[i.name]]','[[i.display]]') !!}
            <div class="col-sm-6">
                {!! Form::date('[[i.name]]',{{$model['[[i.name]]'] or ''}},['id'=>'[[i.name]]','class'=>'form-control','readonly'=>'readonly'])!!}            
            </div>
        </div>
        [[endif]]
        [[if:i.type=='unknown']]
        <div class="form-group">
            {!! Form::label('[[i.name]]','[[i.display]]') !!}
            <div class="col-sm-6">
                {!! Form::text('[[i.name]]',{{$model['[[i.name]]'] or ''}},['id'=>'[[i.name]]','class'=>'form-control','readonly'=>'readonly'])!!}            
            </div>
        </div>
        [[endif]]
        [[endforeach]]
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                {!! Form::submit('Salvar',['class'=>'btn btn-primary','style'=>'margin-top:2em;'])!!} 
                <a class="btn btn-default" href="{{ url('/[[route_path]]') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@include('footer')
@endsection
