<?php
require_once("api.php");
require_once("connect.php");

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
function generateUser($length){
	$symbols = "1234567890qwertyuiopasdfghjkzxcvbnmQWERTYUIOASDFGHJKLZXCVBNM";
	$user = "";
	for($i = 0; $i < $length; $i ++){
		$user .= $symbols[rand(0,strlen($symbols)-1)];
	}
	return $user;
}
if(!isset($_SESSION['user'])){
	$_SESSION['user'] = generateUser(25);
}
	echo "<input type=\"hidden\" id=\"myUser\" value=\"".$_SESSION['user']."\">";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="shortcut/icon" href="https://lh3.googleusercontent.com/YGqr3CRLm45jMF8eM8eQxc1VSERDTyzkv1CIng0qjcenJZxqV5DBgH5xlRTawnqNPcOp=w300">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
	/*class element*/
function element(){
	this.getElement = function(element){
		this.element = element;
		return this;
	}
    this.createElement = function(element, parent, insertBefore){
		if(!insertBefore){
      		this.element = parent.appendChild(document.createElement(element));
		}else{
	      var newone = document.createElement(element);
	      parent.insertBefore(newone, insertBefore);
	      this.element = newone;
		}
      return  this;
    }
    this.this = function(){
        return this.element;
    }
    this.value = function(value){
      this.element.value = value;
        return this;
    }
    this.attr = function(attr,value){
      this.element.setAttribute(attr,value);
        return this;
    }
   
    this.id = function(id){
      this.element.id = id;
      return this;
    }
    this.src = function(src){
      this.element.src = src;
      return this;
    }
    this.innerHTML = function(text){
      this.element.innerHTML = text;
      return this;
    }
    this.css = function(css){
	this.style="";
      if(css instanceof Array){
        for(var index = 0; index < css.length; index++){
          this.style += css[index] + ";";
        }
      }else if(typeof css === 'object'){
        for(var key in css){
          this.style += key+": "+css[key]+"; ";
        }
      }else{
        this.style = css;
      }
        this.element.setAttribute("style",  this.style);
      return this;
    }
    this.title = function(title){
        this.element.title = title;
        return this;
    }
    this.onmouseover = function(func){
        this.element.setAttribute("onmouseover",func);
        return this;
    }
    this.onmouseout = function(func){
        this.element.setAttribute("onmouseout",func);
        return this;
    }
    this.onclick = function(func){
        this.element.setAttribute("onclick",func);
        return this;
    }
}

	function findNextOne(element){
		var question_id = $(element).parent().find("input").first().val();
		var user_id = $("#myUser").val();
		var question_text = $(element).parent().find("textarea").val();
		if(question_text.length<1)
			return;
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					question_text_parsed = question_text.replace(/</g, "&#60;");
					createElFragment(element.parentElement.parentElement.getElementsByClassName("panel-body")[0],question_text_parsed,0,0,0);
					element.parentElement.getElementsByTagName("textarea")[0].value = "";
					globalQuant++;
				}
			};
		  xhttp.open("GET", "comment.php?comment="+question_text+"&user_id="+user_id+"&question_id="+question_id, true);
		  xhttp.send();

	}
	function likeIt(con,id){
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				}
			};
		  xhttp.open("GET", "likeunlike.php?condition="+con+"&answer_id="+id, true);
		  xhttp.send();

	}

	function likesAll(id){
		var opa = "";
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText)[0][0];
					opa = data;
				}
			};
		  xhttp.open("GET", "get_likes.php?answer_id="+id, false);
		  xhttp.send();

		  return opa;

	}

	function commentchecker(id){
		var opa = "";
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText)[0][0];
					opa = data;
				}
			};
		  xhttp.open("GET", "all.php?all=1", false);
		  xhttp.send();
		  return opa;

	}
	function dislikesAll(id){
		var opa = "";
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText)[0][0];
					opa = data;
				}
			};
		  xhttp.open("GET", "get_dislikes.php?answer_id="+id, false);
		  xhttp.send();

		  return opa;

	}
	function getCoords(elem) { // crossbrowser version
    var box = elem.getBoundingClientRect();

    var body = document.body;
    var docEl = document.documentElement;

    var scrollTop = window.pageYOffset || docEl.scrollTop || body.scrollTop;
    var scrollLeft = window.pageXOffset || docEl.scrollLeft || body.scrollLeft;

    var clientTop = docEl.clientTop || body.clientTop || 0;
    var clientLeft = docEl.clientLeft || body.clientLeft || 0;

    var top  = box.top +  scrollTop - clientTop;
    var left = box.left + scrollLeft - clientLeft;

    return { top: Math.round(top), left: Math.round(left) };
}
	function dumpData(element){
		var question_id = $(element).parent().find("input").val();
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					for(var index in data){
						createElFragment(element.parentElement, data[index][0], data[index][1],likesAll(data[index][1]),dislikesAll(data[index][1]));
					}
					$(element).hide();
				}
			};
		  xhttp.open("GET", "get_questions.php?question_id="+question_id, true);
		  xhttp.send();
	}




