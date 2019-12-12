<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$lang['payment_lang'] = array();
$lang['payment_lang']['product_type'] = 'Product';
$lang['payment_lang']['contract'] = 'Hợp đồng';
$lang['payment_lang']['note'] = 'Note';
$lang['payment_lang']['Tintuc'] = 'Homepage';
$lang['payment_lang']['fund'] = 'Fund';
$lang['payment_lang']['recharge'] = 'Add funds';
$lang['payment_lang']['title_help_balance'] = 'Primary balance (VND)';
$lang['payment_lang']['title_help_money_use'] = 'Spending (VND)';
$lang['payment_lang']['money_lost'] = 'money_lost';
$lang['payment_lang']['money_to_spend'] = 'money_to_spend';
$lang['payment_lang']['account_info'] = 'Account';
$lang['payment_lang']['highcharts_axis'] = 'Money';
$lang['payment_lang']['sum_money'] = 'Total money';
$lang['payment_lang']['lbl_recharge'] = 'Add money';
$lang['payment_lang']['lbl_solotion_by'] = 'Giải pháp thanh toán được cung cấp bởi';
$lang['payment_lang']['lbl_solotion_policy'] = 'Xem kỹ điều khoản sử dụng dịch vụ tại';
$lang['payment_lang']['lbl_solotion_way_select_1_note_1'] = 'Thanh toán qua thẻ Visa, Master Card, ATM';
$lang['payment_lang']['lbl_solotion_way_select_1_note_3'] = 'Không mất phí thanh toán.';
$lang['payment_lang']['lbl_solotion_way_select_1_note_4'] = 'Thẻ của Quý khách phải được kích hoạt chức năng thanh toán trực tuyến hoặc đã đăng ký Internet Banking.';
$lang['payment_lang']['lbl_solotion_way_select_1_note_5'] = 'Thanh toán nhanh gọn và có thể sử dụng dịch vụ ngay sau khi thanh toán.';
$lang['payment_lang']['lbl_fullname'] = 'Họ tên';
$lang['payment_lang']['lbl_fullname_note'] = 'Họ tên cá nhân hoặc tổ chức, công ty';
$lang['payment_lang']['lbl_fullname_err_title'] = 'Họ tên người thanh toán';
$lang['payment_lang']['lbl_fullname_err_content'] = 'Bạn hãy nhập họ tên cá nhân hoặc tổ chức công ty';
$lang['payment_lang']['lbl_phone'] = 'Điện thoại';
$lang['payment_lang']['lbl_phone_note'] = 'Số điện thoại liên hệ';
$lang['payment_lang']['lbl_phone_err_title'] = 'Số điện thoại liên hệ';
$lang['payment_lang']['lbl_phone_err_content'] = 'Bạn hãy nhập số điện thoại để hệ thống liên hệ khi cần thiết';
$lang['payment_lang']['lbl_email'] = 'Email';
$lang['payment_lang']['lbl_email_note'] = 'Email liên hệ của khách hàng';
$lang['payment_lang']['lbl_email_err_title'] = 'Email liên hệ';
$lang['payment_lang']['lbl_email_err_content'] = 'Bạn hãy Email để hệ thống liên hệ khi cần thiết';
$lang['payment_lang']['lbl_money'] = 'Money';
$lang['payment_lang']['lbl_sodu'] = 'Residual money';
$lang['payment_lang']['lbl_money_note'] = 'Giá trị thanh toán nhỏ nhất 50,000 VND';
$lang['payment_lang']['lbl_money_err_title'] = 'Giá trị thanh toán';
$lang['payment_lang']['lbl_money_err_content'] = 'Bạn hãy nhập giá trị thanh toán. Nhỏ nhất là 50,000VNĐ';
$lang['payment_lang']['lbl_solotion_way_select_1_frm_content'] = 'Nội dung';
$lang['payment_lang']['lbl_pay'] = 'Thanh toán';
$lang['payment_lang']['lbl_content_note'] = 'Thanh toán cho số hợp đồng nào, username nào. VD: Thanh toán cho hợp đồng QC123456, tài khoản: test123456';

