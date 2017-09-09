function key(e) {
    var k;
    if(e.keyCode != 9 && e.keyCode != 13)
    {
   		document.all ? k = e.keyCode : k = e.which;
   		return ((k >= 65 && k <= 90) || (k >= 48 && k <= 57) || k == 8 || (k > 96 && k < 123) || (k >= 37 && k <= 40));
    }
}