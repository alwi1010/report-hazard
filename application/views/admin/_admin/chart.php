<script type="text/javascript">
	(function () {
		'use strict'

		feather.replace();

    // Graphs
    var ctx = document.getElementById('chartMingguIni');
    // eslint-disable-next-line no-unused-vars
    var chartMingguIni = new Chart(ctx, {
    	type: 'line',
    	data: {
    		labels: ['Monday', 'Tuesday', 'Wednesday ', 'Thursday ', 'Friday', 'Saturday', 'Sunday'],
    		datasets: [{
    			data: [
    			<?php
    			$date_now = date("Y-m-d");
            // $date_now = date("2021-06-20");
    			$day_name = date('l', strtotime($date_now));
    			if ( $day_name === 'Monday' ) {
    				$date_end = strtotime( '+6 day', strtotime( $date_now ) );
    				$date_end = date('Y-m-d', $date_end);

    				$begin = new DateTime($date_now);
    				$end = new DateTime($date_end);

    				$interval = DateInterval::createFromDateString('1 day');
    				$period = new DatePeriod($begin, $interval, $end->modify('+1 day'));

    				foreach ($period as $dt) {
    					$date = $dt->format('d');
    					$month = $dt->format('m');
    					$year = $dt->format('Y');
    					echo $this->m_data->month_week_data_chart($date,$month,$year).',';
    				}
    			} else {
    				$date_end = strtotime( '-6 day', strtotime( $date_now ) );
    				$date_end = date('Y-m-d', $date_end);

    				$begin = new DateTime($date_now);
    				$end = new DateTime($date_end);

    				$interval = DateInterval::createFromDateString('1 day');
    				$period = new DatePeriod($end->modify('-1 day'), $interval, $begin);
              // echo '<pre>' . var_export($period, true) . '</pre>';
    				$dates = array();
    				foreach ($period as $dt) {
    					$dates[] = $dt->format("l Y-m-d H:i:s\n");
    				}

    				$dates = array_reverse($dates);
                    // var_dump($dates);

    				foreach($dates as $dt) {
    					$day_name = date('l', strtotime($dt));
    					if ($day_name === 'Monday') {
    						$date_now = new DateTime($dt);
    						$date_now = $date_now->format('Y-m-d H:i:s');
    					}
    				}

    				$date_end = strtotime( '+6 day', strtotime( $date_now ) );
    				$date_end = date('Y-m-d', $date_end);

    				$begin = new DateTime($date_now);
    				$end = new DateTime($date_end);

    				$interval = DateInterval::createFromDateString('1 day');
    				$period = new DatePeriod($begin, $interval, $end->modify('+1 day'));

    				foreach ($period as $dt) {
    					$date = $dt->format('d');
    					$month = $dt->format('m');
    					$year = $dt->format('Y');
    					echo $this->m_data->month_week_data_chart($date,$month,$year).',';
    				}
    			}
    			?>],
    			lineTension: 0,
    			backgroundColor: 'transparent',
    			borderColor: '#007bff',
    			borderWidth: 4,
    			pointBackgroundColor: '#007bff'
    		}]
    	},
    	options: {
    		scales: {
    			yAxes: [{
    				ticks: {
    					beginAtZero: false
    				}
    			}]
    		},
    		legend: {
    			display: false
    		}
    	}
    });

    'use strict'

    feather.replace();

    // Graphs
    var ctx = document.getElementById('chartMingguLalu');
    // eslint-disable-next-line no-unused-vars
    var chartMingguLalu = new Chart(ctx, {
    	type: 'line',
    	data: {
    		labels: ['Monday', 'Tuesday', 'Wednesday ', 'Thursday ', 'Friday', 'Saturday', 'Sunday'],
    		datasets: [{
    			data: [
    			<?php
    			$date_now = date("Y-m-d");
    			$last_week = date("Y-m-d", strtotime( '-1 week', strtotime( $date_now ) ));
    			$day_name = date('l', strtotime($last_week));

    			if ( $day_name === 'Monday' ) {
  					$date_start = date( 'd', strtotime( $last_week ) );
  					$date_end = date( 'd', strtotime( 'next Sunday', strtotime( $last_week ) ) );
  					$month = date( 'm', strtotime( $last_week ) );
  					$year = date( 'Y', strtotime( $last_week ) );

	    			for ($date = $date_start; $date <= $date_end; $date++) {
	    				echo $this->m_data->month_week_data_chart($date,$month,$year).',';
	    			}
    			} else {
  					$date_start = date( 'd', strtotime( 'last Monday', strtotime( $last_week ) ) );
  					$date_end = date( 'd', strtotime( 'next Sunday', strtotime( $last_week ) ) );
  					$month = date( 'm', strtotime( $last_week ) );
  					$year = date( 'Y', strtotime( $last_week ) );

	    			for ($date = $date_start; $date <= $date_end; $date++) {
	    				echo $this->m_data->month_week_data_chart($date,$month,$year).',';
	    			}
    			}
    			?>],
    			lineTension: 0,
    			backgroundColor: 'transparent',
    			borderColor: '#007bff',
    			borderWidth: 4,
    			pointBackgroundColor: '#007bff'
    		}]
    	},
    	options: {
    		scales: {
    			yAxes: [{
    				ticks: {
    					beginAtZero: false
    				}
    			}]
    		},
    		legend: {
    			display: false
    		}
    	}
    });

    'use strict'

    feather.replace();

    // Graphs
    var ctx = document.getElementById('chartBulanIni');
    // eslint-disable-next-line no-unused-vars
    var chartBulanIni = new Chart(ctx, {
    	type: 'line',
    	data: {
    		labels: [
    		<?php
    		for ($x = 1; $x <= 31; $x++) {
    			echo $x.',';
    		}
    		?>],
    		datasets: [{
    			data: [
    			<?php
    			$month = date("m");
    			$year = date("Y");
    			for ($date = 1; $date <= 31; $date++) {
    				echo $this->m_data->month_week_data_chart($date,$month,$year).',';
    			}
    			?>],
    			lineTension: 0,
    			backgroundColor: 'transparent',
    			borderColor: '#007bff',
    			borderWidth: 4,
    			pointBackgroundColor: '#007bff'
    		}]
    	},
    	options: {
    		scales: {
    			yAxes: [{
    				ticks: {
    					beginAtZero: false
    				}
    			}]
    		},
    		legend: {
    			display: false
    		}
    	}
    });

    'use strict'

    feather.replace();

    // Graphs
    var ctx = document.getElementById('chartBulanLalu');
    // eslint-disable-next-line no-unused-vars
    var chartBulanLalu = new Chart(ctx, {
    	type: 'line',
    	data: {
    		labels: [
    		<?php
    		for ($x = 1; $x <= 31; $x++) {
    			echo $x.',';
    		}
    		?>],
    		datasets: [{
    			data: [
    			<?php
    			$date_now = date("Y-m-d");
    			$month = date("m", strtotime( '-1 month', strtotime( $date_now ) ));
    			$year = date("Y");
    			for ($date = 1; $date <= 31; $date++) {
    				echo $this->m_data->month_week_data_chart($date,$month,$year).',';
    			}
    			?>],
    			lineTension: 0,
    			backgroundColor: 'transparent',
    			borderColor: '#007bff',
    			borderWidth: 4,
    			pointBackgroundColor: '#007bff'
    		}]
    	},
    	options: {
    		scales: {
    			yAxes: [{
    				ticks: {
    					beginAtZero: false
    				}
    			}]
    		},
    		legend: {
    			display: false
    		}
    	}
    });

    'use strict'

    feather.replace();

    // Graphs
    var ctx = document.getElementById('chartTahunIni');
    // eslint-disable-next-line no-unused-vars
    var chartTahunIni = new Chart(ctx, {
    	type: 'line',
    	data: {
    		labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'],
    		datasets: [{
    			data: [
    			<?php
    			$year = date("Y");
    			for ($month = 1; $month <= 12; $month++) {
    				echo $this->m_data->year_data_chart($month,$year).',';
    			}
    			?>],
    			lineTension: 0,
    			backgroundColor: 'transparent',
    			borderColor: '#007bff',
    			borderWidth: 4,
    			pointBackgroundColor: '#007bff'
    		}]
    	},
    	options: {
    		scales: {
    			yAxes: [{
    				ticks: {
    					beginAtZero: false
    				}
    			}]
    		},
    		legend: {
    			display: false
    		}
    	}
    })
  })()
</script>