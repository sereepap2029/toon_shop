var productapp = angular.module('productapp', []);
productapp.directive('equalHeight', function() {
  return function(scope, element, attrs) {
    if (scope.$last){
      $(".product-item").matchHeight({
              byRow: false,
              property: 'height',
              target: null,
              remove: false
          });
    }
  };
});
productapp.controller('productlistctrl', function ($scope) {
	$scope.product_list= {};
	$.ajax({
        method: "POST",
        url:site_url("admin/product/ang_get_product_list"),
        async :false,
        data: {
            "file":"",
        }
    })
    .done(function(data) {
        $scope.product_list=data['products'];
        
     });
    console.log($scope.product_list);
});