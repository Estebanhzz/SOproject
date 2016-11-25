<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SO Project</title>

{{ Html::style('assets/css/bootstrap.css') }}

<!-- Fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="container">
    <div id="app">
        <div class="row">
            <div><h2><strong>Tag Suggestions </strong></h2></div>
            <form role="form" class="form-horizontal" @submit.prevent="formSubmitted">
                <div class="form-group">
                    {{ Form::label('Question', 'Question:', array('class' => 'col-sm-2 control-label')) }}
                    <div class="col-sm-8">

                        <textarea name="question" class="form-control" v-model="question" required>
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        {{ Form::submit('Suggest!', array('class' => 'btn btn-primary', 'role' => 'button')) }}
                    </div>
                </div>
            </form>
        </div>

        <div class="alert alert-info" v-if="loading === true">Cargando tags...</div>

        <div class="row" v-if="tags">
            <div class="col-sm-offset-2 col-sm-10">
                <div v-for="tag in tags" style="margin-right: 12px;display: inline-block;">
                    <span class="glyphicon glyphicon-tag"></span> @{{ tag }}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.3/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.min.js"></script>
    <script type="text/javascript">
        var app = new Vue({
          el: '#app',
          data: {
            question: null,
            tags: null,
            loading: false,
          },
          methods: {
            formSubmitted() {
              this.loading = true;

              axios.post('/', { question: this.question })
                .then(response => response.data)
                .then(data => {
                  this.loading = false;
                  this.tags = data.tags;
                })
                .catch(error => {
                  console.log(error);
                });
            }
          },
        });
    </script>
</body>
</html>
