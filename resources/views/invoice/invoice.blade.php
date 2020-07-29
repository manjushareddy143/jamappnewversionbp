<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv='content-type' content='text/html; charset=utf-8" />

      <title>INVOICE</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" type='text/javascript'></script>
      <link rel='stylesheet' type='text/css' href='/invoicecss/css/style.css' />
      <link rel='stylesheet' type='text/css' href='/invoicecss/css/print.css' media="print" />
      <script type='text/javascript' src='/invoicecss/js/jquery-1.3.2.min.js'></script>
      <script type='text/javascript' src='/invoicecss/js/example.js'></script>

	  <!-- font -->
	  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en" />


      <style type="text/css">
      * { margin: 0; padding: 0; }
	/* body { font: 14px/1.4 georgia, serif; } */
	#page-wrap { width: 800px; margin: 0 auto; }
	textarea { border: 0; font: 14px georgia, serif; overflow: hidden; resize: none; }
	table { border-collapse: collapse; }
	table td, table th { border: 5px solid black; padding: 10px; }
	#header { height: 15px; width: 100%; margin: 20px 0; background: #fff; text-align: center; color: white; font: bold 15px helvetica, sans-serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }
	#address { width: 250px; height: 150px; float: left; }
	#customer { overflow: hidden; }
	#logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
	#logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
	#logoctr { display: none; }
	#logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
	#logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
	#logohelp input { margin-bottom: 5px; }
	.edit #logohelp { display: block; }
	.edit #save-logo, .edit #cancel-logo { display: inline; }
	.edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
	/* #customer-title { font-size: 20px; font-weight: bold; float: left; } */
	#meta { margin-top: 1px; width: 300px; float: right; }
	#meta td { text-align: right;  }
	#meta td.meta-head { text-align: left; background: #eee; }
	#meta td textarea { width: 100%; height: 20px; text-align: right; }
	#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 5px solid black; }
	#items th { background: #fff; }
	#items textarea { width: 80px; height: 50px; }
	#items tr.item-row td { border: 0; vertical-align: top; }
	#items td.description { width: 300px; }
	#items td.item-name { width: 75px; }
	#items td.description textarea, #items td.item-name textarea { width: 100%; }
	#items td.total-line { border-right: 5px solid; text-align: right; }
	#items td.total-value { border-left: 0; padding: 10px; }
	#items td.total-value textarea { height: 20px; background: none; }
	/* #items td.balance { background: #eee; } */
	#items td.blank { border: 0; }
	#terms { text-align: center; margin: 20px 0 0 0; }
	#terms h5 { text-transform: uppercase; font: 13px helvetica, sans-serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
	#terms textarea { width: 100%; text-align: center;}
	textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#eeff88; }
	.delete-wpr { position: relative; }
	.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #eeeeee; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: verdana; font-size: 12px; }
	.isize {
	font-size: 60px;
	color: chocolate;
	font-weight:200;
	/* padding-left: 30px; */
	}
	.a{
	color: red;
	width: 53%;
	float: right;
	}
	.b{
	width: 53%;
	float: right;
	margin-top: 15px;
	padding-bottom: 20px;
	}

		.c {
		margin-top: 70px;
		width:118px;
		}

	.img-logo {
	margin-left: 75%;
	}

	.cus-sign {
		padding-top:35px;
	}
	.terms {
		padding-bottom:50px;
	}

	.col-sm-9 {
		padding-right: 89px;
	}

	.col-md-9 {
		width: 53%;
	}

    /* @page {
        size: 20in 12.25in;
        margin: 27mm 10mm 27mm 16mm;
	} */

    @page {
        size: A4;
        margin: 0;
	}

    @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
    }

  #table{
    max-width: 2480px;
    width:100%;
  }
  /* public_path */
  #table td{
    width: auto;
    overflow: hidden;
    word-wrap: break-word;
  }

	</style>
   </head>
   <body>
      <div id="page-wrap" style="border 1px solid">
         <div class="invoice-container" style="padding:39px;">

            <div class="cus-invoice">

                <div class="row">
                    <div class="col-sm-6">
                        <label class="isize">INVOICE</label>
                    </div>


                    <div class="col-sm-6 float-right">
                        <img src="{{ public_path("/img/logo/logo.png") }}" height="35%" width="35%" alt="logo" style="margin-left: 20%;"/>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-3">
                        <h5 class="mb-3">INVOICE NUMBER</h5>
                        <span>{{ $order_id ?? '0' }}</span>
                    </div>
                    <div class="col-sm-3 float-right">
                        <h5 class="mb-3">DATE OF ISSUE</h5>
                        <span>{{ $order_date ?? '01/02/2020' }}</span>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <b class="mb-3">BILLED TO:</b>
                        <div id="clientAddress">
                            <div>{{ $client_name ?? 'client_name' }}</div>
                            <div>{{ $client_street ?? 'client_street' }}</div>
                            <div>{{ $client_city_state_country ?? 'client_city_state_country' }}</div>
                            <div>{{ $client_zip ?? 'client_zip' }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6 float-right">
                        <b>CENTRAL PROJECT SENGINEERING SERVICES <br> AND TRADING COMPANY</b>
                        <div id="companyAddress">
                            <div>Ariane Tower, 1 st Floor, Room</div>
                            <div>No.103, Near Old Mannai</div>
                            <div>Round About, Al Mushereib,</div>
                            <div>P O Box 6150, Doha, Qatar</div>
                            <div>Ph: +974 4435 7448</div>
                            <div>Fax: +974 4435 7426</div>
                            <div>Em: info@ceproqatar.com</div>
                            <div>Web: www.ceproqatar.com</div>
                        </div>
                    </div>
                </div>





			   <div id="identity">
               </div>
               <div style="clear:both"></div>
               <br><br>

               <div class="table-responsive-sm">
                <table class="table table-striped">
                    <tbody>
                        <tr valign="top">
                            <td colspan="2" bgcolor="#ffffff" style="border: 3.00pt solid #000001; padding: 0.07in">
                                <p align="center"><font  size="2" style="font-size: 9pt"><b>DESCRIPTION</b></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border: 3.00pt solid #000001; padding: 0.07in">
                                <p align="center"><font  size="2" style="font-size: 9pt"><b>UNIT COST (QAR)
                                </b></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border: 3.00pt solid #000001; padding: 0.07in">
                                <p align="center"><font  size="2" style="font-size: 9pt"><b>QTY/HR RATE
                                </b></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p align="center">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: 3.00pt solid #000001; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0.07in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center"><font  size="2" style="font-size: 9pt"><b>AMOUNT
                                    (QAR)</b></font></p>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="2" height="30" bgcolor="#ffffff" style="border: 3.00pt solid #000001; padding: 0.07in">
                                <p style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2"><b>Work
                                done: {{ $service_name ?? ''}} </b></font></font>
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 45%; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0"><font  color="#404040"> </font>
                                    {{ $service_cost ?? ''}}
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 45%; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                    {{ $working_hr ?? ''}}
                                </p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 45%; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 45%; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">{{ $service_amount ?? ''}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0.07in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2">Cost
                                of materials/spare parts</font></font>
                            </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2">
                                    {{ $material_cost ?? ''}} </font></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2">
                                    {{ $material_qty ?? ''}}</font></font></p>
                            </td>
                            <td valign="top" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p align="center" style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font   size="2">{{ $material_amout ?? ''}}</font></font></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">Maintenance/service/Labor
                                charges</font></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">0</font></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">1</font></font></p>
                            </td>
                            <td valign="top" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p align="center" style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">0</font></font></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0.07in; padding-left: 0.07in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">Additional
                                cost/charges</font></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0.07in; padding-left: 0.07in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">{{ $additional_cost ?? ''}}</font></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0.07in; padding-left: 0.07in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font   color="#404040"><font   size="2">{{ $additional_hr ?? ''}}</font></font></p>
                            </td>
                            <td valign="top" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p align="center" style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0.07in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2">
                                    {{ $additional_total ?? ''}}</font></font></p>
                            </td>
                        </tr>

                    </tbody>
                    <tbody>
                        <tr>
                            <td rowspan="2" valign="top" bgcolor="#ffffff" style="border: 3.00pt solid #000001; padding: 0.07in">
                                <p style="margin-bottom: 0in; widows: 0; orphans: 0"><font  color="#999999"><font  size="2" style="font-size: 9pt"><b>INVOICE
                                TOTAL</b></font></font></p>
                                <p><font  color="#404040"><font  size="6" style="font-size: 22pt">QAR.{{ $total ?? ''}}</font></font></p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0.07in; padding-right: 0.07in">
                                <p align="right" style="widows: 0; orphans: 0"><font  color="#000000"><font  size="2" style="font-size: 9pt"><b>SUBTOTAL </b></font></font></p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2"> {{ $sub_total ?? ''}}</font></font></p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p align="right" style="widows: 0; orphans: 0"><font  color="#000000"><font  size="2" style="font-size: 9pt"><b>DISCOUNT</b></font></font></p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2"> {{ $discount ?? ''}}</font></font></p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: none; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in">
                                <p>
                                </p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border: none; padding: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding: 0in 0.07in">
                                <p align="right" style="widows: 0; orphans: 0"><font  color="#000000"><font  size="2" style="font-size: 9pt"><b>(TAX RATE)</b></font></font></p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2">0%</font></font></p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="border: none; padding: 0in">
                                <p>
                                </p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border: none; padding: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0.07in; padding-left: 0.07in; padding-right: 0.07in">
                                <p align="right" style="widows: 0; orphans: 0"><font  color="#000000"><font  size="2" style="font-size: 9pt"><b>TAX</b></font></font></p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: 3.00pt solid #000001; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0.07in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  color="#404040"><font  size="2"> {{ $tax ?? ''}}</font></font></p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="border: none; padding: 0in">
                                <p>
                                </p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border: none; padding: 0in">
                                <p style="widows: 0; orphans: 0"><a name="_gjdgxs"></a>
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: none; border-bottom: none; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0in; padding-bottom: 0in; padding-left: 0in; padding-right: 0.07in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border: 3.00pt solid #000001; padding: 0.07in">
                                <p align="right" style="widows: 0; orphans: 0"><font  color="#000000"><font  size="3"><b>TOTAL</b></font></font></p>
                            </td>
                            <td valign="top" bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: 3.00pt solid #000001; border-left: 3.00pt solid #000001; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: 3.00pt solid #000001; border-left: none; border-right: 3.00pt solid #000001; padding-top: 0.07in; padding-bottom: 0.07in; padding-left: 0in; padding-right: 0.07in">
                                <p align="center" style="widows: 0; orphans: 0"><font  size="3">{{ $total ?? ''}}</font></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#ffffff" style="border: none; padding-bottom: 60px;">
                                <p style="margin-bottom: 10px;"><b>(Qatari Riyal ………. Only)</b></p>
                                <p style="margin-bottom: 00px;">
                                </p>
                                <p style="margin-bottom: 10px;"><font  color="#943734"><font  size="3"><u><b>TERMS</b></u></font></font></p>
                                <p style="widows: 0; orphans: 0"><font  color="#943734"><font  size="3"><b>E.g. Please pay invoice by MM/DD/YYYY</b></font></font></p>
                            </td>
                            <td bgcolor="#ffffff" style="border: none; padding: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td  bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: none; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in">
                                <p align="right" style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td  valign="top" bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: none; padding: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                            <td  bgcolor="#ffffff" style="border-top: 3.00pt solid #000001; border-bottom: none; border-left: none; border-right: none; padding-top: 0.07in; padding-bottom: 0in; padding-left: 0in; padding-right: 0in">
                                <p style="widows: 0; orphans: 0">
                                </p>
                            </td>
                        </tr>
                    </tbody>
				</table>
               </div>


            </div>
         </div>
      </div>
      <script>
        // var text = "";
        // var i;
        // for (i = 0; i < cars.length; i++) {
        //   text += cars[i] + "<br>";
        // }
        // document.getElementById("demo").innerHTML = text;
        // console.log(order_id);
        </script>
   </body>
</html>
