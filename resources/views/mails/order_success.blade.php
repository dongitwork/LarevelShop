<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!-- NAME: 1 COLUMN -->
	<!--[if gte mso 15]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Successfully</title>

</head>
<body style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FAFAFA;">
<center>
	<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;background-color: #FAFAFA;">
		<tr>
			<td align="center" valign="top" id="bodyCell" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 10px;width: 100%;border-top: 0;">
				<!-- BEGIN TEMPLATE // -->
				<!--[if gte mso 9]>
				<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
					<tr>
						<td align="center" valign="top" width="600" style="width:600px;">
				<![endif]-->
				<table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
					<tr>
						<td valign="top" id="templatePreheader" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FAFAFA;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								<tbody class="mcnTextBlockOuter">
								<tr>
									<td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
										<!--[if mso]>
										<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
											<tr>
										<![endif]-->

										<!--[if mso]>
										<td valign="top" width="600" style="width:600px;">
										<![endif]-->
										<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
											<tbody><tr>

												<td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size: 13px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #656565;line-height: 150%;text-align: left;">

													<span style="color:#008000"><em><strong>Xin chào {{$CustomerFullName}}, Bạn đã thanh toán thành công đơn hàng tại ShopOnline của chúng tôi:</strong></em></span>

													<p style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size: 13px;margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #656565;line-height: 150%;text-align: left;"><strong><span style="color:#FF8C00">Mã đơn hàng</span> :</strong> {{$OrderId}}<br>
														<strong><span style="color:#FF8C00">Tên người nhận</span> :</strong> {{$FullName}}<br>
														<strong><span style="color:#FF8C00">Địa chỉ nhận hàng</span> :</strong> {{$Address}}<br>
														<strong><span style="color:#FF8C00">Số điện thoại người nhận</span> :</strong> {{$Phone}}<br>
														<strong><span style="color:#FF8C00">Tổng tiền thanh toán</span> :</strong> {{$TotalPrice}}<br>
														<strong><span style="color:#FF8C00">Phương thức thanh toán</span> :</strong> {{$PaymentMethodName}}<br>
														<strong><span style="color:#FF8C00">Chi tiết sản phẩm đã đặt hàng</span> :&nbsp;</strong></p>


													<table class="table table-bordered table-hover" style="width:100%; border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
														<thead>
														<tr style="background-color: #999977; color: darkred;">
															<th class="name-pro rieng">Tên sản phẩm</th>
															<th class="rieng">Giá tiền</th>
															<th class="rieng">Số lượng</th>
															<th class="rieng">Tổng tiền</th>
														</tr>
														</thead>
														<tbody>
														@foreach($orderDetail as $item)
															<tr>
																<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">{{$item['ProductName']}}</td>
																<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">{{number_format(round($item['TotalPrice']/$item['Quantity']),0, ',', ',')}} VNĐ</td>
																<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">{{$item['Quantity']}}</td>
																<td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">{{number_format(round($item['TotalPrice']),0, ',', ',')}} VNĐ</td>
															</tr>
														@endforeach
														</tbody>
													</table>
													<br>
													<span style="color:#008000"><strong>Đơn hàng của bạn sẽ được giao trong vòng 3-5 ngày làm việc.&nbsp;</strong></span><br><br>
													<em>Nhân viên của chúng tôi sẽ liên lạc với bạn sớm nhất có thể để xác nhận lại đơn hàng, nếu có thắc mắc về đơn hàng xin hãy liên hệ với chúng tôi qua địa chỉ email <a href="mailto:hnnhatanh@gmail.com" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #656565;font-weight: normal;text-decoration: underline;">hnnhatanh@gmail.com</a>&nbsp;hoặc số điện thoại 0935631988 để được trợ giúp.</em><br>
													&nbsp;
													<div style="text-align: center;"><span style="font-size:18px"><strong><span style="color:#008000">XIN CẢM ƠN!</span></strong></span>

														<hr></div>

												</td>
											</tr>
											</tbody></table>
										<!--[if mso]>
										</td>
										<![endif]-->

										<!--[if mso]>
										</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
								</tbody>
							</table></td>
					</tr>
					<tr>
						<td valign="top" id="templateHeader" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								<tbody class="mcnTextBlockOuter">
								<tr>
									<td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
										<!--[if mso]>
										<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
											<tr>
										<![endif]-->

										<!--[if mso]>
										<td valign="top" width="600" style="width:600px;">
										<![endif]-->
										<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
											<tbody><tr>

												<td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">

													<div style="text-align: center;"><span style="font-size:12px"><em>Copyright Hoàng Ngọc Nhất Anh, Nguyễn Thị Ly Na, All rights reserved.</em><br>
