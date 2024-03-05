</div>

<div class="container-pluid footer">
    <section id="footer-button">
        <div class="container-pluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 no-padding-r">
                        <div class="footer-custom foooter-contact">
                            <h3 class="tittle-footer"> Liên hệ</h3>
                            <ul>
                                <li>

                                    <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Phường Đồng Nguyên - T.X Từ Sơn - Bắc Ninh </p>
                                    <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0336636255</p>
                                    <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> anh@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 no-padding-x footer-width">
                        <div class="footer-custom">
                            <h3 class="tittle-footer"> Fanpage</h3>
                            <div class="fanpage-fb">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhondacaoson%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=387173625269621" width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 no-padding-x" >
                        <h3 class="tittle-footer">Bản đồ</h3>
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14886.675030209128!2d105.9740155!3d21.1257682!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc33b2a062467a9c2!2sHEAD+honda+Cao+S%C6%A1n!5e0!3m2!1sen!2s!4v1560448455317!5m2!1sen!2s" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-3 no-padding-l">
                        <h3 class="tittle-footer">Liên kết</h3>
                        <ul class="social-footer">
                            <li class="facebook-ft">
                                <a target="_blank" href="https://www.facebook.com/hondacaoson/">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="youtube-ft">
                                <a target="_blank" href="https://www.youtube.com/watch?v=ZNrOFvxNaCs">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ft-bottom">
        <p class="text-center">Đồ án tốt nghiệp </p>
    </section>
    <div class="chat-fb">
        <!-- WhatsHelp.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    facebook: "279937849074204", // Facebook page ID
                    call_to_action: "Message us", // Call to action
                    position: "right", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /WhatsHelp.io widget -->

        <div class="hotline-top">
            <div class="call_detox_green">
                <div class="call_detox_green_circle"><a href="tel:0336636255">0336636255</a></div>

                <div class="call_detox_green_circle_fill"><a href="tel:0916123567">0336636255</a>
                    <span style="color: rgb(0, 0, 255); line-height: 20.8px;"></span>
                    <span style="line-height: 20.8px;"><font color="#ff0000"> </font></span></div>

                <div class="call_detox_green_icon"><a href="tel:0916123567">0336636255</a> </div>
            </div>

            <div class="quick-alo-ph-number">0336636255</div>
        </div>

        <div class="scroll-top">
            <a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up"></i></a>
            <script type="text/javascript">
                // ===== Scroll to Top ====
                $(window).scroll(function() {
                    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                        $('#return-to-top').fadeIn(200);    // Fade in the arrow
                    } else {
                        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                    }
                });
                $('#return-to-top').click(function() {      // When arrow is clicked
                    $('body,html').animate({
                        scrollTop : 0                       // Scroll to top of body
                    }, 500);
                });
            </script>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script  src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>

</body>

</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })


    // $(function () {
    //     $updatecart = $(".updatecart");
    //     $updatecart.click(function (e) {
    //         e.preventDefault();
    //         $qty = $(this).parents("tr").find(".qty").val();
    //         console.log($qty);
    //         $key = $(this).attr("data-key");
    //         $.ajax({
    //            url: 'cap-nhat-gio-hang.php',
    //             type: 'GET',
    //             data: {'qty':$qty, 'key':$key},
    //             success:function (data)
    //             {
    //                 if (data == 1)
    //                 {
    //                     alert("Cập nhật giỏ hàng thành công");
    //                     location.href = 'gio-hang.php';
    //                 }
    //             }
    //         });
    //     })
    // })


    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e) {
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();

            $key = $(this).attr("data-key");

            console.log($key);
            $.ajax({
                url: 'cap-nhat-gio-hang.php',
                type: 'GET',
                data: {'qty': $qty, 'key':$key},
                success:function(data)
                {
                    if (data == 1)
                    {
                        alert('Bạn đã cập nhật giỏ hàng thành công!');
                        location.href='gio-hang.php';
                    }
                    else
                    {
                        alert('Xin lỗi! Số lượng bạn mua vượt quá số lượng hàng có trong kho!');
                        location.href='gio-hang.php';
                    }
                }
            });

        })
    })
</script>