$lang['payment_lang']['lbl_here'] = 'Here';

/*chua dich */
// Giải pháp thanh toán được cung cấp bởi
// Xem kỹ điều khoản sử dụng dịch vụ tại
// đây
$lang['payment_lang']['use_sohapay'] = '<p>Giải pháp thanh toán được cung cấp bởi <b>'.PORT_PAYMENT_NAME.'</b>.</p><p>Xem kỹ điều khoản sử dụng dịch vụ tại <a class="underline" href="'.PORT_PAYMENT_URL.'/info/help/quy-dinh-chinh-sach/dieu-khoan-su-dung.html" target="_blank"><b>đây</b></a>.</p>';
/* het chua dich */
$lang['payment_lang']['pay_way'] = 'Payment methods';
$lang['payment_lang']['pay_way_content'] = '<ul class="square text-666">
						<li class="martop5">
							Payment via credit card, debit card, Visa & Mastercard.
						</li>
						
						<li class="martop5">
							Payment via domestic cards - ATM: Vietcombank, VietinBank, VIB, HDBank, TienPhongBank 
						</li>
						
						<li class="martop5">
							Payment via Internet Banking of Dong A Bank, Techcombank
						</li>
					</ul>';
$lang['payment_lang']['hinhthuc'] = 'Select payment method ';

$lang['payment_lang']['pay_internet_baking'] = '<b>Online payment methods via Visa, Master Card, ATM, Internet Banking </b><br /> will allow you to buy and use services instantly and easily. ';

$lang['payment_lang']['pay_internet_comment'] = '
    <ul>
        <li>No payment fee.</li>
        <li>
            Your card should be activated the online payment function or registered Internet Banking.
        </li>
        <li>
            Paying fast and may purchase or use the service immediately after payment.
        </li>
    </lu>';
$lang['payment_lang']['pay_card_mobile'] = '<b>Payment by mobile scratch card, game card VCOIN of VTC</b>';
$lang['payment_lang']['mobile_card_fee'] = 'Payment fee is 5% for mobile network operator';
$lang['payment_lang']['no_red_bill'] = 'Not issue red invoice for this transaction';
$lang['payment_lang']['transfer_pay_label'] = '<b>Transfer money via ATM or at the bank</b> <span style="color:red">(Bank fee is charged in the transaction)</span>';

$lang['payment_lang']['transfer_pay_des'] = 'When you add funds into AdMarket account, it takes <b>4-24</b> hours for AdMarket to confirm your information.';
$lang['payment_lang']['pay_debit_ttip_title'] = 'Advertising now - Pay later';
$lang['payment_lang']['pay_debit_ttip_content'] = 'Admarket updated new payment method by credit card <b>Visa</b> and <b>MasterCard</b> to help you to advertising without add';
$lang['payment_lang']['pay_debit_button'] = 'Pay later';
$lang['payment_lang']['pay_debit_active_confirm_title'] = 'Are you sure active credit card?';
$lang['payment_lang']['pay_debit_add_more_credit_card'] = 'Add more credit card';
$lang['payment_lang']['pay_debit_active_title'] = 'Do you want active Credit Card<br/> for AdX system?';
$lang['payment_lang']['pay_debit_active_button'] = 'Active';

$lang['payment_lang']['next'] = 'Next';
$lang['payment_lang']['enter_bank_transfer'] = " You haven't selected which bank to transfer money to.";
$lang['payment_lang']['select_pay'] = 'Please select payment method';
$lang['payment_lang']['mess_floot'] = 'You did wrong over 3 times';
$lang['payment_lang']['select_card_type'] = 'Please select a type of scratch card';
$lang['payment_lang']['enter_phone'] = 'Please enter your mobile phone number';
$lang['payment_lang']['phone_invalid'] = 'Mobile phone number must be in number format';
$lang['payment_lang']['enter_card_number'] = 'Please enter scratch card number';
$lang['payment_lang']['card_number_invalid'] = 'Card number is in number format';
$lang['payment_lang']['card_seri_invalid'] = "Please enter card's serial number";
$lang['payment_lang']['enter_fullname'] = 'Please enter full name';
$lang['payment_lang']['enter_email'] = 'Please enter email';

