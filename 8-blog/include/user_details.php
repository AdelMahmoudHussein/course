<?php
$user_name=$_SESSION['user_name'];
?>

<ul class="nav navbar-nav">
		 <li><a href=<?php echo $newpost_url ?> >
		 		<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>
		 	</a>
		 </li>

        <li>
        	<a href=<?php echo $profile_url; echo "?user=".$user_name; ?> >
        		Hello <?php echo "$user_name" ?>
        	</a>
        </li>

        <li>
        	<a href=<?php echo $logout_url ?> >
        		<span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span>
        	</a>
        </li>
 </ul>