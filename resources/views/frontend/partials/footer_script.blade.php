
<script src="{{ mix('/assets/js/all-scripts.js') }}"></script>
<script src="{{ mix('/assets/js/owl-carousel.js') }}"></script>

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

            

            $('.PC-SlickDemoVideos').slick({
               dots: false,
               infinite: true,
               cssEase: 'linear',
               swipe: true,
               slidesToShow: 3,
               slidesToScroll: 1,
               autoplay: true,
               autoplaySpeed: 2000,
               responsive: [
                  {
                     breakpoint: 768,
                     settings: {
                     arrows: false,
                     centerMode: true,
                     centerPadding: "0",
                     slidesToShow: 1,
                     },
                  },
                  {
                     breakpoint: 480,
                     settings: {
                     arrows: false,
                     centerMode: true,
                     centerPadding: "0",
                     slidesToShow: 1,
                     },
                  },
               ],
            });
         
            $('.PC-SlickDemoVideos2').slick({
               dots: true,
               infinite: true,
               cssEase: 'linear',
               swipe: false,
               slidesToShow: 3,
               slidesToScroll: 1,
               autoplay: true,
               autoplaySpeed: 2000,
            });
            // $('.PC-SlickDemoVideos').slick({
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