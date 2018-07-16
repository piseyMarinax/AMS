
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Note there is no responsive meta tag here -->

    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>Sample receipt</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/non-responsive/non-responsive.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Receipt</a>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">
  		    <div class="col-lg-6 col-md-6">
          	<img src="{{URL('/')}}/assets/img/AMS_03.png" alt="logo" width="110" style="margin-bottom:5px;"><b>
            <p>Address: Phnom Penh, Cambodia</p>
            <p>Contact: 070 211 422</p>
            <p>E-mail: boreyky2011@gmail.com</p></b>
          </div>
          <div class="col-lg-6 col-md-6" style="text-align:right;">
            
          	<p>Receipt No: 0001</p>
              <p>Date: 01-Apr-2018</p>
          </div><div class="clear" style="clear: both;"></div>
        </div>
        <div class="col-sm-12 col-md-12 main"> 
          <h2 class="sub-header" style=" text-align: center;"><u>Receipt</u></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Service</th>
                  <th>Unit Price</th>
                  <th>Discount</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr style="height:367px;">
                  <td>1</td>
                  <td>AMS-0001</td>
                  <td>Sean Borey</td>
                  <td>General Service</td>
                  <td>50 USD</td>
                  <td> - </td>
                  <td>50 USD</td>
                </tr>
                <!--
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>-->
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <p><b>Paid by:</b></p>
            <p style="height:40px;"></p>
            <p>Name:........................</p>
            <p>Date:....../....../201...</p>
        </div>
        <div class="col-lg-6 col-md-6" style="text-align:right;">
        	<p><b>Receiver:</b></p>
            <p style="height:40px;"></p>
            <p>Name:...............................</p>
            <p>Date:........./....../201...</p>
        </div>
      </div>
    </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/3.3/assets/js/vendor/jquery.min.js/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