$lang['payment_lang']['address_home_cold'] = 'Address: number, street, ward';
$lang['payment_lang']['province'] = 'City';
$lang['payment_lang']['curency'] = 'd';
$lang['payment_lang']['districts'] = 'District';

//$lang['payment_lang']['enter_cost'] = 'Please enter the amount (the minimum '.number_format(SHIP_COST_MIN).$lang['payment_lang']['curency'].')';
$lang['payment_lang']['enter_cold_address'] = 'Please enter '.$lang['payment_lang']['address_home_cold'];
$lang['payment_lang']['enter_cold_province'] = 'Please enter '.$lang['payment_lang']['province'];
$lang['payment_lang']['enter_cold_district'] = 'Please enter '.$lang['payment_lang']['districts'];

$lang['payment_lang']['pay_value'] = 'Payment Amount';
$lang['payment_lang']['bank_title'] = 'Please select a beneficiary bank ';
$lang['payment_lang']['bank_transfer_free'] = 'The transfer fee is paid by customers';
$lang['payment_lang']['bank_go'] = 'Please select another bank.';
$lang['payment_lang']['bank_des'] = '<ul style="padding-left:15px"><li>When transfering money via Internet Bank or at the Reception Transaction Counters, you will be charged a transfer fee.</li><li>After transfer completed, please inform us.</li><li>Your order will be accepted only when money is in the account of AdMarket</li></ul>';

/* Phan nay do coder tu dich khi nao co  ban dich chuan se update lai ban cua phien dich vien */
$lang['payment_lang']['bank_info_vcb'] = '<div class="fl"><div class="vc_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 0021.0018.392.43<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- Vietcombank(VCB) Ha Noi</strong></p></div></div>';

$lang['payment_lang']['bank_info_dab'] = '<div class="fl"><div class="donga_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 0023.&shy;8734.0001<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- Bank of East Asia branch Bach Mai - Ha Noi</strong></p></div></div>';

$lang['payment_lang']['bank_info_tcb'] = '<div class="fl"><div class="techcom_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 1032.0141.354.011<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- Techcombank branch Ba Trieu - Ha Noi</strong></p></div></div>';

$lang['payment_lang']['bank_info_agb'] = '<div class="fl"><div class="agribank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 1483.2010.047.40<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- AGRIBANK branch capital</strong></p></div></div>';

$lang['payment_lang']['bank_info_bidv'] = '<div class="fl"><div class="bidv_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 1201.0000.318.895<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- BIDV Transaction Center</strong></p></div></div>';

$lang['payment_lang']['bank_info_vtb'] = '<div class="fl"><div class="vietinbank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 1020.1000.1108.169<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- Vietnam Industrial and Commercial Bank branch Hai Ba Trung</strong></p></div></div>';

$lang['payment_lang']['bank_info_mbb'] = '<div class="fl"><div class="mb_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 0651.1000.160.02<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- Joint-stock commercial bank Army - branch Hai Ba Trung (MB)</strong></p></div></div>';

$lang['payment_lang']['bank_info_acb'] = '<div class="fl"><div class="acb_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong> 3718.2319<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- ACB Bank branch Ha Noi (ACB)</strong></p></div></div>';

$lang['payment_lang']['bank_info_vib'] = '<div class="fl"><div class="vib_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Bank account number:</strong>  001704060035755<br><strong>- Account holder:</strong> VCCorp Corporation<br><strong>- International Commercial Bank of Vietnam(VIB)</strong></p></div></div>';
/* Het Phan do coder tu dich khi nao co  ban dich chuan se update lai */

