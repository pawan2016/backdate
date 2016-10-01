<?php

 $check_super_admin=$this->session->all_userdata();
if($check_super_admin["role_id"]==0 && $check_super_admin["office_id"]==0)
{
	$add_value = 1;
    $edit_value = 2;
    $view_value = 3;
    $delete_value = 4;
}else
{

	$page_id = 28;
	$page_permission_array = $this->role_model->get_page_permission($page_id);
	//print_r($page_permission_array);die;
	$add_value = $page_permission_array->add_value;
	$edit_value = $page_permission_array->edit_value;
	$view_value = $page_permission_array->view_value;
	$delete_value = $page_permission_array->delete_value;
}


//print_r($page_permission_array);
?>
<div class="ch-container">
    <div class="row my-container-class">
        <div id="content" class="col-lg-12 col-sm-12">
            <!-- content starts -->
            <div>
				<ul class="breadcrumb col-lg-9 col-sm-9">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Invoice</a>
					</li>
					<li>
						<a href="#">Back Date Sales Invoice Details</a>
					</li>
				</ul>
				<ul class="breadcrumb-my-toggle text-right  col-lg-3 col-sm-3">
					<li>
					<?php if($add_value == "1"){ ?>
						<a href="<?php echo base_url('BackDateInvoice/back_date_sales_invoice_form'); ?>">Create Back Date Invoice</a>
					<?php } ?>
					</li>
				</ul>
			</div>
			<?php if($this->session->flashdata('SuccessMessage')){ ?>
				<span class="alert alert-success col-lg-12">
				 <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $this->session->flashdata('SuccessMessage'); ?>
                </span>
			<?php } ?>
			<div class="row">
				<div class="box col-lg-12 col-md-12 col-xs-12">
					<div class="box-inner">
						<div class="box-header well">
							<h2>Back Date Sales Invoice Inventory</h2>
						</div>
						<div class="box-content">
							<div class="row">
								
							</div>
							<div id="stockReciptTable">
								<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
									<thead>
										<tr>
											<th class="text-center">Sr. No.</th>
											<th class="text-center">Manual Invoice Date</th>
											<th class="text-center">Current Invoice Date</th>
											<th class="text-center">Invoice Number</th>
											<th class="text-center">PAN Number</th>
											<th class="text-center">Customer Name</th>
											<th class="text-center">Narration</th>
											<th class="text-center">Manual Invoice No.</th>
											<th class="text-center">Payment Type</th>
											<th class="text-center">Total Sales Price with VAT Rs.</th>
											<th class="text-center">Attachment</th>
											<!--<th class="text-center">Office Name</th>-->
											<th class="text-center">Actions</th>
										</tr>
									</thead>
										<tbody>
											
									<?php if(!empty($invoice_details)){ $i=1; foreach($invoice_details as $InvoiceDetails){
										$office_id=$this->session->userdata('office_id');
										$data['paymenttype_details'] = $this->db->get_where('invoice_showroom_payment_mode_'.$office_id,array('invoice_id'=>$InvoiceDetails->invoice_id))->result();
										//print_r($InvoiceDetails->amount_received);die;
										$total_received_till=0;
										
										foreach($data['paymenttype_details'] as $payment_types) 
	                                    {
	                                      $total_received_till=$total_received_till+$payment_types->payment_amount;
										}
                                  $check_back_date_data = array("backdatesale","backdatecredit","backdateproforma","backdatecorporate","backdateadvance"); if(in_array($InvoiceDetails->invoice_type,$check_back_date_data)){										
									       ?>
										   <?php 
										$style_deleted='';
										if($InvoiceDetails->is_deleted=='1')
										{
											$style_deleted="background-color:#ff0000 !important;";
										}
										?>
										<tr>
											<td class="text-center" style="<?php echo $style_deleted;?>"><?php echo $i++;?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php  $arr_date=explode(" ",$InvoiceDetails->invoice_date); echo $arr_date[0];//date('m/d/Y',$arr_date[0]);?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php  $curr_date = $InvoiceDetails->createdOn; $datetime = new DateTime($curr_date); $date = $datetime->format('d-m-Y'); echo $date;?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php  echo $InvoiceDetails->invoice_number;?></td>
											
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php if($InvoiceDetails->modal_customer_pan_number!='') { echo $InvoiceDetails->modal_customer_pan_number; } else { echo 'N/A'; } ?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php if($InvoiceDetails->modal_customer_name!='') { echo $InvoiceDetails->modal_customer_name; } else { echo 'N/A'; } ?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php if($InvoiceDetails->narration!='') { echo $InvoiceDetails->narration; } else { echo 'N/A'; } ?> </td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php if($InvoiceDetails->manual_invoice_number!='') { echo $InvoiceDetails->manual_invoice_number; } else { echo 'N/A'; } ?> </td>
											
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php 
											$arr_payment_type=$this->db->get_where('invoice_showroom_payment_mode_'.$this->session->userdata('office_id'),array('invoice_id'=>$InvoiceDetails->invoice_id))->result();
											$arr_details=array();
											foreach($arr_payment_type as $pt)
											{
											$arr_details[]=ucwords($pt->payment_type);
											}
											if(count($arr_details)>0)
											{
											echo implode(", ",$arr_details);
											}
											
												?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php echo number_format($InvoiceDetails->total_amount + $InvoiceDetails->adjustment ,2,'.',',');?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>"><?php if($InvoiceDetails->invoice_upload_document!=''){
												?>
												<a href="<?php echo base_url();?>/uploads/Invoice/<?php echo $InvoiceDetails->invoice_upload_document;?>" target="_blank"><img src="<?php echo base_url();?>/uploads/Invoice/<?php echo $InvoiceDetails->invoice_upload_document;?>" height="50px" width="50px" /></a>
												<?php
											} ?></td>
											<td class="center text-center" style="<?php echo $style_deleted;?>">
											<?php if($view_value == "3"){ ?>
												<a class="btn btn-info my-btn-class" target="_blank"  href="<?php echo base_url('invoice/sales_invoice_receipt?backdate=1&invoice_id='.base64_encode($InvoiceDetails->invoice_id));?>" title="View">
													<i class="glyphicon glyphicon-view icon-white"></i>
													View
												</a>
											<?php } ?>
												<?php     //echo $InvoiceDetails->invoice_type; 	die;
										
										
										$office_id = $this->session->userdata('office_id');
										
										$flagDelete = '0';
										$back_date_data=$this->base_model->get_all_record_by_condition('back_date_invoice',array('showroom_id'=>$office_id,'invoice_delete'=>'1'));
										foreach($back_date_data as $back_date_data_main)
										{
											$date=strtotime(date('d-m-Y'));
											$to=strtotime($back_date_data_main->to_date);
											$from=strtotime($back_date_data_main->from_date);
											if(( $date >= $from) && ($date<=$to))
											{
												$backDateRangeDatas = $this->db->get_where('back_date_invoice_range',array('back_date_invoice_id'=>$back_date_data_main->id))->result();
												
												foreach($backDateRangeDatas as $backDateRangeData)
												{
													$invoiceDate1 = explode(' ',$InvoiceDetails->invoice_date);
													$invoiceDate2 = explode('-',$invoiceDate1[0]);
													$myInvoiceDate = $invoiceDate2[2].'-'.$invoiceDate2[1].'-'.$invoiceDate2[0];
													if($myInvoiceDate == $backDateRangeData->date_range)
													{
														$flagDelete = '1';
														break;
													}
												}
												
											}
										}
										/* $back_date_data=$this->base_model->get_all_record_by_condition('back_date_invoice',array('showroom_id'=>$office_id,'invoice_create'=>'1'));
										
											$date=strtotime(date('d-m-Y'));
											$to=strtotime($back_date_data['0']->to_date);
											$from=strtotime($back_date_data['0']->from_date); */
											//print_r($date <= $to);die;
											/*if((date('d-m-Y',strtotime($InvoiceDetails->createdOn))== date('d-m-Y') && $InvoiceDetails->invoice_type=='backdatesale') || (( $date >= $from) && ($date<=$to) && ($back_date_data['0']->invoice_delete==1)))
												*/
											
										if(((date('d-m-Y',strtotime($InvoiceDetails->createdOn))== date('d-m-Y')) || $flagDelete == '1' ) && $InvoiceDetails->is_deleted=='0')
												{ 
													?>
													<?php if($delete_value == "4"){ ?>
													<a class="btn btn-info my-btn-class"  href="javascript:;" onclick="delete_invoice('<?php echo base64_encode($InvoiceDetails->invoice_id);?>');" title="Delete">
														<i class="glyphicon glyphicon-view icon-white"></i>
														Delete
													</a>
													<?php } ?>
												<!--<a class="btn btn-info"  href="<?php echo base_url('BackDateInvoice/back_date_sales_invoice_edit_form?invoice_id='.base64_encode($InvoiceDetails->invoice_id));?>" title="Edit">
														<i class="glyphicon glyphicon-view icon-white"></i>
														Edit
													</a> -->
													<?php
													
												} ?>
												<?php 
												$mynewTotal = number_format($InvoiceDetails->total_amount + $InvoiceDetails->adjustment,'2');
												if(($total_received_till<$mynewTotal) && $InvoiceDetails->invoice_type=='backdateadvance' || $InvoiceDetails->transaction=="incomplete")
												{ ?>
											<?php if($add_value == "1" && $InvoiceDetails->is_deleted=='0'){ ?>
													<a  onclick="pay_more('<?php echo base_url('BackDateInvoice/back_date_sales_invoice_edit?invoice_id='.base64_encode($InvoiceDetails->invoice_id));?>');" class="btn btn-info my-btn-class element_confirm"  href="javascript:;" class="btn btn-info my-btn-class"   title="Edit">
														<i class="glyphicon glyphicon-view icon-white"></i>
														 Complete Transaction
													</a>
											<?php } ?>
													<?php
												}
												
												
												/*if(date('d/m/Y')==$arr_date[0])
											{ ?>
												<a class="btn btn-info my-btn-class" target="_blank" href="<?php echo base_url('invoice/delete_invoice_receipt?invoice_id='.base64_encode($InvoiceDetails->invoice_id));?>" title="Delete">
													<i class="glyphicon glyphicon-view icon-white"></i>
													Delete
												</a>
												<?php
											}*/
											?>
										
											</td>
										</tr>
<?php }  } } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div><!--/row-->
    <!-- content ends -->
		</div><!--/#content.col-md-0-->
	</div><!--/fluid-row-->
