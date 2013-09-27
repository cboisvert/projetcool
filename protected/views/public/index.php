<div class="row-fluid">
    <h1 class="titrePrincipale span3">Projet Cool</h1>
</div>

<div class="row-fluid">
    <div id="loginForm" class="span3">
        <?php $form=$this->beginWidget('CActiveForm'); ?>
        <?php echo $form->label($login,"username",array("class"=>"label"));?>
        <?php echo $form->textField($login,"username");?>
        <?php echo $form->label($login,"password",array("class"=>"label"));?>
        <?php echo $form->textField($login,"password");?>
        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Save changes', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)))); ?>
        <?php $this->endWidget();?>
    </div>
</div>
