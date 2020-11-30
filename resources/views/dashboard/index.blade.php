<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CI::Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/justified-nav/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->

      <div class="masthead">
        <h3 class="text-muted">CIC::Dashboard</h3>
        <!--
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
        -->
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-6 text-left">

            <div class="" id="gauge_div" style="width: 220px; height: 220px;">

            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
            <div class="col-md-6">

                <div class="list-group">
                    <a href="#" class="list-group-item visitor">
                        <h3 class="pull-right">
                            <i class="fa fa-eye"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">
                            10M</h4>
                        <p class="list-group-item-text">
                            ДСД</p>
                    </a><a href="#" class="list-group-item facebook-like">
                        <h3 class="pull-right">
                            <i class="fa fa-facebook-square"></i>
                        </h3>
                        <h4 class="list-group-item-heading count">
                            10M</h4>
                        <p class="list-group-item-text">
                            АВ</p>
                    </a>
                </div>
            </div>
            <div class="col-md-6">

              <div class="list-group">
                  <a href="#" class="list-group-item visitor">
                      <h3 class="pull-right">
                          <i class="fa fa-eye"></i>
                      </h3>
                      <h4 class="list-group-item-heading count">
                          10M</h4>
                      <p class="list-group-item-text">
                          сборы физ</p>
                  </a><a href="#" class="list-group-item facebook-like">
                      <h3 class="pull-right">
                          <i class="fa fa-facebook-square"></i>
                      </h3>
                      <h4 class="list-group-item-heading count">
                          10M</h4>
                      <p class="list-group-item-text">
                          сборы юр</p>
                  </a>
              </div>
            </div>
          </div>
        </div>



    </div>
      </div>

      <!-- Example row of columns -->
      <h2>Дебиторка</h2>
      <div class="row">
        <div class="col-lg-8">
          <div id="columnchart_values" style="height: 410px;"></div>

        </div>
        <div class="col-lg-4">
          <div class="list-group">
              <a href="#" class="list-group-item visitor">
                  <h3 class="pull-right">
                      <i class="fa fa-eye"></i>
                  </h3>
                  <h4 class="list-group-item-heading count" id="sumReceivablesEl">
                      0</h4>
                  <p class="list-group-item-text">
                      Общая</p>
              </a><a href="#" class="list-group-item facebook-like">
                  <h3 class="pull-right">
                      <i class="fa fa-facebook-square"></i>
                  </h3>
                  <h4 class="list-group-item-heading count" id="sumReceivablesJurEl">
                      10M</h4>
                  <p class="list-group-item-text">
                    юридические лица</p>
              </a>
              </a><a href="#" class="list-group-item facebook-like">
                  <h3 class="pull-right">
                      <i class="fa fa-facebook-square"></i>
                  </h3>
                  <h4 class="list-group-item-heading count" id="sumReceivablesFizEl">
                      10M</h4>
                  <p class="list-group-item-text">
                    физические лица</p>
              </a>
          </div>
          <br>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2020 Centras Ins.</p>
      </footer>

    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  <script type="text/javascript">


    google.charts.load("current", {packages:['corechart', 'gauge']});
    google.charts.setOnLoadCallback(main);

    function main() {
      drawGauge();
      drawChartDZ();
    }

    function drawGauge() {
      var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Сборы', 80],
          ['Выплаты', 55]
        ]);

        var options = {
          width: 400, height: 220,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('gauge_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);


    }

    function drawChartDZ() {
      jdata = getDataDZCharts();

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Dep');
      data.addColumn('number', 'sum');

      var i=0;
      var sumReceivables = 0;
      jdata.forEach(function(row) {
        console.log(row.name+"->"+row.value);
        var mval = parseInt($.trim(row.value));
        if (mval > 2500000) {
          data.addRow([row.name, mval]);
          i++;
        }
        sumReceivables = sumReceivables + parseInt($.trim(row.value))

      });

      sumReceivablesStr = sumReceivables/1000000000;
      $("#sumReceivablesEl").text(sumReceivablesStr.toFixed(2) + "B");

      var options = {
        //title: "DZ",
        //width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(data, options);

      var DzJur = (getDataDzJur());
      DzJur = DzJur/1000000000;
      $("#sumReceivablesJurEl").text(DzJur.toFixed(2) + "B");

      DzFiz = sumReceivables - DzJur;
      $("#sumReceivablesFizEl").text(DzJur.toFixed(2) + "B");


  }

  function getDataDZCharts() {
    var jsonData = $.ajax({
          url: "{{route('getReceivables')}}",
          dataType: "json",
          async: false
          }).responseText;

          var data = JSON.parse(jsonData);
          return data;
  }

  function getDataDzJur() {
    var jsonData = $.ajax({
          url: "{{route('getReceivablesJur')}}",
          dataType: "json",
          async: false
          }).responseText;

          var data = JSON.parse(jsonData);
          return data[0].value;
  }
  </script>
</html>
