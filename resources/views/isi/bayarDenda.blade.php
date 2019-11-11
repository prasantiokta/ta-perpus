@extends('../template')

@section('title','Pembayaran Denda')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Pembayaran Denda</h3>
        <hr width="40%"><br>

        <form action="{{route('vDetail',$mainList->id)}}" method="post">
        @csrf
                    <div class="wrap">
                    	<div class="row">
                    		<div class="col">
                                
                    		</div>
                            <div class="col">
                                
                            </div>
                    	</div>
                        <div class="row">
                            
                        </div>
                    </div>
        </form>
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

		$(document).ready(function() {
	        $('#myTable').DataTable({
	            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	            // dom: 'Blfrtip',
	            // buttons: ['excel','print'],
	            // "lengthChange": true
	        });
	    });

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 

        //today date
        var dateNow = $filter('date')(new Date(), 'yyyy-MM-dd');
        $scope.year = dateNow.substring(0,4);
        $scope.month = dateNow.substring(5,7);
        $scope.day = dateNow.substring(8,10);
        $scope.today = $scope.year + "-" + $scope.month + "-" + $scope.day;

    });
</script>
@endsection