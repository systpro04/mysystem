@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Adjustments</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Adjustments</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <hr>
</div>
    <div id="page-wrapper" style="padding: 3px;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 5px;">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover shadow text-center" id="datatable">
                            <thead>
                                <tr>
                                    <th id="border-bottom" style="text-align: center">ITEM CODE</th>
                                    <th id="border-bottom" style="text-align: center">STOCK</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #border-bottom {
            border-bottom: 4px solid #009900;
            color: black;
            font-family: sans-serif;
        }
    </style>

@endsection

    