// chưa dịch :  " Số TK(tài khoản): "  và " Chủ tài khoản " và " Công ty Cổ phần Truyền thông Việt Nam " và " Ngân hàng Vietcombank (VCB) Hà Nội ";
// các thẻ bên dưới tương tự.(lưu ý: bạn hãy chú ý đến các phần chữ tiếng việt - có chỗ nào bạn vui lòng dịch giúp chỗ đó ).
// chỉ cần dịch các từ đó ra chúng tôi sẽ tự hiểu viết vào các mã thẻ HTML - bạn không cần phải viết lại toàn bộ các mã thẻ HTML vào phần bạn dịch.

/*
$lang['payment_lang']['bank_info_vcb'] = '<div class="fl"><div class="vc_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 0021.0018.392.43<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng Vietcombank (VCB) Hà Nội</strong></p></div></div>';
$lang['payment_lang']['bank_info_dab'] = '<div class="fl"><div class="donga_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 0023.&shy;8734.0001<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng Đông Á chi nhánh Bạch Mai - Hà Nội</strong></p></div></div>';
$lang['payment_lang']['bank_info_tcb'] = '<div class="fl"><div class="techcom_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 1032.0141.354.011<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng Techcombank CN Bà Triệu - Hà Nội</strong></p></div></div>';
$lang['payment_lang']['bank_info_agb'] = '<div class="fl"><div class="agribank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 1483.2010.047.40<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng AGRIBANK chi nhánh Thủ Đô</strong></p></div></div>';
$lang['payment_lang']['bank_info_bidv'] = '<div class="fl"><div class="bidv_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 1201.0000.318.895<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng BIDV Sở Giao dịch</strong></p></div></div>';
$lang['payment_lang']['bank_info_vtb'] = '<div class="fl"><div class="vietinbank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 1020.1000.1108.169<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng Công thương Việt Nam chi nhánh Hai Bà Trưng</strong></p></div></div>';
$lang['payment_lang']['bank_info_mbb'] = '<div class="fl"><div class="mb_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 0651.1000.160.02<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng thương mại cổ phần Quân đội - CN Hai Bà Trưng (MB)</strong></p></div></div>';
$lang['payment_lang']['bank_info_acb'] = '<div class="fl"><div class="acb_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong> 3718.2319<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng Á Châu chi nhánh Hà Nội (ACB)</strong></p></div></div>';
$lang['payment_lang']['bank_info_vib'] = '<div class="fl"><div class="vib_bank"></div></div><div class="fl"><div class="mTop10"><p><strong>- Số TK:</strong>  001704060035755<br><strong>- Chủ tài khoản:</strong> Công ty Cổ phần Truyền thông Việt Nam<br><strong>- Ngân hàng TMCP Quốc tế Việt Nam (VIB)</strong></p></div></div>';
*/
$lang['payment_lang']['order_info'] = 'Order info';
$lang['payment_lang']['pay'] = 'Payment';
$lang['payment_lang']['totalbalance'] = 'The total amount of the main account used';
$lang['payment_lang']['token'] = 'token';
$lang['payment_lang']['totaltoken'] = 'totaltoken ';
$lang['payment_lang']['close'] = 'Close ';
$lang['payment_lang']['type_card'] = 'Scratch card type';
$lang['payment_lang']['number_phone'] = 'Phone number';
$lang['payment_lang']['number_card'] = 'Scratch card number';
$lang['payment_lang']['vcoin_card_seri'] = 'Scratch card serial number';
$lang['payment_lang']['fullname'] = 'Full name';
$lang['payment_lang']['username'] = 'Username';
$lang['payment_lang']['tel'] = 'Tel';
$lang['payment_lang']['email'] = 'Email';
$lang['payment_lang']['phone'] = 'Phone number';
$lang['payment_lang']['money_num'] = 'Money amount';
$lang['payment_lang']['continue'] = 'Next';
$lang['payment_lang']['type_pay_transfer'] = 'Transfer money via ATM or pay by cash at Transaction Counters about:';
$lang['payment_lang']['custom_info'] = 'Customer info';
$lang['payment_lang']['type_pay'] = 'Payment method';
$lang['payment_lang']['back'] = 'Back';
$lang['payment_lang']['not_found_transaction'] = 'Transaction not found.';
$lang['payment_lang']['pay_sucess'] = 'Thank you, Transaction has been completed.';
$lang['payment_lang']['pay_not_sucess'] = 'An error occurs in payment process: "[msg]"! Please <a href="'.site_url('payment/pay', 'vn').'">try again </a>';

