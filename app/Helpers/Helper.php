<?php

namespace App\Helpers;

class Helper
{

function edit_view_delete_button($model,$modelName,$isView,$isEdit,$isDelete)
    {
    ?>
      <?php
      if($isView == "Y")
      {
      ?>
      <a class="btn btn-xs btn-success" href="<?= route($modelName.'.show', $model->id) ?>">
          <?= trans('global.view') ?>
      </a>
      <?php } ?>

      <?php
      if($isEdit == "Y")
      {
      ?>
      <a class="btn btn-xs btn-info" href="<?= route($modelName.'.edit', $model->id) ?>">
          <?= trans('global.edit') ?>
      </a>
      <?php } ?>

      <?php
      if($isDelete == "Y")
      {
      ?>
      <form action="<?= route(''.$modelName.'.destroy', $model->id) ?>" method="POST" onsubmit="return confirm('<?= trans('global.areYouSure') ?>');" style="display: inline-block;">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="<?= csrf_token() ?>">
          <input type="submit" class="btn btn-xs btn-danger" value="<?= trans('global.delete') ?>">
      </form>
      <?php 
  		} 
      }
    }
?>