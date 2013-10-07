<div class="row-fluid">
    <h1 class="titrePrincipale span3">Projet Cool</h1>
</div>

<div class="row-fluid">
    <div id="loginForm" class="span3">
        <?php $form=$this->beginWidget('CActiveForm'); ?>
        <?php echo $form->label($login,"username",array("class"=>"label"));?>
        <?php echo $form->textField($login,"username");?>
        <?php echo $form->label($login,"password",array("class"=>"label"));?>
        <?php echo $form->passwordField($login,"password",array("type"=>"password"));?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Connect',
            'type'=>'action', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'normal',
             "buttonType"=>"submit"// null, 'large', 'small' or 'mini'
        )); ?>
        <?php $this->endWidget();?>
    </div>
</div>