$lang['payment_lang']['title_help_promotions'] = 'Promotion balance (VND)';
$lang['payment_lang']['title_help_overdraft'] = 'Overdraft (VNĐ)';
$lang['payment_lang']['info_balance'] = 'Account';
$lang['payment_lang']['date'] = 'Date';
$lang['payment_lang']['index'] = 'STT';
$lang['payment_lang']['content'] = 'Content';
$lang['payment_lang']['page'] = 'Page';
$lang['payment_lang']['all'] = 'All';
$lang['payment_lang']['arr_status'] = array('0'=>'Wait/Error', '1'=>'Successful');
$lang['payment_lang']['status'] = 'Status';
$lang['payment_lang']['account_promotion'] = 'Promotion balance ';
$lang['payment_lang']['account_balance'] = 'Primary balance';
$lang['payment_lang']['promotion_money'] = 'Promotion amount';
$lang['payment_lang']['deductione_money'] = 'Deducted amount';
$lang['payment_lang']['recharge_money'] = 'Recharged amount';
$lang['payment_lang']['transaction_code'] = 'Transaction code';
$lang['payment_lang']['all_status'] = 'All status';
$lang['payment_lang']['not_complete'] = 'Not completed';
$lang['payment_lang']['complete'] = 'Completed';
$lang['payment_lang']['to'] = 'to';
$lang['payment_lang']['type_status'] = 'Status type';
$lang['payment_lang']['offer'] = 'Transaction';
$lang['payment_lang']['time'] = 'Time';
$lang['payment_lang']['payment_time'] = 'Payment term';
$lang['payment_lang']['request_recharge'] = 'Request to add funds';
$lang['payment_lang']['info_balance_des'] = 'Usable amount in your account. To increase amount, please use the function Budget to add more funds.';
$lang['payment_lang']['info_promotions'] = 'Promotion';
$lang['payment_lang']['info_promotions_des'] = 'Is an extra money amount you will get from system';
$lang['payment_lang']['info_overdraft'] = 'Overdraft amount';

/* Đoan nay chua dich */
$lang['payment_lang']['info_overdraft_des'] = 'Là số tiền bạn có thể tiêu thêm khi tài khoản chính của bạn hết tiền. Số tiền bạn đã tiêu trong tài khoản thấu chi sẽ được trừ vào tài khoản chính trong lần nạp tiền tới của bạn.';
/* het doan chua dich*/

$lang['payment_lang']['info_money_use'] = 'Spending';
$lang['payment_lang']['info_money_use_des'] = 'is an amount you expense for advertising.';
$lang['payment_lang']['deductione'] = 'Deduction';
$lang['payment_lang']['community_promotion'] = 'Plus for promotion';
$lang['payment_lang']['pay_debit_page_title'] = 'Postpaid ';
$lang['payment_lang']['tongNap'] = 'Total recharge';
$lang['payment_lang']['tongTru'] = 'Total deduction';
$lang['payment_lang']['tongKm'] = 'Total promotion';
// detail
$lang['payment_lang']['transaction'] = 'Transaction';
$lang['payment_lang']['pay_detail'] = 'Transaction details';
$lang['payment_lang']['print'] = 'Print';
$lang['payment_lang']['detail'] = 'Details';
$lang['payment_lang']['account'] = 'Account';
$lang['payment_lang']['pay_date'] = 'Transaction date';
$lang['payment_lang']['pay_sum_money'] = 'Total amount of transaction';
$lang['payment_lang']['pay_sum_order'] = 'Total value of orders ';
$lang['payment_lang']['pay_state'] = 'Transaction status';
$lang['payment_lang']['pay_describe'] = 'Describe transaction result';
$lang['payment_lang']['pay_result'] = 'Transaction result';

