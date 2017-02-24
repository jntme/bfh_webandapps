<html>
<head>

</head>
<h1>Example of Forms fields</h1>
<body>
<form method="GET" action="forms.php">

There is here a hidden input, which is not displayed: <input type="hidden" name="somethingsecret" value="yes" /><br />
Input type text: <input type="text" name="textfield1" value="123" size="50" />
<br />
Input type password: <input type="password" name="pwdfield1" value="123" size="20" />
<br />
Input type Radiobutton: 1:<input type="radio" name="radiofield1"
value="1" checked="true" /> 2:<input type="radio" name="radiofield1" value="2" /> 3:<input type="radio" name="radiofield1" value="3" />
<br />
Another (independent set of radiobuttons:
1:<input type="radio" name="radiofield2" value="1" /> 2:<input type="radio" name="radiofield2" value="2" /> 3:<input type="radio" name="radiofield2" value="3" />
<br />

Selection Box:
<select name="selectionfield1">
<option value="7">Tous</option>
<option value="1">Gare/Arr&#234;t</option>
<option value="2">Lieu,rue,num&#233;ro</option>
<option value="4">Tourisme</option>
</select>
<br />
	 Another Select (in a scrolling list):<br />
<select name="select2" size="5" onchange=";" >
					<option value="6">Auto</option>
					<option value="3">Autor</option>
					<option value="22">Bachelor</option>
					<option value="5">Chemie</option>
					<option value="4">Elektro</option>
					<option value="18">homepage</option>
					<option value="10">HTI</option>
					<option value="24">Info-Schwerpunkte</option>
					<option value="1">Informatik</option>
					<option value="16">ITS</option>
					<option value="7">Maschinen</option>
					<option value="23">Master</option>
					<option value="11">menu1-Sysfolders</option>
					<option value="12">menu2-HTI_global</option>
					<option value="13">menu3-Weiterbildung</option>
					<option value="14">menu4-Fachbereiche</option>
					<option value="19">menu5-I</option>
					<option value="17">menu6_Ma_Mi</option>
					<option value="15">menu7-Weiterb_MNG</option>
					<option value="8">Mikrotechnik</option>
					<option value="20">MNG</option>
					<option value="21">Technologietransfer</option>
					<option value="9">Weiterbildung</option>
				</select>
<br />
	 We can select more content in a list with multiple selection (the field has multiple values in the Query string):<br />
<select multiple="1" name="multiselect" size="3">
 <option value="Less than 1 year.">Less than 1 year.</option>
 <option value="1-5 years.">1-5 years.</option>
 <option value="5-10 years.">5-10 years.</option>
 <option value="More than 10 years.">More than 10 years.</option>
 </select>
 <br />

 Textarea: 
<textarea name="textareafield">This is the default value of this textarea</textarea><br />

	 Buttons (to interract with in javascript): <input type="button" value="test" name="btn1" />
<input type="button" value="correct" name="btn2" /><br />
	 Submit buttons (to send to the : action)<input type="submit" value="OK" name="send" />
<br />

Image (the coordinates of the clicked point are transfered in the query string)
<br />
<input type="image" src="imagemap.gif" name="image" alt="image without image map">

<br /> 

<!--
-->
</form>

</body>
</html>