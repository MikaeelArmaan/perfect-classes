
<script src="{{ asset('/assets/js/all-scripts.js') }}"></script>
<script src="{{ asset('/assets/js/owl-carousel.js') }}"></script>

      <!-- <script src="/js/custom.js"></script> -->
	  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    
   
    <script>
         $(document).ready(function() {
            $('.PC-SlickDots').slick({
               dots: true,
               infinite: true,
               cssEase: 'linear',
               swipe: false,
               slidesToShow: 1,
               slidesToScroll: 1,
               autoplay: true,
               autoplaySpeed: 2000,
            });
         
            // $('.MT-OwlDots').slick({
            //    dots: true,
            //    infinite: true,
            //    cssEase: 'linear',
            //    swipe: false,
            //    slidesToShow: 2,
            //    slidesToScroll: 1,
            //    autoplay: false,
            //    autoplaySpeed: 200000,
            // });
            $('.owl-carousel').owlCarousel({
               loop:true,
               margin:10,
               items:2,
               responsive:{
                  0:{
                        items:1
                  },
                  600:{
                        items:1
                  },
                  1000:{
                        items:2
                  }
               }
            })

            
         });

      </script>