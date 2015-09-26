	jQuery.noConflict();  

	var specialConsonants		 = new Array();
	var specialConsonantsUnicode = new Array();
	var specialCharUnicode		 = new Array();
	var specialChar				 = new Array();

    var vowelsCount				 =	26;
	var consonants				 = new Array();
	var consonantsUnicode		 = new Array();

	var vowelsUnicode			= ['ඌ','ඕ','ඕ','ආ','ආ','ඈ','ඈ','ඈ','ඊ','ඊ','ඊ','ඊ','ඒ','ඒ','ඒ','ඌ','ඌ','ඖ','ඇ','අ','ඇ','ඉ','එ','උ','ඔ','ඓ'];

	var vowelModifiersUnicode	= ['ූ','ෝ','ෝ','ා','ා','ෑ','ෑ','ෑ','ී','ී','ී','ී','ේ','ේ','ේ','ූ','ූ','ෞ','ැ','','ැ','ි','ෙ','ු','ො','ෛ'];

	var vowels				= ['oo','o\\)','oe','aa','a\\)','Aa','A\\)','ae','ii','i\\)','ie','ee','ea','e\\)','ei','uu','u\\)','au','/\a','a','A','i','e','u','o','I'];

	//var consonantsUnicode		=	["ඬ","ඳ","ඟ","ථ","ධ","ඝ","ඡ","ඵ","භ","ශ","ෂ","ඥ","ඤ","ළ","ද","ච","ඛ","ත","ට","ක","ඩ","න","ප","බ","ම","‍ය","‍ය","ය","ජ","ල","ව","ව","ස","හ","ණ","ළ","ඛ","ඝ","ඨ","ඪ","ඵ","ඹ","ෆ","ඣ","ග","ර","ක"]; 
	var consonantsUnicode		=	["ඬ","ඳ","ඟ","ථ","ධ","ඝ","ඡ","ඵ","භ","ශ","ෂ","ඥ","ඤ","ළ","ද","ච","ඛ","ත","ට","ක","ඩ","න","ප","බ","ම","‍ය","‍ය","ය","ජ","ල","ව","ව","ස","හ","ණ","ළ","ඛ","ඝ","ඨ","ඪ","ඵ","ඹ","ෆ","ඣ","ග","ර","ක","ක","එ","ෆ","හ","ජ","ම","ඹ","ඣ්","ස","උ","ව","ව","ස"];


    specialConsonantsUnicode[0]='ං'; specialConsonants[0]=/\\n/g;
    specialConsonantsUnicode[1]='ඃ'; specialConsonants[1]=/\\h/g;
    specialConsonantsUnicode[2]='ඞ'; specialConsonants[2]=/\\N/g;
    specialConsonantsUnicode[3]='ඍ'; specialConsonants[3]=/\\R/g;
    
	//special character Repaya
    specialConsonantsUnicode[4]='ර්'+'\u200D'; specialConsonants[4]=/R/g;
    specialConsonantsUnicode[5]='ර්'+'\u200D'; specialConsonants[5]=/\\r/g;
    
     consonants[0] ='nnd';
     consonants[1] ='nndh';
     consonants[2] ='nng';
     consonants[3] ='Th';
     consonants[4] ='Dh';
     consonants[5] ='gh';
     consonants[6] ='Ch';
     consonants[7] ='ph';
     consonants[8] ='bh';
     consonants[9] ='sh';
     consonants[10]='Sh';
     consonants[11]='GN';
     consonants[12]='KN';
     consonants[13]='Lu';
     consonants[14]='dh';
     consonants[15]='ch';
     consonants[16]='kh';
     consonants[17]='th';
  
     consonants[18]='t';
     consonants[19]='k';    
     consonants[20]='d';
     consonants[21]='n';
     consonants[22]='p';
     consonants[23]='b';
     consonants[24]='m';   
     consonants[25]='\\u005C'+'y';
     consonants[26]='Y';
     consonants[27]='y';
     consonants[28]='j';
	

     consonants[29]='l';
     consonants[30]='v';
     consonants[31]='w';
     consonants[32]='s';
     consonants[33]='h';
     consonants[34]='N';
     consonants[35]='L';
     consonants[36]='K';
     consonants[37]='G';
     consonants[38]='T';
     consonants[39]='D';
     consonants[40]='P';
     consonants[41]='B';
     consonants[42]='f';
     consonants[43]='q';
     consonants[44]='g';
     //keep this last because need to avoid this in dealing with Rakaransha
     consonants[45]='r';
	 
	 //new added
	  consonants[46]='c';
	 
	  consonants[47]='C';
	  consonants[48]='E';
	  consonants[49]='F';
	  consonants[50]='H';
	  consonants[51]='J'; 
	  consonants[52]='M';
	  consonants[53]='O';
	  consonants[54]='Q';
	  consonants[55]='S';
	  consonants[56]='U';
	  consonants[57]='V'; 
	  consonants[58]='W';
	  consonants[59]='X'; 
	  //consonants[60]='Z';
 

    specialCharUnicode[0]='ෲ'; specialChar[0]='ruu';
    specialCharUnicode[1]='ෘ'; specialChar[1]='ru';
    //specialCharUnicode[2]='්‍ර'; specialChar[2]='ra';

