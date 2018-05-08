






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


  


   $.get( "/myMind/public/Goals", function( data ) {
      console.log(Mustache.render("\
        {{#result}}\
        <b>{{titreGoal}}</b><br>\
        {{/result}}\
        ", data));

    });

  Mustache.Formatters = {
    date: function(str) {
      var dt = new Date(str);
      return str;
    }
  }; 



   var testData={
    titreTache : "titreTache",
    titreGoal  : "titreGoal",
    valueTache : "valueTache"
   }

    getInProgressTasks();
    getdoneTasks();
    loadFormGoals();
   

})

function commentTask(id)
{
  $.get( "/myMind/public/Tache/"+id+"/Comment/"+$('#'+id+' input').val(), function( data ) {
     getInProgressTasks();
  });
}


function doneTask(id)
{
  $(".LoadingGlass").fadeIn();
  $('#'+id).fadeOut();
  $.get( "/myMind/public/Tache/Done/"+id, function( data ) {
     getInProgressTasks();
     getdoneTasks();
     $(".LoadingGlass").fadeOut();
  });

}


function unDoneTask(id)
{
  $(".LoadingGlass").fadeIn();
  $('#'+id).fadeOut();
  $.get( "/myMind/public/Tache/UnDone/"+id, function( data ) {
     getdoneTasks();
     getInProgressTasks();
     $(".LoadingGlass").fadeOut();
  });

}

function getInProgressTasks()
{
  var template;
    $(".LoadingGlass").fadeIn();
    $.get('inProgressTask.html', function(data) {
     template=data;
     $.get( "/myMind/public/Taches/InProgress", function( data ) {
       var taskTemplate= Mustache.render(template,data);
       $(".inProgressList").html(taskTemplate);


       var inProgressTaskCount=data.result.length;
       var inProgressTaskScore=0;
       for (i = 0; i < data.result.length; ++i)
       {
          inProgressTaskScore+=data.result[i].valueTache;
       }

       $("#inProgressTaskScore").html(inProgressTaskScore);
       $("#inProgressTaskCount").html(inProgressTaskCount+" Task");


     });
     $(".LoadingGlass").fadeOut();
    });


}


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

       $('.').each(function(){
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


function getdoneTasks()
{
    var template;
    $(".LoadingGlass").fadeIn();
    $.get('doneTask.html', function(data) {
     template=data;
     $.get( "/myMind/public/Taches/Done", function( data ) {
       var taskTemplate= Mustache.render(template,data);
       $(".doneList").html(taskTemplate);


       var doneTaskCount=data.result.length;
       var doneTaskScore=0;
       for (i = 0; i < data.result.length; ++i)
       {
          doneTaskScore+=data.result[i].valueTache;
       }

       $("#doneTaskScore").html(doneTaskScore);
       $("#doneTaskCount").html(doneTaskCount+" Task");


     });
    
     $(".LoadingGlass").fadeOut();
    });


}


function loadFormGoals()
{   
  $(".LoadingGlass").fadeIn();
    $.get( "/myMind/public/Goals", function( data ) {
        for (i = 0; i < data.result.length; ++i) {
            $("#idGoal").append("\
            <option value=\""+data.result[i].id+"\">"+data.result[i].titreGoal+"</option>\
            ");
        }
        $(".LoadingGlass").fadeOut();
    });
}



  
  function addTask()
  {
    $(".LoadingGlass").fadeIn();
    var task=
        {
            titreTache : $("#titreTache").val(),
            descTache : $("#descTache").val(),
            valueTache : $("#valueTache").val(),
            dateCreation : $("#dateCreation").val(),
            deadLine : $("#deadLine").val(),
            idGoal :$("#idGoal").val()
        };

    
    $.post( "/myMind/public/Taches/Add",task,function()
      {
          getInProgressTasks();
          $("#creationSuccessAlert").fadeIn('fast').delay(1000).fadeOut('fast');
          $(".LoadingGlass").fadeOut();
      });
    

  }
