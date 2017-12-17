<!DOCTYPE HTML>  
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<style>
            input[type=text], input[type=password], textarea, select, .addition, input{
                padding: 6px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 2px;
                margin-bottom: 16px;
                resize: vertical;
                font-size:13pt
            }
            input[type=text], input[type=password]{
                width: 400px;
            }
            textarea{
                width: 90%;
                display:block;
                
            }
            select{
                width: 80px;
            }

            button {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
            }

            .container {
                width: 90%;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                margin: 0 auto 0 auto;
            }
            .errors{
                color:red;
            }
            .lines{
                display:table-row;
            }
            #duratonH{
                width: 40px;
            }
            
            @media screen and (max-width: 300px) {
                input[type=text], input[type=password], textarea, select{
                    width:100%;
                    padding: 12px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    margin-top: 6px;
                    margin-bottom: 16px;
                    resize: vertical;
                }
            }
        </style>
<title>направи събитие</title>
</head>
<body>  

<?php
function redirect($url) {
           ob_start();
           header('Location: '.$url);
           ob_end_flush();
           die();
}

session_start();
if (isset($_SESSION['whatever'])){
echo "<class ='addition'>Hello {$_SESSION['name']}!</div>";
} else {
    redirect('/login.php');
}
?>    
    
    

<!--  ADD  -->


<div id="field" class = "container">
    <div id="addField" class = "fields">
        <h2>Зареждане на събитие</h2>
        <p><span class="error">* required field.</span></p>
        <div id ="startin" class="lines">    
            <span id ="starinD" class="parts">
                <label for="startongOn">Започва на(гггг-мм-дд): </label>
            <input type="date" name="startingOn" id="startingOn"> 
            </span>
            <span id ="starinT" class="parts">
                <label for="startingH">начален час: </label>
            <input type="number" name="startingH" id="startingH" min="0" max="23"> : <input type="number" name="startingM" id ="startingM" min="0" max="59">
            </span>
        </div>
        <div id ="endin" class="lines">
            <span id ="endinD" class="parts">
                <label for="endingOn">Свършва на(гггг-мм-дд):  </label>
            <input type="date" name="endingOn" id="endingOn">
            </span>
            <span id ="endinT" class="parts">
                <label for="endingH">Краен час:  </label>
            <input type="number" name="endingH" id ="endingH" min="0" max="23"> : <input type="number" name="endingM" id="endingM" min="0" max="59">  
            </span><br/>
        <span id="durationH">
            <label for="duration">Времетраене (часове)</label>
            <input type="number" name="duration" id="duration"></span>
        </div>
        <div id="highlight" class = "lines">
            <label for="highlights">Заглавие: </label>
            <textarea name="highlights" rows="5" cols="40" id = "highlights"></textarea>
        </div>
        <div id="descriptio" class = "lines">
            <label for="description">Описание:  </label>
            <textarea name="description" rows="5" cols="40" id="description"></textarea>
        </div>
        <div id="lin1" class="lines">
            <label for="link1">Картинка (Link):  </label>
            <input type="text" name="link1" id="link1">
        </div>
        <div id="lin2" class="lines">
            <label for="link2">Link2:  </label>
            <input type="text" name="link2" id="link2">
        </div>
        <div id="lin3" class="lines">
            <label for="link3">Link3: </label>
            <input type="text" name="link3" id="link3">
        </div>
        <div id="lin4" class="lines">
            <label for="link4">Link4: </label>
            <input type="text" name="link4" id="likn4">
        </div>
        <div id="lin5" class="lines">
            <label for="link5">Link5: </label>
            <input type="text" name="link5" id="link5">
        </div>
        <div id="lin6" class="lines">
            <label for="link6">Link6: </label>
            <input type="text" name="link6" id = "link6" >
        </div>
        <div id="ranks" class="lines">
            <span id ="mainstrea" class="parts">
                <label for="mainstream">Mainstream: </label>
                <input type="number" name="mainstream" id = mainstream> 
            </span>
            <span id ="additionalRankin" class="parts">
                <label for="additionalRanking">Additional ranking: </label>
                <input type="number" name="additionalRanking" id="additionalRanking">
            </span>
        </div>
        <button id="addEvent" >Добави събитието</button>
    </div>  
    <br><br>
    <!--div id ="results">
    </div-->
 
    