jQuery(document).ready(function () {


	//*************** Add Comment Box *******************************

	jQuery("#comment").before('<marquee class="sinhala_comment_info" onmouseover=this.stop(); onmouseout=this.start(); scrollamount="3" scrolldelay="8">සිංහලෙන් comment දමන්න අවශ්‍යනම් පහල button එක click කලාම එන box එකේ type කරන්න. සිංහල Unicode වලින් comment box එකට වචනය add වේවි.<a href="http://webexplorar.com/wordpress-sinhala-comments-plugin/" target="_blank" class="sinhala-more_info" style="color:#990000;	cursor:help;">වැඩි විස්තර ඕනනම් මෙතන click කරන්න.</a></marquee><input style="margin: 5px 0 10px" type="button" class="sinhala_comment_button" value="සිංහලෙන් comments"/><br/><div style="display:none;" class="sinhala_comment_wrapper">Singlish Box<textarea  style="margin-top: 7px;" size="22" name="sinhalaCommentBox" id="sinhalaCommentBox"></textarea></div>');



	//*************** Show Comment Box *******************************

	jQuery('.sinhala_comment_button').click(function () {
		jQuery('.sinhala_comment_wrapper').slideToggle(300);
		jQuery("#sinhalaCommentBox").focus();		
	});


	//*************** Convert Process *******************************

	jQuery("#sinhalaCommentBox").keydown(
		function(){

			var a,b,c;		
			
			var char = jQuery('#sinhalaCommentBox').val();  
			//********** special consonents *************
			for (var i=0; i<specialConsonants.length; i++){
				char = char.replace(specialConsonants[i], specialConsonantsUnicode[i]);
			}
			
			
			
			
			//********** consonents + special Chars  ****
			for (var i=0; i<specialCharUnicode.length; i++){
				for (var x=0; x<consonants.length; x++){
					a = consonants[x] + specialChar[i];
					c = consonantsUnicode[x] + specialCharUnicode[i];
					b = new RegExp(a, "g");
					char = char.replace(b, c);
				}
			}
			
			
			
			
			//********** consonants + Rakaransha + vowel modifiers *******
			for (var x=0; x<consonants.length; x++){
				for (var i=0; i<vowels.length; i++){
					a = consonants[x] + "r" + vowels[i];
					c = consonantsUnicode[x] + "්‍ර" + vowelModifiersUnicode[i];
					b = new RegExp(a, "g");
					char = char.replace(b, c);
				}
				a = consonants[x] + "r";
				c = consonantsUnicode[x] + "්‍ර";
				b = new RegExp(a, "g");
				char = char.replace(b, c);
			}
			
			
			
			//********** consonents + vowel modifiers ************
			for (var i=0; i<consonants.length; i++){
				for (var x=0; x<vowelsCount; x++){ 
					a = consonants[i]+vowels[x];
					c = consonantsUnicode[i] + vowelModifiersUnicode[x];
					b = new RegExp(a, "g");
					char = char.replace(b, c);
				}
			}
			
		
			//********** consonents + HAL ***************
			for (var i=0; i<consonants.length; i++){
				b = new RegExp(consonants[i], "g");
				char = char.replace(b, consonantsUnicode[i]+"්");
			}
				
			//********** vowels **********************
			for (var i=0; i<vowels.length; i++){
				b = new RegExp(vowels[i], "g");
				char = char.replace(b, vowelsUnicode[i]);
			}
		//jQuery('#sinhalaCommentBox').val('');
			 jQuery("#sinhalaCommentBox").keyup(function(e){
				 if(e.keyCode != 8/* || e.keyCode != 12*/){
				 	//alert('backspace trapped');
					//if(jQuery('#comment').val() == '') {
						jQuery('#comment').val(char);
					//}
					//else {
						//document.getElementById('comment').value +=char;
					//}
				 }
			 })  
				 
			
			//document.getElementById('comment').value +=char;
			
			

		}); // End of the convert process function
	
	//***************************************************

	
});


/*

	ද  - dha
	ධ  - Dha
	පා  - paa 
	පේ - pea
	
	ණ් - N
	
	මෙ - me 
	මේ  - mea
	මි - mi
	මී - mee 
	 
	ඬ - nnd
	
    ඳ - nndh
    ඟ - nng
	
    ථ - Th
    ඝ - h

    ඥ - GN
	
    ඤ - KN
	
    ළු - Lu
	
	කෝ - koe



*/
