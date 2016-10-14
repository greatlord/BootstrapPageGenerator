 <?php 

  function AutoIncludeFiles($dir) {

    $files = scandir($dir);
    foreach ($files as $key => $filename) {
      if (is_file( $dir.'/' . $filename )) {
        $file_parts = pathinfo( $dir.'/' . $filename );
        if ( $file_parts['extension'] == 'php') {
          include $dir.'/' . $filename;
          }
        }
     }
}

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="Create page with Bootstrap">
    <meta name="description" content="Create page with Bootstrap">
    <meta name="keywords" content="Create page with Bootstrap">
    <title>Bootstrap Page Builder</title>
    <!-- Le styles -->
    <link href="css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="css/toolbox.css" rel="stylesheet">
    <link href="css/editor.css" rel="stylesheet">
    <link href="css/docs.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="img/favicon.png">

    <script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
   
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="js/jquery.htmlClean.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/config.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>
    <script type="text/javascript" src="js/blob.js"></script>
    <script src="js/docs.min.js"></script>
    <style>
	.container-fluid{
	    *zoom:1;margin-left: 0px;
	    margin-top: 10px;
	    padding: 30px 15px 15px;
	    border: 1px solid #DDDDDD;
	    border-radius: 4px;
	    position: relative;
	    word-wrap: break-word;
	}
	body.devpreview {
	    margin-top: 60px;
	    margin-left:5px !important;
	}
	</style>
  </head>
  <body style="cursor: auto;" class="edit toolbox-reset">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header" style="margin-right: 100px;">
        <a class="navbar-brand emphasized3" href="#">
          Bootstrap Page Builder
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
        <ul class="nav navbar-nav">
          <li>
            <div class="btn-group" style="margin-right: 20px;">
              <button onclick="resizeCanvas('lg')" class="btn btn-default navbar-btn"><i class="fa fa-desktop"></i> </button>
              <button onclick="resizeCanvas('md')" class="btn btn-default navbar-btn"><i class="fa fa-laptop"></i> </button>
              <button onclick="resizeCanvas('sm')" class="btn btn-default navbar-btn"><i class="fa fa-tablet"></i> </button>
              <button onclick="resizeCanvas('xs')" class="btn btn-default navbar-btn"><i class="fa fa-mobile-phone"></i> </button>
            </div>
          </li>
          <li>
            <div class="btn-group" data-toggle="buttons-radio">
              <button id="edit" class="btn btn-default navbar-btn">
                <i class="fa fa-edit"></i> Edit
              </button>
              <button type="button" class="btn btn-default navbar-btn" id="devpreview">
                <i class="fa icon-eye-close" style="color: #333;"></i> Developer
              </button>
              <button type="button" class="btn btn-default navbar-btn" id="sourcepreview" >
                <i class="fa icon-eye-open" style="color: #333;"></i> Preview
              </button>
            </div>
          </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="btn-group">
              <button class="btn btn-default navbar-btn" href="#clear" id="clear" color="#333;">
                <i class="fa icon-trash" style="color: #333;"></i>Clear
              </button>
              <button type="button" class="btn btn-primary navbar-btn" data-target="#downloadModal" rel="/build/downloadModal" role="button" data-toggle="modal">
                <i class="fa icon-chevron-down" ></i>Download
              </button>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container-fluid">
      <div class="changeDimension">
        <div class="row-fluid">
          <div class="">
            <span></span>
            <div class="sidebar-nav">
              <?php AutoIncludeFiles('menu'); ?>
            </div>
          </div>
          <!--/span-->
          <div class="demo ui-sortable" style="min-height: 304px; ">
            <div class="lyrow">
              <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>remove</a>
              <span class="drag label"><i class="icon-move"></i>drag</span>
              <div class="preview">9 3</div>
              <div class="view">
                <div class="row-fluid clearfix">
                  <div class="span12 column ui-sortable">
                    <div class="box box-element ui-draggable" style="display: block; ">
                      <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="well">Well</a> </span>
                      <div class="preview">Jumbotron</div>
                      <div class="view">
                        <div class="hero-unit" contenteditable="true">
                          <h1>Hello, world!</h1>
                          <p>This is a template for a simple marketing or informational website.</p>
                          <p> It includes a large callout called the hero unit and three supporting pieces of content.</p>
                          Use it as a starting point to create something more unique.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end demo -->
          <!--/span-->
          <div id="download-layout">
            <div class="container-fluid"></div>
          </div>
        </div>
        <!--/row-->
      </div>
      <!--/.fluid-container-->
      <div class="modal hide fade" role="dialog" id="editorModal">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Save your Layout</h3>
        </div>
        <div class="modal-body">
          <p>
            <textarea id="contenteditor"></textarea>
          </p>
        </div>
        <div class="modal-footer"> <a id="savecontent" class="btn btn-primary" data-dismiss="modal">Save</a> <a class="btn" data-dismiss="modal">Cancel</a> </div>
      </div>
      <div class="modal hide fade" role="dialog" id="downloadModal">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Save</h3>
        </div>
        <div class="modal-body">
          <p>Choose how to save your layout</p>
          <div class="btn-group">
            <button type="button" id="fluidPage" class="active btn btn-info"><i class="icon-fullscreen icon-white"></i> Fluid Page</button>
            <button type="button" class="btn btn-info" id="fixedPage"><i class="icon-screenshot icon-white"></i> Fixed page</button>
          </div>
          <br>
          <br>
          <p>
            <textarea></textarea>
          </p>
        </div>
        <div class="modal-footer"> <a class="btn btn-primary navbar-btn" data-dismiss="modal" onclick="javascript:saveHtml();">Save</a> </div>
      </div>
    </div>
    <script>
      function resizeCanvas(size)
      {

      var containerID = document.getElementsByClassName("changeDimension");
      var containerDownload = document.getElementById("download-layout").getElementsByClassName("container-fluid")[0];
      var row = document.getElementsByClassName("demo ui-sortable");
      var container1 = document.getElementsByClassName("container1");
      if (size == "md")
      {
      $(containerID).width('id', "MD");
      $(row).attr('id', "MD");
      $(container1).attr('id', "MD");
      $(containerDownload).attr('id', "MD");
      }
      if (size == "lg")
      {
      $(containerID).attr('id', "LG");
      $(row).attr('id', "LG");
      $(container1).attr('id', "LG");
      $(containerDownload).attr('id', "LG");
      }
      if (size == "sm")
      {
      $(containerID).attr('id', "SM");
      $(row).attr('id', "SM");
      $(container1).attr('id', "SM");
      $(containerDownload).attr('id', "SM");
      }
      if (size == "xs")
      {
      $(containerID).attr('id', "XS");
      $(row).attr('id', "XS");
      $(container1).attr('id', "XS");
      $(containerDownload).attr('id', "XS");

      }


      }
    </script>
  </body>
</html>
