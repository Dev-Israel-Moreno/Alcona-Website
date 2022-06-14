

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  jQuery(document).ready(function($) {

    if(document.getElementsByClassName("articulos-bolg")[0] != undefined){
      var elem_prod = document.getElementsByClassName('tg-blog-widget tg-column-3');
      if(elem_prod.length >0){
        for (var elem = 0; elem < elem_prod.length; elem ++){
          var date = elem_prod[elem].getElementsByClassName('entry-date')[0];
         
           elem_prod[elem].getElementsByClassName('read-more-container')[0].prepend(date);
        }
      }
  }


  
  });

   