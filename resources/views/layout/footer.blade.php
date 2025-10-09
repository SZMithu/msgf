<?php
$footer=\App\Models\FormSetting::where('setting','General')->first();

?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>

.footer-style {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

</style>


<!-- policy modal Show start -->
<div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="textModalLabel">Privacy Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!!$footer->policy!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<!-- policy modal Show end -->



<!-- policy modal Show start -->
<div class="modal fade" id="textModalTerm" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="textModalLabel">Terms & Conditions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!!$footer->terms!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
<!-- policy modal Show end -->



<footer>
    <div class="footer-style">
<?php if(!empty($footer->terms)){?>
  <a href="javascript:void(0);" class="openModalBtnTerm"> <p>Terms and Conditions
  
  </p></a>
  <?php } if(!empty($footer->terms) && !empty($footer->policy)){ ?>
   &nbsp  | &nbsp
   <?php } if(!empty($footer->policy)){?>

   <a href="javascript:void(0);" class="openModalBtn"> <p>Privacy Policy
  </p></a>
  <?php } ?>

  </div>

</footer>


<script>
    $(document).ready(function() {
        // Show modal on button click
        $('.openModalBtn').click(function() {
            $('#textModal').modal('show');
        });

        $('#textModal .close').click(function() {
                $('#textModal').modal('hide');
            });


            $('.openModalBtnTerm').click(function() {
            $('#textModalTerm').modal('show');
        });

        $('#textModalTerm .close').click(function() {
                $('#textModalTerm').modal('hide');
            });
 
    });
</script>