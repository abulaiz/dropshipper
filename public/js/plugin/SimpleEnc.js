var SimpleEnc = {
	pattern : 'efglmayzwWXYZ56bcdN34x7OPQnopHIV0128JKqrstuvABCDEhijkFGLMRSTU9',
	maskText : function(x, length){
		if(length < 5){
			var pref, intr, suff;
			for(let i=0, j=0; i< (5 - length); i++, j+=4){
				pref = x.substr(0, j);
				intr = this.pattern[Math.floor(Math.random()*61)] + this.pattern[Math.floor(Math.random()*61)];
				suff = x.substr(j);
				x = pref + intr + suff;
			}	
		}		
		var pattern_length = this.pattern.length;
		var ret = this.pattern[length % pattern_length] + x;
		ret = ( Math.floor(length / pattern_length) + 1 ) + ret;		
		return ret;		
	},
	getPos : function(chr){
		var pattern = this.pattern;
		for (let i=0; i < pattern.length; i++) { 
			if(chr == pattern[i])
				return i;
		}
	},
	getText : function(x, length){
		var real = [
			[2],
			[2, 6],
			[2, 6, 8],
			[2, 4, 6, 8],
		];

		var txt = "";
		var ptt = real[length - 1];
		for(let i=0; i<ptt.length; i++){
			txt += x.substr(ptt[i], 2);
		}
		return txt;		
	},
	encrypt : function (text) {
		text += '';
		var length = text.length;
		var out = "";
		var rr,p,s;
		for(let i=0; i<length; i++){
			rr = text[i].charCodeAt(0);
			p = Math.floor(Math.random()*3) + 2;
			s = Math.floor(rr / p);
			out += this.pattern[s]+""+this.pattern[ (p*10) + (rr%p) ];
		}
		out = this.maskText(out, length);
	 	return out;
	},
	decrypt : function(x){
		var length = this.getPos(x[1]) + ( (Number(x[0]) - 1) * this.pattern.length );
		x = x.substr(2);
		if(length < 5){
			x = this.getText(x, length);
		}

		var inn = "";
		var ii,iii,p,num,sisa;
		for(let i=0; i < x.length; i+=2){
			ii = this.getPos(x[i]);
			iii = this.getPos(x[i+1]);

			sisa = iii % 10;
			p = (iii - sisa) / 10;
			num = (ii*p)+sisa;
			inn += String.fromCharCode(num);
		}
		return inn;		
	}
};
