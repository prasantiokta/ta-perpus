@extends('../template')

@section('title','Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
    <h4 class="mt-3">Peminjaman</h4>
    
</div>
<!-- App ctrl angular -->
<script type="text/javascript">
    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {

        

        //

    });
</script>
@endsection