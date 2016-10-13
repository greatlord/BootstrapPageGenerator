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
              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                    <div class="popover fade right">
                      <div class="arrow"></div>
                      <h3 class="popover-title">Help</h3>
                      <div class="popover-content">TO CHANGE THE COLUMN CONFIGURATION YOU CAN EDIT THE DIFFERENT VALUES IN THE INPUT (THEY SHOULD ADD 12). IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://twitter.github.io/bootstrap/scaffolding.html#gridSystem"> BOOTSTRAP GRID SYSTEM</a></div>
                    </div>
                  </div>
                  <i class="icon-plus icon-white"></i> GRID SYSTEM
                </li>
                <li style="display: list-item;" class="rows" id="estRows">
                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="12" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-12 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="4 4 4" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-4 column"></div>
                        <div class="col-xs-4 column"></div>
                        <div class="col-xs-4 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="2 10" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-2 column"></div>
                        <div class="col-xs-10 column" ></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="3 9" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-3 column"></div>
                        <div class="col-xs-9 column" ></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="4 8" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-4 column"></div>
                        <div class="col-xs-8 column" ></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                   <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                   <div class="preview">
                     <input value="6 6" type="text">
                   </div>
                   <div class="view">
                     <div class="row-fluid clearfix">
                       <div class="col-xs-6 column"></div>
                       <div class="col-xs-6 column"></div>
                     </div>
                   </div>
                 </div>


                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="8 4" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-8 column" ></div>
                        <div class="col-xs-4 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="9 3" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-9 column" ></div>
                        <div class="col-xs-3 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="10 2" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-10 column" ></div>
                        <div class="col-xs-2 column"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <i class="icon-plus icon-white"></i> BASE CSS
                  <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                    <div class="popover fade right">
                      <div class="arrow"></div>
                      <h3 class="popover-title">Help</h3>
                      <div class="popover-content">DRAG & DROP THE ELEMENTS INSIDE THE COLUMNS WHERE YOU WANT TO INSERT IT. AND FROM THERE, YOU CAN CONFIGURE THE STYLE OF THAT ELEMENT. IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://twitter.github.io/bootstrap/base-css.html">BASE CSS.</a></div>
                    </div>
                  </div>
                </li>
                <li style="display: none;" class="boxes" id="elmBase">

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="text-left">Left</a></li>
                          <li class=""><a href="#" rel="text-center">Center</a></li>
                          <li class=""><a href="#" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="#" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="#" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="#" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="#" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Title</div>
                    <div class="view">
                      <h3 contenteditable="true">h3. Lorem ipsum dolor sit amet.</h3>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="text-left">Left</a></li>
                          <li class=""><a href="#" rel="text-center">Center</a></li>
                          <li class=""><a href="#" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="muted">muted</a></li>
                          <li class=""><a href="#" rel="text-warning">Warning</a></li>
                          <li class=""><a href="#" rel="text-error">Error</a></li>
                          <li class=""><a href="#" rel="text-info">Info</a></li>
                          <li class=""><a href="#" rel="text-success">Success</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="lead">Lead</a>
                    </span>
                    <div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu. </p>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Address</div>
                    <div class="view">
                      <address contenteditable="true">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                      </address>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"> <a class="btn btn-mini" href="#" rel="pull-right">Pull Right</a> </span>
                    <div class="preview">Blockquote</div>
                    <div class="view clearfix">
                      <blockquote contenteditable="true">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone<cite title="Source Title"> famous Source Title</cite></small>
                      </blockquote>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important">
                      <i class="icon-remove icon-white"></i>Remove
                    </a>
                    <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                         <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Bullets <span class="caret"></span></a>
                         <ul class="dropdown-menu">
                           <li class="active"><a href="#" rel="">Default</a></li>
                           <li class=""><a href="#" rel="list-unstyled">list-unstyled</a></li>
                           <li class=""><a href="#" rel="list-arrows">list-rrows</a></li>
                           <li class=""><a href="#" rel="list-arrows small">.list-arrows.small</a></li>
                         </ul>
                       </span>
                      <a class="btn btn-mini" href="#" rel="list-inline">Inline</a>
                    </span>
                    <div class="preview">Unordered List</div>
                    <div class="view">
                      <ul contenteditable="true">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit</li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                      </ul>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="unstyled">Unstyled</a>
                      <a class="btn btn-mini" href="#" rel="list-inline">Inline</a> 
                    </span>
                    <div class="preview">Ordered List</div>
                    <div class="view">
                      <ol contenteditable="true">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit</li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                      </ol>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="dl-horizontal">Horizontal</a> </span>
                    <div class="preview">Description</div>
                    <div class="view">
                      <dl contenteditable="true">
                        <dt>Rolex</dt>
                        <dd>A description list is perfect for defining terms.</dd>
                        <dt>Euismod</dt>
                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                        <dt>Malesuada porta</dt>
                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                        <dt>Felis euismod semper eget lacinia</dt>
                        <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                      </dl>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="img-rounded">Rounded</a></li>
                          <li class=""><a href="#" rel="img-circle">Circle</a></li>
                          <li class=""><a href="#" rel="img-polaroid">Polaroid</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Image</div>
                    <div class="view"> <img alt="140x140" src="img/a.jpg"> </div>
                  </div>
				  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Dashboard</div>
					 <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
					  </span>
                    <div class="view"> 		
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div></div>
                  </div>
	    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                   <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                    </span>
                    <div class="preview">Color</div>
                              <div class="view"> 
		
				<div class="bs-example">
    <div class="color-swatches">
      <div class="color-swatch brand-primary"></div>
      <div class="color-swatch brand-success"></div>
      <div class="color-swatch brand-info"></div>
      <div class="color-swatch brand-warning"></div>
      <div class="color-swatch brand-danger"></div>
    </div>
	<br />
	<div class="color-swatches">
	  <div class="color-swatch gray-darker"></div>
      <div class="color-swatch gray-dark"></div>
      <div class="color-swatch gray"></div>
      <div class="color-swatch gray-light"></div>
      <div class="color-swatch gray-lighter"></div>
	</div>
  </div>
	</div>
                  </div>
                </li>
              </ul>



              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <i class="icon-plus icon-white"></i> FORMS
                
				 <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                   <div class="popover fade right">
                <div class="arrow"></div>
                <h3 class="popover-title">Help</h3>
                <div class="popover-content">DRAG &amp; DROP THE ELEMENTS INSIDE THE COLUMNS WHERE YOU WANT TO INSERT IT. IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://getbootstrap.com/css/#forms">FORM.</a></div>
              </div>
                  </div>
				</li>
                <li style="display: none;" class="boxes" id="elmComponents">
				
				<!-- Horizontal Form -->
				 <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                    </span>
					<div class="preview">Horizontal form</div>
                          <div class="view">

                <form id="form-horizontal">
                  <div class="control-group">
                    <label class="control-label" for="inputEmail" contenteditable="true">Email</label>
                    <div class="controls">
                      <input id="inputEmail" placeholder="Email" type="text">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPassword" contenteditable="true">Password</label>
                    <div class="controls">
                      <input id="inputPassword" placeholder="Password" type="password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <label class="checkbox" contenteditable="true">
                        <input type="checkbox">
                        Remember me </label>
                      <button type="submit" class="btnform" contenteditable="true">Sign In</button>
                    </div>
                  </div>
                </form>
              </div>
                  </div>
				
				
                  <!--LABEL-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="badge-success">Success</a></li>
                          <li class=""><a href="#" rel="badge-warning">Warning</a></li>
                          <li class=""><a href="#" rel="badge-important">Important</a></li>
                          <li class=""><a href="#" rel="badge-info">Info</a></li>
                          <li class=""><a href="#" rel="badge-inverse">Inverse</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Label</div>
                    <div class="view">
                      <label class="control-label" contenteditable="true">Label</label>
                    </div>
                  </div>

                  <!--INPUT-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Input</div>
                    <div class="view">
                      <input type="text" class='form-control'/>
                    </div>
                  </div>
				  <!--Password Input-->
				    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Password input</div>
                    <div class="view">
                      <input type="password" class='form-control' placeholder="insert your password here"/>
                    </div>
                  </div>
				  
				   <!--Email Input-->
				    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Email input</div>
                    <div class="view">
                      <input type="email" class='form-control' placeholder="type your email here"/>
                    </div>
                  </div>
				  <!--Text Area-->
				   <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Text Area</div>
                    <div class="view">
                      <textarea class='form-control'>Default text </textarea>
                    </div>
                  </div>
				   <!--Checkbox inline-->
				    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Inline Checkbox</div>
                    <div class="view">
                        <label class="checkbox-inline" for="checkboxes-0">
						<input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"> 1 </label>
							<label class="checkbox-inline" for="checkboxes-1">
							  <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
							  2
							</label>
							<label class="checkbox-inline" for="checkboxes-2">
							  <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
							  3
							</label>
							<label class="checkbox-inline" for="checkboxes-3">
							  <input type="checkbox" name="checkboxes" id="checkboxes-3" value="4">
							  4
							</label>
                    </div>
                  </div>
				   <!--multiple checkbox-->
				   <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Multiple Checkbox</div>
                    <div class="view">
                      <div class="checkbox">
						<label for="checkboxes-0">
						  <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
						  Option one
						</label>
						</div>
					  <div class="checkbox">
						<label for="checkboxes-1">
						  <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
						  Option two
						</label>
						</div>
                    </div>
                  </div>
				 <!--radio inline-->
				    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Inline Radio</div>
                    <div class="view">
                        <label class="radio-inline" for="radios-0">
						  <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
						  1
						</label> 
						<label class="radio-inline" for="radios-1">
						  <input type="radio" name="radios" id="radios-1" value="2">
						  2
						</label> 
						<label class="radio-inline" for="radios-2">
						  <input type="radio" name="radios" id="radios-2" value="3">
						  3
						</label> 
						<label class="radio-inline" for="radios-3">
						  <input type="radio" name="radios" id="radios-3" value="4">
						  4
						</label>
                    </div>
                  </div>
				   <!--Multiple radio-->
				    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Multiple Radio</div>
                    <div class="view">
						<div class="radio">
							<label for="radios-0">
							  <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
							  Option one
							</label>
							</div>
						  <div class="radio">
							<label for="radios-1">
							  <input type="radio" name="radios" id="radios-1" value="2">
							  Option two
							</label>
							</div>
					</div>
                  </div>
				  
				  
				    <!--Basic  Select-->
					
				    <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Basic Select</div>
                    <div class="view">
					<select id="selectbasic" name="selectbasic" class="form-control">
						<option value="1">Option one</option>
						<option value="2">Option two</option>
					</select>
					</div>
                  </div>
				  
				     <!--Multiple  Select-->
					 
				   <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">Multiple Select</div>
                    <div class="view">
					<select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
					  <option value="1">Option one</option>
					  <option value="2">Option two</option>
					</select>
					</div>
                  </div>
				  
				   <!--File  Button-->
				   <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
				   <div class="preview">File Button</div>
                    <div class="view">
					<input id="filebutton" name="filebutton" class="input-file" type="file">
					</div>
                  </div>
				  
                  <!--BUTTON-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="btn-primary">Primary</a></li>
                          <li class=""><a href="#" rel="btn-info">Info</a></li>
                          <li class=""><a href="#" rel="btn-success">Success</a></li>
                          <li class=""><a href="#" rel="btn-warning">Warning</a></li>
                          <li class=""><a href="#" rel="btn-danger">Danger</a></li>
                          <li class=""><a href="#" rel="btn-inverse">Inverse</a></li>
                          <li class=""><a href="#" rel="btn-link">Link</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Size <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class=""><a href="#" rel="btn-large">Large</a></li>
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="btn-small">Small</a></li>
                          <li class=""><a href="#" rel="btn-mini">Mini</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="btn-block">Block</a> <a class="btn btn-mini" href="#" rel="disabled">Disabled</a>
                    </span>
                    <div class="preview">Button</div>
                    <div class="view">
                      <button class="btn" type="button" contenteditable="true">Button</button>
                    </div>
                  </div>

                  <!--BTN-DROPDOWN-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="dropup">Dropup</a> </span>
                    <div class="preview">Button Dropdowns</div>
                    <div class="view">
                      <div class="btn-group">
                        <button class="btn btn-default" contenteditable="true">Action</button>
                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
                        <ul class="dropdown-menu" contenteditable="true">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another Action</a></li>
                          <li><a href="#">Something Else here</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">More Option</a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another Action</a></li>
                              <li><a href="#">Something Else here</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <!--BTN-TOOLBAR-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a>
                    <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Button Toolbar</div>
                    <div class="view">
                      <div class="btn-toolbar">
                        <button class="btn btn-default">Back</button>
                        <button class="btn btn-primary">Continue</button>
                        <span class="column" style="height: 40px, width: 200px, background-color: green">bla</span>
                      </div>
                    </div>
                  </div>


                </li>
              </ul>

              
              <?php include 'menu/components.php'; ?>  
              
              <ul class="nav nav-list accordion-group">
                <?php include 'menu/javascript.php'; ?>
                <li style="display: none;" class="boxes mute" id="elmJS">
                  <?php AutoIncludeFiles('menu/items/javascript'); ?>                  
                </li>
              </ul>

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
