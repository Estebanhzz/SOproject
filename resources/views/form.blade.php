<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SO Project</title>
 
    {!! Html::style('assets/css/bootstrap.css') !!}
 
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>        
<div class="container">
    <div class="row">
        <div><h2><strong>Tag Suggestions </strong></h2></div>
            <?php echo Form::open(array('url' => '#', 'class' => 'form-horizontal', 'role' => 'form')) ?>
                <div class="form-group"> 
                    <?php echo Form::label('Question', 'Question:', array('class' => 'col-sm-2 control-label')); ?>   
                        <div class="col-sm-8">
                            <?php echo Form::text('question', null, array('class' => 'form-control',)); ?>
                        </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <?php echo Form::submit('Suggest!', array('class' => 'btn btn-primary', 'role' => 'button')); ?>
                    </div>
                </div>
            <?php echo Form::close() ?>
    </div>
</div>
