<!--<?php

    $con = mysqli_connect("localhost","root","root","erp");
    $result=mysqli_query($con,"select * from employee order by empfname;");
?>-->
<script type="text/javascript">
        function show(val){
            if(val==1){
                document.getElementById('div1').style.display="inline";
                document.getElementById('div2').style.display="none";
                document.getElementById('div3').style.display="none";
            }
            else if(val==2){
                document.getElementById('div1').style.display="none";
                document.getElementById('div2').style.display="inline";
                document.getElementById('div3').style.display="none";
            }
            else{
                document.getElementById('div1').style.display="none";
                document.getElementById('div2').style.display="none";
                document.getElementById('div3').style.display="inline";
            }
        }
</script>
<script>
function change_myselect1() {
  var obj, dbParam, xmlhttp, myObj, x, txt = "";
  obj = {"id":document.getElementById('search2').value};
  dbParam = JSON.stringify(obj);
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
      myObj = JSON.parse(this.responseText);
      txt+="<table border=2><tr><th>ID</th><th>First Name</th><th>Last Name </th><th>Absent/Present</th><th>Date</th></tr>";
      for (x in myObj) {
        txt += "<tr><td>" + myObj[x].id + "</td>";
        txt+= "<td>"+myObj[x].empfname + "</td>";
        txt+= "<td>"+myObj[x].emplname + "</td>";
        txt+= "<td>"+myObj[x].present + "</td>";
        txt+= "<td>"+myObj[x].attenddate + "</td></tr>";
      }
      txt+="</table>";
      document.getElementById("saldiv").innerHTML = txt;
    }
  };
xmlhttp.open("POST", "Second.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
}
</script>

<!--mark the attendence -->
<script>
function mark_attendence(){
  var obj, dbParam, xmlhttp;
  var isattend=document.getElementsByName('attendR');
  var value;
  if(isattend[0].checked){
    value=1.
  }
  else{
    value=0
  }
  obj = {"id":document.getElementById('search').value,"present":value};
  dbParam = JSON.stringify(obj);
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        alert("attend marked");
        change_myselect();
    }
  };
xmlhttp.open("POST", "fouth.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
}
</script>



<script>
    //script for poplating the select list
    function populateString() {
  var obj, dbParam, xmlhttp, myObj, x, txt = "";
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myObj = JSON.parse(this.responseText);
      for (x in myObj) {
        var option= document.createElement("option");
        option.text=myObj[x].empfname;
        option.value=myObj[x].id;
        document.getElementById("search2").appendChild(option);
        document.getElementById("search").appendChild(option.cloneNode(true));
        change_myselect();
      }
      //document.getElementById("sellist").innerHTML = txt;
    }
  };
  xmlhttp.open("POST", "third.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}

</script>
<script>
function change_myselect() {
  var obj, dbParam, xmlhttp, myObj, x, txt = "";
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText)
      myObj = JSON.parse(this.responseText);
      txt+="<table border=2><tr><th>ID</th><th>First Name</th><th>Last Name </th><th>Absent/Present</th></th></tr>";
      for (x in myObj) {
        txt += "<tr><td>" + myObj[x].id + "</td>";
        txt+= "<td>"+myObj[x].empfname + "</td>";
        txt+= "<td>"+myObj[x].emplname + "</td>";
        txt+= "<td>"+myObj[x].present + "</td></tr>";
      }
      txt+="</table>";
      document.getElementById("div1").innerHTML = txt;
    }
  };
  xmlhttp.open("POST", "First.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send();
}
</script>
<body onload="populateString()">
<div style="float: left;width:20%">
<form method="post"  action="">
<input type="button"  name="ta" value="Take Attendence" onclick="show(1)"><br><br>
<input type="button"  name="aemp" value="Add Employe" onclick="show(2)"><br><br>
<input type="button"  name="salary" value="Calculate Salary" onclick="show(3)">
</form>
</div>

<div id="div1" style="display: block;width: 50%; float: left;">
    
    This is a text written
    <button onclick="change_myselect()">click me</button>
</table>
</div>
<div id="div2" style="display: none; width: 50%; float: left;" >
<form method="post">
Id:- <input type="text" name="id">
First name:- <input type=text name=empfname><br>
Last name:- <input type=text name=emplname><br>
Age:- <input type=number name=empage><br>
Salary:- <input type=number name=empsalary><br>
Work:- <select name="empwork">
       <option value="pro">Enter the work</option>
    </select><br>
Mobile no.:-<input type=number name=mobilenum><br><br>

<input type="submit" value="Add Employe" name="addEmployee">
<br>
<input type="reset" value="reset">
</form>
</div>

<div id="div3" style="display: none;width: 50%; float: left;">
<form method="post" action="">    
<div id="sellist">
    <select id="search2" value="null" onchange="change_myselect1()">
        <option value="null">Enter your name</option>
    </select>
</div>
<!--to be done -->
<input  type="button" name="showsal" value="show sal">
<input type="button" name="paysal" value="pay sal">

</form>
<br><br><br>
<div id="saldiv" style="float: left;">
</div>
</div>
    <div style="float:left">
    Enter employe name:- 
    <div id="sellist2">
        <select id='search'><option value='null'> Enter the name </option></select>
    </div>
    <br>
    Present <input type=radio name="attendR" value=1> Absent<input type=radio name="attendR" value=0><br>
    <button id="markAttendence" type="button" name="attendButton" onclick="mark_attendence()">Mark Attendence</button>
</div>
</body>