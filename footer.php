<div id="footer">
	<p>Server: <i>homqsrgqteam10.qiagen.ads</i>&nbsp;
	<?php
		if ($auth_isset)
		{
			echo " | <a href='tools.php'>Tools</a>";
			echo " | User: <i>" . $auth_user_name . "</i>";
		}
		else
		{
			echo "<a href=\"login.php\">Login</a>";
		}
	?>
	</p>  
</div>