function createElFragment(el,textComent,valID,likesquant,dislk){
	var media = new element().createElement("div",el).attr("class","media").this();
	var mediaLeft = new element().createElement("div",media).attr("class","media-left").this();
	var img = new element().createElement("img",mediaLeft).attr("class","media-object").attr("style","width:60px").src("http://www.w3schools.com/bootstrap/img_avatar1.png");
	var mediaBody = new element().createElement("div",media).attr("class","media-body").this();
	var p = new element().createElement("p",mediaBody).innerHTML(textComent).this();
	var hidd = new element().createElement("input",mediaBody).attr("type","hidden").value(valID).this();

	var buttonLike = new element().createElement("button",mediaBody).css("margin-right:10px;").attr("class","btn btn-success").innerHTML("True").this();
	var badge1 = new element().createElement("span",buttonLike).innerHTML(likesquant).css("margin-left:4px;").attr("class","badge").this();
	var buttonDislike = new element().createElement("button",mediaBody).attr("class","btn btn-danger").innerHTML("False").this();
	var badge2 = new element().createElement("span",buttonDislike).innerHTML(dislk).css("margin-left:4px;").attr("class","badge").this();

	buttonLike.onclick = function(){
		var hidddenID = $(this).parent().find("input").val();
		$(this).addClass("disabled");
		this.setAttribute("disabled","");
		$(this).find("span").html(parseInt($(this).find("span").html())+1);
		likeIt(1,hidddenID);
	}
	buttonDislike.onclick = function(){
		var hidddenID = $(this).parent().find("input").val();
		$(this).addClass("disabled");
		this.setAttribute("disabled","");
		$(this).find("span").html(parseInt($(this).find("span").html())+1);
		likeIt(0,hidddenID);
	}

}
var globalQuant = 0;

document.body.onload = function(){
	$(".clickables").click();
	globalQuant = commentchecker();
	setInterval(function(){
		if(globalQuant<commentchecker()){
			commpopup();
			globalQuant++;
		}
	},5000);
	if(window.innerWidth>600){
		buttonfor();
	}


}



function commpopup(){
	var d = new element().createElement("div",document.body).css({
		"position":"fixed",
		"top":"0px",
		"margin":"0",
		"left":window.innerWidth/2-75+"px",
		"background":"black",
		"color":"white",
		"text-align":"center",
		"width":"150px",
		"padding":"5px",
		"border-bottom-left-radius": "5px",
		"border-bottom-right-radius": "5px"
	}).this();
	var k = new element().createElement("span",d).innerHTML("+1 Answer").this();
	var a = new element().createElement("a",d).innerHTML(" reload").css("cursor:pointer;").this();
	var audio = new Audio('type.wav');
	audio.play();
	a.onclick=function(){
		location.reload();
	}
	setTimeout(function(){
		d.parentNode.removeChild(d);
	},1000000);
}