<!--   SHOW    -->


    <div id="findEvent" class="fields">
        <div id ="searchText" class="lines">
            
            <span id = "titleS" class="parts">
                <label for="title">текст: </label>
                <input id = "title" type="text" name ="title">
            </span>
        </div>
        <div id="searchTime" class="lines">
            <span id = "dateS"  class = "parts">
                <label for="date">дата: </label>
                <input id = "date" name = "dateV" type="date">
            </span>
            <span id = "hourS"  class = "parts">
            <label for="hour">час: </label>
                <input id = "hour" name = "hourV" type="number">
            </span>
            
            <span id = "minuteS" class = "parts">
                <label for="minute">минута: </label>
                <input id = "minute" name ="minuteV" type="number">
            </span>
            <div id = "searchB" class="buttons">
                <button id = "search">Търси</button>
            </div>
        </div>
    </div>
    <br><br>
    <div id ="results">
    </div>
</div>
    
    <script>
            $(document).ready(function(){
                (function(){
                    var highlights = $('#highlights');
                    var description = $('#description');
                    var startingOn = $('#startingOn');
                    
                    var startingH = $('#startingH');
                    var startingM = $('#startingM');
                    var endingOn = $('#endingOn');
                    
                    var endingH = $('#endingH');
                    var endingM = $('#endingM');

                    var link1 = $ ('#link1');
		    var link2 = $("#link2");
                    var link3 = $("#link3");
                    var link4 = $("#link4");
                    var link5 = $("#link5");
                    var link6 = $("#link6");
                   
                    var additionalRanking = $('#additionalRanking');
                    var mainstream = $('#mainstream');
                    
				
                    var results = $('#results');
                    var duration = $('#duration');
                    $(duration).val(1);
                    
                    var date = new Date();
                    var startMinute = date.getMinutes();
                    var startHour = date.getHours();
                    var startDate = date.toISOString().substr(0, 10);
                    
                    var durationDays = 0;
                    var durationV = $(duration).val();
                    var endHour = parseInt(startHour) + parseInt(durationV);
                    if (endHour > 23){
                         durarionDays = 1;
                    }
                    var endMinute = startMinute;
                    var newDate = new Date();
                    //var endDa = newDate.setDate(newDate.getDate());
                    if (durationDays == 1){
			newDate.setDate(date.getDate() + parseInt(durationDays));
                    }
                    var endDate = newDate.toISOString().substr(0, 10); 
                    
                    $(duration).val(1);
                    $(startingOn).val(startDate);
                    $(startingH).val(startHour);
                    $(startingM).val(startMinute);
                    
                    $(endingH).val(endHour);
                    $(endingM).val(endMinute);
                    $(endingOn).val(endDate);

                    $(duration).on('input keyup', function(){
                        durationV = $(duration).val();
                        endHour = parseInt($(startingH).val()) + parseInt(durationV);
			durationDays = 0;    
                        if (endHour > 23){
                            var hh = endHour;
                            while (endHour > 23){
                                hh-24;
                                durationDays++;
                            }
                            endHour = hh;
                            }
                        endMinute = $(startingM).val();
                        var nd = new Date();
                   	var nD  = new Date();
                        nD.setDate(nd.getDate() + durationDays);
			console.log("o: "+ nd +", oi: " + nD);
		        endDate = nD.toISOString().substr(0, 10); 
                        $(endingH).val(endHour);
                        $(endingM).val(endMinute);
                        $(endingOn).val(endDate);
                    });
                    
                   // ("0" + (now.getMonth() + 1)).slice(-2);
                      
                    $('#addEvent').on('click',function(){
                        var highlightsV = $(highlights).val();
                        var descriptionV = $(description).val();
                        var startingOnV = $(startingOn).val();
                        var startingHV = ("0" + $(startingH).val()).slice(-2);
                        var startingMV = ("0" + $(startingM).val()).slice(-2);
                        var endingOnV = $(endingOn).val();
                        var endingHV = ("0" +$(endingH).val()).slice(-2);
                        var endingMV = ("0" +$(endingM).val()).slice(-2);
			var link1V = $(link1).val();
                        var link2V = $(link2).val();
                        var link3V = $(link3).val();
                        var link4V = $(link4).val();
                        var link5V = $(link5).val();
                        var link6V = $(link6).val();
                        var additionalRankingV = $(additionalRanking).val();
                        var mainstreamV = $(mainstream).val();
                        var pp= {"highlights": highlightsV, 
                                 "description": descriptionV,
                                 "startingOn": startingOnV,
                                 "startingH": startingHV,
                                 "startingM": startingMV,
                                 "endingOn": endingOnV,
                                 "endingH": endingHV,
                                 "endingM": endingMV,
				 "link1": link1V,
                                 "link2": link2V,
                                 "link3": link3V,
                                 "link4": link4V,
                                 "link5": link5V,
                                 "link6": link6V,
                                 "additionalRanking": additionalRankingV,
                                 "mainstream": mainstreamV
                                };
                        $.post("eventadd.php", pp, function(data){
                                results.html(data);
                        }); 
                    });               
                })();  
                
                (function(){
                    
                    
                    
                    
                    $('#search').on('click', function(){
                        //console.log("text: "+text+", dateV: "+dateV+", textS: "+textS+", when: "+whenS);
                        var dateV = $('#date').val();
                        var hourV = $('#hour').val();
                        var minuteV = $('#minute').val();
                        console.log('min'+minuteV);
                        console.log('h'+hourV);
                        console.log('d'+dateV);
                        
                        var time = hourV +":"+ minuteV;
                        var text = $('#title').val();
                        console.log("before p: "+text);
                        $.post( 'show.php', { "title": text, "time": time, "date": dateV}, function(data){
                            console.log(data);
                            var events = '';
                            try{
                                var arr = JSON.parse(data);
                                console.log(arr);

                                for (var i = 0; i < arr.length; i++){
                                    events += "<div id = 'container" + arr[i].id +"' style='background-image:url(\""+ arr[i].img +"\")' class='containers'>";
                                    events += "<span class='showIDs'>id: " + arr[i].id + "</span>";
                                    events += "<span class='mainstreams'>популярост: " + arr[i].mainstream + "</span>";                   
                                    events += "<span class='rankings'>ранг: " + arr[i].rank + "</span>";
                                    events += "<div class='times'> От:" + arr[i].startingOn +" в "+ arr[i].startingAt + "часа,  до:" + arr[i].endingOn + " в "+arr[i].endingAt +"часа</div>";
                                    events += "<div clas ='highlightss'>" +arr[i].highlights + "</div>";
                                    events += "<div clas ='descriptions'>" +arr[i].description + "</div>";
                                    events += "<button id ='change"+arr[i].id+"' class ='changebuttons'>Промени</button>";
                                    events += "<button id ='del"+ arr[i].id +"' class ='deletebuttons'>Изтрий</button>";      
                                    events += "</div>";
                                }
                                console.log("events"+events);
                            } catch(e){
                                events = data;
                            }
                            $('#results').html(events);
                            
                        });
                    });
                    $("#results").on('click',".changebuttons", function(){
                                   var eventId = $(this).attr("id").replace('change', '');
                                   console.log('change!');
                                   alert("not implemented yet.  Event id:" + eventId);
                    });
                    $("#results").on('click', ".deletebuttons", function(){
                                   var eventId = $(this).attr("id").replace('del', '');
                                   $.post('delete.php',{'parameter': 'id', 'value': eventId},function(data){
                                       $('#container'+ eventId).html(data);
                                   });
                    });
                })();
                
            });
    </script>
    

</body>
</html>