$lang['payment_lang']['pay_title'] = 'Transaction';
$lang['payment_lang']['transaction_code'] = 'Transaction code';
$lang['payment_lang']['list_tran_miss'] = 'Transaction Wait/Error';
$lang['payment_lang']['content'] = 'Content';
$lang['payment_lang']['status'] = 'Status';
$lang['payment_lang']['search_payment_info'] = 'Search for transaction info';
$lang['payment_lang']['head_order'] = '<p>
							VCCorp Corporation
						</p>
						<p>
							Address: Level 20, Center Building, Hapulico Complex, No 1 Nguyễn Huy Tưởng, Thanh Xuân Trung Ward, Thanh Xuân District, Ha Noi
						</p>
						<p>
							Tax number.
						</p>';
$lang['payment_lang']['customer'] = 'Customer';
$lang['payment_lang']['num_order'] = 'Invoice number';
$lang['payment_lang']['order'] = 'Invoice';

$lang['payment_lang']['email_subject_pay'] = 'Add funds successful';
$lang['payment_lang']['email_content_pay'] = 'Hello %s,<br /><br />
	You have just add %s into your account in AdMarket via online payment system '.PORT_PAYMENT_NAME.'. You can use recharged amount to buy advertising in the system.
		<br /><br />
		For more details about your account, please click on the link below to login to the system::<br />%s	
		<br /><br />
		AdMarket helps you to have a better targeting. Please sign up an account in AdMarket to advertising your products and service to 25 million target audience.Cám ơn bạn,<br /><br />
		Advertising network AdMarket, Adtech Division - Admicro - VCCorp Corporation.
';

//coupon
$lang['payment_lang']['coupon'] = 'Coupon';
$lang['payment_lang']['set_coupon'] = 'Enter your coupon';
$lang['payment_lang']['set_coupon_key'] = 'Enter your coupon code';
$lang['payment_lang']['ok_coupon'] = 'Successful! Your account has just been added an amount of:';

$lang['payment_lang']['wrong_coupon'] = 'You enter the wrong code or coupon coupon has been used or expired <br/> If entered incorrectly three times this feature will be temporarily blocked for 24 hours!';

$lang['payment_lang']['empty_coupon'] = 'Please enter your coupon code!';
$lang['payment_lang']['length_coupon'] = 'Coupon code is incorrect';
$lang['payment_lang']['coupon_remaining'] = 'You have ';
$lang['payment_lang']['coupon_remaining2'] = ' times of entering coupon code remaining!';
$lang['payment_lang']['coupon_lock'] = 'This function is currently locked. Please contact our admin. !';
$lang['payment_lang']['captcha'] = 'Capcha';
$lang['payment_lang']['wrong_captcha'] = 'Capcha is incorrect'; !
$lang['payment_lang']['empty_captcha'] = 'Please enter capcha';
$lang['payment_lang']['refesh_spam'] = 'Refresh capcha';
// end - coupon

// Sms notification
$lang['payment_lang']['sms_content'] = 'You have just added %sD successful for account %a in AdX';

