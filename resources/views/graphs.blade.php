@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div id ="myStocks"  class="panel-body"> </div>
                    <div id ="myStocks2"  class="panel-body"> </div>
                </div>
            </div>
        </div>
    </div>
    <? echo $lava->render('LineChart', 'Stocks', 'myStocks2') ?>
@endsection

}