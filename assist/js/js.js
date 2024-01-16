

//ss input field add more
    $(document).ready(function() {
      s = 1
      $('#ssinputadd').click(function() {
        
        if (s < 5) {

          $('#ssinputfields').append('<div class="col" id="ssinput"  ><input type="text" placeholder="Video Simple Image Url"  name="download[]" value="" id="add" class="form-control form-control-sm"> <div/>')

          s++
        }
      });

      $(document).on('click', '.btn_remove', function() {

        $('#ssinput').remove();
        
        s--
      });
      
    })
// Show Download input field when the Video Quality checkbox is clicked
    $(document).ready(function() {
      //480p ---------------------------------------------------
      $('#q480p').on('click', function() {
        // Check if the checkbox is checked
        if ($(this).is(':checked')) {
          // Create a new input element
          var newInput = $('<div class="col" id="i480p" ><input placeholder="Paste 480p Video Url" type="text" name="download_input[]" class="form-control form-control-sm"><div/>');

          // Append the new input element to the container
          $('#durl-feild').append(newInput);
        } else {
          // If the checkbox is unchecked, remove the new input element
          $('#i480p').remove();
        }
      });
      ///------720p
      $('#q720p').on('click', function() {
        // Check if the checkbox is checked
        if ($(this).is(':checked')) {
          // Create a new input element
          var newInput = $('<div class="col" id="i720p" ><input placeholder="Paste 720p Video Url" type="text" name="download_input[]" class="form-control form-control-sm"><div/>');

          // Append the new input element to the container
          $('#durl-feild').append(newInput);
        } else {
          // If the checkbox is unchecked, remove the new input element
          $('#i720p').remove();
        }
      });
      //-------1080p----------------
      $('#q1080p').on('click', function() {
        // Check if the checkbox is checked
        if ($(this).is(':checked')) {
          // Create a new input element
          var newInput = $('<div class="col" id="i1080p" ><input placeholder="Paste 1080p Video Url" type="text" name="download_input[]" class="form-control form-control-sm"><div/>');

          // Append the new input element to the container
          $('#durl-feild').append(newInput);
        } else {
          // If the checkbox is unchecked, remove the new input element
          $('#i1080p').remove();
        }
      });
       //-------4K----------------
       $('#q4k').on('click', function() {
        // Check if the checkbox is checked
        if ($(this).is(':checked')) {
          // Create a new input element
          var newInput = $('<div class="col" id="i4k" ><input placeholder="Paste 4K Video Url" type="text" name="download_input[]" class="form-control form-control-sm"><div/>');

          // Append the new input element to the container
          $('#durl-feild').append(newInput);
        } else {
          // If the checkbox is unchecked, remove the new input element
          $('#i4k').remove();
        }
      });
    });



    //corresponding page based on the selected category 
  function changePage() {
        var selectedCategory = document.getElementById("categorySelect").value;
        if (selectedCategory) {
            // Redirect to the corresponding page based on the selected category
            window.location.href = "../category/?id="+selectedCategory;
        }
    }
        //corresponding page FORM DOWNLOAD PAGE on the selected category 
  function selectoption() {
    var selectedCategory = document.getElementById("categorySelect").value;
    if (selectedCategory) {
        // Redirect to the corresponding page based on the selected category
        window.location.href = "../category/?id="+selectedCategory;
    }
}

$(document).ready(function() {
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    loop: true,    
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsiveClass: true,
    nav: false,
    dots: false,
    margin:10,
    responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:5
      }
  }
  })
})

  