// debit card
$lang['payment_lang']['pay_debit_button'] = 'Pay later';
$lang['payment_lang']['pay_debit_accept'] = 'Accept';
$lang['payment_lang']['pay_debit_okbtn'] = 'Yes';
$lang['payment_lang']['pay_debit_cancel'] = 'No';
$lang['payment_lang']['pay_debit_page_title'] = 'Pay later';
$lang['payment_lang']['pay_debit_title'] = 'Advertising now - Pay later';
$lang['payment_lang']['pay_debit_lbl_budget'] = 'Advertising limit (VND)';
$lang['payment_lang']['pay_debit_lbl_pending'] = 'Pending';
$lang['payment_lang']['pay_debit_lbl_pause'] = 'This function is permanently paused. ';
$lang['payment_lang']['pay_debit_lbl_block'] = 'This function is permanently blocked.';
$lang['payment_lang']['pay_debit_lbl_step1'] = 'Create an account and advertising on AdMarket';
$lang['payment_lang']['pay_debit_lbl_step2'] = 'Ads are displayed to target audience';
$lang['payment_lang']['pay_debit_lbl_step3'] = 'Your ads spending will be charged to your credit card in the next day.';
$lang['payment_lang']['pay_debit_lbl_step4_title'] = 'Ads limit is 1 million dong';
$lang['payment_lang']['pay_debit_lbl_step4_content1'] = 'Starting ads limit is <b>1.000.000VNĐ</b>, which means you can buy advertising within the limit without paying upfront.';
$lang['payment_lang']['pay_debit_lbl_step4_content2'] = 'Your ads spending within the limit will be charged to your credit card in the next day. Ads will be stopped if your spending exceeds the limit.';

$lang['payment_lang']['pay_debit_lbl_step5_title'] = 'Customer privacy';
$lang['payment_lang']['pay_debit_lbl_step5_content'] = "Admarket do not store customer's banking card info. All transactions are conducted by payment system.";

$lang['payment_lang']['pay_debit_lbl_step6_title'] = 'Payment by credit card';
$lang['payment_lang']['pay_debit_lbl_step6_content1'] = 'Apply to credit card: Visa & Mastercard';
$lang['payment_lang']['pay_debit_lbl_step6_content2'] = '<b>(*)</b> You need to add <b>100.000 VND</b> for the first transaction in order for Sohapay confirms your card. Hotline: 84 963 134 498';
$lang['payment_lang']['pay_debit_lbl_step6_content3'] = '<b>(*)</b> Only apply for <b>Visa credit</b> and <b>Master credit</b>. <i>(Not apply for Debit card)</i>';

$lang['payment_lang']['pay_debit_lbl_step7_title'] = 'Promotion for loyal customers';
$lang['payment_lang']['pay_debit_lbl_step7_content'] = 'If customers commit to advertising long term with AdMarket and usually pay money in a timely manner, their ads limit will be extended and  more flexible.';

$lang['payment_lang']['pay_debit_ttip_title'] = 'Advertising now - Pay later';
$lang['payment_lang']['pay_debit_ttip_content'] = 'Admarket updated new payment method via credit card <b>Visa</b> và <b>MasterCard</b> to help you in advertising without paying upfront.';

$lang['payment_lang']['pay_debit_unlogin_notice'] = ' Please login to your account to use this payment method.';
$lang['payment_lang']['pay_debit_unlogin_notice2'] = 'click here';
$lang['payment_lang']['pay_debit_unlogin_notice3'] = ' to login account';
$lang['payment_lang']['pay_debit_confirm'] = 'Are you sure to use this payment method?';
$lang['payment_lang']['pay_debit_invalid_key'] = 'Activation is invalid. Please refresh your browser and try again.';
$lang['payment_lang']['pay_debit_complete'] = 'You have just added 100.000vnd successful in your primary account for the confirmation fee. Please see more details in Budget.';
$lang['payment_lang']['pay_debit_viewmore'] = 'See more';
$lang['payment_lang']['pay_debit_join_time'] = 'Participation date';
$lang['payment_lang']['pay_debit_set_on_overdraft_used'] = "You're current running overdraft. Therefore, you can not active \"Pay Later\" method.";
// end debit card

// Mastercard promotion
$lang['payment_lang']['master_content'] = 'Khuyến mãi %s% khi nạp số tiền %t VNĐ';
$lang['payment_lang']['master_typepay'] = 'Khuyến mãi nạp tiền';

$lang['payment_lang']['msg_err_order_price'] = 'Giá trị tiền nạp không khớp';