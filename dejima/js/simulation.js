/**
 *
 */

function click_facility_pc_num_over() {
 	if( document.getElementById('facility_pc_num_6').checked===true) {
		document.getElementById("facility_pc_num_over").style.display = "block";
		document.getElementById("facility_pc_num_ext").disabled = false;
		document.getElementById("facility_pc_num_ext").value  = 6;
 	}else{
		document.getElementById("facility_pc_num_over").style.display = "none";
		document.getElementById("facility_pc_num_ext").disabled = "disabled";
		document.getElementById("facility_pc_num_ext").value  = null;
	}
}


function click_record_pc_num() {
 	if( document.getElementById('record_1').checked===true) {
		document.getElementById("sim_block_record_num").style.display = "block";
		document.getElementById("record_pc_num").disabled = false;
		document.getElementById("record_pc_num").value  = 1;
 	}else{
		document.getElementById("sim_block_record_num").style.display = "none";
		document.getElementById("record_pc_num").disabled = "disabled";
		document.getElementById("record_pc_num").value  = 0;
	}
}

function click_nurse_pc_num() {
 	if( document.getElementById('nurse_call_1').checked===true) {
		document.getElementById("sim_block_nurse_num").style.display = "block";
		document.getElementById("nurse_pc_num").disabled = false;
		document.getElementById("nurse_pc_num").value  = 1;
 	}else{
		document.getElementById("sim_block_nurse_num").style.display = "none";
		document.getElementById("nurse_pc_num").disabled = "disabled";
		document.getElementById("nurse_pc_num").value  = 0;
	}
}

function click_care_pc_num() {
 	if( document.getElementById('care_1').checked===true) {
		document.getElementById("sim_block_care_num").style.display = "block";
		document.getElementById("care_pc_num").disabled = false;
		document.getElementById("care_pc_num").value  = 1;
 	}else{
		document.getElementById("sim_block_care_num").style.display = "none";
		document.getElementById("care_pc_num").disabled = "disabled";
		document.getElementById("care_pc_num").value  = 0;
	}
}


function click_used_total_system() {
 	if( document.getElementById('used_total_system').checked===true) {
		document.getElementById("sim_block_used_total_num").style.display = "block";
		document.getElementById("used_total_pc_num").disabled = false;
		document.getElementById("used_total_pc_num").value  = 1;
 	}else{
		document.getElementById("sim_block_used_total_num").style.display = "none";
		document.getElementById("used_total_pc_num").disabled = "disabled";
		document.getElementById("used_total_pc_num").value  = 0;
	}
}

function click_nutrition_system() {
 	if( document.getElementById('nutrition_system').checked===true) {
		document.getElementById("sim_block_nutrition_num").style.display = "block";
		document.getElementById("nutrition_pc_num").disabled = false;
		document.getElementById("nutrition_pc_num").value  = 1;
 	}else{
		document.getElementById("sim_block_nutrition_num").style.display = "none";
		document.getElementById("nutrition_pc_num").disabled = "disabled";
		document.getElementById("nutrition_pc_num").value  = 0;
	}
}

function click_deposit_system() {
 	if( document.getElementById('deposit_system').checked===true) {
		document.getElementById("sim_block_deposit_num").style.display = "block";
		document.getElementById("deposit_pc_num").disabled = false;
		document.getElementById("deposit_pc_num").value  = 1;
 	}else{
		document.getElementById("sim_block_deposit_num").style.display = "none";
		document.getElementById("deposit_pc_num").disabled = "disabled";
		document.getElementById("deposit_pc_num").value  = 0;
	}
}




function clikc_pc_num_over() {
 	if( document.getElementById('pc_num_6').checked===true) {
		document.getElementById("pc_num_over").style.display = "block";
		document.getElementById("pc_num_ext").disabled = false;
		document.getElementById("pc_num_ext").value  = 6;
 	}else{
		document.getElementById("pc_num_over").style.display = "none";
		document.getElementById("pc_num_ext").disabled = "disabled";
		document.getElementById("pc_num_ext").value  = null;
	}
}
