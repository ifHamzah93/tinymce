var forminputs = document.getElementById("myForm").elements;
let arrInputs = {};
$.each(forminputs, function(k, v) {
	arrInputs[v.name] = v.name;
});
	
if (Object.keys(data).length > 0) {
	$.each(data, function(keys, val) {
	if (!is_empty(arrInputs[keys])) {
		let filters = ['nama'];
		let cek = filters.filter(function(item){return item == keys}).length ? true : false;
		if (cek) {
			return false;
		} else {
			document.getElementsByName(arrInputs[keys])[0].value = val;
		}
	}
});