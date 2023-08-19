 <?php
 echo $this->include('\Modules\Master\Views\header');
    echo $this->include('\Modules\Master\Views\sidebar');
 ?>
   <script src="https://js.stripe.com/v3/"></script>
<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
          
            <div class="col-md-6 col-sm-6">
                <div class="py-4 text-center">
                    <h3 class="text-primary">Choose a <span class="text-dark"> Payment </span></h3> 
                    <p> Please select Any One !!</p>
                </div>
                <div class="debit-card payment_item">
                    <div class="card">
                        <div class="card-body">
                            <label class="mb-0" for="stripe"><img src="<?php echo base_url();?>/admin/assets/images/stripe.png" class="visa" alt=""> </label> 
                             <input type="radio" name="card" value="1" id="stripe">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <label class="mb-0" for="paypal">
                            <img src="<?php echo base_url();?>/admin/assets/images/paypal.png" alt="master" class="master" ></label>

                            <form action="<?php echo PAYPAL_KEY; ?>" method="post" id="paypalForm">
                                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                <input type="hidden" name="business" value="ashadozzaman@sahajjo.com">
								
								<input type="hidden" name="amount" value="<?= $package['cost'] ?>">
								
								<input type="hidden" name="item_name" value="Alice's Weekly Digest">
                                <input type="hidden" name="a3" value="<?= $package['cost'] ?>"> <!-- plan price -->
                                <input type="hidden" name="p3" value="1"> <!-- plan duration -->
                                <input type="hidden" name="t3" value="M">
								
								
								<input type="hidden" name="custom" id="custom">
                                
                                <input type="hidden" name="rm" value="2"> <!--return method: send data by post method -->
                                <input type="hidden" name="src" value="1"> <!-- subscription recur -->
                                <!-- cancel,return,notify url-->
                                <input type='hidden' name='return' value="<?php echo base_url();?>">
                                <input type='hidden' name='cancel_return' value="<?php echo base_url();?>">
                                <input type='hidden' name='notify_url' value="<?php echo base_url();?>/no_debit_paypal_notify">
                            </form>


                            <input type="radio" name="card" value="2" id="paypal">
                        </div>
                    </div>
                </div>
       
            </div>
        </div> 
    </div>
</div>

   <script>
    $(document).ready(function(){

       $('#stripe').click(function(){
         
         var package_id = "<?=$package['id']?>";
         var price = "<?=$package['price_key']?>";
         var duration = "<?php if($package['duration']=="other"){
                  $duration =$package['how_many'].$package['d_m_y'];
                  echo  $duration;
         }else{
               echo $package['duration'];
         }
         ?>";
         var amount = <?=$package['cost']?>;
         var owner_id= <?=$owner_id?>;

        stripe_payment(owner_id, price, amount, duration, package_id);
       
       });
		
		$('#paypal').click(function(){
			var duration = "<?php if($package['duration']=="other"){
                $duration =$package['how_many'].$package['d_m_y'];
                echo  $duration;
            }else{
                echo $package['duration'];
            }?>";

            var package_id = "<?= $package['id']; ?>";
            var owner_id = "<?= $owner_id; ?>";

            var custom = package_id+','+owner_id+','+duration;
            $('#custom').val(custom);
			
            $('#paypalForm').submit();
       });

    });

    function stripe_payment(owner_id , price , amount , duration, package_id) {
        
        var success_url = '<?php echo base_url() . '/admin/change_payment_confirm' ?>';
        var cancel_url = '<?php echo base_url(); ?>';

        var _key = '<?php echo STRIPE_KEY; ?>';
         
         
        var stripe = Stripe(_key);

        
        // When the customer clicks on the button, redirect
        // them to Checkout.
        stripe.redirectToCheckout({
          lineItems: [{price: price, quantity: 1}],
          mode: 'subscription',
          successUrl: success_url+'/'+owner_id+'/'+amount+'/'+duration+'/'+package_id+'/{CHECKOUT_SESSION_ID}',
          cancelUrl: cancel_url,
        })
        .then(function (result) {
         
          if (result.error) {
            var displayError = document.getElementById('error-message');
            displayError.textContent = result.error.message;
          }
        });
    }

   </script>

  <?php
 echo $this->include('\Modules\Master\Views\footer'); 
 ?>
  