<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="search">
	<form	action="/welcome/search" method="GET">
		<select name="day">
			{days}
		</select>

		<select name="timeslot">
			{timeslots}
		</select>

		<input type="submit" value="Search!"/>
	</form>
</div>
