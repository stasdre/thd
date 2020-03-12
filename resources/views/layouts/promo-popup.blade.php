@if(request()->cookie('dw-promo-count') && ((request()->cookie('dw-promo-count') / 3) === 1 ||
(request()->cookie('dw-promo-count') / 7) === 1))
<div class="modal dw-promo-modal" id="dw-promo-popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <strong class="modal-body">
                <div class="dw-promo-sign-up">
                    <div class="PopupSubTitleBold">SIGN UP<br> + SAVE!</div>
                    <div class="PopupTitle">$50<span style="font-size:40px">off</span></div>
                    <div class="PopupSubTitle">Exclusive access to <br>new house plans and <br>
                        great product ideas!
                    </div>
                    <div class="contentemail">
                        <input name="email" id="dw-promo-email" onclick="javascript:this.value='';"
                            value="Enter your email address" size="14" class="txtEmail"
                            placeholder="Enter your email address">
                        <button class="dw-promo-submit" id="dw-promo-submit">></button>
                    </div>
                </div>

                <div class="dw-promo-thank" style="display:none;">
                    <div class="popopSubmit1">Welcome to</div>
                    <strong class="popopSubmit2"><strong>House Plans By David Wiggins!</strong><br><br>
                        Your Promo Code: <span style="color:#ffffff;"><strong>WELCOME50</strong></span></strong>
                    <div class="popopSubmit3"><br>
                        An email will be sent with your<br>
                        promo code shortly.
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('#dw-promo-popup').modal('show');
    })
</script>
@endif