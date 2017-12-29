/***
 * Admin Js
 ***/
var baseurl = 'http://interactivebees.in/hpl/public/';
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//alert(appBaseUrl);
$(document).ready(function () {
	
    $('#category').on('change',function(e){
		var catid=$(this).val();
		var urls = [baseurl+'admin/ajax-subcat/'+catid,baseurl+'admin/ajax-attribute/'+catid];
        
		$.each(urls, function(i,u){
        $.ajax(u,{
            type:'POST',
           //url:u,
            data: {catid:catid},
            success:function(data){
				
				if(i==1){
             $("#subcategory").html(data);
				}else{
					$("#attribiutes").html(data);	 
				}
            }
        });
		i++;
    });
	});
    $('#subcategory').on('change',function(e){
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'admin/ajax-product-range/'+catid,
            data: {catid:catid},
            success:function(data){
                $("#productrange").html(data);
            }
        });
		 i++;
    });
	
	
	
 /* $('#productrange').on('change',function(e){
  var catid=$(this).val();
  var urls = [baseurl+'admin/ajax-product/'+catid,baseurl+'admin/ajax-attribute/'+catid];
  $.each(urls, function(i,u){
  $.ajax(u, 
       { type: 'POST',
        data: {catid:catid},
         success: function (data) {
			 alert(data);
			 $("#attributes").html(data);	 
			 
         } 
       }
     );
	 i++;
});
}); */

/* $('#category').on('change',function(e){
        var catid=$(this).val();
        $.ajax({
            type:'POST',
            url:baseurl+'admin/ajax-attribute/'+catid,
            data: {catid:catid},
            success:function(data){
                $("#attribiutes").html(data);
            }
        });
    });  */

var button = document.getElementById('searchcity');
button.addEventListener('click', function(e){
  e.preventDefault();
  var catid=$('#city').val();
  $.ajax({
      type:'POST',
      url:baseurl+'ajax-office/'+catid,
      data: {catid:catid},
      success:function(data){
  
          $("#location").html(data);
      }
  });
});
// $('#searchcity').click(function(e){
// 	e.preventDefault();
//         var catid=$('#city').val();
//         $.ajax({
//             type:'POST',
//             url:baseurl+'ajax-office/'+catid,
//             data: {catid:catid},
//             success:function(data){
				
//                 $("#location").html(data);
//             }
//         });
//     });
	$(document).on('click', '.getmap', function(e){	
     var lat=$(".latitude").val();
     var lon=$(".longitude").val();
	e.preventDefault();
	 var options = {
		      types: ['(cities)'],
		      componentRestrictions: {country: "in"}
		    };
		    var input = document.getElementById('city');
		    var autocomplete = new google.maps.places.Autocomplete(input, options);
			
	
   var latlng = new google.maps.LatLng(lat,lon);
   var geocoder= new google.maps.Geocoder();
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 15
    });
	 geocoder.geocode({'latLng': latlng}, function(results, status) {
        if(status == google.maps.GeocoderStatus.OK) {
            if(results[0]) {
               var address= results[0].formatted_address;
            } else {
                var address='Delhi';
            }
        } else {
            var error = {
                'ZERO_RESULTS': 'Kunde inte hitta adress'
            }
        }
    
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0,-29)
   });
    var infowindow = new google.maps.InfoWindow();   
	   google.maps.event.addListener(marker, 'click', function() {
		   map.setCenter(marker.getPosition());
		   var infowindow = new google.maps.InfoWindow();
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Hpl India Asaf Ali Road</div></div>';
      // including content to the infowindow
      infowindow.setContent(address);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
	});
	

google.maps.event.addDomListener(window, 'load', initialize);
});

});

function suggest(inputString){
	var url=baseurl+"ajax-range";
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post(url, {catid: ""+inputString+""}, function(data){
				if(data.length >0) {
					//alert(data.length);
					$('#suggestions').fadeIn();
					$('#listsuggestion').html(data);
					$('#country').removeClass('load');
					
				}
				else {
				$('#suggestions').hide();
				}
				
			});
		}
	}
	function fill(thisValue) {
		$('#country').val(thisValue);
		$('#suggestions').hide();
		
	}
