<style>
.col-lg-2{ width:15% !important;}
.col-lg-1{width: 7% ;}
.my-net-class{width:12% !important;}
.my-serial-number-class.chosen-container{width:165px !important;}
</style>
<div class="ch-container">
    <div class="row my-container-class">
        <div id="content" class="col-lg-12 col-sm-12">
            <!-- content starts -->
            <div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Inventory</a>
					</li>
					<li>
						<a href="#">Sales Invoice</a>
					</li>
				</ul>
			</div>
			
			<div class="row">
				<div class="box col-lg-10 col-md-10 col-xs-12 col-lg-push-1" style="margin-top:-10px;">
					<div class="box-inner">
						<div class="box-header well">
							<h2>Sales Invoice</h2>
						</div>
						<div class="box-content">
							<form method="post" action="<?php echo base_url('BackDateInvoice/saveInvoiceDataEdit'); ?>" id="form_sales_invoice" onsubmit="return checkInvoiceForm();">
							<div class="row">
								<div class="form-group col-lg-4">
									<label class="control-label">Date</label>
									<input type="text" class="form-control" id="sales_invoice_date" name="invoice_date" readonly="" value="<?php echo $invoice_details->invoice_date;?>"/>
								</div>
								<div class="form-group col-lg-4">
									<label class="control-label">Type of Invoice</label>
									<div class="controls">
										<select  data-rel="chosen" style="width:50% !important;" disabled="disabled">
											<option value="sale" <?php if($invoice_details->invoice_type=='sale') { echo "selected"; } ?>>Sale</option>
											<!--<option value="credit" <?php if($invoice_details->invoice_type=='credit') { echo "selected"; } ?>>Credit</option>
											<option value="proforma" <?php if($invoice_details->invoice_type=='proforma') { echo "selected"; } ?>>Proforma</option>
											<option value="corporate gift" <?php if($invoice_details->invoice_type=='corporate gift') { echo "selected"; } ?>>Corporate Gift</option>-->
											<option value="advance" <?php if($invoice_details->invoice_type=='advance') { echo "selected"; } ?>>Advance Mode</option>
										</select><input type="hidden" id="invoice_type"  name="invoice_type" value="<?php echo $invoice_details->invoice_type;?>"  />
									</div>
								</div>
								
								<div class="form-group col-lg-4">
									<label class="control-label">Invoice Number</label>
									<div class="clear-fix"></div>
									<span id="show_invoice_number" class="label label-info"></span>
									<input  type="text" class="form-control" id="invoice_number" name="invoice_number" readonly="" value="<?php echo $invoice_details->invoice_number;?>" />
								</div> 
							</div>
							
							<div class="row">
								<div class="form-group col-lg-3">
									<label class="control-label">Phone</label>
									<input type="text" class="form-control" id="customer_phone_number" name="customer_phone_number" readonly value="<?php echo $invoice_details->modal_customer_phone_number;?>"/>
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label">Customer Name</label>
									<input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $invoice_details->modal_customer_name;?>" />
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label">Address</label>
									<input type="text" class="form-control" id="customer_address" name="customer_address" value="<?php echo $invoice_details->modal_customer_address;?>" />
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label">Email-id</label>
									<input type="text" readonly class="form-control" id="customer_email_id" name="customer_email_id" value="<?php echo $invoice_details->modal_customer_email_id;?>" />
								</div>
							</div>
							<div class="row">
								
								<div class="form-group col-lg-3">
									<label class="control-label">PAN Number</label>
									<input readonly type="text" class="form-control" id="customer_pan_number" name="customer_pan_number" value="<?php echo $invoice_details->modal_customer_pan_number;?>" />
								</div>
							<?php /*	<div class="form-group col-lg-3">
									<label class="control-label">Upload Document</label>
									<input type="file"  id="invoice_upload_document" />
								</div> */?>
								<div class="form-group col-lg-3">
									<label class="control-label">ID Proof</label>
									<select readonly id="id_proof" name="id_proof"  class="form-control" >
									<option value="">Select ID Proof</option>
									<option value="voter" <?php if($invoice_details->id_proof=='voter') { echo "selected"; }?>>Voter Id</option>
									<option value="driving" <?php if($invoice_details->id_proof=='driving') { echo "selected"; }?> >Driving Licence</option>
									<option value="pan" <?php if($invoice_details->id_proof=='pan') { echo "selected"; }?> >PAN Number</option>
									<option value="passport" <?php if($invoice_details->id_proof=='passport') { echo "selected"; }?> >Passport Number</option>
									<option value="aadhar" <?php if($invoice_details->id_proof=='aadhar') { echo "selected"; }?> >Aadhar Number</option>
									</select>
								</div>
								<div class="form-group col-lg-3">
									<label class="control-label">ID Number</label>
									<input readonly type="text" class="form-control" id="id_proof_number" name="id_proof_number" value="<?php echo $invoice_details->id_proof_number;?>" />
								</div>
								
							</div>							
							<hr/>
							<div class="row">
								<div class="form-group col-lg-2">
									<label class="control-label">Product Name</label>
								</div>
								<div class="form-group col-lg-1">
									<label class="control-label">Qty</label>
								</div>
								<div class="form-group col-lg-1">
									<label class="control-label">Weight(in gm)</label>
								</div>
								<div class="form-group col-lg-1">
									<label class="control-label">Total Weight(in gm)</label>
								</div>
								<div class="form-group col-lg-2">
									<label class="control-label">Unit Rate (Rs.)</label>
								</div>
								<div class="form-group col-lg-1">
									<label class="control-label">Discount %</label>
								</div>
								<div class="form-group col-lg-1">
									<label class="control-label">VAT %</label>
								</div>
								<div class="form-group col-lg-2">
									<label class="control-label">Serial#</label>
								</div>
								<div class="form-group col-lg-2">
									<label class="control-label">Net Amount (Rs.)</label>
								</div>
							</div>
							<div class="add_product_in_sales_invoice">
							<?php 
							$office_id = $this->session->userdata('office_id');
							$office_operation_type = $this->session->userdata('office_operation_type');
							$i=0;
							$products_val=array();
							//print_r($invoice_products);
							foreach($invoice_products as $inv_pro)
							{
$table_invoice_name = "invoice_".$office_operation_type."_product_serial_number_".$office_id;
$table_invoice_product_name = "invoice_".$office_operation_type."_product_".$office_id;
$serialMaster = $this->db->select('in_p_sn.serial_number as serial_number')->from($table_invoice_name.' as in_p_sn')->join($table_invoice_product_name.' as in_p','in_p.invoice_product_id = in_p_sn.invoice_product_id')->where(array('in_p.invoice_id'=>$inv_pro->invoice_id,'in_p.product_id'=>$inv_pro->product_id))->get()->result();
//echo $this->db->last_query();
								//print_r($serialMaster);
							?>
							<div class="row" id="sales_invoice-<?php echo $i;?>">
								<div class="form-group col-lg-2">
									<div class="controls" id="product_div_id_<?php echo $i;?>">
										<select  id="product_id-<?php echo $i;?>" name="product_id[]" data-rel="chosen" class="form-control" onchange="getPrice(this.id,'<?php echo $i;?>');unselectproduct(this.id,'<?php echo $i;?>')" disabled="disabled">
										
										<option value="">Select Product</option>
										<?php foreach($product_master as $product){
											if(in_array($product->product_id,$todaysProducts)){
										?>
											<option value="<?php echo $product->product_id; ?>" <?php if($inv_pro->product_id==$product->product_id) { echo "selected"; } ?>><?php echo $product->product_name; ?></option>
										<?php }
											} ?>
											
										
										</select>
										<input type="hidden" id="product_id"  name="product_id[]" value="<?php echo $inv_pro->product_id;?>"  />
									</div>
								</div>
								<div class="form-group col-lg-1">
									<input readonly type="text" class="form-control" value="<?php echo $inv_pro->qunatity; ?>"  name="quantity[]" id="qty-<?php echo $i;?>" onblur="getNetAmount(this.id,'<?php echo $i;?>','');" onkeypress="return isNumberKey(event);" />
									<input type="hidden" class="form-control" value="" id="qty_current_stock-<?php echo $i;?>" />
								</div>
								<div class="form-group col-lg-1" >
									<input type="text" class="form-control" name="weight[]" id="weight-<?php echo $i;?>"  readonly="" value="<?php echo $inv_pro->weight; ?>" />
								</div>
								<div class="form-group col-lg-1 ">
									<input type="text" class="form-control" name="total_weight[]" id="total_weight-<?php echo $i;?>" readonly="" value="<?php echo ($inv_pro->weight*$inv_pro->qunatity); ?>" />
								</div>
								<div class="form-group col-lg-2">
									<input type="text" class="form-control" id="price_rate-<?php echo $i;?>" maxlength="6" value="<?php echo $inv_pro->rate; ?>"  name="rate_per_quantity[]" readonly />
								</div>
								<div class="form-group col-lg-1">
									<input readonly type="text" class="form-control" name="discount_percent[]" id="discount_percent-<?php echo $i;?>" value="<?php echo $inv_pro->discount; ?>" readonly=""  />
								</div>
								<div class="form-group col-lg-1">
									<input type="text" class="form-control" id="tax-<?php echo $i;?>" name="tax[]" readonly value="<?php echo $inv_pro->tax; ?>" />
								</div>
								<div class="form-group col-lg-2 my-serial-number-class">
									<select data-rel="chosen" class="form-control"  id="<?php echo $select_id; ?>" name="serial_number[]" multiple="multiple" disabled="disabled"  >
									<?php foreach($serialMaster as $serial){?>
										<option selected value="<?php echo $serial->serial_number;?>"><?php echo $serial->serial_number;?></option>
									<?php } ?>
									</select>
									<?php foreach($serialMaster as $serial){?>
										<input type="hidden" name="serial_number[]" value="<?php echo $serial->serial_number;?>" />
									<?php } ?>
								</div>
								<div class="form-group col-lg-2">
									<input type="text" class="form-control" name="net_amount[]" readonly id="net_amount-<?php echo $i;?>" value="<?php echo $inv_pro->net_amount; ?>" />
								</div>
								<?php 
								if($i>0)
								{
								?>
								<div class="form-group col-lg-1" style=" width: 5% !important;"  onclick="removeNewRawSalesInvoice('<?php echo $i;?>')">
								<a href="#" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
								</div>
								<?php
								}
								?>
							</div>
							
							

							<?php
							
							$products_val[]=$inv_pro->product_id;
							$i++;
							}
							if(count($products_val)>0)
							{
								$str_products=implode(",",$products_val);
							}
							?>
							
							</div>
							
							<!--<div class="row">
								<div class="form-group col-lg-2 col-lg-push-11">
									<a href="javascript:void(0);" onclick="addNewProductSalesInvoice();" title="Add New"><i class="glyphicon glyphicon-plus"></i></a>
								</div>
							</div> -->
							<hr/>
						<!--	<div class="row">
								<div class="form-group col-lg-6">
									<label class="control-label">Mode of Payment :</label>
									<input type="radio" name="payment" id="optionsRadios3" value="cash" checked />
									Cash
									<input type="radio" name="payment" id="optionsRadios1" value="debit_card" />
									Debit Card
									<input type="radio" name="payment" id="optionsRadios2" value="credit_card" />
									Credit Card
								</div>
							</div> -->
							<div class="form-group col-lg-12">
							<div class="form-group col-lg-7" style="padding:0;">
							<div class="add_payment_mode" style="padding:0;">
							<?php
							$i=0;
							$payment_received=0;
							$payments_val=array();
							foreach($invoice_payment as $ipayment)
							{
								if($i==0)
								{
									?>
									<label ><strong>Payment Received On: </strong><?php echo date('d/m/Y',strtotime($ipayment->createdOn));?></label>
									<?php
								}
								$payment_received=$payment_received+$ipayment->payment_amount;
								?>
								
							
							<div class="row form-group col-lg-12 " style="padding:0;" id="sales_invoice_payment_mode-<?php echo $i;?>">
								<div class="form-group col-lg-3" style="padding:0">
									
									<label class="control-label">Payment Mode :</label>
									<div id="payment_div_id_<?php echo $i;?>">
									
										<select id="payment_mode-<?php echo $i;?>" name="payment_mode[]" data-rel="chosen" class="form-control " onchange="getcheckcard(this.id,'<?php echo $i;?>');unselectpayment_mode(this.id,'<?php echo $i;?>')" >
										<option value="">Select</option>
										<option value="cash" <?php if($ipayment->payment_type=='cash') { echo "selected"; } ?>>Cash</option>
										<option value="credit card" <?php if($ipayment->payment_type=='credit card') { echo "selected"; } ?>>Credit Card</option>
										<option value="debit card" <?php if($ipayment->payment_type=='debit card') { echo "selected"; } ?>>Debit Card</option>
										<option value="cheque" <?php if($ipayment->payment_type=='cheque') { echo "selected"; } ?>>Cheque</option>
										<option value="neft" <?php if($ipayment->payment_type=='neft') { echo "selected"; } ?>>NEFT</option>
										
										</select>
										</div>
									</div>
								
								<div class="form-group col-lg-3">
									<label class="control-label">Amount (Rs.)</label>
									
									<input readonly  type="text" class="form-control" name="payment_mode_amount[]" id="payment_mode_amount_<?php echo $i;?>" onchange="getTotal_received();" value="<?php echo $ipayment->payment_amount;?>"  /> 
								</div>
								<?php 
								$style="display:none;";
								$style2="display:none;";
								if($ipayment->card_cheque_number!='')
								{
									$style="display:block;";
								}
								
								if($ipayment->bank_name!='')
								{
									$style2="display:block;";
								}
									?>
									
								
								<div class="form-group col-lg-2" id="div_card_data_<?php echo $i;?>" style="<?php echo $style;?>">
									<label class="control-label" id="lable_card_<?php echo $i;?>">Card No.</label>
									
										<input type="text" class="form-control" name="card_check_number[]" id="card_check_number_<?php echo $i;?>" <?php if($ipayment->payment_type=='credit card' || $ipayment->payment_type=='debit card' ) {?> maxlength="4" <?php } ?> value="<?php echo $ipayment->card_cheque_number;?>" />
								</div>
									<div class="form-group col-lg-3" id="div_card_name_<?php echo $i;?>" style="<?php echo $style2 ?>">
									<label class="control-label" id="lable_card_name_<?php echo $i;?>">Card Name</label>
									<input type="text" value="<?php echo $ipayment->bank_name;  ?>" class="form-control" name="card_check_name[]" id="card_check_name_<?php echo $i;?>"  />
								</div>
								<?php
								if($i>0)
								{
									?>
								
								<div class="form-group col-lg-2" style=" width: 5% !important;"  onclick="removeNewRawPaymentModeSalesInvoice('<?php echo $i;?>')">
<label class="control-label" >&nbsp;</label>
									<a href="#" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>
								<?php
								}
								?>
								
							</div>
							<?php
							$payments_val[]=$ipayment->payment_type;
							$i++;
							}
							if(count($payments_val)>0)
							{
								$str_payments=implode(",",$payments_val);
							}
							
							?>
							
							
							</div>
								<div class="row form-group col-lg-12" style="padding:0;">
								<div class="form-group col-lg-6" style="padding:0;">
								<label class="control-label" style=" margin-top: 10px;">Pending Amount (Rs.) &nbsp;:<span id='Pending'>  <?php if((($invoice_details->total_amount+$invoice_details->surcharge_on_vat)-($payment_received))>0){
									$pending_amount_text=($invoice_details->total_amount+$invoice_details->surcharge_on_vat)-($payment_received);
									echo number_format($pending_amount_text,'2','.','') ;
									}else{ echo 0; } ?> </span>&nbsp;</label>
									<!--<a title="Add New" onclick="addNewPaymentMode();" href="javascript:void(0);"><i class="glyphicon glyphicon-plus"></i></a>-->
								</div>
								</div>
							</div>
							<div class="form-group col-lg-5" style="padding:0px;">
								
								<div class="row form-group col-lg-12" >
									
									<div class="form-group col-lg-6">
										<label class="control-label pull-right" style=" margin-top: 10px;">Total Amount (Rs.)</label>
									</div>
									<div class="form-group col-lg-6">
										<input type="text" class="form-control" name="total_amount" id="total_amount" readonly value="<?php echo number_format($invoice_details->total_amount,'2','.','');?>" />
									</div>
								</div>
								<div class="row form-group col-lg-12">
								<div class="form-group col-lg-6">
									<label class="control-label pull-right" style=" margin-top: 10px;">TCS Amount (Rs.)</label>
								</div>
								<div class="form-group col-lg-6">
									<input type="text" class="form-control" name="surcharge_on_vat" id="surcharge_on_vat" readonly  value="<?php echo number_format($invoice_details->surcharge_on_vat,'2','.','');?>" />
								</div>
								</div>
								<div class="row form-group col-lg-12" >
									<div class="form-group col-lg-6">
										<label class="control-label pull-right" style=" margin-top: 10px;">Total Net Amount (Rs.)</label>
									</div>
									<div class="form-group col-lg-6">
										<input type="text" class="form-control" name="total_net_amount" id="total_net_amount" readonly value="<?php echo number_format($invoice_details->total_amount+$invoice_details->surcharge_on_vat+$invoice_details->adjustment,'2','.','');?>" />
									</div>
								</div>
							</div>
							</div>
							
							<!--
							<div class="row">
								<div class="form-group col-lg-3 col-lg-push-6">
									<label class="control-label pull-right" style=" margin-top: 10px;">Surcharge on VAT</label>
								</div>
								<div class="form-group col-lg-3 col-lg-push-6">
									<input type="text" class="form-control" name="surcharge_on_vat" id="surcharge_on_vat" readonly />
								</div>
							</div>
							-->
							<div class="row">
								
							</div>
							<hr/>
							<div class="row">
								<div class="form-group col-lg-3 col-lg-push-0">
									<label class="control-label">Amount Received (Rs.) :</label>
									<input type="text" class="form-control" readonly name="received_amount" id="received_amount" onkeypress="getAmountReceived();" value="<?php echo $payment_received; ?>" />
								</div>
								<div class="form-group col-lg-2 col-lg-push-1">
									<label class="control-label">Adjustment (Rs.)</label>
									<input readonly type="text" class="form-control"   name="round_off" id="round_off" value="<?php echo $invoice_details->adjustment; ?>" />
								</div>
								<div class="form-group col-lg-3 col-lg-push-3">
									<label class="control-label">Amount Refunded (Rs.) :</label>
									<input type="text" class="form-control" value="<?php echo $invoice_details->amount_refunded; ?>" name="amount_refunded" id="amount_refunded" readonly />
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12 col-lg-push-3" style="width:14% !important;">
									<button type="submit" id="generate_invoice_btn" class="btn btn-primary">Save / Generate Invoice</button>
									<input type="hidden" name="selected_products_val"  id="selected_products_val" value="<?php echo $str_products;?>" />
							<input type="hidden" name="selected_payment_val" id="selected_payment_val" value="<?php echo $str_payments;?>" />
							<input type="hidden" name="selected_payment_divs"  id="selected_payment_divs" value="<?php echo count($invoice_payment);?>" />
							<input type="hidden" name="selected_products_divs" id="selected_products_divs" value="<?php echo count($invoice_products);?> " />
							<input type="hidden" name="already_paid" id="already_paid" value="<?php echo $i;?>" />
							<input type="hidden" name="already_received" id="already_received" value="<?php echo $payment_received;?>" />
							<input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo base64_encode($invoice_details->invoice_id);?>" />
								</div>
								<div class="form-group col-lg-2 col-lg-push-4" style="width:14% !important;">
									<button type="button" class="btn btn-primary" onclick="javascript:window.location.reload();">Reset</button> 
									
								</div>
								<div class="form-group col-lg-2 col-lg-push-4" style="width:14% !important;">
									<button type="button" class="btn btn-primary" onclick="javascript:window.location.href='<?php echo base_url('BackDateInvoice/back_date_sales_invoice_details');?>';">Cancel</button> 
									
								</div>
								<!--
								<div class="form-group col-lg-2 col-lg-push-6" style="width:11.5% !important;">
									<button type="button" class="btn btn-primary">Cancel Invoice</button>
								</div>
								<div class="form-group col-lg-3 col-lg-push-6">
									<button type="button" class="btn btn-primary">Generate Duplicate Invoice</button>
								</div> -->
							</div>
							
							</form>
						</div>
					</div>
				</div>
			</div><!--/row-->
    <!-- content ends -->
		</div><!--/#content.col-md-0-->
	</div><!--/fluid-row-->

