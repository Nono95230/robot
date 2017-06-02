@section('scripts')

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script><!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script>
        $( document ).ready(function(){
            $(".button-collapse").sideNav();
            $('#description').val('Description');
            $('select').material_select();
            $('.parallax').parallax();
            $('.modal').modal();


            $('.collapsible').collapsible();

            $('#activates-mobile-demo').sideNav({
              menuWidth: 300,
              closeOnClick: true,
              edge: 'right', // <--- CHECK THIS OUT
            });
            
        });

    </script>

@show
