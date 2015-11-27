<?php require'back.php'; ?>

<Style>
    .warning{
        color: red;}
</Style>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <span class="error" style="color: red"><?php if(isset($warning)){echo $warning;}?></span>
   <ul>
       <span class="error"><?php if(isset($widthError)){echo $widthError;}?></span>
       <li>width <input type="number" name="width" value=""></li>
       <span class="error"><?php if(isset($heightError)){echo $heightError;}?></span>
       <li>Height <input type="number" name="height" value=""></li>
       <span class="error"><?php if(isset($detail)){echo $detailError;}?></span>
       <li>detail
                <input type="radio" name="detail" value="low">Basic</input>
                <input type="radio" name="detail" value="medium">Average</input>
                <input type="radio" name="detail" value="high">Detailed</input>
       </li>
       <span class="error"><?php if(isset($qtyError)){echo $qtyError;}?></span>
       <li>qty <input type="number" name="qty" value=""></li>
       <li><input type="submit" value="Calculate"></li>
   </ul>
</form>