<!--Modal Form For Customer Info---->
<div id="modal-customer-info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 class="modal-title"><span id="product_text"></span>Customer Information</h3>
			</div>
			<form id="customer_info_form" method="post" onsubmit="return add_customer_info();">
			<div class="modal-body">			
				<div class="box-content">
					<div class="row">
						<div class="form-group col-lg-3">
							<label class="control-label">Name</label>
							<input type="text" class="form-control" id="modal_customer_name" name="modal_customer_name" value="<?php echo set_value('modal_customer_name'); ?>"/>
							<span id="modal_customer_name_error"></span>
						</div>
						<?php /*<div class="form-group col-lg-4">
							<label class="control-label">Customer Code</label>
							<input type="text" class="form-control" id="modal_customer_short_name" name="modal_customer_short_name" value="<?php echo set_value('modal_customer_short_name'); ?>"/>
							<span id="modal_customer_short_name_error"></span>
						</div>*/?>
						<div class="form-group col-lg-3">
							<label class="control-label">Email-id</label>
							<input type="text" class="form-control" id="modal_customer_email_id" name="modal_customer_email_id" value="<?php echo set_value('modal_customer_email_id'); ?>"/>
							<span id="modal_customer_email_id_error"></span>
						</div>
						<div class="form-group col-lg-3">
							<label class="control-label">Phone Number</label>
							<input type="text" class="form-control" id="modal_customer_phone_number" name="modal_customer_phone_number" value="<?php echo set_value('modal_customer_phone_number'); ?>"/>
							<span id="modal_customer_phone_number_error"></span>
						</div>
						<div class="form-group col-lg-3">
							<label class="control-label">Mobile Number</label>
							<input type="text" class="form-control" id="modal_customer_mobile_number" name="modal_customer_mobile_number" value="<?php echo set_value('modal_customer_mobile_number'); ?>"/>
							<span id="modal_customer_mobile_number_error"></span>
						</div>
					</div>
					<div class="row">
					<div class="form-group col-lg-4">
							<label class="control-label">ID Proof</label>
							<select name="proof_data" id="proof_data"  class="form-control" style="width:100%" >
								<option value="">Select ID Proof</option>
								<option value="voter">Voter Id</option>
								<option value="driving">Driving Licence</option>
								<option value="pan">PAN Number</option>
								<option value="passport">Passport Number</option>
								<option value="aadhar">Aadhar Number</option>
							</select> 
							
						</div>
						
						<div class="form-group col-lg-4">
							<label class="control-label">ID Number</label>
							<input type="text" class="form-control" id="id_number"  name="id_number"  />
							<span id="id_number_error"></span>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">PAN Number</label>
							<input type="text" class="form-control" id="modal_customer_pan_number" name="modal_customer_pan_number" value="<?php echo set_value('modal_customer_pan_number'); ?>"/>
							<span id="modal_customer_pan_number_error"></span>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-lg-4">
							<label class="control-label">Address</label>
							<textarea id="modal_customer_address" name="modal_customer_address" rows="4" class="form-control"  style="resize:none;"><?php echo set_value('modal_customer_address');  ?></textarea>
							<span id="modal_customer_address_error"></span>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">State</label>
							<div class="controls">
							<input type="text" class="form-control" id="state" name="state" value=""/>
							<?php /*	<select id="state_id" name="state_id" data-rel="chosen" class="form-control" onchange="makeDistrictList();">
								<option value="">Select State</option>
								<?php foreach($state_master as $state) {  ?>
									<option value="<?php echo $state->state_id;?>" <?php echo  set_select('state_id', $state->state_id ); ?> ><?php echo $state->state_name;?></option>
								<?php } ?>
								</select>*/?>
								<span id="state_id_error"></span>
							</div>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">District</label>
							
							<div class="controls" id="district_list">
							<input type="text" class="form-control" id="district" name="district" value=""/>
							<?php/*
								<select name="district_id" id="district_id" data-rel="chosen" class="form-control" onchange="makeCityList();">
								<option value="">Select District</option>
								
								</select>*/  ?>
							</div>
							<span id="district_id_error"></span>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">City</label>
							<div class="controls" id="city_list">
							<input type="text" class="form-control" id="city" name="city" value=""/>
							<?php /*
								<select name="city_id" id="city_id" data-rel="chosen" class="form-control">
								<option value="">Select City</option>
								
								</select> */?>
							</div>
							<span id="city_id_error"></span>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">Pincode</label>
							<input type="text" class="form-control" id="modal_customer_pincode" onkeypress="return isNumeric(event);" name="modal_customer_pincode" value="<?php echo set_value('modal_customer_pincode'); ?>" />
							<span id="modal_customer_pincode_error"></span>
						</div>
						
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-sm btn-primary">Submit</button>
				
			</div>
			</form>
		</div>
	</div>
