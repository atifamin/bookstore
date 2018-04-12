
 <div class="row row-23">

    <div class="coffee-span-12 column-16"></div>

  </div>

  <div class="row row-24">

    <div class="coffee-span-12">

      <div class="subgrid subgrid-6">

        <div class="row">

          <div class="coffee-span-12 subgrid-column-14"></div>

        </div>

        <div class="row">

          <div class="coffee-span-4 subgrid-column-7 coffee-603-span-12">

            <h6><span class="heading-text-3">CATEGORY LINKS</span>

            </h6>

            <div class="rule rule-1">

              <hr>

            </div>

            <p class="paragraph">
			<ul id="" class="footerlist">
						<?php if(isset($this->categories[0])):?>
						<?php foreach($this->categories[0] as $cat_menu):?>
						<li>

					<a href="<?php echo site_url($cat_menu->slug);?>"><?php echo $cat_menu->name;?></a>
				</li>
				<?php endforeach;?>
				<?php endif; ?>

				</ul>

            </p>

          </div>

          <div class="coffee-span-4 subgrid-column-8 coffee-603-span-12">

            <h6><span class="heading-text-3">CUSTOMER SERVICE</span>

            </h6>

            <div class="rule rule-1">

              <hr>

            </div>

            <p class="paragraph"><span class="paragraph-text-2">• <a title="" href="<?php echo site_url(); ?>contact-us" class="paragraph-text-15">Customer Service</a><br>• <a title="" href="<?php echo site_url('account'); ?>" class="paragraph-text-16">My Account</a><br>• <a title="" href="<?php echo site_url(); ?>privacy-policy" class="paragraph-text-19">Privacy Policy</a><br>• <a title="" href="<?php echo site_url(); ?>return-policy" class="paragraph-text-20">Return Policy</a><br>• <a title="" href="<?php echo site_url(); ?>terms-and-conditions" class="paragraph-text-21">Terms &amp; Conditions</a><br>• <a title="" href="<?php echo site_url(); ?>contact-us" class="paragraph-text-22">Contact Us</a></span>

            </p>

          </div>

          <div class="coffee-span-4 subgrid-column-9 coffee-603-span-12">

            <h6><span class="heading-text-3">CONTACT INFORMATION</span>

            </h6>

            <div class="rule rule-1">

              <hr>

            </div>

            <p class="paragraph"><span class="paragraph-text-2">Responsive Respiratory, Inc.<br>261 Wolfner Drive<br>St. Louis, MO 63026<br><br>Toll Free: 866-333-4030<br>Phone: 636-600-4030<br>Fax: 866-333-4035<br><br>Email: <a class="footer-email" href="mailto:llw@respondo2.com">llw@respondo2.com</a> </span>

            </p>

          </div>

        </div>

        <div class="row">

          <div class="coffee-span-12 subgrid-column-14"></div>

        </div>

      </div>

    </div>

  </div>

  <div class="row row-25">

    <div class="coffee-span-12">

      <div class="subgrid subgrid-1">

        <div class="row">

          <div class="coffee-span-6 subgrid-column-5 coffee-800-span-12"> 
            <span class="text-element text-11"><span class="text-text-14">© Copyright By Responsive Respiratory, Inc. All Rights Reserved.</span> 
            </span> 
          </div> 
		  <div class="coffee-span-6 subgrid-column-5 coffee-800-span-12"> 
            <span class="text-element text-11"><span class="text-text-14"><script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script></span> 
            </span> 
          </div>

        </div>

      </div>

    </div>

  </div>
<style>
#emailresponse .alert-error{font-family:"Poppins",cursive;font-size:16px;background:#F2DEDE;color:#a94442;border:1px solid #f2dede;border-radius:1px;padding:20px 10px;width:100%;clear:both;}
#emailresponse .alert-success{font-family:"Poppins",cursive;font-size:16px;background:#dff0d8;color:#3c763d;border:1px solid #d6e9c6;border-radius:1px;padding:20px 10px;width:100%;clear:both;font-weight:bold;}
</style>
<script type="text/javascript">
function searchform(){
	$("#searchform").submit();
}
function sendcontactusform(){
	$("#messageloader").fadeIn();
	var first_name = $("#first_name").val();
	var last_name = $("#last_name").val();
	var phone = $("#phone").val();
	var company = $("#company").val();
	var address = $("#address").val();
	var citystatezip = $("#citystatezip").val();
	var email = $("#email").val();
	var regarding = $("#regarding").val(); 
		$.post("<?php echo site_url('contactus/sendemail'); ?>", {first_name:first_name,last_name:last_name,phone:phone,company:company,address:address,citystatezip:citystatezip,email:email,regarding:regarding}).done(function(data){ 
		$("#emailresponse").html(data);
		$("#messageloader").fadeOut();		
		window.scroll(0,520);
	});
}
</script>

</body>



</html>