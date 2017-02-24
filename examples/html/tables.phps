<html>
<head>
<title>Tables</title>
<link rel="stylesheet" href="tables.css" type="text/css" />
</head>

<body>
<h1>Examples of tables</h1>
<p>Very simple table:<br />
<table>
<tr><th>Year</th><th>Warmest Month</th><th>Temparature</th></tr>
<tr><td>2006</td><td>June</td><td>24</td></tr>
<tr><td>2007</td><td>August</td><td>27</td></tr>
<tr><td>2008</td><td>July</td><td>31</td></tr>
<tr><td>2009</td><td>June</td><td>29</td></tr>
</table>
</p>
<p>
Table with a border:<br />
<table border="1">
<tr><th>Year</th><th>Warmest Month</th><th>Temparature</th></tr>
<tr><td>2006</td><td>June</td><td>24</td></tr>
<tr><td>2007</td><td>August</td><td>27</td></tr>
<tr><td>2008</td><td>July</td><td>31</td></tr>
<tr><td>2009</td><td>June</td><td>29</td></tr>
</table>
</p>

<p>
Table with colspann and rowspan:<br />
<table>
<tr><th>&nbsp;</th><th colspan="2">Result</th></tr>
<tr><th>Year</th><th>Warmest Month</th><th>Temparature</th></tr>
<tr><td rowspan="2">2006</td><td>June</td><td>27</td></tr>
<tr><td>August</td><td>27</td></tr>
<tr><td>2007</td><td>July</td><td>31</td></tr>
<tr><td>2008</td><td>June</td><td>29</td></tr>
</table>
</p>

<p>
Table using CSS<br />
<table class="colored">
<tr><th>&nbsp;</th><th colspan="2">Result</th></tr>
<tr><th>Year</th><th>Warmest Month</th><th>Temparature</th></tr>
<tr><td rowspan="2">2006</td><td>June</td><td>27</td></tr>
<tr><td>August</td><td>27</td></tr>
<tr><td>2007</td><td>July</td><td class="red">31</td></tr>
<tr><td>2008</td><td>June</td><td>29</td></tr>
</table>
</p>



</body>
</html>