</div>	

<script type="text/javascript">
function TotalPaymentHidden()
	{
		var divSize = $(".add_payment_mode > div").size()-1;
		var pass_hidden='';
		var counter_pay='0';
		for(var i=0;i<=divSize;i++)
		{
			
		if($("#sales_invoice_payment_mode-"+i).html()!='')
			{
				if(pass_hidden=='')
				{
				pass_hidden=i;
				}
				else
				{
					pass_hidden=pass_hidden+","+counter_pay;
				}
			}
			counter_pay++;
		}
		$("#selected_payment_divs").val(pass_hidden);	
	}
function TotalProductHidden()
	{
		var divSize = $(".add_product_in_sales_invoice > div").size()-1;
		var pass_hidden_data='';
		
		var counter='0';
		for(var i=0;i<=divSize;i++)
		{
			
		if($("#sales_invoice-"+i).html()!='')
			{
			
				if(pass_hidden_data=='')
				{
				pass_hidden_data=counter;
				}
				else
				{
					pass_hidden_data=pass_hidden_data+","+counter;
				}
				
				
			}
			counter++;
		}
		
		$("#selected_products_divs").val(pass_hidden_data);	
	}
	$(document).ready(function(){
				
		<?php
$i=0;
foreach($invoice_products as $inv_pro)
							{
								?>

fillserial_number_invoice_form('<?php echo $i;?>','<?php echo $inv_pro->qunatity; ?>');
						<?php
							$i++;
							}
							?>
		
	
		
		$('#generate_invoice_btn').on('click', function() {});
		
		// ₹24000 get today price_rate		
	});
	function checkInvoiceForm()
	{
	

	//alert(formData);
	/*bootbox.confirm("You want to generate invoice? Are you sure?", function(result) {
	if(result==true)
	{*/
		//$('button[type="submit"]').addClass('disabled');	
	//resetErrors();
	resetErrors();
	var url = $('#form_sales_invoice').attr('action');
	var formData=$('#form_sales_invoice').serialize();
		var saveData = new FormData($('#form_sales_invoice')[0]);
	var amountReceived=0;	
if($('#received_amount').val()!='')
{
	amountReceived = parseFloat($('#received_amount').val());
	
}
var netAmount=0;
if($("#total_net_amount").val()!='')
{
netAmount = parseFloat($("#total_net_amount").val());
}
	
	TotalPaymentHidden();
	TotalProductHidden();
	
	if((amountReceived < netAmount)){
		alert("Received amount can't be less than total net amount");
	}
	$.ajax({
	
		dataType: 'json',
		type: 'POST',
		url: url,
		data: saveData,
		async: false,
		success : function (res){
	
			if(res.msg=='success'){
				//$('#customer_info_form').get(0).reset();
				window.location.href='<?php echo base_url('invoice/sales_invoice_receipt');?>?backdate=1&invoice_id='+res.invoice_id;
			}			
			else {
			$.each(res, function(i, v) {
				console.log(i + " => " + v); // view in console for error messages
					var msg = '<label class="error" for="'+i+'">'+v+'</label>';
					$('input[name="' + i + '"],input[id="' + i + '"],div[id="' + i + '"],select[id="' + i + '"]').addClass('inputTxtError').after(msg);
				});

				//var mydata = JSON.parse(res);
				/*$.each(res, function (k, v) {
					if (v.length > 0) {
						$('#' + k + '_error').html('<label class="error" for="'+k+'">'+v+'</label>');
						 $('input[name="' + k + '"],div[id="'+k+'"],div[id="'+k+'_chosen"], textarea[name="' + k + '"]').addClass('inputTxtError');
					}
					else{
						$('#' + k + '_error').html(v);
						 $('input[name="' + k + '"],div[id="'+k+'"],div[id="'+k+'_chosen"], textarea[name="' + k + '"]').removeClass('inputTxtError');
					}
				});*/
			}
		},
		cache: false, contentType: false, processData: false
		
		});
			return false;
	/*}
	else
	{
	$('button[type="submit"]').removeClass('disabled');	
	}*/

//}); 
	return false;
	
		
	
	
	
	}
	function getPrice(id,net_stock_id){
		myid = id.split('-');
		divnumber = (myid[1]) ? '-' + myid[1] : '';
		divnumber = net_stock_id;
		product_id = $('#'+id+' :selected').val();

		$.ajax({
				url : "<?php echo base_url(); ?>invoice/getPriceByProduct",
				type : "post",
				data : {product_id:product_id},
				success : function(res){ 
				mydata = JSON.parse(res);
					$('#price_rate-' + divnumber).val(mydata.price_rate.trim());
					$('#tax-' + divnumber).val(mydata.tax.trim());
					//$('#surcharge_on_vat').val(mydata.surcharge.trim());
					$('#qty_current_stock-'+net_stock_id).val(mydata.product_current_stock);
					$('#weight-'+net_stock_id).val(mydata.weight);
					
					
					//alert($('#price_rate' + divnumber).val());
				}
		});
		
	}
	function getcheckcard(id,divnumber)
	{
	var payment_mode=$('#'+id+' :selected').val();

		if(payment_mode=='credit card' || payment_mode=='debit card')
		{
		$("#div_card_data_"+divnumber).show();
		$("#div_card_name_"+divnumber).show();
		$("#lable_card_"+divnumber).html('Card Number');
		$('#card_check_number_'+divnumber).val('');
		$('#card_check_number_'+divnumber).attr('maxlength','4');
		}
		else if(payment_mode=='cheque' || payment_mode=='neft')
		{
		$("#div_card_data_"+divnumber).show();
		$("#div_card_name_"+divnumber).hide();
		$("#card_check_name_"+divnumber).val('');
		if(payment_mode=='cheque')
		{
			$("#lable_card_"+divnumber).html('Cheque Number');
		}
		else{
			$("#lable_card_"+divnumber).html('NEFT Details');
		}
		
		$('#card_check_number_'+divnumber).val('');
		$('#card_check_number_'+divnumber).attr('maxlength','');
		
		}
		else
		{
		$("#div_card_name_"+divnumber).hide();
		$("#card_check_name_"+divnumber).val('');
		$('#card_check_number_'+divnumber).val('');
		$("#div_card_data_"+divnumber).hide();
		}
	}
	function fillCustomerInfo(customerId){
		$.ajax({
				url : "<?php echo base_url(); ?>invoice/getCustomerInfo",
				type : "POST",
				data : {customer_id:customerId},
				success : function(res){
					mydata = JSON.parse(res);
						$('#customer_name').val(mydata.modal_customer_name);
						//$('#customer_address').val(mydata.modal_customer_address);
						//$('#customer_phone_number').val(mydata.modal_customer_phone_number);
						//$('#customer_email_id').val(mydata.modal_customer_email_id);
						$('#customer_pan_number').val(mydata.modal_customer_pan_number);
						//$('#id_proof').val(mydata.id_proof);
						//$('#id_proof :selected').val(mydata.id_proof);
						//$("#id_proof option[value="+mydata.id_proof+"]").attr("selected", "selected");
						$("#id_proof > [value=" + mydata.id_proof + "]").attr("selected", "true");
						$('#id_proof_number').val(mydata.id_proof_number);
				}
		});
		
	}
	
	function addNewProductSalesInvoice()
	{
		var my_div = '';
		$('.add_product_in_sales_invoice').removeClass('hide').css('display','block');	
		var divSize = $(".add_product_in_sales_invoice > div").size()-1;
var already_products=$("#selected_products_val").val();
		$.ajax({
				url : "<?php echo base_url();?>invoice/AjaxAddNewDivCommon",
				type: "POST",
				data: {divSize:divSize,already_products:already_products,pageName:"sales_invoice_form"},
				success: function(res){
					
						$('.add_product_in_sales_invoice').append(res);
					
					myTotalValue();
				}
		});
	}
	function addNewPaymentMode()
	{
		var my_div = '';
		$('.add_payment_mode').removeClass('hide').css('display','block');	
		var divSize = $(".add_payment_mode > div").size()-1;
		
		var already_products=$("#selected_payment_val").val();
		$.ajax({
				url : "<?php echo base_url();?>invoice/AjaxAddNewDivCommon",
				type: "POST",
				data: {divSize:divSize,already_products:already_products,pageName:"sales_invoice_payment_mode_form"},
				success: function(res){
					
						$('.add_payment_mode').append(res);
					
					myTotalValue();
				}
		});
	}
	function getTotal_received()
	{
	var total_amount_received=0;
	var divSize = $(".add_payment_mode > div").size()-1;

		for(var i=0;i<=divSize;i++)
		{
			//if($("#payment_mode_amount_"+i).val()!='')
				
			if($("#sales_invoice_payment_mode-"+i).html()!='' && $("#payment_mode_amount_"+i).val()!='')
			{
			total_amount_received=total_amount_received+parseFloat($("#payment_mode_amount_"+i).val());
			}
		}
		//alert(total_amount_received+" "+$("#already_received").val());
		/*if($("#already_received").val()!='')
		{
		$("#received_amount").val(total_amount_received+parseFloat($("#already_received").val()));
		}
		else{*/
			$("#received_amount").val(parseFloat(total_amount_received).toFixed(2));
	//	}
		if(($("#total_net_amount").val())!='0')
		{
		var refunded=parseFloat($("#received_amount").val())-parseFloat($("#total_net_amount").val());
		$("#amount_refunded").val(parseFloat(refunded).toFixed(2));
		}
		else
		{
		$("#amount_refunded").val('0');
		}
		getAmountReceived();
	}
	
