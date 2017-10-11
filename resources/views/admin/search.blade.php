@extends('core')


@section('content')

    <div class="title"><h3> Gyventojų paieška </h3></div>

    <div class="form-group">
        <div class="form">
            {!! Form::open(['url' => $route, 'method' => 'get']) !!}
            {{Form::label('gimimo_metai', 'Gimimo metai')}}
            {{Form::select('gimimo_metai', $gimimo_metai)}}

        </div>

        <div class="search">    {{Form::submit(('search'), ['class' => 'btn btn-success']) }} </div>
        {!!Form::close()!!}
    </div>


    <div class="list">
        @if(sizeof($inhabitants)>0)
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                <tr>

                    @foreach($inhabitants[0] as $key => $value)
                        @if(substr($key, -3) == '_id')
                            <th>{{ucfirst(substr($key, 0, -3))}}</th>
                        @else
                            <th> {{ucfirst($key)}}</th>
                        @endif
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($inhabitants as $inhabitant)
                        @foreach($inhabitant as $key => $value)
                            @if($key == 'gimimo')
                                @foreach($value as $key => $title)
                                    @if($key == 'name')

                                        {{--@foreach($record as $key => $value)--}}
                                        <td>{{$title}}</td>
                                    @endif
                                @endforeach

                                {{--@endforeach--}}

                            @else
                                <td>{{$value}}</td>
                            @endif
                        @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="no-data"></div><p>Paieškos rezultatų 0 </p></div>
    @endif


    </div>


@endsection


