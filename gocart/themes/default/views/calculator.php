<div class="row">
    <div class="coffee-span-12 column-7"></div>
</div>
<div class="row row-7">
    <div class="coffee-span-5 column-12 coffee-960-span-5 coffee-800-span-12">
      <h5><span class="heading-text-7">O2 TO GO CALCULATOR</span>
      </h5>
      <div class="rule rule-7a">
        <hr>
      </div>
    </div> 
</div>
<div class="row">
    <div class="coffee-span-12">
      <span class="text-element text-6"><span class="text-text-7"><a title="" href="<?php echo site_url(); ?>">HOME</a>&nbsp;&gt; O2 TO GO CALCULATOR</span>
      </span>
    </div>
</div>  
<style>#err_div{font-family:"Poppins",cursive;color:#256c9a;font-size:17px;}</style>

<div class="row row-5">

    <div class="coffee-span-9 coffee-800-span-12 coffee-1024-span-12">

      <div class="container container-2a">

        <div class="subgrid">
		  <div id="resetpassworddiv" class="row"></div>
		            <div class="row subgrid-row-1">

            <div class="coffee-span-2 coffee-414-span-3 subgrid-column-56"><span class="glyph font-icon-1" style="font-size:51px;"><i class="coffeecup-icons-droplet"></i></span>

            </div>

            <div class="coffee-span-10 coffee-414-span-9">

              <h6 class="heading-5"><span class="heading-text-2">DEVICE SELECTION</span></h6>
			  <p class="paragraph paragraph-5"><span class="paragraph-text-3">✴Estimated cylinder duration time. Breathing rate and cylinder pressure will affect actual duration</span></p>

              <div class="rule rule-6">

                <hr>

              </div>
			<div style="clear:both;height:40px;"></div>  
			<div class="row"> 
				<div class="coffee-span-5 subgrid-column-20">
					<span class="text-element"><span class="text-text-10">O2 Device Selection:</span></span>
				</div>
				<div class="coffee-span-6">
					<select name="o2Device" id="o2Device" class="input-3 stateselectbox">
						<option value="" selected="selected">Select O2 Device</option>
						<option value="Conserver 5:1">Conserver 5:1</option>
						<option value="Conserver 3:1">Conserver 3:1</option>
						<option value="Adult Regulator">Adult Regulator</option>
						<option value="Pediatric Regulator">Pediatric Regulator</option>
						<option value="EMS Regulator">EMS Regulator</option>
					</select> 
				</div> 
			</div>
			<div class="row"> 
				<div class="coffee-span-5 subgrid-column-20">
					<span class="text-element"><span class="text-text-10">Liter Flow Selection:</span></span>
				</div>
				<div class="coffee-span-6"> 
					<select name="literFlowId" id="literFlowId" onchange="fn_literflow()" class="input-3 stateselectbox"><option value="">Select Liter Flow</option><option value="0.03">0.03 LPM</option><option value="0.06">0.06 LPM</option><option value="0.12">0.12 LPM</option><option value="0.25">0.25 LPM</option><option value="0.375">0.375 LPM</option><option value="0.5">0.5 LPM</option><option value="0.75">0.75 LPM</option><option value="1">1 LPM</option><option value="1.5">1.5 LPM</option><option value="2">2.0 LPM</option><option value="2.5">2.5 LPM</option><option value="3">3 LPM</option><option value="4">4 LPM</option></select> 
				</div> 
			</div>
			<div class="row"> 
				<div class="coffee-span-5 subgrid-column-20">
					<span class="text-element"><span class="text-text-10">Cylinder Size Selection:</span></span>
				</div>
				<div class="coffee-span-6">
					<select name="cylinderSize" id="cylinderSize" onchange="fn_cylinderSize()" class="input-3 stateselectbox">
					</select>
				</div> 
			</div>
			<div class="row"> 
				<div class="coffee-span-5 subgrid-column-20">
					<span class="text-element"><span class="text-text-10">Cylinder % Full:</span></span>
				</div>
				<div class="coffee-span-6">
					<select name="cylinderFull" id="cylinderFull" onchange="fn_cylinderFull()" class="input-3 stateselectbox">
					</select>
				</div> 
			</div>
			<div class="row"> 
				<div class="coffee-span-9 subgrid-column-20">
					<span class="text-element"><span class="text-text-10">&nbsp;</span></span>
				</div>
				<div class="coffee-span-2"><a onclick="reset()" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">RESET</span></a></div> 
			</div>
			<div style="clear:both;height:30px;"></div>
			<div class="row"> 
				<div class="coffee-span-12 subgrid-column-20">
					<h6 class="heading-5" style="font-size:31px;"><span class="heading-text-2">RESULTS✴</span></h6>
				</div> 
			</div>
			<div class="row"> 
				<div class="coffee-span-5 subgrid-column-20">
					<span class="text-element"><span class="text-text-10">CYLINDER DURATION:</span></span>
				</div>
				<div class="coffee-span-6"><div id="err_div"></div></div> 
			</div>
			
			

            </div>

          </div>

          <div class="row">
			            
 
          </div>

          <div class="row">

            <div class="coffee-span-12 subgrid-column-31"></div>

          </div>

          

        </div>

      </div>

    </div>

    <div class="coffee-span-3 coffee-800-span-12 coffee-1024-span-12">

      <div class="container container-2">

        <div class="subgrid">

          <div class="row">

            <div class="coffee-span-12">

              <h6><span class="heading-text-6">QUICK LINKS</span>

              </h6>

              <div class="rule rule-7">

                <hr>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="coffee-span-12"><a href="<?php echo site_url('myorders'); ?>" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">OPEN ORDERS</span></a>

            </div>

          </div> 

          <div class="row">

            <div class="coffee-span-12"><a href="<?php echo site_url('favourites'); ?>" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">UPDATE FAVORITES</span></a>

            </div>

          </div> 

          <div class="row">

            <div class="coffee-span-12"><a href="<?php echo site_url(); ?>contact-us" class="link-button-glyph button-link-icon-4"><span class="glyph-for-button"><i class="coffeecup-icons-file-check2"></i></span><span class="link-button-text text-for-button-link-4">CONTACT RRI</span></a>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Respondo2Calculator.js"></script>