</script>
<script type="text/javascript">
function addMoreCustomerInfo()
{

	$('#modal-customer-info').modal('show');
	$('#state_id_chosen, #district_id_chosen, #city_id_chosen').css('width','80%');
}

function makeDistrictList(districtId,cityId)
{
	var stateId = $('#state_id :selected').val();
	$.ajax({
			url : "<?php echo base_url('masterForm/makeDistrictList');?>",
			type: "POST",
			data: {state_id:stateId,district_id:districtId},
			dataType: 'json',
			success:function(res){
				$('#district_list').html(res.district);
				if(cityId>0){
					makeCityList(cityId);
				}
			}
	});
}

function makeCityList(cityId)
{
	var districtId = $('#district_id :selected').val();
	$.ajax({
			url : "<?php echo base_url('masterForm/makeCityList');?>",
			type: "POST",
			data: {district_id:districtId,city_id:cityId},
			dataType: 'json',
			success:function(res){
				$('#city_list').html(res.city);
			}
	});
}

function add_customer_info()
{
//	var saveData =  $('#customer_info_form').serialize();

	resetErrors();
	var saveData = new FormData($('#customer_info_form')[0]);
	
	$.ajax({
		
		url : "<?php echo base_url('invoice/add_customer_info'); ?>",
		data : saveData,
		async : false,
		type: "post",
		success : function (res){
		var arr_data=res.split("|||");
			if(arr_data[1]=='1'){
				$('#customer_info_form').get(0).reset();
				window.location.reload();
			}			
			else {
			
				var mydata = JSON.parse(arr_data[1]);
				$.each(mydata['Error'], function (k, v) {
					if (v.length > 0) {
						$('#' + k + '_error').html('<label class="error" for="'+k+'">'+v+'</label>');
						 $('input[name="' + k + '"],div[id="'+k+'"],div[id="'+k+'_chosen"], textarea[name="' + k + '"]').addClass('inputTxtError');
					}
					else{
						$('#' + k + '_error').html(v);
						 $('input[name="' + k + '"],div[id="'+k+'"],div[id="'+k+'_chosen"], textarea[name="' + k + '"]').removeClass('inputTxtError');
					}
				});
			}
		},
		cache: false, contentType: false, processData: false
	});
	return false;
}

