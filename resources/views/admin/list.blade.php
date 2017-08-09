
@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            <h4>XXXXXXXX</h4>
            @if(isset($new))
                <div><a class="btn btn-success btn-sm" href="{{--{{route($new)}}--}}#">{{trans('app.createNew')}}</a></div><br>
            @endif

            <div class="col-md-12">


                {{--@if(isset($new))--}}
                    {{--<div><a class="btn btn-success btn-sm" href="{{route($new)}}">{{trans('app.new')}}</a></div><br>--}}
                {{--@endif--}}

                <div class="table-responsive">
                    @if(sizeof($list)>0)
                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th></th>
                            @foreach($list[0] as $key => $value)
                                <th>{{$key}}</th>
                            @endforeach
                            <th>Edit</th>
                            <th>Delete</th>

                            </thead>
                            <tbody>
                            @foreach($list as $key => $record)
                                <tr id="{{$record['id']}}">
                                    <td><input type="checkbox" class="checkthis"/></td>
                                    @foreach($record as $key => $value)

                                        <td>{{$value}}</td>

                                    @endforeach

                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-primary btn-xs" data-title="Edit"
                                                    data-toggle="modal" data-target="#edit"><span
                                                        class="glyphicon glyphicon-pencil"></span></button>
                                        </p>
                                    </td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal" data-target="#delete"><span
                                                        class="glyphicon glyphicon-trash"></span></button>
                                        </p>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        @else
                        <p><h4 style="font-style: italic">{{trans('app.noData')}} </h4></p>
                    @endif

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Mohsin">
                    </div>
                    <div class="form-group">

                        <input class="form-control " type="text" placeholder="Irshad">
                    </div>
                    <div class="form-group">
                        <textarea rows="2" class="form-control"
                                  placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                class="glyphicon glyphicon-ok-sign"></span> Update
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure
                        you want to delete this Record?
                    </div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> No
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('scripts')

    <script>

        $(document).ready(function () {
            $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();
        });

    </script>


@endsection


