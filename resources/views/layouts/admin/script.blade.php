



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
{{-- <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script> --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="{{asset('admin/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" ></script>
<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
{{-- bs --}}
<script src="{{asset('admin/js/morris.js')}}"></script>
<script src="{{asset('admin/js/raphael-min.js')}}"></script>
<link rel="stylesheet" href="{{asset('admin/js/morris.css')}}">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{-- <--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script>
    <![endif]--> --}}
<script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>










<!-- calendar -->
<script type="text/javascript" src="{{asset('admin/js/monthly.js')}}"></script>
<script type="text/javascript">
    $(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}
		

		});
</script>
<!-- //calendar -->

{{-- loadtrang --}}
	<script>
		$(window).on('load', function(event) {
				$('html,body').removeClass('pre');
				$('.loading').delay(200).fadeOut('fast');
	// $('.load').delay(1000).fadeOut('fast');
		});
		</script>

{{-- loadtrang --}}


{{-- 
<script>
    var dl= $real->real_estate_price;
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
        {
            label: 'ten',
            backgroundColor: 'rgb(0, 0, 132)',
            borderColor: 'rgb(0, 99, 132)',
            data: [dl]
        }
        ]
    },

    // Configuration options go here
    options: {}
});
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Purple', 'Orange','buoi'],
        datasets: [{
            label: '# of Votes',
            data: [2, 10, 3, 5, 2, 3,1],
            backgroundColor: [
                'red',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }
        
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
  </script> --}}