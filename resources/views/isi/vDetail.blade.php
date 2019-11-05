@extends('../template')

@section('title','Detail Peminjaman')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container shadow-lg">
    <div style="padding: 8px;">
        <h3 class="mt-3 text-center">Detail Peminjaman</h3>
        <hr width="40%">

        <div class="row">
        	
        </div>
        
    </div>
</div>
<!-- App ctrl angular -->
<script type="text/javascript">

    // $(document).ready(function() {
    //     $('#myTable').DataTable({
    //         // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    //         // dom: 'Blfrtip',
    //         // buttons: ['excel','print'],
    //         // "lengthChange": true
    //     });
    // });

    var app = angular.module('tesApp', []);
    app.controller('tesCtrl', function($scope, $http, $window) {
        //vars 
        

    });
</script>
@endsection