<?php
print_r($msg);
?>
<form action="/index.php?r=cate/test-deal" method="post">
name:<input type="text" name="name" value="" /><br />
job:<input type="text" name="job" value="" /><br />
<input name="_csrf" type="hidden" id="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>" />
<input type="submit" name="submit" value="submit" />
</form>



