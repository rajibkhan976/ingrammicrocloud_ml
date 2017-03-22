<style>
    .am-margins4-body .am-margins4-line:first-child {
	    margin-bottom: 12px;
    }
    .am-margins4-body .am-margins4-line > * {
	    vertical-align: middle;
	    display: inline-block;
    }
    .wpb-edit-form .am-margins4-body input {
        width: 70px;
    }

    .am-margins4-label {
	    width: 74px;
	    text-align: right;
	    margin-right: 8px;
    }

    .am-margins4-label-left {
	    width: auto;
    }
</style>

<div class="am-margins4-body">
	<div class="am-margins4-line">
		<div class="am-margins4-label am-margins4-label-left">Left: </div>
		<input class="am-margins4-left"
		       type="number"
		       min="-1000"
		       max="1000"
		       step="1"
		       placeholder="zero"
			/><span class="am_vc_input_suffix">px</span>

		<div class="am-margins4-label">Right: </div>
		<input class="am-margins4-right"
		       type="number"
		       min="-1000"
		       max="1000"
		       step="1"
		       placeholder="zero"
			/><span class="am_vc_input_suffix">px</span>
	</div>
	<div class="am-margins4-line">
		<div class="am-margins4-label am-margins4-label-left">Top: </div>
		<input class="am-margins4-top"
		       type="number"
		       min="-1000"
		       max="1000"
		       step="1"
		       placeholder="zero"
			/><span class="am_vc_input_suffix">px</span>

		<div class="am-margins4-label">Bottom: </div>
		<input class="am-margins4-bottom"
		       type="number"
		       min="-1000"
		       max="1000"
		       step="1"
		       placeholder="zero"
			/><span class="am_vc_input_suffix">px</span>
	</div>
</div>