@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Select the genres" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form" id="genreform">
                                {{ csrf_field() }}
                                  <div class="form-group">
                                    <label for="filter">Genre #1</label>
                                    <select class="form-control" name="genre">
                                        <option value="0" selected>Select a genre you like</option>
                                        <option value="Comedy">Comedy</option>
                                        <option value="Thriller">Thriller</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Animation|Children">Animation|Children</option>
                                    </select>
                                  </div>
                                  
                                  <input type="submit" class="btn btn-primary" value="Confirm">
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
<div style="height: 140px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Select the movie you have watched" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form" id="movieform">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="filter">Movies of selected genre</label>
                                    <select class="form-control" name="movie" id="othermovies">
                                        
                                    </select>
                                  </div>
                                                                    
                                  <input type="submit" class="btn btn-primary" value="Confirm">
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>   
<div style="height: 140px;"></div>

<div class="container" id="container" style="display: none;">
    <div class="row">
        
         <h2 class="text-center"><b>RECOMMENDATIONS FOR YOU</b></h2>
    
    <table class="points_table">
      <thead>
        <tr>
          <th class="col-xs-12" style="font-size: 18px; padding-bottom: 10px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSimilar movies that you might like !!</th>
        </tr>
      </thead>

      <tbody class="points_table_scrollbar" id="recomm_movies">
        
      </tbody>
    </table>

    </div>
    <div id="popular">
        <form class="form-horizontal" role="form" id="popularform">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="filter"><h2>See what's trending!</h2></label><input type="submit" class="btn btn-primary" value="Popular movies">
                                    <span class="caret"></span>
                                  </div>
                                                                    
                                  
                                </form>        
    </div>
</div>

<div class="container_two" id="container_two" style="display: none;">
    <div class="row">
        
         <h2 class="text-center"><b>POPULAR MOVIES</b></h2>
    
    <table class="points_table">
      <thead>
        <tr>
          <th class="col-xs-12" style="font-size: 18px; padding-bottom: 10px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHere's what others are watching that you might like too!!</th>
        </tr>
      </thead>

      <tbody class="points_table_scrollbar" id="popular_movies">
        
      </tbody>
    </table>

    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

$('#genreform').submit(function(e){
    e.preventDefault();
    console.log("working");
    console.log($('#genreform').serialize());
    $.ajax({
        type: "POST",
        url: "http://localhost:8000/display",
        dataType: 'json',
        data: $('#genreform').serialize(),
        success: function(data){
        alert("Genre selected !!");
        console.log(data.query);
        var i;
        for(i = 0; i < data.query.length; i++)
        {
            console.log(data.query[i].title);
        }
        for(i = 0; i < data.query.length; i++){
            $("#othermovies").append("<option value='" + data.query[i].title + "'>" + data.query[i].title + "</option>");
        }
        }
    });      
});

$('#movieform').submit(function(e){
    e.preventDefault();
    console.log("working");
    console.log($('#movieform').serialize()); 
    $.ajax({
        type: "POST",
        url: "http://localhost:8000/finalrecommend",
        dataType: 'json',
        data: $('#movieform').serialize(),
        success: function(response){
        alert("Movie selected successfully !!");
        $("#container").toggle();
        for(i = 0; i < response.data.length; i++)
        {
            $("#recomm_movies").append("<tr class='odd'><td class='col-xs-7'>"+response.data[i].title+"</td></tr>");
        }
        }
    });   
    });



$('#popularform').submit(function(e){
    e.preventDefault();
    console.log("working");
    console.log($('#popularform').serialize()); 
    $.ajax({
        type: "POST",
        url: "http://localhost:8000/popularity",
        dataType: 'json',
        data: $('#popularform').serialize(),
        success: function(response){
        
        $("#container_two").toggle();
        for(i = 0; i < response.query.length; i++)
        {
            $("#popular_movies").append("<tr class='odd'><td class='col-xs-7'>"+response.query[i].title+"</td></tr>");
        }
        }
    });   
    });

});

</script>
@endsection
