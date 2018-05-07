@extends('admin.master')
@section('head')
<title>Unishop-Thống kê</title>
<meta content="" name="description" />
 {{-- <link href="  public/source/admin/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="  public/source/admin/plugins/pickadate/themes/default.time.css" rel="stylesheet"> --}}
    <script src="public/source/admin/chartjs/dist/Chart.bundle.js"></script>
	<script src="public/source/admin/chartjs/samples/utils.js"></script>
@endsection
@section('content')
<div id="main-content" class="ecommerce_dashboard">
   <div id="main-content" class="ecommerce_dashboard">
      <div class="page-title">
         <i class="icon-custom-left"></i>
         <h3><strong>Thống kê doanh thu</strong></h3>
      </div>
      <div class="panel panel-default">
         <div class="panel-body">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                  <div class="head_table">
                     <div class="row">
                        <div class="col-md-7">
                           <div class=" tab-content " >
                              <div style="width:100%">
                                 <canvas id="canvas"></canvas>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-5">
                            <div class=" tab-content text-center" >
                        	@php
                        	if($type=='year' || $type='month'){


                        	  $datatkm = array();
                        		$s = 0;
                        		$j=0;
                        		foreach ($datamonth as $value) {

                        			$s+=$value;
                        			$j++;
                        			if($value!=null)
                        			{
                        				
                        				$datatkm[$j]= $value;
                        			}
                        		}
                        		if($j==0)

                        			$j=1;
                        		$tbc =$s/$j;

                        	}
                        	@endphp
                        	@if ($type=='year')
                        		
                        	@if ($j!=0 && count($datatkm)>0)
                        	<div class="alert bg-red " >Tổng doanh thu đạt:  <strong>{{number_format($s)}} vnđ</strong></div>
                        	
                        	
                        	<div class="alert bg-blue" >Trung bình / Tháng:  <strong>{{number_format($tbc)}} vnđ</strong></div>
							
                        	<div class="alert bg-green" >Cao nhất-Tháng {{ array_search(max($datamonth), $datamonth)}}: <strong>{{number_format(max($datamonth))}} vnđ</strong></div>
                        	
                        	<div class="alert bg-dark" >Thấp nhất-Tháng {{ array_search(min($datatkm), $datatkm)}}: <strong>{{number_format(min($datatkm))}} vnđ</strong></div>
                        	@else
                        	<div class="alert bg-red " >Tổng doanh thu đạt:  0 vnđ</strong></div>
                        	
                        	
                        	<div class="alert bg-blue" >Trung bình / Tháng:  0 vnđ</strong></div>
							
                        	<div class="alert bg-green" >Cao nhất-Tháng : <strong>0 vnđ</strong></div>
                        	
                        	<div class="alert bg-dark" >Thấp nhất-Tháng : <strong>0 vnđ</strong></div>
                        	@endif
                        	@endif

                        	@if ($type=='month')
                        		
                        	@if ($j!=0 && count($datatkm)>0)
                        	<div class="alert bg-red " >Tổng doanh thu đạt:  <strong>{{number_format($s)}} vnđ</strong></div>
                        	
                        	
                        	<div class="alert bg-blue" >Trung bình / Tuần:  <strong>{{number_format($tbc)}} vnđ</strong></div>
							
                        	<div class="alert bg-green" >Cao nhất-Tuần {{ array_search(max($datamonth), $datamonth)}}: <strong>{{number_format(max($datamonth))}} vnđ</strong></div>
                        	
                        	<div class="alert bg-dark" >Thấp nhất-Tuần {{ array_search(min($datatkm), $datatkm)}}: <strong>{{number_format(min($datatkm))}} vnđ</strong></div>
                        	@else
                        	<div class="alert bg-red " >Tổng doanh thu đạt:  0 vnđ</strong></div>
                        	
                        	
                        	<div class="alert bg-blue" >Trung bình / Tuần:  0 vnđ</strong></div>
							
                        	<div class="alert bg-green" >Cao nhất-Tuần : <strong>0 vnđ</strong></div>
                        	
                        	<div class="alert bg-dark" >Thấp nhất-Tuần : <strong>0 vnđ</strong></div>
                        	@endif
                        	@endif
                        	</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div>
            	
            	<div class="row"><hr></div>
            	
            </div>
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                  <div class="head_table">
                     <div class="row">
                       
                        <div class="col-md-12">
                        	<div class="tab-content" >
                           <div id="canvas-holder" style="width:100%">
                              <canvas id="chart-area2"></canvas>
                           </div></div>
                        </div>
                         
                     </div>
                  </div>
               </div>
            </div>
             <div>
            	
            	
            </div>
         </div>
      </div>
   </div>
</div>
<script>



	var a = '{{$type}}';

    if(a=='week')
	 data = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'];
    else if(a=='year')
      data = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7','Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
     else if(a=='month')
     	data = ['Tuần 1', 'Tuần 2', 'Tuần 3', 'Tuần 4'];

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

 
    var config3 = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [@php
   	foreach ($products as  $value) echo  $value->countOrder($value->id).","; 
   @endphp],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            fontSize:22,
            labels: [

              @foreach ($products as $value)
              	  "{{$value->product_name}}", 
              @endforeach
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                fontSize:22,
                display: true,
                text: 'Sản phẩm bán chạy'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
  
    var config1 = {
        type: 'line',
        data: {
            labels: data ,
            datasets: [{
                label: 'Doanh thu',
                data:[@php
   	foreach ($datamonth as  $value) echo  $value .","; 
   @endphp],
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                fill: false,
                borderDash: [5, 5],
                pointRadius: 8,
                pointHoverRadius: 10,
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
                        }) + " vnđ";
                    }
                }
            },
            responsive: true,
            legend: {
                position: 'bottom',
            },
            hover: {
                mode: 'index'
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: ''
                    }
                }],
                yAxes: [{

                    display: true,
                    scaleLabel: {

                        display: true,
                        labelString: ''
                    },
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return number_format(value) + " vnđ";
                        }
                    }


                }]
            },
            title: {
            	fontSize:22,
                display: true,
                @if ($type =='month')
                 text : 'Doanh thu của tháng {{$month}} năm {{$year}}'	
                @endif
                 @if ($type =='year')
                 text : 'Doanh thu của năm {{$year}}'	
                @endif
              
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = new Chart(ctx, config1);

       
           var ctx = document.getElementById('chart-area2').getContext('2d');
        window.myDoughnut = new Chart(ctx, config3);
       
    };

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace('.', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>
@endsection