function getNetAmount(id,net_stock_id,dis){
	myid = id.split('-');
	divnumber = (myid[1]) ? '-' + myid[1] : '';
	divnumber = net_stock_id;
	net_stock=$('#qty_current_stock-' + net_stock_id).val();
	if(net_stock>='0'){
	if((parseFloat($('#qty-' + divnumber).val())>parseFloat(net_stock)) || net_stock=='0'){
		/* alert('Qty should not be greater than Net Current Stock Ordered['+net_stock+']!');
		$('#qty' + divnumber).val('');
		$('#net_amount' + divnumber).val('');
		$("#total_net_amount").val('');
        $("#total_amount").val('');		
		$('#qty' + divnumber).focus(); */
		
	      $('#qty-' + divnumber).removeClass('inputTxtError');
          $('label[for="qty-'+divnumber+'"]').remove();
		  var msg = '<label class="error" for="qty-'+divnumber+'">Qty should not be greater than Net Current Stock Ordered!</label>';
       $('input[id="qty-'+divnumber+'"]').addClass('inputTxtError').after(msg);
	}else{
	resetErrors();
	taxValue = parseFloat($('#tax-' + divnumber).val());
	priceRate = (parseFloat($('#price_rate-' + divnumber).val())) ? parseFloat($('#price_rate-' + divnumber).val()) : '0' ;
	quantity = (parseFloat($('#qty-' + divnumber).val())) ? parseFloat($('#qty-' + divnumber).val()) : '0' ;
	discountValue = (parseFloat($('#discount_percent-' + divnumber).val())) ? parseFloat($('#discount_percent-' + divnumber).val()) : '0' ;
	if($('#weight-'+divnumber).val()!='')
	{
	$('#total_weight-'+divnumber).val(quantity*parseFloat($('#weight-'+divnumber).val()));
	}
	surcharge = (parseFloat($('#surcharge_on_vat').val())) ? parseFloat($('#surcharge_on_vat').val()) : '0' ;
	$('.calculateButtonDiv').removeClass('hide');
	amount = (quantity * priceRate);
	totalTax = (amount * taxValue)/100;
	discountAmount = (amount * discountValue)/100;
	totalAmount = (amount + totalTax - discountAmount);
	if(dis!='dis')
	{
	fillserial_number_invoice_form(net_stock_id,quantity);
	}
	$('#net_amount-' + divnumber).val(parseFloat(totalAmount).toFixed(2));	
	
	myTotalValue();	
//	getTotal_received();
		
	}
  }else{
	  
	 taxValue = parseFloat($('#tax-' + divnumber).val());
	priceRate = (parseFloat($('#price_rate-' + divnumber).val())) ? parseFloat($('#price_rate-' + divnumber).val()) : '0' ;
	quantity = (parseFloat($('#qty-' + divnumber).val())) ? parseFloat($('#qty-' + divnumber).val()) : '0' ;
	discountValue = (parseFloat($('#discount_percent-' + divnumber).val())) ? parseFloat($('#discount_percent-' + divnumber).val()) : '0' ;
	if($('#weight-'+divnumber).val()!='')
	{
	$('#total_weight-'+divnumber).val(quantity*parseFloat($('#weight-'+divnumber).val()));
	}
	surcharge = (parseFloat($('#surcharge_on_vat').val())) ? parseFloat($('#surcharge_on_vat').val()) : '0' ;
	$('.calculateButtonDiv').removeClass('hide');
	amount = (quantity * priceRate);
	totalTax = (amount * taxValue)/100;
	discountAmount = (amount * discountValue)/100;
	totalAmount = (amount + totalTax - discountAmount);
	
	$('#net_amount-' + divnumber).val(parseFloat(totalAmount).toFixed(2));	
	if(dis!='dis')
	{
	fillserial_number_invoice_form(net_stock_id,quantity);
	}
	
	myTotalValue(); 
	//getTotal_received();
	  
	  
  }
}

