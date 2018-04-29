getGoals();
$(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";


    date_input.datepicker({
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    });

    clock = $('.clock').FlipClock({
        clockFace: 'TwentyFourHourClock'
    });
});



function getGoals()
{
    var template;
    $(".LoadingGlass").fadeIn();
    $.get('GoalsCards.html', function(data) {
        template=data;
        $.get( "/myMind/public/Goals", function( data ) {
            var taskTemplate= Mustache.render(template,data);
            $("#inProgressList").html(taskTemplate);


            var inProgressTaskCount=data.result.length;
            var inProgressTaskScore=0;
            for (i = 0; i < data.result.length; ++i)
            {
                inProgressTaskScore+=data.result[i].valueTache;
            }

            $("#inProgressTaskScore").html(inProgressTaskScore);
            $("#inProgressTaskCount").html(inProgressTaskCount+" Task");

            $('.pinBoot').each(function(){
                $(this).pinterest_grid({
                    no_columns: 4,
                    padding_x: 5,
                    padding_y: 5,
                    margin_bottom: 50,
                    single_column_breakpoint: 700
                })});


        });
        $(".LoadingGlass").fadeOut();
    });


}

