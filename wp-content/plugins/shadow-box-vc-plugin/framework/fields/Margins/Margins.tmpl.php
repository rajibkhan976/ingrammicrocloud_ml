<style>
    .am-margins-body .am-margins-line > * {
	    vertical-align: middle;
	    display: inline-block;
    }
    .wpb-edit-form .am-margins-body input {
        width: 70px;
    }

    .am-margins-label {
	    text-align: right;
	    margin-right: 8px;
    }

    .am-margins-label-left {
	    width: 74px;
    }

    .am-margins-label-right {
	    width: 105px;
	    margin-left: 0px;
    }
</style>

<div class="am-margins-body">
	<div class="am-margins-line">
		<div class="am-margins-label am-margins-label-left">Left & Right: </div>
		<input class="am-margins-lr"
		       type="number"
		       min="-1000"
		       max="1000"
		       step="1"
		       placeholder="zero"
			/><span class="am_vc_input_suffix">px</span>

		<div class="am-margins-label am-margins-label-right">Top & Bottom: </div>
		<input class="am-margins-tb"
		       type="number"
		       min="-1000"
		       max="1000"
		       step="1"
		       placeholder="zero"
			/><span class="am_vc_input_suffix">px</span>
	</div>
</div>