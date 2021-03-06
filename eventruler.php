<!DOCTYPE HTML>  
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                font-size:13pt;
                text-align: center;
            }
            input[type=text], input[type=password]{
                width: 300px;
            }
            textarea{
                width: 90%;
                display:block;
                
            }
            select{
                width: 20px;
            }

            button {
                background-color: #7A013B;
                color: white;
                padding: 12px 20px;
                margin: 0 5px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #6A013B;
            }

            .container {
                width: 600px;
                border-radius: 5px;
                background-color: #52E497;
                padding: 20px;
                margin: 0 auto 0 auto;
            }
            .container2 {
                width: 600px;
                border-radius: 5px;
                background-color: #52A097;
                padding: 20px;
                margin: 0 auto 0 auto;
            }
            .results {
                width: 600px;
                border-radius: 5px;
                /*background-color: #52A097;*/
                padding: 20px;
                margin: 0 auto 0 auto;
            }
            .errors{
                color:red;
            }
            .lines{
                display:table-row;
            }
            #durationH{
                width: 40px;
            }
            #mainstream, #additionalRanking{
                width:60px;
            }
            #datetime1, #datetime2{
                width: 150px;
            }
            .lines{
                display:block;
            }
            .parts{
                display:inline;
            }
            .econtainers{
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                margin: 2px 0 0 0;
                padding: 6px 10px 6px 20px;
                border-radius: 5px;
            }
            .events.text{
                background: #AAD1BB;
            }
            .highlightss, .descriptions{
                text-align: justify;
                text-justify: inter-word;
            }
            .socialnetworks {
                width:20px;
            }
            .controls{
                position:relative;
            }
            #datetime3, #datetime4, #text {
                    display: table-cell;
                }
            #findEvent{
                display:table;
            }
            /*label[for="datetime3"], label[for="datetime4"], label[for="title"]{
                display:table-cell;
            }
            #searchText, #searchDate, #searchTime{
                display:table-row;
            }*/
            
            /*@media screen and (max-width: 505px) {
            .parts{
                    display:block;
                }
            }*/
            @media screen and (max-width: 546px) {
                input[type=text], input[type=password], textarea, select, imput{
                    width:100%;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;
                    margin-top: 6px;
                    margin-bottom: 16px;
                    resize: vertical;
                    display:block;
                }
                #mainstream, #additionalRanking{
                    width:50px;
                }
                #datetime1, #datetime2{
                    width: 200px;
                }
                .container{
                    width: 90%;
                }
                .container2{
                    width: 90%;
                }
                .results{
                    width: 90%;                   
                }
                .parts{
                    display:block;
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
        
        <p></p>
        
        <div id ="timings" class="lines">
            
            <div id ="startin" class="parts">
                <label for="datetime1">Начало: </label>
            <input id="datetime1" name = "starting" type="text" >
            </div>
            <div id ="endin" class="parts">
                <label for="datetime2"> Край:  </label>
                <input id="datetime2" name = "ending" type="text" >           
            </div>
        </div>
            
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
        <!--/conrtainer -->
    </div>  
    <br><br>
    <!--div id ="results">
    </div-->
 
    
<!--   SHOW    -->

<div id="field2" class = "container2">
    Търси събитие с <br/>
    <div id="findEvent" class="fields">
        <div id ="searchText" class="lines">           
            <div id = "titleS" class="parts">
                <label for="title">текст: </label>
                <input id = "title" type="text" name ="title">
            </div>
        </div>
        <div id="searchDate" class="lines">
            <div id ="findafter" class="parts">
                <label for="datetime3">Започва след: </label>
                <input id="datetime3" name = "findafter" type="text" >
            </div>           
        </div>
        <div id="searchTime" class="lines">
            <div id ="findafter2" class="parts">
                <label for="datetime4">Започва след: </label>
                <input id="datetime4" name = "findafter2" type="text" >
            </div>           
        </div>
        <div id = "searchB" class="buttons">
                <button id = "search">Търси</button>
        </div>
    </div>
</div>
    <br><br>
    <div id ="results" class="results">
    </div>
<!--</div>-->
    
    <script>
            $(document).ready(function(){
                (function(){
                    var highlights = $('#highlights');
                    var description = $('#description');
                    //var startingOn = $('#startingOn');
                    
                    //var startingH = $('#startingH');
                    //var startingM = $('#startingM');
                    //var endingOn = $('#endingOn');
                    
                    //var endingH = $('#endingH');
                    //var endingM = $('#endingM');

                    var link1 = $ ('#link1');
		    var link2 = $("#link2");
                    var link3 = $("#link3");
                    var link4 = $("#link4");
                    var link5 = $("#link5");
                    var link6 = $("#link6");
                   
                    var additionalRanking = $('#additionalRanking');
                    var mainstream = $('#mainstream');
                    
				
                    var results = $('#results');
                    //var duration = $('#duration');
                    //$(duration).val(1);
                    
                    //var date = new Date();
                    //var startMinute = date.getMinutes();
                    //var startHour = date.getHours();
                    //var startDate = date.toISOString().substr(0, 10);
                    
                    var starting = $('#datetime1');
                    var ending = $('#datetime2');
                    
                    /*var durationDays = 0;
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
                    });*/
                    
                   // ("0" + (now.getMonth() + 1)).slice(-2);
                      
                    $('#addEvent').on('click', function(){
                        var begin = $(starting).val().replace(/\//g ,'-');
                        var end = $(ending).val().replace(/\//g ,'-');
                        var highlightsV = $(highlights).val();
                        var descriptionV = $(description).val();
                        var startingOnV = begin.substr(0,10);//$(startingOn).val();
                        var startingHV = begin.substr(11,2);//("0" + $(startingH).val()).slice(-2);
                        var startingMV = begin.substr(14,2);//("0" + $(startingM).val()).slice(-2);
                        var endingOnV = end.substr(0,10);//$(endingOn).val();
                        var endingHV = end.substr(11,12);//("0" +$(endingH).val()).slice(-2);
                        var endingMV = end.substr(14,2);//("0" +$(endingM).val()).slice(-2);
                        if (startingOnV === endingOnV){
                            if (parseInt(startingHV) > parseInt(endingHV)){
                                alert("Ending must be after Begining!");
                            } else if (startingHV === endingHV && parseInt(startingMV) > parseInt(endingMV)){
                                alert("Ending must be after Begining!");
                            }
                        }
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
                        var after = $('#datetime3').val();//.replace(/\//g ,'-');
                        var aftert = $('#datetime4').val();
                        var dateV = after.substr(0,10);//$('#date').val();
                        console.log("date: "+dateV);
                        var hourV = aftert.substr(0,2);//$('#hour').val();
                        console.log("time: "+after);
                        var minuteV = aftert.substr(3,2);//$('#minute').val();
                        console.log('min: '+minuteV);
                        console.log('h: '+hourV);
                        console.log('d: '+dateV);
                        
                        var time = $('#datetime4').val().substr(0,5);//hourV +":00";//// hourV +":"+ minuteV;
                        console.log("time2: "+time);
                        var text = $('#title').val();
                        console.log("before p: "+text);
                        $.post( 'show.php', { "title": text, "time": time, "date": dateV}, function(data){
                            console.log(data);
                            var events = '';
                            try{
                                var arr = JSON.parse(data);
                                console.log(arr);

                                for (var i = 0; i < arr.length; i++){
                                    events += "<div id = 'econtainer" + arr[i].id +"' style='background-image:url(\""+ arr[i].img +"\")' class='econtainers'>";
                                    events += "<span class='showIDs events text'>id: " + arr[i].id + "</span>";
                                    events += "<span class='mainstreams events text'>| популярост: " + arr[i].mainstream + "</span>";                   
                                    events += "<span class='rankings events text'>| ранг: " + arr[i].rank + "</span>";
                                    events += "<div class='times events'><span class='events text'> От:" + arr[i].startingOn +" в "+ arr[i].startingAt + "часа,  до:" + arr[i].endingOn + " в "+arr[i].endingAt +"часа</span></div>";
                                    events += "<div class ='highlightss events'><span class = 'events text'>" +arr[i].highlights + "</span></div>";
                                    events += "<div class ='descriptions events'><span class = 'events text'>" +arr[i].description + "</span></div>";
                                    events += "<a href ='"+ arr[i].link2 +"' target='_blank'><img class='socialnetworks' src='/circleicons/Facebook.png'/></a>";
                                    events += "<a href ='"+ arr[i].link3 +"' target='_blank'><img class='socialnetworks' src='/circleicons/Twitter.png'/></a>";
                                    events += "<a href ='"+ arr[i].link4 +"' target='_blank'><img class='socialnetworks' src='/circleicons/Linkedin.png'/></a>";
                                    events += "<a href ='"+ arr[i].link5 +"' target='_blank'><img class='socialnetworks' src='/circleicons/Google+.png'/></a>";
                                    events += "<a href ='"+ arr[i].link6 +"' target='_blank'><img class='socialnetworks' src='/circleicons/YouTube.png'/></a>";
                                    events += "<div class='controls'>";
                                    events += "<button id ='change"+arr[i].id+"' class ='changebuttons'>Промени</button>";
                                    events += "<button id ='del"+ arr[i].id +"' class ='deletebuttons'>Изтрий</button>";      
                                    events += "</div>";
                                    events += "</div>";
                                }
                                //console.log("events"+events);
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
                
                
                
                jQuery('#datetime1').datetimepicker({
                              onShow:function( ct ){
                                  //format:'Y/m/d H:i',
                               this.setOptions({
                                maxDate:jQuery('#datetime2').val()?jQuery('#datetime2').val():false //,
                                //maxTime:jQuery('#datetime2').val()?jQuery('#datetime2').val():false
                               });
                              }
                             });
                jQuery('#datetime2').datetimepicker({
                              onShow:function( ct ){
                               this.setOptions({
                                minDate:jQuery('#datetime1').val()?jQuery('#datetime1').val():false//,
                                //minTime:jQuery('#datetime1').val()?jQuery('#datetime1').val():false
                               });
                              }
                             });
                             
                             jQuery('#datetime3').datetimepicker({
                                format:"Y-m-d",
                                timepicker:false
                             });
                              jQuery('#datetime4').datetimepicker({
                                format: "H:m",
                                datepicker:false
                              });
                             
                //docready end
            });
            
            
            
    </script>
    

</body>
<link rel="stylesheet" type="text/css" href="/when/jquery.datetimepicker.css" />
    <!--script src="/when/jquery.js"></script-->
    <script src="/when/build/jquery.datetimepicker.full.min.js"></script>
</html>
