$('.example_typeahead > > input').tagsinput({
  typeahead: {
    source: function(query) {
      return $.getJSON('assets/citynames.json');
    }
  }
});

$('.example_objects_as_tags > > input').tagsinput({
  itemValue: 'value',
  itemText: 'text',
  typeahead: {
    source: function(query) {
      return $.getJSON('assets/cities2.json');
    }
  }
});
$('.example_objects_as_tags > > input').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Todos"    });
$('.example_objects_as_tags > > input').tagsinput('add', { "value": 2 , "text": "Pepe"  , "continent": "Todos"   });
$('.example_objects_as_tags > > input').tagsinput('add', { "value": 3 , "text": "Jose"      , "continent": "Todos" });

$('.example_tagclass > > input').tagsinput({
  tagClass: function(item) {
    switch (item.continent) {
      case 'Todos'   : return 'label label-info';
    }
  },
  itemValue: 'value',
  itemText: 'text',
  typeahead: {
    source: function(query) {
      return $.getJSON('assets/cities2.json');
    }
  }
});
$('.example_tagclass > > input').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Todos"    });
$('.example_tagclass > > input').tagsinput('add', { "value": 2 , "text": "Pepe"  , "continent": "Todos"   });
$('.example_tagclass > > input').tagsinput('add', { "value": 3 , "text": "Jose"      , "continent": "Todos" });

angular.module('AngularExample', ['bootstrap-tagsinput'])
  .controller('CityTagsInputController',
    function CityTagsInputController($scope, $http) {
      // Init with some cities
      $scope.cities = [
        { "value": 1 , "text": "Amsterdam"   , "continent": "Todos"    },
        { "value": 2 , "text": "Pepe"  , "continent": "Todos"   },
        { "value": 3, "text": "Jose"       , "continent": "Todos"    }
      ];

      $scope.queryCities = function(query) {
        return $http.get('assets/cities2.json');
      };

      $scope.getTagClass = function(city) {
        switch (city.continent) {
          case 'Todos'   : return 'label label-primary';
        
        }
      };
    }
  );