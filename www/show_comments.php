<?php
function show_comments()//выводвсехкомментариевкстатье
{
 include("config.php");
 $res = mysqli_query($con, "select * from comments order by date_add DESC") or die ("Error! query don't show comments");
 while($arr = mysqli_fetch_array($res, 2))
	 {
		 ?>
		<div class=main>
			<img src=images/comentator.jpg>
			<div class=block_name>
				<span class=name><?php echo $arr[1]; ?></span>
				<span class=date><?php echo $arr[4]; ?></span>
			</div>
			<div class=coment>
				<div><?php echo $arr[3]; ?></div>
		</div>
		<?php
	}
}

?>