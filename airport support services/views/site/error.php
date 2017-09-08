<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<!-- page content -->
<div class="col-md-12">
  <div class="col-middle">
    <div class="text-center text-center">
      <h1 class="error-number"><?= Html::encode($this->title) ?></h1>
      <h2><?= nl2br(Html::encode($message)) ?></h2>
      <p>The above error occurred while the Web server was processing your request.</p>
      <p>Please <a href="#">contact us</a> if you think this is a server error. Thank you.</p>
      <div class="mid_center">
        <h3>Search</h3>
        <form>
          <div class="col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                  </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->