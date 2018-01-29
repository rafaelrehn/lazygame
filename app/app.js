var app = angular.module('myApp', ['ngRoute']);



app.config(function($routeProvider) {
    $routeProvider
    .when("/play", {
        templateUrl : "views/play.html",
        controller:'myCtrlPlay'
    })
    .when("/about", {
        templateUrl : "views/about.html",
        controller:'myCtrlAbout'
    })
    .when("/ranking", {
        templateUrl : "views/ranking.html",
        controller:'myCtrlRanking'
    })
    .otherwise({
    	templateUrl: "views/play.html",
        controller: 'myCtrlPlay'

    });    
});

app.controller('myCtrlPlay', function($scope) {
    $("#liabout").removeClass("active");
    $("#liplay").addClass("active");
    $("#liranking").removeClass("active");

    $(".thelazyanim").css("animation","bounce 2s")

    $('h1').css("animation","rubberBand");
});

app.controller('myCtrlAboutout', function() {
    $("#liabout").addClass("active");
    $("#liplay").removeClass("active");
    $("#liranking").removeClass("active");
});

app.controller('myCtrlRanking', function($scope,$http) {

    $("#liabout").removeClass("active");
    $("#liplay").removeClass("active");
    $("#liranking").addClass("active");
    
    $http.get('listuser.php').then(function(response){
        $scope.usuarios = response.data;
        console.log("php")
    });
    
});