function createleftPanelScroll(){
	var d = new element().createElement("div",document.body).css({
		"position":"fixed",
		"top":window.innerHeight/2-250+"px",
		"margin":"0",
		"left":"0px",
		"background":"#f5f5f5",
		"color":"black",
		"text-align":"center",
		"width":"150px",
		"height":"500px",
		"padding":"5px",
		"border-top-right-radius": "5px",
		"border-bottom-right-radius": "5px",
		"overflow":"hidden",
		"overflow-y":"auto"
	}).this();
	var k = new element().createElement("h6",d).innerHTML("Questions").css("text-align:center;").this();
	var aa = new element().createElement("a",k).innerHTML(" close").css("cursor:pointer;").onclick("this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);").this();
	for(var index=0;index<myGlobalCoords.length;index++){
		var kk = index;
		var a = new element().createElement("a",d).innerHTML("question "+ (++kk)).css("cursor:pointer;").onclick("window.scrollTo(0,"+myGlobalCoords[index]+");").this();
		new element().createElement("br",d).this();
	}
 myGlobalCoords = [];
}

var myGlobalCoords = [];
function assigpixels(){

	for(var index = 0; index< document.getElementsByClassName("myscrolingpoint").length; index++){
		myGlobalCoords.push(getCoords(document.getElementsByClassName("myscrolingpoint")[index].parentElement.parentElement).top-10);
	}
	createleftPanelScroll();
}

function buttonfor(){
	var d = new element().createElement("div",document.body).css({
		"position":"fixed",
		"top":window.innerHeight/2-50+"px",
		"margin":"0",
		"left":"0px",
		"background":"#f5f5f5",
		"color":"black",
		"text-align":"center",
		"width":"50px",
		"height":"100px",
		"padding":"5px",
		"padding-top":"18px",
		"border-top-right-radius": "5px",
		"border-bottom-right-radius": "5px",
		"overflow":"hidden",
		"overflow-y":"auto",
		"cursor":"pointer"
	}).this();
	var k = new element().createElement("h4",d).innerHTML("Scroller").css("text-align:center;transform:rotate(90deg);").this();
	for(var index=0;index<myGlobalCoords.length;index++){
		var kk = index;
		var a = new element().createElement("a",d).innerHTML("question "+ (++kk)).css("cursor:pointer;").onclick("window.scrollTo(0,"+myGlobalCoords[index]+");").this();
	}
	d.onclick=function(){
		assigpixels();
	}
}

</script>
 

<body>
<div class="container" style="margin-bottom: 100px; margin-top: 50px;">

<h2 style="margin:auto;text-align: center;">
	43QuestionsYoushouldKnow
</h2>
<hr>
<?php
/*dump all questions*/
	// $connection = (new Connection())->setNewConnection("root","1234","truls","localhost")->debugMode(false)->connect();
	
	$query = "select * from questions";
	$columnArray =  array("id","text");
	$query = new select($connection, $query, $columnArray); 

	$return2dArray = $query->getData(); 

	foreach ($return2dArray as $oneArray) {/* პირველი ჩანაწერი*/
			createPanel($oneArray[1], $oneArray[0]);
	}

?>





	<?php
		function createPanel($Question,$id){
	?>
			<div class="panel panel-default" style="width: 700px;margin:auto;margin-bottom: 30px;">
				<div class="panel-heading">
					<h2>
					<!-- questions here -->
						<?php echo $Question; ?>
					</h2>
				</div>
				<div class="panel-body">
					<input type="hidden" class="myscrolingpoint" value="<?php echo $id; ?>">
					<button class="form-control btn btn-info clickables" onclick="dumpData(this);">Loading comments...</button>

				</div>
				<!-- comment area -->
				<div class="container" style="width: 100%;">
					<input type="hidden" value="<?php echo $id; ?>">
					<textarea placeholder="Leave Your Answer/Comment Here" class="form-control" style="resize: none;resize:vertical;max-height: 300px;"></textarea>
					<button onclick="findNextOne(this)" class="form-control btn btn-default" style="margin-bottom:20px;margin-top:20px;width: 20%;float:right;">Comment</button>
				</div>
			</div>
	<?php 
		}
	?>




	








<hr>
<h4 style="text-align: center;">Created by: <a href="https://www.facebook.com/i.am.nimda.bk" target="_blank">me</a></h4> 
</div>

</body>
</html>