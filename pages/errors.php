<?php if (count($errors) > 0): ?>
  <div class="error">
  	<?php foreach ($errors as $error): ?>
  	  <p><?php echo $error ?></p>
  	<?php
    // alle errors weergeven
    endforeach ?>
  </div>
<?php
endif ?>