<script type="text/javascript">
	function delete_invoice(invoice_number) {
   
 bootbox.prompt("Reason For Deleting Invoice!", function (result) {
	 
            if (result===null || result=='') {
                  if(result=='')
                  {
					  return false;
				  }			
                  else	{			  
                   $(".close").remove();
				  }
			}else{
				
             input_value=result;
				$.ajax({
                   url: "<?php echo base_url('BackDateInvoice/delete_invoice_data'); ?>",
                   type: "POST",
                   data: {invoice_number:invoice_number,reason:input_value},
                   cache: false,
                   dataType: 'json',
                   success: function (response)
                   {
					 if(response=='2')
					   {
						   bootbox.alert('<?php echo DELETE_MSG_COMMON_PERMISSION_ERROR;?>');
						   window.location.reload();
					   }
					   else if(response=='1')
					   {
						 window.location.reload();
					   }
                   }
               });
           }

       });
}

function pay_more(url){
	bootbox.confirm("Are you sure you want to complete the transaction ?", function(result) {
    if (result===null || result=='') {
                  if(result=='')
                  {
					  $(".close").remove();
				  }			
                  else	{			  
                   $(".close").remove();
				  }
			}else{
				//alert(url);
				window.location.href= url;
             
           }
}); 
}
</script>
