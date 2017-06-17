var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    url: 'tags/assets/citynames.json',
    filter: function(list) {
      return $.map(list, function(cityname) {
        return { name: cityname }; });
    }
  }
});
citynames.initialize();

var cities = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: 'tags/assets/cities2.json'
});
cities.initialize();

/**
 * Typeahead
 */
var elt = $('.example_typeahead > > input');
elt.tagsinput({
  typeaheadjs: {
    name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: citynames.ttAdapter()
  }
});

/**
 * Objects as tags
 */
elt = $('.example_objects_as_tags > > input');
elt.tagsinput({
  itemValue: 'value',
  itemText: 'text',
  typeaheadjs: {
    name: 'cities',
    displayKey: 'text',
    source: cities.ttAdapter()
  }
});

elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Todos"    });
elt.tagsinput('add', { "value": 2 , "text": "Pepe"   , "continent": "Todos"    });
elt.tagsinput('add', { "value": 3 , "text": "Josee"   , "continent": "Todos"    });

/**
 * Categorizing tags
 */
elt = $('.example_tagclass > > input');
elt.tagsinput({
  tagClass: function(item) {
    switch (item.continent) {
      case 'Todos'   : return 'label label-primary';
   //   case 'America'  : return 'label label-danger label-important';
   //   case 'Australia': return 'label label-success';
   //   case 'Africa'   : return 'label label-default';
   //   case 'Asia'     : return 'label label-warning';
    }
  },
  itemValue: 'value',
  itemText: 'text',
  // typeaheadjs: {
  //   name: 'cities',
  //   displayKey: 'text',
  //   source: cities.ttAdapter()
  // }
  typeaheadjs: [
  {
      hint: true,
     highlight: true,
     minLength: 2
  },
   {
      name: 'cities',
       displayKey: 'text',
       source: cities.ttAdapter()
   }
  ]
});
elt.tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Todos"    });
elt.tagsinput('add', { "value": 2 , "text": "Pepe"   , "continent": "Todos"    });


// HACK: overrule hardcoded display inline-block of typeahead.js
$(".twitter-typeahead").css('display', 'inline');
