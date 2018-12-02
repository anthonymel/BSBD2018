function price_format(o) {
	    return Number(o).toFixed(1);
	}
function recalc()
{
	    var sum = price_format(parseFloat(document.getElementById('field1').value) * parseFloat(document.getElementById('field2').value));
	         var kol = price_format(parseFloat(document.getElementById('field1').value));
	switch (true) {
	        case kol > 0 && kol <= 5:  document.getElementById('fieldRes').innerHTML = sum;
	    break;
	        case kol > 6 && kol <= 10:  document.getElementById('fieldRes').innerHTML = sum - (sum * 5 / 100);
	    break;
	        case kol > 11 && kol <= 25:  document.getElementById('fieldRes').innerHTML = sum - (sum * 10 / 100);
	    break;
	    }
}