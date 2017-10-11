@extends('admin.core')

@section('content')

    <div class="container">
        <div class="row">
            <h4 style="text-align: center; font-weight: 600; font-size: 24px">{{$title}}</h4>
            @if(isset($new))
                <div>
                    <a class="btn btn-success btn-sm" style="text-align: left"
                       href="{{route($new)}}">{{trans('app.createNew')}}</a>
                    {{--<a class="btn btn-primary btn-sm search"--}}
                    {{--href="{{route($search)}}">{{trans('app.search')}}</a>--}}
                </div>
            @endif

            <div class="col-md-12">

                <div class="table-responsive">
                    @if(sizeof($list)>0)
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                @foreach($list[0] as $key => $value)
                                    @if(!in_array($key, $ignore))
                                        <th>{{ucfirst($key)}}</th>
                                    @endif

                                @endforeach
                                <th>Keisti</th>
                                <th>Trinti</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $key => $record)

                                <tr id="{{$record['id']}}">
                                    @foreach($record as $key => $value)
                                        @if(!in_array($key, $ignore))
                                            @if($key == 'metai')
                                                <td>{{($value['name'])}}</td>

                                            @elseif($key == 'valstybe')
                                                <td>{{($value['name'])}}</td>

                                            @elseif($key == 'lytis')
                                                <td>{{($value['name'])}}</td>

                                            @elseif($key == 'seima')
                                                <td>{{($value['name'])}}</td>

                                            @elseif($key == 'vaikai')
                                                <td>{{($value['name'])}}</td>

                                            @elseif($key == 'seniunija')
                                                <td>{{($value['name'])}}</td>

                                            @elseif($key == 'gatve')
                                                <td>{{($value['name'])}}</td>

                                            @else
                                                <td>{{($value)}}</td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>
                                        <a href="{{ route($edit,$record['id']) }}">
                                            <button type="button" class="btn btn-primary">Keisti</button>
                                        </a>
                                    </td>


                                    <td>
                                        <form action="{{ route($delete, ['id'=>$record['id']]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value='Ištrinti' class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <h2>Data not find</h2>
                    @endif
                </div>
                @endsection

                @section('scripts')
                    <script>

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        function deleteItem(route) {
                            $.ajax({
                                url: route,
                                type: 'DELETE',
                                dataType: 'json',
                                success: function (response) {
                                    $('#' + response.id).remove();
                                },
                                error: function () {
                                    alert('ERROR')
                                }
                            });
                        }


                    </script>
@endsection