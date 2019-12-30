<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
    <footer class="ega-footer">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="col-sm-2">
                        <div style="margin-bottom: 20px; margin-top: 20px">
                            <a href="https://binhivu.com/">
                                <img alt="" class="img-responsive lazy w-50-xs" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                     data-src="<?php echo base_url() . 'images/'; ?>logo2.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="hidden-xs">
                            <span style="font-size: 1.2rem"></span>
                            Liên hệ
                        </h4>
                        <div style="margin-bottom: 5px;">
                            <div class="footer-address-additional" style="margin-bottom: 10px">
                                <i class="glyphicon glyphicon-phone"></i>
                                <a href="tel:123.456.789">0926111368</a>
                            </div>
                            <div class="footer-address-additional" style="margin-bottom: 10px">
                                <i class="glyphicon glyphicon-map-marker"></i> Ngọc Thụy Long Biên Hà Nội
                            </div>
                            <div class="footer-address-additional" style="margin-bottom: 10px">
                                <i class="glyphicon glyphicon-envelope"></i>
                                <a href="mailto:binhivu38@gmail.com">binhivu38@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <h4 class="hidden-xs">
                            <span style="font-size: 1.2rem"></span>
                            Danh mục
                        </h4>
                        <div style="margin-bottom: 5px;">
                            <ul style="list-style: none; padding-left: 0">
                                <li><a href="<?=site_url()?>">Trang chủ</a></li>
                                <li><a href="<?=site_url('tin-tuc.html')?>">Tin tức</a></li>
                                <li><a href="<?=site_url('tai-lieu.html')?>">Tài liệu</a></li>
                                <li><a href="<?=site_url('sach.html')?>">Sách</a></li>
                                <li><a href="<?=site_url('goc-giai-tri.html')?>">Góc giải trí</a></li>
                                <li><a href="<?=site_url('lien-he.html')?>">Liên hệ</a></li>
                            </ul>
                        </div>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fibongda%2F&width=250&height=100&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=181356779470999" width="250" height="150" style="border:none;overflow:hidden; display: none" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="hidden-xs">
                            Nhận bài viết
                        </h4>
                        <div style="margin-top: 15px; ">
                            Đăng ký email để nhận bài viết mới
                            <form id="frm-dang-ky-email" method="post" action="<?=site_url('ajax_add_contact')?>">
                                <input type="email" name="c_email" style="color: black; width: 80%" placeholder="Nhập email">
                                <input type="hidden" value="Email nhận bài viết mới" name="c_content">
                                <button type="submit" style="color: black; width: 15%">OK</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <h4 class="hidden-xs">
                            Bản quyền nội dung
                        </h4>

                        <div style="margin-top: 15px;">
                            <a href="//www.dmca.com/Protection/Status.aspx?ID=bd4ddb07-2de5-44c3-a0b4-f641d96e3f69" title="DMCA.com Protection Status" class="dmca-badge">
                                <img src ="https://images.dmca.com/Badges/dmca_protected_16_120.png?ID=bd4ddb07-2de5-44c3-a0b4-f641d96e3f69"  alt="DMCA.com Protection Status" />
                            </a>
                            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="ega-footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="visible-xs">
                        <ul class="bee-ul-social">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/binhivu" rel="nofollow"><span
                                            class="bee-fb-icon"></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/binhivu" rel="nofollow"><span
                                            class="bee-tw-icon"></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://youtube.com/binhivu" rel="nofollow"><span
                                            class="bee-gg-icon"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="ega-cpyright">
                        <div class="inline-dsk">
                            Copyright © 2020 All Rights Reserved. Bản quyền thuộc về <a href="https://binhivu.com/" rel="nofollow" target="_blank">binhivu</a>
                        </div>
                        <div class="inline-dsk hidden"> |</div>
                        <div class="inline-dsk hidden">
                            Cung cấp bởi <a href="javascript:void(0)" title="lequanltv" target="_blank"
                                            rel="nofollow">lequanltv</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">

                    <div class="ega-footer-social hidden-xs">
                        <ul class="bee-ul-social">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/binhivu" rel="nofollow"><span
                                            class="bee-fb-icon"></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/binhivu" rel="nofollow"><span
                                            class="bee-tw-icon"></span></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://youtube.com/binhivu" rel="nofollow"><span
                                            class="bee-gg-icon"></span></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <a href="tel:0926111368" class="suntory-alo-phone suntory-alo-green hidden-xs"
       style="left: 0px; bottom: 0px;">
        <div class="suntory-alo-ph-circle"></div>
        <div class="suntory-alo-ph-circle-fill"></div>
        <div class="suntory-alo-ph-img-circle"><i class="glyphicon glyphicon-earphone"></i></div>
    </a>
    <!-- Load Facebook SDK for JavaScript -->
    <script>
        $("#frm-dang-ky-email").submit(function(event){
            event.preventDefault(); //prevent default action
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission

            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ //
                if(response == 'success'){
                    alert('Thành công!');
                    location.reload();
                }else{
                    alert(response);
                }
            });
        });
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v5.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="100843374768356" theme_color="#0084ff"> </div>
    </body>
    </html>
<?php
	ob_end_flush();
?>