function myTotalValue()
{
	AmountValue='0';
	totalAmountValues = '0';
	//firstNetValue = $('#net_amount-0').val();
	AmountValue = '0';
	var divSize = $(".add_product_in_sales_invoice > div").size()-1;
	for(i=0;i<=divSize;i++){
		myValue = (parseFloat($('#net_amount-' + i).val())) ? parseFloat($('#net_amount-' + i).val()) : '0' ;
		totalAmountValues = parseFloat(totalAmountValues) + parseFloat(myValue);
	}
	AmountValue = parseFloat(AmountValue) + parseFloat(totalAmountValues);
	surcharge = (parseFloat($('#surcharge_on_vat').val())) ? parseFloat($('#surcharge_on_vat').val()) : '0' ;
	$("#total_amount").val(parseFloat(AmountValue).toFixed(2));
	var surcharge='0';
	if(AmountValue>=200000)
	{
		surcharge=AmountValue/100;
	}
	$('#surcharge_on_vat').val(parseFloat(surcharge).toFixed(2));
	netAmountValue = AmountValue + parseFloat(surcharge);
	$("#total_net_amount").val(parseFloat(netAmountValue).toFixed(2));
}

function totalCalculation()
{
	myTotalValue();
}

function getAmountReceived()
{
var amountReceived = '0';
var netAmount = '0';
if($('#received_amount').val()!='')
{
	amountReceived = parseFloat($('#received_amount').val());
	
}
if($("#total_net_amount").val()!='')
{
netAmount = parseFloat($("#total_net_amount").val());
}


	
	var refundAmount = '0';
	$('#amount_refunded').val('0');
	if(amountReceived < netAmount){
		//alert("Received amount can't be less than total net amount");
		//$('#generate_invoice_btn').addClass('disabled');
	}
	else{

		refundAmount = amountReceived - netAmount;
	if(refundAmount>=0)
	{
	$('#generate_invoice_btn').removeClass('disabled');
	}
	
	}
	$('#amount_refunded').val(parseFloat(refundAmount).toFixed(2));
	panddingAmount = (parseFloat($("#total_net_amount").val()) - (amountReceived));
	//alert(panddingAmount);
	if(panddingAmount>0)
	{
		panddingAmount=parseFloat(panddingAmount).toFixed(2);
      $("#Pending").text(panddingAmount);
	}else{
		$("#Pending").text(0);
	}
}

	function fillserial_number_invoice_form(net_stock_id,quantity)
	{
		var product_id=$('#product_id-'+net_stock_id).val();
		//product_current_stock_serial_number_2
		var tableName = "product_current_stock_serial_number_<?php echo $this->session->userdata('office_id');?>";
		var invoice_id=$("#invoice_id").val();
		$.ajax({
				url : "<?php echo base_url();?>invoice/getSerialNumberSeries",
				type: "POST",
				data: {product_id:product_id,table_name:tableName,invoice_id:invoice_id,net_stock_id:net_stock_id,quantity:quantity,pageName:"sales_invoice_form",fieldName:"product_serial_number"},
				success: function(resp){
					$('#serial_number_div'+net_stock_id).html(resp);
				//	$('#stock_serial_list'+net_stock_id).html(resp);
				}
		});
	}
	function unselectproduct(id,cur_div)
	{
	updateSelectedProductHidden();
		var divSize = $(".add_product_in_sales_invoice > div").size()-1;
		var already_products = $("#selected_products_val").val();
		product_id = $('#'+id+' :selected').val();
		for(var k=0;k<=divSize;k++)
		{
			if(k!=cur_div && $("#sales_invoice-"+i).html()!='')
			{
			others_product_val = $('#product_id-'+k+' :selected').val();
				
					$.ajax({
					url : "<?php echo base_url();?>invoice/AjaxAddNewDivCommon",
					type: "POST",
					data: {divSize:k,select_product:others_product_val,already_products:already_products,pageName:"sales_invoice_change_products"},
					success: function(res){
					var arr_res=res.split('|||');
				
							$('#product_div_id_'+arr_res[1]).html(arr_res[2]);
							
					}
					});
				
			}
		}
		
	}
	function updateSelectedProductHidden()
	{
	var divSize = $(".add_product_in_sales_invoice > div").size()-1;
	var h_data='';
		for(var i=0;i<=divSize;i++)
		{
			if($("#sales_invoice-"+i).html()!='')
			{
				others_product_val = $('#product_id-'+i+' :selected').val();
					if(others_product_val!='')
					{
					
						if(h_data=='')
						{
							h_data=others_product_val;
						}
						else
						{
							h_data=h_data+","+others_product_val;
						}
					}
			}
		}
		
		$("#selected_products_val").val(h_data);	
		
	}
	
		function unselectpayment_mode(id,cur_div)
	{
	updateSelectedPaymentHidden();
		var divSize = $(".add_payment_mode > div").size()+parseInt($("#already_paid").val())-2;
		var already_products = $("#selected_payment_val").val();
		payment_id = $('#'+id+' :selected').val();
		for(var k=0;k<=divSize;k++)
		{
			if(k!=cur_div && $("#sales_invoice_payment_mode-"+i).html()!='')
			{
			others_product_val = $('#payment_mode-'+k+' :selected').val();
				
					$.ajax({
					url : "<?php echo base_url();?>invoice/AjaxAddNewDivCommon",
					type: "POST",
					data: {divSize:k,select_product:others_product_val,already_products:already_products,pageName:"sales_invoice_change_payment_type"},
					success: function(res){
					var arr_res=res.split('|||');
				
							$('#payment_div_id_'+arr_res[1]).html(arr_res[2]);
							
					}
					});
				
			}
		}
		
	}
	function updateSelectedPaymentHidden()
	{
	var divSize = $(".add_payment_mode > div").size()+parseInt($("#already_paid").val())-2;
	var h_data='';
		for(var i=0;i<=divSize;i++)
		{
			if($("#sales_invoice_payment_mode-"+i).html()!='')
			{
				var others_payment_val = $('#payment_mode-'+i+' :selected').val();
					if(others_payment_val!='')
					{
					
						if(h_data=='')
						{
							h_data=others_payment_val;
						}
						else
						{
							h_data=h_data+","+others_payment_val;
						}
					}
			}
		}
		
		$("#selected_payment_val").val(h_data);	
		
	}
function removeNewRawSalesInvoice(div_id)

	{

		$('#sales_invoice-'+div_id).addClass('hide disabled');
		$('#product_id-'+div_id).val('');
		
		updateSelectedProductHidden();
		unselectproduct('product_id-'+div_id,div_id);
		$('#sales_invoice-'+div_id+' input').addClass('hide disabled');

		$('#sales_invoice-'+div_id+' input').val('');
		$('#sales_invoice-'+div_id).html('');
		myTotalValue(); 
		getTotal_received();

	}
	function removeNewRawPaymentModeSalesInvoice(div_id)

	{

		$('#sales_invoice_payment_mode-'+div_id).addClass('hide disabled');

		$('#sales_invoice_payment_mode-'+div_id+' input').addClass('hide disabled');

		$('#sales_invoice_payment_mode-'+div_id+' input').val('');
		$('#sales_invoice_payment_mode-'+div_id).html('');
		getTotal_received();
	}
function resetErrors() {
    $('form input,#initial_stock_starting_store_date,div.chosen-container,form select').removeClass('inputTxtError');
    $('label.error').remove();
}

</script>
