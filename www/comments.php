<script Language="JavaScript" src="js_comments.js"> </script>
<center>
<div id="coments">
	<div class="title">
		<span>
			<h2>Комментарии по теме:</h2>
			<a href="#article">Панда</a>
		</span>
	</div>
	<div class="top">
		<img id="addcomentbutton"  onClick="toggle('addcoment'); location.href='#addcoment';" src="images/add_coment.png"/>
		<img id="addcategoriesbutton"  onClick="toggle('addcategories'); location.href='#addcategories';" src="images/add_categories.png"/>
	</div>
	
	<div id="addcoment" class="addcoment" style="display:none;">
		<form name="comment">
			<div class="statusbox" id="statusbox1">Поля должны быть заполнены на английском!</div>
			<input id="name" type="text" name="name" value="Имя (Обязательно)" maxlength="60" onfocus="clearText(this)" onblur="clearText(this)"/>
			<input id="mail" type="text" name="mail" value="Почта (Обязательно, непубликуется)" maxlength="60" onfocus="clearText(this)" onblur="clearText(this)"/>
			<select id="select_coment">
				<option value="0">Выберите категорию</option>
				<?php
					include("config.php");
					//mysqli_query('set names utf8;');
					$res = mysqli_query($con, "select * from categories");
					while($row = mysqli_fetch_assoc($res)){
						?>
						<option value="<?=$row['id']?>"><?=$row['description']?></option>
						<?php
					}
				?>
			</select>
			<textarea id="text" name="text" onfocus="clearText(this)" onblur="clearText(this)"></textarea>
			<span>
				<br/><input id="nr" onClick="document.getElementById('nr').value='nerobot';" type="checkbox" name="nr"/>
				<b>я не робот...</b>
			</span>
			<img class="button_add" src="images/comment_add.png" onclick='ajax({
			url:"add_comment.php",
			statbox:"statusbox1",
			method:"POST",
			data:
				{
				   name:document.getElementById("name").value,
				   mail:document.getElementById("mail").value,
				   select:document.getElementById("select_coment").value,
				   text:document.getElementById("text").value,
				   nr:document.getElementById("nr").value,
				},
			success:function(data){document.getElementById("statusbox1").innerHTML=data;}
			})'
			/>
		</form>
	</div>
	<div id="addcategories" class="addcategories" style="display:none;">
		<form name="categories">
			<div class="statusbox" id="statusbox2">Выберите категорию, которую хотите отредактировать.</div>
			
			<select id="select_categories">
				<option value="0">Выберите категорию</option>
				<?php
					include("config.php");
					$res = mysqli_query($con, "select * from categories");
					while($row = mysqli_fetch_assoc($res)){
						?>
						<option value="<?=$row['id']?>"><?=$row['description']?></option>
						<?php
					}
				?>
			</select>
			<div>
			<img class="button_add_categories" src='images/add.png' width='25' height='25' onClick='ajax({
			url:"add_categories.php",
			statbox:"statusbox2",
			method:"POST",
			data:
				{  
				},
			success:function(data){document.getElementById("statusbox2").innerHTML=data;}
			})'/>
			<img class="button_edit_categories" src='images/edit.png' width='25' height='25' onClick='ajax({
			url:"edit_categories.php",
			statbox:"statusbox2",
			method:"POST",
			data:
				{  
					select:document.getElementById("select_categories").value,
				},
			success:function(data){document.getElementById("statusbox2").innerHTML=data;}
			})'/>
			<img class="button_delete_categories" src='images/delete.png' width='25' height='25' onClick='ajax({
			url:"delete_categories.php",
			statbox:"statusbox2",
			method:"POST",
			data:
				{  
					select:document.getElementById("select_categories").value,
				},
			success:function(data){document.getElementById("statusbox2").innerHTML=data;}
			})'/>
			</div>
		</form>
	</div>
	<?php
	include("show_comments.php");
	show_comments();
	?>
</div>
</center>