function backgr(){
	var ans = new p5(function(p){
		class circ{
			constructor(){
				this.replace();
				this.r = p.random(100);
			}

			draw(){
				p.stroke(140, 0, 0, 255 * (1 - (this.r / this.maxr)));

				if(this.r < this.maxr){
					this.r++;
				}
				else this.replace();
				p.circle(this.x, this.y, this.r, this.r);
			}

			replace(){
				this.x 			= 	p.random(p.width);
				this.y 			= 	p.random(p.height);
				this.r 			= 	0;
				this.maxr		=		p.random(100);
			}
		}

		p.circles = [];

		p.setup = function(){
			var canv = p.createCanvas(p.windowWidth, p.windowHeight);
			canv.parent("#background");

			var amount = 100 * ((p.windowWidth * p.windowHeight) / 1879680);
			for(var n = 0; n < amount; n++){
				p.circles.push(new circ());
				p.noFill();
			}

			console.log(amount);
		}

		p.draw = function(){
			p.clear();

			for(var n = 0; n < p.circles.length; n++){
				p.circles[n].draw();
			}
		}

		p.windowResized = function(){
			p.resizeCanvas(p.windowWidth, p.windowHeight);
		}
	});

	return ans;
}

backgr();