Đồ Án Tốt Nghiệp - Ngành Công Nghệ Thông Tin - CT12A1.1<br>
Đà Nẵng, 2016<br>
<strong>Our mailing address is:</strong><br>
hnnhatanh@gmail.com</span></div>

												</td>
											</tr>
											</tbody></table>
										<!--[if mso]>
										</td>
										<![endif]-->

										<!--[if mso]>
										</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
								</tbody>
							</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								<tbody class="mcnFollowBlockOuter">
								<tr>
									<td align="center" valign="top" style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowBlockInner">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
											<tbody><tr>
												<td align="center" style="padding-left: 9px;padding-right: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
													<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContent">
														<tbody><tr>
															<td align="center" valign="top" style="padding-top: 9px;padding-right: 9px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																	<tbody><tr>
																		<td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																			<!--[if mso]>
																			<table align="center" border="0" cellspacing="0" cellpadding="0">
																				<tr>
																			<![endif]-->

																			<!--[if mso]>
																			<td align="center" valign="top">
																			<![endif]-->


																			<table align="left" border="0" cellpadding="0" cellspacing="0" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																				<tbody><tr>
																					<td valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContentItemContainer">
																						<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																							<tbody><tr>
																								<td align="left" valign="middle" style="padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																									<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																										<tbody><tr>

																											<td align="center" valign="middle" width="24" class="mcnFollowIconContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																												<a href="http://www.twitter.com/" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png" style="display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" height="24" width="24" class=""></a>
																											</td>


																										</tr>
																										</tbody></table>
																								</td>
																							</tr>
																							</tbody></table>
																					</td>
																				</tr>
																				</tbody></table>

																			<!--[if mso]>
																			</td>
																			<![endif]-->

																			<!--[if mso]>
																			<td align="center" valign="top">
																			<![endif]-->


																			<table align="left" border="0" cellpadding="0" cellspacing="0" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																				<tbody><tr>
																					<td valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContentItemContainer">
																						<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																							<tbody><tr>
																								<td align="left" valign="middle" style="padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																									<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																										<tbody><tr>

																											<td align="center" valign="middle" width="24" class="mcnFollowIconContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																												<a href="http://www.facebook.com" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" style="display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" height="24" width="24" class=""></a>
																											</td>


																										</tr>
																										</tbody></table>
																								</td>
																							</tr>
																							</tbody></table>
																					</td>
																				</tr>
																				</tbody></table>

																			<!--[if mso]>
																			</td>
																			<![endif]-->

																			<!--[if mso]>
																			<td align="center" valign="top">
																			<![endif]-->


																			<table align="left" border="0" cellpadding="0" cellspacing="0" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																				<tbody><tr>
																					<td valign="top" style="padding-right: 0;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContentItemContainer">
																						<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																							<tbody><tr>
																								<td align="left" valign="middle" style="padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																									<table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																										<tbody><tr>

																											<td align="center" valign="middle" width="24" class="mcnFollowIconContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
																												<a href="http://doan.style93.com" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" style="display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" height="24" width="24" class=""></a>
																											</td>


																										</tr>
																										</tbody></table>
																								</td>
																							</tr>
																							</tbody></table>
																					</td>
																				</tr>
																				</tbody></table>

																			<!--[if mso]>
																			</td>
																			<![endif]-->

																			<!--[if mso]>
																			</tr>
																			</table>
																			<![endif]-->
																		</td>
																	</tr>
																	</tbody></table>
															</td>
														</tr>
														</tbody></table>
												</td>
											</tr>
											</tbody></table>

									</td>
								</tr>
								</tbody>
							</table></td>
					</tr>
					<tr>
						<td valign="top" id="templateBody" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border-top: 0;border-bottom: 2px solid #EAEAEA;padding-top: 0;padding-bottom: 9px;"></td>
					</tr>
					<tr>
						<td valign="top" id="templateFooter" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FAFAFA;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"></td>
					</tr>
				</table>
				<!--[if gte mso 9]>
				</td>
				</tr>
				</table>
				<![endif]-->
				<!-- // END TEMPLATE -->
			</td>
		</tr>
	</table>
</center>
</body>
</html>