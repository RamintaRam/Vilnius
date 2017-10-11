@extends('admin.core')

@section('content')

    {!! Form::open(['url' => $route]) !!}
    @if(isset($record['id']))
        <div><h1>{{$record['id']}}</h1></div>
        <div class="form-group">
            {{Form::label('gimimo_metai', 'Gimimo metai')}}
            {{Form::select('gimimo_metai', $gimimo_metai, $record['gimimo_metai'])}}
            {{Form::label('gimimo_valstybe', 'Gimimo valstybė')}}
            {{Form::select('gimimo_valstybe', $gimimo_valstybe, $record['gimimo_valstybe'])}}
            {{Form::label('lytis', 'Lytis')}}
            {{Form::select('lytis', $lytis, $record['lytis'])}}
            {{Form::label('seimos_padetis', 'Šeiminė padėtis')}}
            {{Form::select('seimos_padetis', $seimos_padetis, $record['seimos_padetis'])}}
            {{Form::label('vaiku_skaicius', 'Vaikų skaičius')}}
            {{Form::select('vaiku_skaicius', $vaiku_skaicius, $record['vaiku_skaicius'])}}
            {{Form::label('seniunija', 'Seniūnija')}}
            {{Form::select('seniunija', $seniunija, $record['seniunija'])}}
            {{Form::label('gatve', 'Gatvė')}}
            {{Form::select('gatve', $gatve, $record['gatve'])}}


        </div>
        <a class="btn btn-info" href="{{$back}}">Atgal į sąrašą</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @else
        <div>{{$form}}</div>
        <div class="form-group">
            {{Form::label('gimimo_metai', 'Gimimo metai')}}
            {{Form::select('gimimo_metai', $gimimo_metai)}}
            {{Form::label('gimimo_valstybe', 'Gimimo valstybė')}}
            {{Form::select('gimimo_valstybe', $gimimo_valstybe)}}
            {{Form::label('lytis', 'Lytis')}}
            {{Form::select('lytis', $lytis)}}
            {{Form::label('seimos_padetis', 'Šeiminė padėtis')}}
            {{Form::select('seimos_padetis', $seimos_padetis)}}
            {{Form::label('vaiku_skaicius', 'Vaikų skaičius')}}
            {{Form::select('vaiku_skaicius', $vaiku_skaicius)}}
            {{Form::label('seniunija', 'Seniūnija')}}
            {{Form::select('seniunija', $seniunija)}}
            {{Form::label('gatve', 'Gatvė')}}
            {{Form::select('gatve', $gatve)}}
        </div>
        <a class="btn btn-info" href="{{$back}}">Atgal į sąrašą</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @endif

@endsection

